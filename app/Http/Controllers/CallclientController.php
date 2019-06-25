<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallRequest;
use App\Model\Callclient;
use App\Model\Client;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class CallclientController extends Controller
{
    use HasRoles;
    protected $clients, $calls;
    public function __construct()
    {
        $this->clients = new Client();
        $this->calls = new Callclient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CallRequest $request)
    {
        DB::beginTransaction();
        try{
            $data = [
                'client_id'=>$request->client_id,
                'calldate'=>$request->calldate,
                'text'=>$request->text
            ];
            $this->calls->create($data);
            DB::commit();
            return redirect()->route('clients.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('clients.index')->with('error',__('დამატება ვერ მოხერხდა '.$e->getMessage()));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Callclient  $callclient
     * @return \Illuminate\Http\Response
     */
    public function show(Callclient $callclient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Callclient  $callclient
     * @return \Illuminate\Http\Response
     */
    public function edit(Callclient $callclient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Callclient  $callclient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Callclient $callclient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Callclient  $callclient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Callclient $callclient)
    {
        //
    }
}
