<?php

namespace App\Http\Controllers;

use App\Model\Operator;
use App\Model\Operatorhascity;
use App\User;
use Spatie\Permission\Traits\HasRoles;
use App\Model\City;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
class OperatorController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $users,$cities,$role,$operatorhascity;
    public function __construct()
    {
        $this->users = new User();
        $this->cities = new City();
        $this->role = new Role();
        $this->operatorhascity = new Operatorhascity();
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
            DB::table('operatorhascities')
                ->insert(
                    array(
                        'user_id'=>$operator->id,
                        'city_id'=>$request->city_id
                    )
                );
            $operator->assignRole($request->roles);
            DB::commit();
            return redirect()->route('operators.index')->with('success',__('დაემატა წარმატებით'));
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('operators.create')->with('error',__('დამატება ვერ მოხერხდა: '.$e->getMessage()));

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
    public function edit(User $user, $id)
    {
            $operator=$this->users->find($id);
            $cities=$this->cities->all();
            $roles=$this->role->all();
            $operatorhascity=$this->operatorhascity;
            return view('operators.edit')
                ->with('roles',$roles)
                ->with('cities',$cities)
                ->with('permissions',Permission::all())
                ->with('operatorhascity',$operatorhascity)
                ->with('operator',$operator);

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
        DB::beginTransaction();
        try{
            if(!empty($request['password'])){
                $request['password'] = Hash::make($request->password);
            }
            $operator = $this->users->find($id);
            $operator->update($request->toArray());
            if(!empty($request->city_id)){
                DB::table('operatorhascities')
                    ->where('user_id',$id)
                    ->update(
                        array(
                            'city_id'=>$request->city_id
                        )
                    );
            }
            if(!empty($request->roles)) {
                DB::table('model_has_roles')->where('model_id', $id)->delete();
                $operator->assignRole($request->roles);
            }
            if(!empty($request->permissions)){
                DB::table('model_has_permissions')->where('model_id', $id)->delete();
                $operator->givePermissionTo($request->permissions);
            }
            DB::commit();
            return redirect()->route('operators.index')->with('success',__('დაემატა წარმატებით'));
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('operators.edit',$id)->with('error',__('დამატება ვერ მოხერხდა: '.$e->getMessage()));
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
            $this->users->find($id)->delete();
            return redirect()->route('operators.index')->with('success',__('წაიშალა წარმატებით'));
        }catch (\Exception $e){
            return redirect()->route('operators.index')->with('success',__('წაშლა ვერ მოხერხდა'.$e->getMessage()));
        }

    }
}
