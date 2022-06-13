<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_task_index()
    {
        $response = $this->get('/api/task');

        $response->assertStatus(200);
    }

    public function test_task_store()
    {
        $response = $this->postJson('/api/task', [
            'name' => 'Tarefa teste',
            'description' => 'Descrição da tarefa teste',
            'status' => 0,
            'file_url' => 'www.net'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_task_store_status_other_0()
    {
        $response = $this->postJson('/api/task', [
            'name' => 'Tarefa teste',
            'description' => 'Descrição da tarefa teste',
            'status' => 1,
            'file_url' => 'www.net'
        ]);

        $response->assertStatus(406)
            ->assertJsonStructure();
    }

    public function test_task_show()
    {
        $response = $this->get('/api/task/2');

        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_task_show_id_invalid()
    {
        $response = $this->get('/api/task/99999');

        $response->assertStatus(404);
    }

    public function test_task_update()
    {
        $response = $this->put('/api/task/2', [
            'name' => 'Tarefa teste update',
            'description' => 'Descrição da tarefa teste',
            'status' => 1,
            'file_url' => 'www.net'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_task_update_id_invalid()
    {
        $response = $this->put('/api/task/99999',[
            'name' => 'Tarefa teste update',
            'description' => 'Descrição da tarefa teste',
            'status' => 1,
            'file_url' => 'www.net'
        ]);

        $response->assertStatus(404);
    }

    public function test_task_get_url()
    {
        $response = $this->get('/api/task/2/file_url');

        $response->assertStatus(200);
    }

    public function test_task_get_url_id_invalid()
    {
        $response = $this->get('/api/task/999/file_url');

        $response->assertStatus(404);
    }
}
