<?php

namespace App\Http\Controllers;

use App\Task;
use Error;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
     /**
     *  show the all the tasks
     * @return view
     */
    public function index()
    {
        $tasks = Task::all();
        return view('welcome', compact('tasks'));
    }

    // creat a new task
    public function creat(Request $request)
    {
        $task = new Task();

        $task->name = $request->name;
        $task->email = $request->email;
        $task->textTask = $request->textTask;
        $task->statutTask = 'in progress';

        try
        {
            $task->save();
        }
        catch(Exception $e)
        {
           $error = $e->getMessage();
        }
        return redirect('/');
    }

    // validate a task already done
    public function done ($id)
    {
        $task = Task::firstOrNew(['id'=>$id]);
        $task->statutTask = 'done';
        $task->save();
        return redirect('/');
    }
    // edit textTask 
    public function edit (Request $request, $id)
    {
        $task = Task::firstOrNew(['id'=>$id]);
        $task->textTask = $request->textTask;
        $task->save();
        return redirect('/');
    }

    // edit textTask 
    public function delete (Request $request)
    {
        $task = Task::find($request->idDelete);
        $task->delete();
        return redirect('/');
    }


}
