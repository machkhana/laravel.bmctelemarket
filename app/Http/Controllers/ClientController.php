<?php

namespace App\Http\Controllers;
use App\Model\City;
use App\Model\Client;
use App\Http\Requests\ClientRequest;
use App\Model\ClientHasFamily;
use App\Model\Interes;
use App\Model\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class ClientController extends Controller
{
    use HasRoles;

    protected $clients;
    protected $cities;
    protected $users;
    protected $intereses;
    protected $positions;
    protected $clienthasfamily;

    public function __construct()
    {
        $this->clients = new Client();
        $this->cities = new City();
        $this->intereses = new Interes();
        $this->positions = new Position();
        $this->clienthasfamily = new ClientHasFamily();
        $this->users = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return User::permission('create')->get();
        auth
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
        //Role::create(['name'=>'writer']);
//        Permission::create(['name'=>'update']);
//        Permission::create(['name'=>'destroy']);
        //Auth()->user()->givePermissionTo('edit');
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
        try{
            //$searchcity = $this->cities->firstOrCreate(['name'=>$request->cityname]);
            $request['user_id'] = auth()->user()->id;
            $clientid = $this->clients->create($request->toArray());
            if($request->family_status == 'yes'){
                DB::table('clienthasfamily')
                    ->insert(
                        array(
                            'client_id'=>$clientid->id,
                            'wife'=>$request->wife,
                            'childrens'=>$request->childrens
                        )
                    );
            }
            return redirect()->route('clients.index')->with('success', __('დაემატა წამრატებით'));
        }catch (\Exception $e){
            return redirect()->route('clients.create')->with('error', __('დამატება ვერ მოხერხდა'.$e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $client = $this->clients->find($id);
        return view('clients.show')
            ->with('client',$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $client = $this->clients->find($id);
        $cities = $this->cities->all();
        $positions = $this->positions->all();
        return view('clients.edit')
            ->with('positions',$positions)
            ->with('cities',$cities)
            ->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, int $id)
    {
       $item = $this->clients->find($id);
       $this->clients->setModel($item);
        try{
            $request['user_id'] = $item->user_id;
            $this->clients->find($id)->update($request->toArray());
            if($request->family_status == "no"){
                $clienthasfamily = $this->clienthasfamily->where('client_id',$id);
                $clienthasfamily->delete();
            }
            if($request->family_status == "yes"){
                DB::table('clienthasfamily')
                    ->where('client_id',$id)
                    ->update(
                        array(
                            'wife'=>$request->wife,
                            'childrens'=>$request->childrens
                        )
                    );
            }
            return redirect()->route('clients.index')->with('success',__('დარედაქტირდა წარმატებით'));
        }catch (\Exception $e){
            dd($e);
            return redirect()->route('clients.edit',$id)->with('error',__('რედაქტირება ვერ მოხერხდა: '.$e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {

        try{
            $this->clients->find($id)->delete();
//            if($this->clients->find($id)->delete()){
//                $this->clienthasfamily->where('client_id',$id)->delete();
//            }
            return redirect()->route('clients.index')->with('success',__('წაიშალა წარმატებით'));
        }catch (\Exception $e){

            return redirect()->route('clients.index')->with('error',__('წაშლა ვერ მოხერხდა: '.$e->getMessage()));
        }

    }
}
