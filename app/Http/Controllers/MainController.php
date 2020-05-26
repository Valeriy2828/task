<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Task;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $clients = Client::all();
        $tasks = Task::orderBy('id','desc')->get();


        return view('index', ['clients' => $clients, 'tasks' => $tasks] );
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

    public function add()
    {
        $tasks = Task::all();
        return view('addClient',['tasks' => $tasks]);
    }

    public function addTask()
    {

        return view('addTask');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50'
        ]);
        //dd($request->input('task_id'));
        $client = new Client([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'task_id' => $request->input('task_id'),
        ]);

        $client->save();

        return back()->with('status','User added!!!');
    }

    public function storeTask(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'status' => 'array'

        ]);

        $task = Task::create($request->all());

        return back()->with('status','Task added!!!');
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
        $edit = Client::where('user_id', $id)->first();
        return view('edit', ['edit' => $edit]);
    }

    public function editTask($id)
    {
        $editTask = Task::where('id', $id)->first();
        return view('editTask', ['editTask' => $editTask]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $primaryKey)
    {
        $validatedData = $request->validate([
            'name' => 'max:50',
            'lastname' => 'max:50',
        ]);

        $input = Client::find($primaryKey);

        $input->first_name = $request->input('first_name');
        $input->last_name = $request->input('last_name');

        $input->save();

        return back()->with('status','User update!!!');
    }

    public function updateTask(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'max:50',
            'status' => 'array'
        ]);

        $task->update($request->all());

        return back()->with('status', 'Task update!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($primaryKey)
    {
        //dd($id);
        Client::find($primaryKey)->delete();
        return back()->with('status-del','User deleted!!!');
    }

    public function destroyTask($id)
    {
        //dd($id);
        Task::find($id)->delete();
        return back()->with('status-del','Task deleted!!!');
    }
}
