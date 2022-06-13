<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tag_index()
    {
        $response = $this->get('/api/tag/index');

        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_tag_store()
    {
        $response = $this->postJson('/api/task/2/tag', [
            'tag_name' => 'Nome da tag',
            'task_id' => 2,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_tag_show()
    {
        $response = $this->get('/api/tag/show/2');

        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_tag_show_id_invalid()
    {
        $response = $this->get('/api/tag/show/9999999');

        $response->assertStatus(404);
    }

    public function test_tag_update()
    {
        $response = $this->put('/api/tag/update/2', [
            'tag_name' => 'Atulizando nome da tag',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_tag_update_id_invalid()
    {
        $response = $this->put('/api/tag/update/9999999', [
            'tag_name' => 'Atulizando nome da tag',
        ]);

        $response->assertStatus(404);
    }
}
