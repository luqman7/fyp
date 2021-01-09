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
        //$role = Role::create(['name' => 'admin']);
        //$nb = Newborn::where("stage_id", "2");       //->pluck("stage_id", "created_at"); //->whereMonth('created_at', '10')->get();
        //$nb22 = Newborn$nb->whereYear('created_at', '10')->get();
        //$from = date('2020-10-01 00:00:00');
        //$to = date('2020-10-30 23:59:00');

        //$nb = Newborn::pluck('created_at', 'stage_id'); //whereBetween('created_at', ['2020-10-01 00:00:00', '2020-10-30 23:59:00']->get())
        //$sept = Newborn::whereMonth('created_at', '9')->get()->count();
        //$oct = Newborn::whereMonth('created_at', '10')->get()->count();
        //$nov = Newborn::whereMonth('created_at', '11')->get()->count();

        //$a = Newborn::where('stage_id', '1')->count();
        //$b = Newborn::where('stage_id', '2')->count();
        //$c = Newborn::where('stage_id', '3')->count();

        $day = Carbon::now('Asia/Kuala_Lumpur')->toDateString();
        $day1 = array();
        $data = Newborn::where('stage_id', '1')->whereDate('created_at', $day)->get()->count();
        array_push($day1, $data);

        $month = array();
        for ($i = 9; $i <= 12; $i++) {
            $data = Newborn::where('stage_id', '1')->whereMonth('created_at', strval($i))->get()->count();
            array_push($month, $data);
        }

        $month1 = array();
        for ($i = 9; $i <= 12; $i++) {
            $data = Newborn::where('stage_id', '2')->whereMonth('created_at', strval($i))->get()->count();
            array_push($month1, $data);
        }

        $month2 = array();
        for ($i = 9; $i <= 12; $i++) {
            $data = Newborn::where('stage_id', '3')->whereMonth('created_at', strval($i))->get()->count();
            array_push($month2, $data);
        }

        $chart3 = new NewbornChart;
        $chart3->labels(['Today']);
        $chart3->dataset('Stage 1', 'bar', $day1)->backgroundColor('blue');
        $chart3->dataset('Stage 2', 'bar', [10])->backgroundColor('grey');
        $chart3->dataset('Stage 3', 'bar', [7])->backgroundColor('green');


        $chart = new NewbornChart;
        $chart->labels(['September', 'October', 'November', 'December']);
        $chart->dataset('Stage 1', 'bar', $month)->backgroundColor('blue');
        $chart->dataset('Stage 2', 'bar', $month1)->backgroundColor('grey');
        $chart->dataset('Stage 3', 'bar', $month2)->backgroundColor('green');

        $year = array();
        for ($i = 2018; $i <= 2020; $i++) {
            $data = Newborn::where('stage_id', '1')->whereYear('created_at', strval($i))->get()->count();
            array_push($year, $data);
        }

        $year1 = array();
        for ($i = 2018; $i <= 2020; $i++) {
            $data = Newborn::where('stage_id', '2')->whereYear('created_at', strval($i))->get()->count();
            array_push($year1, $data);
        }

        $year2 = array();
        for ($i = 2018; $i <= 2020; $i++) {
            $data = Newborn::where('stage_id', '3')->whereYear('created_at', strval($i))->get()->count();
            array_push($year2, $data);
        }

        $chart1 = new NewbornChart;
        $chart1->labels(['2018', '2019', '2020']);
        $chart1->dataset('Stage 1', 'bar', $year)->backgroundColor('blue');
        $chart1->dataset('Stage 2', 'bar', $year1)->backgroundColor('grey');
        $chart1->dataset('Stage 3', 'bar', $year2)->backgroundColor('green');


        return view('home', compact('chart', 'chart1', 'chart3'));
    }
}
