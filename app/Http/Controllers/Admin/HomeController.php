<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch\Appointment;
use App\Models\Branch\Branch;
use App\Models\Invoice\Invoice;
use App\Models\Invoice\Invoice_item;
use App\Models\location\Country;
use App\Models\Patient\From_recourse;
use App\Models\Patient\Patient;
use App\Models\User;
use App\Models\Website\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      return view('dashboard');


        $id = Auth::id();

        $user_note = User::select('note')->find($id);

        $doctor_total = User::select('id')->count();

        $year = date('Y');
        $month = date('m');

        $patient_total = Client::select('id')
        ->whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->where('type', 1)
        ->count();

        $credit = Invoice::select('total_paid')
        ->whereYear('paid_date', '=', $year)
        ->whereMonth('paid_date', '=', $month)
        ->where('type', 0)
        ->sum('total_paid');

        $creator_number_year = Appointment::select('creator_id')
        ->where('creator_id', $id)
        ->whereYear('created_at', '=', $year)
        ->count('creator_id');

        $creator_number_month = Appointment::select('creator_id')
        ->where('creator_id', $id)
        ->whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->count('creator_id');

        $doctor_number_year = Appointment::select('doctor_id')
        ->where('doctor_id', $id)
        ->whereYear('created_at', '=', $year)
        ->count('doctor_id');

        $doctor_number_month = Appointment::select('doctor_id')
        ->where('doctor_id', $id)
        ->whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->count('doctor_id');

        $debit = Invoice::select('total_paid')
        ->whereYear('paid_date', '=', $year)
        ->whereMonth('paid_date', '=', $month)
        ->where('type', 1)
        ->sum('total_paid');

        $last_patient = Patient::select('id', 'avatar', DB::raw('CONCAT(first_Name, " ", second_Name) AS name'))
        ->orderBy('id', 'DESC')
        ->where('type', 1)
        ->limit(5)
        ->get();

        $profit = Invoice_item::select('invoice_id','categorizable_id', 'categorizable_type', DB::raw('sum(sold_price) as sums'))
        ->whereHas('invoice', function ($q) {
            $q->where('type', 0)->select('id')
            ;})
        ->with(['categorizable' => function ($q) {
            $q->select('id', 'name');}])
        ->groupBy('categorizable_id','categorizable_type')
        ->limit(11)
        ->get();

        $credit_stat = Invoice::select(
            DB::raw('sum(total_paid) as sums'),
            DB::raw("DATE_FORMAT(paid_date,'%m') as monthKey"))
        ->whereYear('paid_date', date('Y'))
        ->where('type', 0)
        ->groupBy('monthKey')
        ->orderBy('paid_date', 'ASC')
        ->get();

        $debit_stat = Invoice::select(
            DB::raw('sum(total_paid) as sums'),
            DB::raw("DATE_FORMAT(paid_date,'%m') as monthKey"))
        ->whereYear('paid_date', date('Y'))
        ->where('type', 1)
        ->groupBy('monthKey')
        ->orderBy('paid_date', 'ASC')
        ->get();

        $data_credit = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($credit_stat as $order){
            $data_credit[$order->monthKey-1] = $order->sums;
        }

        $data_debit = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach($debit_stat as $order){
            $data_debit[$order->monthKey-1] = $order->sums;
        }

        $patient = Patient::select(
            DB::raw('count(id) as counts'),
            DB::raw("DATE_FORMAT(created_at,'%m') as monthKey"))
        ->whereYear('created_at', date('Y'))
        ->where('type', 1)
        ->groupBy('monthKey')
        ->orderBy('created_at', 'ASC')
        ->get();

        $patient_date = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($patient as $order){
            $patient_date[$order->monthKey-1] = $order->counts;
        }

        $patient_total = Patient::whereYear('created_at', date('Y'))
        ->where('type', 1)
        ->count();

        // return view('dashboard', compact('user_note', 'doctor_total', 'patient_total', 'last_patient', 'credit', 'debit', 'profit', 'data_credit', 'data_debit', 'patient', 'patient_date', 'patient_total', 'creator_number_year', 'creator_number_month', 'doctor_number_year', 'doctor_number_month',));
    }

}
