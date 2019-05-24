<?php

namespace App\Http\Controllers;
use App\Http\Requests\FamilyRequest;
use App\Model\City;
use App\Model\Client;
use App\Http\Requests\ClientRequest;
use App\Model\Interes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation;

class ClientController extends Controller
{
    protected $clients;
    protected $cities;
    protected $users;
    protected $intereses;

    public function __construct()
    {
        $this->clients = new Client();
        $this->cities = new City();
        $this->intereses = new Interes();
//        $this->intereses = DB::table('intereses')->select('id','name')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->clients->all();
        return view('clients.index')
            ->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = $this->cities->all();
        $intereses = $this->intereses->all();
        $positions = DB::table('positions')->get();
        return view('clients.create')
            ->with('intereses',$intereses)
            ->with('positions',$positions)
            ->with('cities',$cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        dd($request);
//        try{
//            $createClient = $request->toArray();
//            $this->clients->create($createClient);
//            dd($createClient);
//            return redirect()->route('clients.index');
//        }catch (\Exception $e){
//            return redirect()->route('clients.create')->with('ar daemata');
//        }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
