<?php

namespace App\Http\Controllers;

use App\Model\Operator;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Model\City;
use App\Model\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    //use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $users,$cities,$role;
    public function __construct()
    {
        $this->users = new User();
        $this->cities = new City();
        $this->role = new Role();
    }


    public function index()
    {
        $operators=$this->users->paginate(15);
        return view('operators.index')
            ->with('operators',$operators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=$this->cities->all();
        $roles=$this->role->all();
        return view('operators.create')
            ->with('roles',$roles)
            ->with('cities',$cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try{
            $request['password'] = Hash::make($request->password);
            $operator = $this->users->create($request->toArray());
            DB::table('operator_has_cities')
                ->insert(
                    array(
                        'user_id'=>$operator->id,
                        'city_id'=>$request->city_id
                    )
                );
            $operator->assignRole($request->input('roles'));
            return redirect()->route('operators.index')->with('success',__('დაემატა წარმატებით'));
            DB::commit();
        }catch (\Exception $e){
            return redirect()->route('operators.create')->with('error',__('დამატება ვერ მოხერხდა: '.$e->getMessage()));
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(UserRequest $request, $id)
    {
        //
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
            $this->users->find($id)->delete();
            return redirect()->route('operators.index')->with('success',__('წაიშალა წარმატებით'));
        }catch (\Exception $e){
            return redirect()->route('operators.index')->with('success',__('წაშლა ვერ მოხერხდა'.$e->getMessage()));
        }

    }
}
