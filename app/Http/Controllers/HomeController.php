<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Manager;
use App\Models\Sector;
use Carbon\Carbon;
use App\Mail\ManagersNotification;



use Illuminate\Http\Request;
use App\Controllers;
use DB;
use Charts;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
     {

        $tot_contracts = Contract::all()->count();
        $tot_managers = Manager::all()->count();
     
       /* $expiringPerMoth = DB::table('contracts')
        ->select(DB::raw('count(*) as `tot`, EXTRACT (MONTH FROM `validity`) as `month`'))->get();*/

              

       
        return view('home', compact('tot_contracts','tot_managers'));
    }
}
