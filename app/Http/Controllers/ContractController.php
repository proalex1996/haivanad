<?php


namespace App\Http\Controllers;

use App\Model\ContractModel;

use App\Repositories\Contract\ContractRepositoryEloquent;
use Barryvdh\DomPDF\Facade as PDF;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\Project;
use PhpOffice\PhpWord\Shared\ZipArchive;

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
            ->join('banner', 'contract.id_banner', '=', 'banner.id')
            ->join('kind_contract', 'kind', '=', 'kind_contract.id_contract')
            ->join('contract_status', 'status_contract','=','contract_status.id_contract')
            ->select('contract.id', 'contract.id_contract', 'name_customer','customer.contact_name', 'contract.note_contract','contract.pay_due',
                'contract.gianam','banner.id_banner', 'contract.content','contract_status.name_status','kind_contract.name_kind',
                'date_start', 'date_end', 'name_staff','contract.now_content', 'value_contract','contract.gia9thang','contract.gia3thang','contract.gia6thang');

        if(!empty($request->id_contract))
        {
            $contracts = $contracts ->where('id_contract' ,'LIKE','%'.$request->id_contract.'%');

        }
        if(!empty($request->id_banner))
        {
            $contracts = $contracts ->where('id_contract' ,'LIKE','%'.$request->id_banner.'%');

        }

            $contracts = $contracts->groupBy('contract.id')->orderBy('contract.id','DESC')->get();
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

        return view('pages.contract.add', [
            'banners' => $banner,
            'kind_contract' => $kind_contract,
            'staffs' => $staff,
            'customer' => $customer,
            'status' => $status
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
        $contract->gianam = $request->gianam;
        $contract->gia9thang = $request->gia9thang;
        $contract->gia6thang = $request->gia6thang;
        $contract->gia3thang = $request->gia3thang;
        $contract->pay_due = $request->pay_due;
        $contract->now_content = $request->now_content;
        //$pdf = PDF::loadview('contract.blade.php',$file);
        $storage = Storage::putFileAs('contract', $file, $fileName);
        $contract->save();
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

            $up = $this->contractRepository->update($id, $data);
            return redirect()->action('ContractController@getContract');
        }
        $contract = $this->contractRepository->find($id);
        $kind_contract = DB::table('kind_contract')->select('*')->get();
        $staff = DB::table('staff')->select('*')->get();
        $customer = DB::table('customer')->select('*')->get();
        $banner = DB::table('banner')->select('*')->get();
        $status = DB::table('contract_status')->select('*')->get();
        return view('pages.contract.update', [
            'contract' => $contract,
            'banners' => $banner,
            'kind_contract' => $kind_contract,
            'staffs' => $staff,
            'customers' => $customer,
            'status' => $status
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


}
