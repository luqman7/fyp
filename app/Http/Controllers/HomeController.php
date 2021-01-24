<?php

namespace FYP\Http\Controllers;

// require 'vendor/autoload.php';

use FYP\Newborn;
use FYP\User;
use Illuminate\Http\Request;

use FYP\Charts\NewbornChart;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //DAY
        $day = Carbon::now('Asia/Kuala_Lumpur')->toDateString();

        $day1 = array();
        $data = Newborn::where('stage_id', '1')->whereDate('created_at', $day)->get()->count();
        array_push($day1, $data);

        $day2 = array();
        $data = Newborn::where('stage_id', '2')->whereDate('created_at', $day)->get()->count();
        array_push($day2, $data);

        $day3 = array();
        $data = Newborn::where('stage_id', '3')->whereDate('created_at', $day)->get()->count();
        array_push($day3, $data);

        //MONTH
        $month = array();
        for ($i = 1; $i <= 12; $i++) {
            $data = Newborn::where('stage_id', '1')->whereMonth('created_at', strval($i))->get()->count();
            array_push($month, $data);
        }

        $month1 = array();
        for ($i = 1; $i <= 12; $i++) {
            $data = Newborn::where('stage_id', '2')->whereMonth('created_at', strval($i))->get()->count();
            array_push($month1, $data);
        }

        $month2 = array();
        for ($i = 1; $i <= 12; $i++) {
            $data = Newborn::where('stage_id', '3')->whereMonth('created_at', strval($i))->get()->count();
            array_push($month2, $data);
        }

        //YEAR
        $year = array();
        for ($i = 2018; $i <= 2021; $i++) {
            $data = Newborn::where('stage_id', '1')->whereYear('created_at', strval($i))->get()->count();
            array_push($year, $data);
        }

        $year1 = array();
        for ($i = 2018; $i <= 2021; $i++) {
            $data = Newborn::where('stage_id', '2')->whereYear('created_at', strval($i))->get()->count();
            array_push($year1, $data);
        }

        $year2 = array();
        for ($i = 2018; $i <= 2021; $i++) {
            $data = Newborn::where('stage_id', '3')->whereYear('created_at', strval($i))->get()->count();
            array_push($year2, $data);
        }
        $chart3 = new NewbornChart;
        $chart3->labels(['Today']);
        $chart3->dataset('Stage 1', 'bar', [7])->backgroundColor('blue');
        $chart3->dataset('Stage 2', 'bar', [4])->backgroundColor('grey');
        $chart3->dataset('Stage 3', 'bar', $day3)->backgroundColor('green');

        $chart = new NewbornChart;
        $chart->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
        $chart->dataset('Stage 1', 'bar', [5, 5, 7, 3, 7, 1, 4, 6, 10, 1, 2, 2])->backgroundColor('blue');
        $chart->dataset('Stage 2', 'bar', $month1)->backgroundColor('grey');
        $chart->dataset('Stage 3', 'bar', $month2)->backgroundColor('green');


        $chart1 = new NewbornChart;
        $chart1->labels(['2018', '2019', '2020', '2021']);
        $chart1->dataset('Stage 1', 'bar', $year)->backgroundColor('blue');
        $chart1->dataset('Stage 2', 'bar', $year1)->backgroundColor('grey');
        $chart1->dataset('Stage 3', 'bar', $year2)->backgroundColor('green');


        return view('home', compact('chart', 'chart1', 'chart3'));
    }
}
