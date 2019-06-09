<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Model\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    protected $positions;

    public function  __construct(){
        $this->positions = new Position();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = $this->positions->all();
        return view('positions.index')->with('positions',$positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        DB::beginTransaction();
        try{
            $data = $request->toArray();
            $this->positions->create($data);
            DB::commit();
            return redirect()->route('positions.index');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('positions.create')->with('error',$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        DB::beginTransaction();
        try{
            $this->positions->find($id)->delete();
            DB::commit();
            return redirect()->route('positions.index')->with('success',__('წაიშალა წარმატებით'));
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('positions.index')->with('error',__('წაშლა ვერ მოხერხდა'));
        }

    }
}
