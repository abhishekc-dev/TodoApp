<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'tasks' => DB::table('tasks')->get(),
        ];
        return view('dashboard',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $tname = $request->input('tname');
        DB::table('tasks')->insert([
            'name'=> $tname,
            'status' => 'pending',
        ]);
        return redirect()->to('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $taskData = DB::table('tasks')->where('id',$id)->first();
        return view('task.edit',['task'=> $taskData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('tasks')->where('id', $id)->update(['name' => $request->input('tname')]);
        return redirect()->to('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tasks')->where('id', $id)->delete();  
        return redirect()->to('dashboard');
    }

    public function change(String $status,String $id){

        DB::table('tasks')->where('id', $id)->update(['status' => $status]);
        return redirect()->to('dashboard');

    }
}
