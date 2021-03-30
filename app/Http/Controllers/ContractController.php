<?php


namespace App\Http\Controllers;

use App\Exports\ExportContract;
use App\Model\Branch;
use App\Model\ContractModel;

use App\Model\DetailModel;
use App\Model\Position;
use App\Model\Salary;
use App\Repositories\Contract\ContractRepositoryEloquent;
use Barryvdh\DomPDF\Facade as PDF;
use FontLib\Table\Type\name;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $contracts = DB::table('contract')
            ->join('customer', 'id_customer', '=', 'customer.customer_id')
            ->join('staff', 'id_staff', '=', 'staff.id')
            ->join('banner', 'contract.id_banner', '=', 'banner.id_banner')
            ->join('kind_contract', 'kind', '=', 'kind_contract.id_contract')
            ->join('detail_payment','contract.id_contract','=','detail_payment.id_contract')
            ->select('contract.id', 'contract.id_contract', 'customer.name_customer','detail_payment._pay_due',
                'banner.id_banner', 'kind_contract.name_kind',
                'contract.date_start', 'contract.date_end', 'contract.content','value_contract')
           ->orderBy('contract.id','DESC')->get();

        return view('pages.contract.contract', ['contracts' => $contracts]);


    }

    public function postDec(){
        $contracts = DB::table('contract')
            ->join('customer', 'id_customer', '=', 'customer.id')
            ->join('staff', 'id_staff', '=', 'staff.id')
            ->join('banner', 'id_banner', '=', 'banner.id')
            ->join('kind_contract', 'kind', '=', 'kind_contract.id_contract')
            ->join('contract_status', 'status_contract','=','contract_status.id_contract')

            ->select(DB::raw('Count(contract.id) as total'))->where('contract.date_start','Like','%-12-%')->orderBy('contract.id')->first();
        return json_encode($contracts);
    }

    public function addContract(Request $request)
    {
        $banner = DB::table('banner')->select('*')->get();
        $kind_contract = DB::table('kind_contract')->select('*')->get();
        $staff = DB::table('staff')->select('*')->get();
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
            'photos' =>$photo
        ]);
    }

    public function createContract(Request $request)
    {
        $contract = new ContractModel();
        $contract->id_contract = $request->id_contract;
        $contract->id_customer = $request->name_customer;
        $contract->id_staff = $request->name_staff;
        $contract->id_banner = $request->id_banner;
        $contract->content = basename($request->content_contract->getClientOriginalName());
        $file = $request->file('content_contract');
        $fileName = $request->file('content_contract')->getClientOriginalName();
        $contract->date_start = $request->date_start;
        $contract->date_end = $request->date_end;
        $contract->kind = $request->kind_name;
        $contract->value_contract = $request->value_contract;
        $contract->status_contract = $request->status;
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

        if(!empty($payment_period)){
            for($i = 0 ; $i < count(array($payment_period));$i++){
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

        if (!empty($data)) {
            if (!empty($data['content'])) {
                $data['content'] = basename($request->content->getClientOriginalName());
                $file = $request->file('content');
                $fileName = $request->file('content')->getClientOriginalName();
                $storage = Storage::putFileAs('contract', $file, $fileName);
            }
//            $detail = DB::table('detail_payment')->update([
//                ''
//            ]);
            $payment_period = $data['payment_period'];
                    $ratio = $data['ratio'];
                    $id_value_contract = $data['id_value_contract'];
                    $id_vat = $data['id_vat'];
                    $total_value =$data['total_value'];
                    $_pay_due = $data['_pay_due'];
            if(!empty($payment_period)){
                for($i = 0 ; $i < count(array($payment_period));$i++) {
                    $detail = DetailModel::find($data['id_contract']);
                    $detail->payment_period = $data['payment_period'];
                    $detail->ratio = $data['ratio'];
                    $detail->id_value_contract = $data['id_value_contract'];
                    $detail->id_vat = $data['id_vat'];
                    $detail->total_value = $data['total_value'];
                    $detail->_pay_due = $data['_pay_due'];
                    $detail->save();

                }
            }

            $up = $this->contractRepository->update($id, $data);
            return redirect()->action('ContractController@getContract');
        }
        $contract = $this->contractRepository->find($id);
        $kind_contract = DB::table('kind_contract')->select('*')->get();
        $staff = DB::table('staff')->select('*')->get();
        $customer = DB::table('customer')->select('*')->get();
        $banner = DB::table('banner')->select('*')->get();
        $status = DB::table('contract_status')->select('*')->get();
        $provinces = DB::table('province')->select('*')->get();
        $nguon = DB::table('nguon_customer')->select('*')->get();
        $detail = DB::table('detail_payment')
            ->join('contract','detail_payment.id_contract','=','contract.id_contract')
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
        if(!empty($request->payment_period)){
            DetailModel::where('payment_period',$request->payment_period)
                ->delete();
        }
    }
   public function ApiCustomer(Request $request){
        $request->all();
        $data = DB::table('customer')
           ->join('positions','customer.position_customer','=','positions.id_position')
            ->join('nguon_customer','customer.id_nguon','=','nguon_customer.id_nguon')

            ->select('*')
            ->where('customer.customer_id','=',$request ->id)
            ->get();
         return json_encode(['customer'=>$data],200);
    }
   public function APIProduct(Request $request){
        $request->all();
        $data = DB::table('banner')
            ->select(DB::raw('COUNT(id_banner) as total_id'))

            ->where('id_banner','=',$request->id_banner)->get();
       return json_encode(['banner'=>$data],200);
   }
   public function getProduct(Request $request){
       $request->all();
       $data = DB::table('banner')
           ->join('type_banner','banner.id_typebanner','=','type_banner.id_typebanner')
           ->select('*')

           ->where('banner.id_banner','=',$request->id_banner)->get();
       return json_encode(['banner'=>$data],200);
   }
    public function getRatio(Request $request){
        $request->all();
        $data = DB::table('detail_payment')
            ->join('contract','detail_payment.id_contract','=','contract.id_contract')
            ->select('detail_payment.*')

            ->where('detail_payment.id_contract','=',$request->id_contract)->get();
        return json_encode(['detail'=>$data],200);
    }
    public function getphoto(Request $request){
        $request->all();
        $data = DB::table('photo')
            ->join('banner','banner.id_banner','=','photo.id_banner')
            ->select('photo.id','photo._name_photo','photo.id_banner')
            ->where('photo.id_banner','=',$request->id_banner)->get();
        return json_encode(['photo'=>$data],200);
    }
    public function export()
    {
        $excel = new ExportContract();
        return Excel::download($excel, 'Thống Kê Hợp Đồng.xlsx');
    }
    public function getSetting(){
        return view('pages.users.setting');
    }
    public function addSetting(Request $request){
        try {
            $salary = new Salary();
            $salary->id_salary = $request->id_salary;
            $salary->bassic_salary = $request->bassic_salary;
            $salary->save();
            return redirect('/home');
        }catch(\Exception $e){
            \session()->flash('luong','Bị Trùng Với Dữ Liệu Cũ');
            return redirect('/setting');
        }
        try {
            $branch = new Branch();
            $branch->id_branch = $request->id_branch;
            $branch->name_branch = $request->name_branch;
            $branch->adress_branch = $request->adress_branch;
            $branch->save();
            return redirect('/home');
        }catch (\Exception $e){
            \session()->flash('chi-nhanh','Bị Trùng Với Dữ Liệu Cũ');
            return redirect('/setting');
        }

        try {
            $setting = new Position();
            $setting->id_position = $request->id_position;
            $setting->name_position = $request->name_position;
            $setting->save();
            return redirect('/home');


        }catch (\Exception $e){
                \session()->flash('pos','Bị Trùng Với Dữ Liệu Cũ');
            return redirect('/setting');
        }



}}
