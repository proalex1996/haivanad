<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $contract = DB::table('contract')
            ->join('detail_payment','contract.id_contract','=','detail_payment.id_contract')
            ->get();
        return view('pages.payment.index',[
            'contracts' => $contract,
            ]);
    }
    public function getBill(Request $request)
    {
        $detail_payment = DB::table('detail_payment')
            ->join('contract','contract.id_contract','=','detail_payment.id_contract')
            ->where('detail_payment.id_contract',$request->id)
            ->get();
        return json_encode(['detail_payment' => $detail_payment], 200);
    }
    public function getDetailBill(Request $request)
    {
        $payment_period = DB::table('detail_payment')
            ->where('detail_payment.id_contract','=',$request->id)
            ->where('detail_payment.payment_period','=',$request->payment_period)
            ->get();
        return json_encode(['payment_period' => $payment_period], 200);
    }
}
