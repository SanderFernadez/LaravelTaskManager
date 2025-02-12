<?php

namespace Tests\Feature\Livewire;

use App\Livewire\TaskComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TaskComponentTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(TaskComponent::class)
            ->assertStatus(200);
    }
}
