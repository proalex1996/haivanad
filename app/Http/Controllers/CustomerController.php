<?php


namespace App\Http\Controllers;


use App\Exports\ExportCustomer;
use App\Model\CustomerModel;

use App\Repositories\Customer\CustomerRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use App\Imports\ImportCustomer;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryEloquent $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    public function rules(){
        return  [
                'customer_id' => 'required',
            'name_customer' => 'required',
            'mst_customer' => 'required',
            'contact_name' => 'required',
            'phone_customer' => 'required',
            'email_customer' => 'required',
            'type_customer' => 'required',
            'solvency' => 'required',
            'status_customer' => 'required'

        ];
    }
    public function getIndex(){
        $customers = DB::table('customer')
            ->join('type_customer','type_customer','=','type_customer.id')
            ->join('status','status_customer','=','status.id_status')
            ->join('solvency','solvency','=','solvency.id')
            ->select('customer.id','customer.customer_id','customer.name_customer','customer.adress_customer','contact_name','mst','phone_customer','email_customer','type_customer.name_type','solvency.name_solvency','mass','status')->paginate(20);
        return view('pages.customer.index',['customers' => $customers]);
    }

    public function addCustomer(Request $request)
    {
        $status = DB::table('status')->select('*')->get();
        $type_customer = DB::table('type_customer')->select('*')->get();
        $customer = DB::table('customer')->select('*')->get();
        $solvency = DB::table('solvency')->select('*')->get();
        return view('pages.customer.add', [
            'statuss' => $status,
            'type_customers' => $type_customer,
            'customers' => $customer,
            'solvencys'=>$solvency
        ]);

    }
    public function createCustomer(Request $request)
    {
        $customer = new CustomerModel();
        $customer->customer_id = $request->customer_id;
        $customer->name_customer = $request->name_customer;
        $customer->mst = $request->mst;
        $customer->contact_name = $request->contact_name;
        $customer->phone_customer = $request->phone_customer;
        $customer->email_customer = $request->email_customer;
        $customer->type_customer = $request->type_customer;
        $customer->solvency = $request->solvency;
        $customer->mass = $request->mass;
        $customer->status_customer = $request->status_customer;
        $customer->save();
        return redirect()->action('CustomerController@getIndex');
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();

        if(!empty($data))
        {
            $up = $this->customerRepository->update($id, $data);
            return redirect()->action('CustomerController@getIndex');
        }
        $customer = $this->customerRepository->find($id);
        $status = DB::table('status')->select('*')->get();
        $type_customer = DB::table('type_customer')->select('*')->get();
        $solvency = DB::table('solvency')->select('*')->get();
        return view('pages.customer.update', [
            'statuss' => $status,
            'type_customers' => $type_customer,
            'customers' => $customer,
            'solvencys'=>$solvency
        ]);
    }
    public function destroy($id)
    {
        try{
            $del = CustomerModel::find($id);
            $del->delete();
            return redirect('/customer');
        }catch (\Exception $e){

            return redirect(URL::to('customer'));

    }

    }
    public function importCustomer(){
        return view('pages.customer.import');
    }
    public function import(Request $request){
        $file = $request->file('file');
        if(!empty($file)){
            Excel::import(new ImportCustomer,$file);
            return redirect()->action('CustomerController@getIndex');
        }else {
            return ['File Dữ Liệu trống'];
        }

    }
    public function export()
    {
        return Excel::download(new ExportCustomer, 'Danh Sách Khách Hàng.xlsx');
    }
    public function dowloadExample(){
        return redirect('public/storage/contract/ExmpleImport.xlsx');
    }

}
