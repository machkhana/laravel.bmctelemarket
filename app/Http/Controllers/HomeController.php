<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $clients;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->clients = new Client();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $welcome = Lang::get('messages.welcome');
        $clients = DB::table('clients')->select('id')->count();
        return view('home')
            ->with('clients',$clients)
            ->with('welcome',$welcome);
    }
}
