<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TaskComponent extends Component
{

public $tasks = [];
public $title;
public $description;
public $modal = false;

public function mount(){

    $this->tasks = Task::where('user_id', Auth::id())->get();
}


public function render()
{
        return view('livewire.task-component');
}


private function ClearFields(){
    $this->title = '';
    $this->description = '';
}

public function OpenCreateModal(){
    $this->ClearFields();
    $this->modal = true;
}

}
