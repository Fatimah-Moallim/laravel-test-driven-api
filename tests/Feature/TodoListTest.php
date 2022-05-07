<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{

    use RefreshDatabase;

    public function test_fetch_todo_list()
    {
        // Preparation / prepare
        TodoList::factory()->create(['name' => 'my list']);

        // Action / perform
        $response = $this->getJson(route('todo-list.store'));
        // dd($response->json());

        // Assertion / predict
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('my list', $response->json()[0]['name']);
    }
}
