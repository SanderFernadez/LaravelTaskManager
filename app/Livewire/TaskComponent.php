<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class TaskComponent extends Component
{
//table
public $tasks = [];
public $title;
public $description;

public $taskId;
public $isEditing = false;
public $modal = false;

public function mount(){

    $this->tasks = Task::where('user_id', Auth::id())->get();
}


public function render()
{
        return view('livewire.task-component');
}


public function ClearFields(){
    $this->title = '';
    $this->description = '';
}

public function OpenCreateModal(){
    $this->ClearFields();
    $this->modal = true;
}

public function closeCreateModal(){
    $this->modal = false;
}

public function CreateTask(){
    $this->validate([
        'title' => 'required',
        'description' => 'required'
    ]);

    //dd(Auth::id()); // Verifica el ID del usuario autenticado antes de crear la tarea

// Task::create([
//     'title' => $this->title,
//     'description' => $this->description,
//     'user_id' => Auth::id(),
// ]);


$newTask = new Task();
$newTask->title = $this->title;
$newTask->description = $this->description;
$newTask->user_id = Auth::id();
//dd($newTask);
$newTask->save();

    $this->modal = false;
    $this->ClearFields();
    $this->mount();
}


public function UpdateTask(Task $task){

    $this->title = $task->title;
    $this->description = $task->description;
    
    $this->taskId = $task->id;
    $this->modal = true;
    $this->isEditing = true;
    $this->mount();

}

public function UpdateTaskSave(int $id){
    //dd($id);
    // $this->validate([
    //     'title' => 'required',
    //     'description' => 'required'
    // ]);
  
    $task = Task::find($id);
    $task->title = $this->title;
    $task->description = $this->description;
    $task->user_id = Auth::id();
    $task->update();

    $this->ClearFields();
    $this->mount();
    $this->modal = false;


}

public function Delete(int $id){
   
$task = Task::find($id);
if ($task) {
    $task->delete();
}

$this->mount();
$this->modal = false;

}



}