<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;


    public function test_new_post_create_db_entry()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $data = [
            'title' => 'Just title',
            'body' => 'Just body',
            'visible' => false,
        ];

        $response = $this->actingAs($user)->post('/posts', $data);
        $this->assertCount(1, Post::all());
        $post = Post::first();
        $this->assertEquals($data['title'], $post->title);
        $this->assertEquals($data['body'], $post->body);
    }
}
