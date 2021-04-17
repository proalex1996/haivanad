<?php


namespace App\Http\Controllers;

use App\Exports\ExportContract;
use App\Exports\ExportPayment;
use App\Exports\ExportReport;
use App\Imports\ImportsContract;
use App\Model\Branch;
use App\Model\ContractModel;
use App\Model\Kind;
use App\Model\DetailModel;
use App\Model\Position;
use App\Model\Status_contract;
use App\Model\Type;
use App\Model\Type_Customer;
use App\Repositories\Contract\ContractRepositoryEloquent;
use App\Utilili\RamdomCode;
use Barryvdh\DomPDF\Facade as PDF;
use FontLib\Table\Type\name;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use MongoDB\Driver\Session;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Project;
use PhpOffice\PhpWord\Shared\ZipArchive;
use Symfony\Component\Console\Input\Input;

class ContractController extends Controller
{
    protected $contractRepository;

    public function __construct(ContractRepositoryEloquent $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }

    public function rules()
    {
        return [
            'name_contract' => 'required',
            'content_contract' => 'require'
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());
    }

    public function getContract(Request $request)
    {
        $id_contract = $request->id_contract;
        $name_customer = $request->name_customer;
        $_nguon = $request->nguon;
        $_kind = $request->kind;
        $typebanner = $request->type_banner;
        $id_staff = $request->id_staff;
        $_name_banner = $request->_name_banner;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $id_status  = $request->id_status;
        $staff = DB::table('users')->select('*')->get();
        $status_contracts = DB::table('contract_status')->select('*')->get();
        $nguon = DB::table('nguon_customer')->select('*')->get();
        $kinds = DB::table('kind_contract')->select('*')->get();
        $type_banner = DB::table('type_banner')->select('*')->get();
        if (is_null($id_contract) && is_null($name_customer) && is_null($_nguon) && is_null($_kind) &&
            is_null($typebanner) && is_null($id_staff) && is_null($_name_banner) && is_null($date_start) &&
            is_null($date_end) && is_null($id_status))  {
            $contracts = DB::select("
               SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status
                FROM contract
                JOIN customer
                ON customer.customer_id = contract.id_customer
                JOIN kind_contract
                ON contract.kind = kind_contract.id_contract
                JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
                JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
                JOIN contract_status ON contract.`status_contract` = contract_status.id_contract
                GROUP BY contract.id_contract ORDER BY contract.id DESC
        ");
        }
        if(!empty($id_contract) ){
            $contracts = DB::select("
        SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status
        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN type_banner
        JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.`status_contract` = contract_status.id_contract
        where contract.id_contract = '{$id_contract}'
        GROUP BY contract.id_contract order by contract.id DESC
        ");
        }
        if(!empty($name_customer) ){
            $contracts = DB::select("
        SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status
        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN type_banner
        JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.`status_contract` = contract_status.id_contract
        where customer.name_customer = '{$id_contract}'
        GROUP BY contract.id_contract order by contract.id DESC
        ");
        }
        if(!empty($_nguon)){
            $contracts = DB::select("
            SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status, nguon_customer.name_nguon

        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN type_banner
        JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.status_contract = contract_status.id_contract
        JOIN nguon_customer ON nguon_customer.id_nguon = (SELECT nguon_customer.id_nguon FROM  nguon_customer, customer
            JOIN contract  ON contract.id_customer = customer.customer_id
           WHERE customer.id_nguon = nguon_customer.id_nguon
            GROUP BY  nguon_customer.id_nguon)
        where nguon_customer.id_nguon = '{$_nguon}'
        GROUP BY contract.id_contract ORDER BY contract.id DESC
            ");
        }
        if(!empty($id_staff)){
            $contracts = DB::select("
            SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status,nguon_customer.name_nguon,users.name

        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN type_banner
       JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.status_contract = contract_status.id_contract
        JOIN nguon_customer ON nguon_customer.id_nguon = (SELECT nguon_customer.id_nguon FROM  nguon_customer, customer
            JOIN contract  ON contract.id_customer = customer.customer_id
           WHERE customer.id_nguon = nguon_customer.id_nguon
            GROUP BY  nguon_customer.id_nguon)
          JOIN users ON users.id_staff = contract.id_staff
          where users.id_staff = '{$id_staff}'
         GROUP BY contract.id_contract ORDER BY contract.id DESC
            ");
        }
        if(!empty($_kind)){
            $contracts = DB::select("
           SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status,nguon_customer.name_nguon,users.name

        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.status_contract = contract_status.id_contract
        JOIN nguon_customer ON nguon_customer.id_nguon = (SELECT nguon_customer.id_nguon FROM  nguon_customer, customer
            JOIN contract  ON contract.id_customer = customer.customer_id
           WHERE customer.id_nguon = nguon_customer.id_nguon
            GROUP BY  nguon_customer.id_nguon)
          JOIN users ON users.id_staff = contract.id_staff
          where kind_contract.id_contract = '{$_kind}'
         GROUP BY contract.id_contract ORDER BY contract.id DESC
            ");
        }
        if(!empty($typebanner)){
            $contracts = DB::select("
            SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status,nguon_customer.name_nguon,users.name

        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.status_contract = contract_status.id_contract
        JOIN nguon_customer ON nguon_customer.id_nguon = (SELECT nguon_customer.id_nguon FROM  nguon_customer, customer
            JOIN contract  ON contract.id_customer = customer.customer_id
           WHERE customer.id_nguon = nguon_customer.id_nguon
            GROUP BY  nguon_customer.id_nguon)
          JOIN users ON users.id_staff = contract.id_staff
          where bn.id_typebanner = '{$typebanner}'
         GROUP BY contract.id_contract ORDER BY contract.id DESC
            ");
        }
        if(!empty($_name_banner)){
            $contracts = DB::select("
            SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status,nguon_customer.name_nguon,users.name

        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.status_contract = contract_status.id_contract
        JOIN nguon_customer ON nguon_customer.id_nguon = (SELECT nguon_customer.id_nguon FROM  nguon_customer, customer
            JOIN contract  ON contract.id_customer = customer.customer_id
           WHERE customer.id_nguon = nguon_customer.id_nguon
            GROUP BY  nguon_customer.id_nguon)
          JOIN users ON users.id_staff = contract.id_staff
          where banner._name_banner = '{$_name_banner}'
         GROUP BY contract.id_contract ORDER BY contract.id DESC
            ");
        }
        if(!empty($date_start)){
            $contracts = DB::select("
                SELECT contract.id,contract.id_contract, customer.name_customer,
                    kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                    contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                    (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                    ,contract_status.name_status,nguon_customer.name_nguon,users.name

            FROM contract
            JOIN customer
            ON customer.customer_id = contract.id_customer
            JOIN kind_contract
            ON contract.kind = kind_contract.id_contract
            JOIN (
                SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
                FROM banner
                JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
                ) AS bn ON bn.id_banner = contract.`id_banner`
            JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
            JOIN contract_status ON contract.status_contract = contract_status.id_contract
            JOIN nguon_customer ON nguon_customer.id_nguon = (SELECT nguon_customer.id_nguon FROM  nguon_customer, customer
                JOIN contract  ON contract.id_customer = customer.customer_id
               WHERE customer.id_nguon = nguon_customer.id_nguon
                GROUP BY  nguon_customer.id_nguon)
              JOIN users ON users.id_staff = contract.id_staff
              where contract.date_start = '{$date_start}'
             GROUP BY contract.id_contract ORDER BY contract.id DESC
            ");
        }
        if(!empty($date_end)){
            $contracts = DB::select("
            SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status,nguon_customer.name_nguon,users.name

        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.status_contract = contract_status.id_contract
        JOIN nguon_customer ON nguon_customer.id_nguon = (SELECT nguon_customer.id_nguon FROM  nguon_customer, customer
            JOIN contract  ON contract.id_customer = customer.customer_id
           WHERE customer.id_nguon = nguon_customer.id_nguon
            GROUP BY  nguon_customer.id_nguon)
          JOIN users ON users.id_staff = contract.id_staff
          where contract.date_end = '{$date_end}'
         GROUP BY contract.id_contract ORDER BY contract.id DESC
            ");
        }
        if(!empty($id_status)){
            $contracts = DB::select("
            SELECT contract.id,contract.id_contract, customer.name_customer,
                kind_contract.name_kind, bn.name_type,bn._name_banner,contract.date_end,
                contract.value_contract,(SELECT COALESCE(SUM(detail_payment.total_value),0)  FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '1') AS paid,
                (SELECT COALESCE(SUM(detail_payment.total_value),0) FROM detail_payment,contract WHERE contract.id_contract = detail_payment.id_contract && detail_payment.id_status = '3') AS due
                ,contract_status.name_status,nguon_customer.name_nguon,users.name

        FROM contract
        JOIN customer
        ON customer.customer_id = contract.id_customer
        JOIN kind_contract
        ON contract.kind = kind_contract.id_contract
        JOIN (
			SELECT banner.`id`, banner.`id_banner`, banner._name_banner, type_banner.`name_type`
			FROM banner
			JOIN type_banner ON banner.id_typebanner = type_banner.`id_typebanner`
		    ) AS bn ON bn.id_banner = contract.`id_banner`
        JOIN detail_payment ON detail_payment.id_contract = contract.id_contract
        JOIN contract_status ON contract.status_contract = contract_status.id_contract
        JOIN nguon_customer ON nguon_customer.id_nguon = (SELECT nguon_customer.id_nguon FROM  nguon_customer, customer
            JOIN contract  ON contract.id_customer = customer.customer_id
           WHERE customer.id_nguon = nguon_customer.id_nguon
            GROUP BY  nguon_customer.id_nguon)
          JOIN users ON users.id_staff = contract.id_staff
          where contract_status.id_contract = '{$id_status}'
         GROUP BY contract.id_contract ORDER BY contract.id DESC
            ");

        }


        return view('pages.contract.contract', [
            'contracts' => $contracts,
            'users' => $staff,
            'status_contracts' => $status_contracts,
            'nguons' =>$nguon,
            'kinds' => $kinds,
            'type_banners' => $type_banner
        ]);


    }

    public function postDec()
    {
        $contracts = DB::table('contract')
            ->join('customer', 'id_customer', '=', 'customer.id')
            ->join('staff', 'id_staff', '=', 'staff.id')
            ->join('banner', 'id_banner', '=', 'banner.id')
            ->join('kind_contract', 'kind', '=', 'kind_contract.id_contract')
            ->join('contract_status', 'status_contract', '=', 'contract_status.id_contract')
            ->select(DB::raw('Count(contract.id) as total'))->where('contract.date_start', 'Like', '%-12-%')->orderBy('contract.id')->first();
        return json_encode($contracts);
    }

    public function addContract(Request $request)
    {
        $maxid = DB::table('contract')->max('id');
        $code = RamdomCode::generateCode($maxid);
        $banner = DB::table('banner')->select('*')->get();
        $kind_contract = DB::table('kind_contract')->select('*')->get();
        $staff = DB::table('users')->select('*')->get();
        $customer = DB::table('customer')->select('*')->get();
        $status = DB::table('contract_status')->select('*')->get();
        $detail_payment = DB::table('detail_payment')->select('*')->get();
        $nguon = DB::table('nguon_customer')->select('*')->get();
        $type_banners = DB::table('type_banner')->select('*')->get();
        $position = DB::table('positions')->select('*')->get();
        $provinces = DB::table('province')->select('*')->get();
        $photo = DB::table('photo')->select('*')->get();
        return view('pages.contract.add', [
            'banners' => $banner,
            'kind_contract' => $kind_contract,
            'staffs' => $staff,
            'customers' => $customer,
            'status' => $status,
            'detail_payments' => $detail_payment,
            'nguons' => $nguon,
            'type_banners' => $type_banners,
            'positions' => $position,
            'provinces' => $provinces,
            'photos' => $photo,
            'codes' =>$code
        ]);
    }

    public function createContract(Request $request)
    {

        $contract = new ContractModel();
        $contract->id_contract = $request->id_contract;
        $contract->id_customer = $request->name_customer;
        $contract->id_staff = $request->id_staff;
        $contract->id_banner = $request->id_banner;
        $contract->content = basename($request->content_contract->getClientOriginalName());
        $file = $request->file('content_contract');
        $fileName = $request->file('content_contract')->getClientOriginalName();
        $contract->date_start = $request->date_start;
        $contract->date_end = $request->date_end;
        $contract->kind = $request->kind_name;
        $value_contract = $request->value_contract;
        $value_contract = str_replace('$','',$value_contract);
        $value_contract = str_replace(',','',$value_contract);
        $contract->value_contract = $value_contract;
        $contract->note_contract = $request->note_contract;
        //$pdf = PDF::loadview('contract.blade.php',$file);
        $storage = Storage::putFileAs('contract', $file, $fileName);
        $contract->save();
        $payment_period = $request->payment_period;
        $ratio = $request->ratio;
        $id_value_contract = $request->id_value_contract;
        $id_vat = $request->id_vat;
        $total_value = $request->total_value;
        $_pay_due = $request->_pay_due;

        if (!empty($payment_period)) {
            for ($i = 0; $i < sizeof($payment_period); $i++) {
                $detail = new DetailModel();
                $detail->id_contract = $request->id_contract;
                $detail->payment_period = $payment_period[$i];
                $detail->ratio = $ratio[$i];
                $detail->id_value_contract = $id_value_contract[$i];
                $detail->id_vat = $id_vat[$i];
                $detail->total_value = $total_value[$i];
                $detail->_pay_due = $_pay_due[$i];
                $detail->save();
            }
        }


        return redirect()->action('ContractController@getContract');
    }

    public function getDownload()
    {
        $filePath = public_path("storage/contract");
        return response()->download($filePath);

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(!empty($data['value_contract'])){
            $data['value_contract'] = str_replace('$','',$data['value_contract']);
            $data['value_contract'] = str_replace(',','',$data['value_contract']);
        }

        if (!empty($data)) {
            if (!empty($data['content'])) {
                $data['content'] = basename($request->content_contract->getClientOriginalName());
                $file = $request->file('content');
                $fileName = $request->file('content')->getClientOriginalName();
                $storage = Storage::putFileAs('contract', $file, $fileName);
            }
//            $detail = DB::table('detail_payment')->update([
//                ''
//            ]);
            DB::table('detail_payment')->where('id_contract', '=', $data['id_contract'])->delete();
            if(!empty($data['payment_period'])){
                $payment_period = $data['payment_period'];
                for ($i = 0; $i < sizeof($payment_period); $i++) {
                    $detail = new DetailModel();
                    $detail->id_contract = $data['id_contract'];
                    $detail->payment_period = $data['payment_period'][$i];
                    $detail->ratio = $data['ratio'][$i];
                    $detail->id_value_contract = $data['id_value_contract'][$i];
                    $detail->id_vat = $data['id_vat'][$i];
                    $detail->total_value = $data['total_value'][$i];
                    $detail->_pay_due = $data['_pay_due'][$i];
                    $detail->save();
                }
            }
            $up = $this->contractRepository->update($id, $data);
            return redirect()->refresh();
        }
        $contract = $this->contractRepository->find($id);
        $kind_contract = DB::table('kind_contract')->select('*')->get();
        $staff = DB::table('users')->select('*')->get();
        $customer = DB::table('customer')->select('*')->get();
        $banner = DB::table('banner')->select('*')->get();
        $status = DB::table('contract_status')->select('*')->get();
        $provinces = DB::table('province')->select('*')->get();
        $nguon = DB::table('nguon_customer')->select('*')->get();
        $detail = DB::table('detail_payment')
            ->join('contract', 'detail_payment.id_contract', '=', 'contract.id_contract')
            ->select('*')->get();
        return view('pages.contract.update', [
            'contract' => $contract,
            'banners' => $banner,
            'kind_contract' => $kind_contract,
            'staffs' => $staff,
            'customers' => $customer,
            'status' => $status,
            'provinces' => $provinces,
            'nguons' => $nguon,
            'details' => $detail
        ]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = ContractModel::find($id);
        $del->delete();
        return redirect('/contract');
    }
    public function delete_payment(Request $request)
    {
        if (!empty($request->payment_period)) {
            $delect = DB::table('detail_payment')
                ->select('*')->where('detail_payment.payment_period', '=', $request->payment_period)
                ->where('id_contract', '=', $request->id_contract)
                ->delete();
        }
    }
    public function ApiCustomer(Request $request)
    {
        $request->all();
        $data = DB::table('customer')
            ->join('nguon_customer', 'customer.id_nguon', '=', 'nguon_customer.id_nguon')
            ->select('*')
            ->where('customer.customer_id', '=', $request->id)
            ->get();
        return json_encode(['customer' => $data], 200);
    }
    public function APIProduct(Request $request)
    {
        $request->all();
        $data = DB::table('banner')
            ->select(DB::raw('COUNT(id_banner) as total_id'))
            ->where('id_banner', '=', $request->id_banner)->get();
        return json_encode(['banner' => $data], 200);
    }

    public function getProduct(Request $request)
    {
        $request->all();
        $data = DB::table('banner')
            ->join('type_banner', 'banner.id_typebanner', '=', 'type_banner.id_typebanner')
            ->select('*')
            ->where('banner.id_banner', '=', $request->id_banner)->get();
        return json_encode(['banner' => $data], 200);
    }
    public function getALLProduct(Request $request)
    {
        $request->all();
        $data = DB::table('banner')
            ->join('type_banner', 'banner.id_typebanner', '=', 'type_banner.id_typebanner')
            ->select('*')->get();
        return json_encode(['banner' => $data], 200);
    }

    public function getRatio(Request $request)
    {
        $request->all();
        $data = DB::table('detail_payment')
            ->join('contract', 'detail_payment.id_contract', '=', 'contract.id_contract')
            ->select('detail_payment.*')
            ->where('detail_payment.id_contract', '=', $request->id_contract)
            ->groupBy('detail_payment.payment_period')->get();
        return json_encode(['detail' => $data], 200);
    }

//    public function getphoto(Request $request)
//    {
//        $request->all();
//        $data = DB::table('photo')
//            ->join('banner', 'banner.id_banner', '=', 'photo.id_banner')
//            ->select('photo.id', 'photo._name_photo', 'photo.id_banner')
//            ->where('photo.id_banner', '=', $request->id_banner)->get();
//        return json_encode(['photo' => $data], 200);
//    }

    public function export()
    {
        $excel = new ExportContract();
        return Excel::download($excel, 'Thống Kê Hợp Đồng.xlsx');
    }
    public function rpMatBang()
    {
        $excel = new ExportReport();
        return Excel::download($excel, 'Thống Kê Hợp Đồng Mặt Bằng.xlsx');
    }
    public function rpkihan()
    {
        $excel = new ExportPayment();
        return Excel::download($excel, 'BÁO CÁO THANH TOÁN TiỀN MẶT BẰNG.xlsx');
    }
    public function importContract(){
        return view('pages.contract.import');
    }
    public function import(Request $request){
        $file = $request->file('file');
        if(!empty($file)){
            Excel::import(new ImportsContract(),$file);
            return redirect()->action('ContractController@getContract');
        }else {
            return redirect()->back();
        }

    }

    public function getSetting()
    {
        $kinds = DB::table('kind_contract')->select('*')->get();
        $status_contract = DB::table('contract_status')->select('*')->get();
        $branch = DB::table('branch')->select('*')->get();
        $type_banner = DB::table('type_banner')->select('*')->get();
        $status_banner = DB::table('status_banner')->select()->get();
        $nguons = DB::table('nguon_customer')->select('*')->get();
        $type_customers = DB::table('type_customer')->select('*')->get();
        return view('pages.users.setting',[
            'kinds' => $kinds,
            'status_contracts' => $status_contract,
            'branchs' => $branch,
            'type_banners' => $type_banner,
            'status_banners' => $status_banner,
            'nguons' => $nguons,
            'type_customers' =>$type_customers

        ]);
    }
    public function addKind(Request $request){
        if(!empty($request->id)){
            $checks = DB::table('kind_contract')->select(DB::raw('count(id_contract) as id_contract'))->where('id_contract','=',$request->id)->get();
            foreach ($checks as $check){
                if($check->id_contract == 0){
                    $salary = new Kind();
                    $salary->id_contract = $request->id;
                    $salary->name_kind = $request->name;
                    $salary->save();
                    return array(
                        'success' => true,
                        'status' => 200,
                        'message' => 'Thêm mới thành công'
                    );
                }else{
                    return array(
                        'success' => false,
                        'status' => 200,
                        'message' => 'Mã nhập vào đã tồn tại'
                    );
                }
            }

        }
    }
    public function updateKind(Request $request){
        if(!empty($request->id)){
                    $kind = Kind::where('id_contract' ,$request->id)
                      ->first();
                    $kind->name_kind = $request->name;
                    $kind->save();


                    return array(
                        'success' => true,
                        'status' => 200,
                        'message' => 'Cập nhận thành công'
                    );
        }else{
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            );
        }



    }
    public function deleteKind(Request $request){


            $delete = Kind::where('id_contract',$request->id)->first();
            $delete->delete();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
    }
    public function addSttContract(Request $request){
        if(!empty($request->id)){
            $checks = DB::table('contract_status')->select(DB::raw('count(id_contract) as id_contract'))->where('id_contract','=',$request->id)->get();
            foreach ($checks as $check){
                if($check->id_contract == 0){
                    $salary = new Status_contract();
                    $salary->id_contract = $request->id;
                    $salary->name_status = $request->name;
                    $salary->save();
                    return array(
                        'success' => true,
                        'status' => 200,
                        'message' => 'Thêm mới thành công'
                    );
                }else{
                    return array(
                        'success' => false,
                        'status' => 200,
                        'message' => 'Mã nhập vào đã tồn tại'
                    );
                }
            }

        }
    }
    public function deleteSttContract(Request $request){
        try{
            $delete = Status_contract::where('id_contract',$request->id)->first();
            $delete->delete();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }catch (\Exception $e){
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Mã trạng thái đã được liên kết với 1 kì thanh toán bạn phải xóa kì thanh toán đó trước'
            );
        }

    }
    public function updateSttContract(Request $request){
        if(!empty($request->id)){
            $status_contract = Status_contract::where('id_contract' ,$request->id)
                ->first();
            $status_contract->name_status = $request->name;
            $status_contract->save();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }else{
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            );
        }



    }
    public function addSetting(Request $request)
    {
        try {


           if(!empty($request->id_branch)){
                $branch = new Branch();
                $branch->id_branch = $request->id_branch;
                $branch->name_branch = $request->name_branch;
                $branch->adress_branch = $request->adress_branch;
                $branch->save();
            }

         if (!empty($request->id_position)) {
             $setting = new Position();
             $setting->id_position = $request->id_position;
             $setting->name_position = $request->name_position;
             $setting->save();
            }
            return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/setting');
        }


    }
    public function addBranch(Request $request){
        if(!empty($request->id)){
            $checks = DB::table('branch')->select(DB::raw('count(id_branch) as id_branch'))->where('id_branch','=',$request->id)->get();
            foreach ($checks as $check){
                if($check->id_branch == 0){
                    $branch = new Branch();
                    $branch->id_branch = $request->id;
                    $branch->name_branch = $request->name;
                    $branch->save();
                    return array(
                        'success' => true,
                        'status' => 200,
                        'message' => 'Thêm mới thành công'
                    );
                }else{
                    return array(
                        'success' => false,
                        'status' => 200,
                        'message' => 'Mã nhập vào đã tồn tại'
                    );
                }
            }

        }
    }
    public function updateBranch(Request $request){
        if(!empty($request->id)){
            $branch = Branch::where('id_branch' ,$request->id)
                ->first();
            $branch->name_branch= $request->name;
            $branch->save();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }else{
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            );
        }



    }
    public function deleteBranch(Request $request){
        try{
            $delete = Branch::where('id_branch',$request->id)->first();
            $delete->delete();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }catch (\Exception $e){
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Mã chi nhánh đã đã được liên kết với nhân viên bạn phải cập nhật lại chi nhánh của nhân viên đó trước'
            );
        }

    }
    public function addTypeCustomer(Request $request){
        if(!empty($request->id)){
            $checks = DB::table('type_customer')->select(DB::raw('count(id) as id'))->where('id','=',$request->id)->get();
            foreach ($checks as $check){
                if($check->id == 0){
                    $branch = new Type_Customer();
                    $branch->id = $request->id;
                    $branch->name_type = $request->name;
                    $branch->save();
                    return array(
                        'success' => true,
                        'status' => 200,
                        'message' => 'Thêm mới thành công'
                    );
                }else{
                    return array(
                        'success' => false,
                        'status' => 200,
                        'message' => 'Mã nhập vào đã tồn tại'
                    );
                }
            }

        }
    }
    public function updateTypeCustomer(Request $request){
        if(!empty($request->id)){
            $type_customer = Type_Customer::where('id' ,$request->id)
                ->first();
            $type_customer->name_type= $request->name;
            $type_customer->save();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }else{
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            );
        }



    }
    public function deleteTypeCustomer(Request $request){
        try{
            $delete = Type_Customer::where('id',$request->id)->first();
            $delete->delete();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }catch (\Exception $e){
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Thể loại đã đã được liên kết với khách hàng bạn phải cập nhật lại thể loại của khách hàng đó trước'
            );
        }

    }

    public function setPay1($id)
    {
        $product = DetailModel::where('id_contract',$id)->first();
        if ($product) {
            $product->id_status = 1;
            $result = $product->update();
        }
        return redirect()->back();
    }

    public function setPay2($id)
    {
        $product = DetailModel::where('id_contract',$id)->first();
        if ($product) {
            $product->id_status = 3;
            $result = $product->update();
        }
        return redirect()->back();
    }
    public function dowloadExample(){
        return redirect('public/storage/contract/Import_Contract.xlsx');
    }
    public function setDue(Request $request){
        $dues = DB::table('contract')->select('value_contract','date_start','date_end','status_contract')
            ->where('id_contract',$request->id)->get();
        return json_encode(['due'=>$dues],200);
    }
}
