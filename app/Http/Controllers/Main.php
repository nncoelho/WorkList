<?php

namespace App\Http\Controllers;

use App\Models\Task;
use DateTime;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class Main extends Controller
{
    // =======================================================
    public function home(){

        // Get available tasks
        $tasks = Task::where('visible', 1)
                ->orderBy('created_at', 'desc')
                ->get();

        return view('home', ['tasks' => $tasks]);
    }

    // =======================================================
    public function list_invisibles(){

        // Get invisible tasks
        $tasks = Task::where('visible', 0)
                ->orderBy('created_at', 'desc')
                ->get();

        return view('home', ['tasks' => $tasks]);
    }

    // =======================================================
    public function new_task(){
        
        // Display new task form
        return view('new_task_form');
    }

    // =======================================================
    public function new_task_submit(Request $request){
        
        // Get the new task
        $new_task = $request->input('text_new_task');
        
        // Save task in to the database
        $task = new Task();
        $task->task = $new_task;
        $task->save();
        
        // Return to the main page
        return redirect()->route('home');
    }

    // =======================================================
    public function task_done($id){
        
        // Update task - Done
        $task = Task::find($id);
        $task->done = new \DateTime();
        $task->save();
        return redirect()->route('home');
    }

    // =======================================================
    public function task_undone($id){
    
        // Update task - Undone
        $task = Task::find($id);
        $task->done = null;
        $task->save();
        return redirect()->route('home');
    }

    // =======================================================
    public function edit_task($id){

        // Get selected task
        $task = Task::find($id);

        // Display edit task form
        return view('edit_task_form', ['task' => $task]);
    }

    // =======================================================
    public function edit_task_submit(Request $request){

        $mensagem = 
        // Get form inputs
        $id_task = $request->input('id_task');
        $edit_task = $request->input('text_edit_task');

        // Update task
        $task = Task::find($id_task);
        $task->task = $edit_task;
        $task->save();

        // Display tasks table
        return redirect()->route('home');
    }

    // =======================================================
    public function task_invisible($id){

        $task = Task::find($id);
        $task->visible = 0;
        $task->save();

        return redirect()->route('home');
    }

    // =======================================================
    public function task_visible($id){

        $task = Task::find($id);
        $task->visible = 1;
        $task->save();

        return redirect()->route('home');
    }
}