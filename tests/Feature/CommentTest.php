<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{

    public function test_create_comment()
    {

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('POST','api/comments',[
            'username' => 'John Dela Cruz',
            'layer' => '1',
            'comment_text' => 'lorem ipsum dolor soteit'
        ]);


        $response->assertStatus(201);
    }

    public function test_create_comment_parent_id()
    {

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('POST','api/comments',[
            'username' => 'John Dela Cruz',
            'layer' => '2',
            'parent_id' => '1',
            'comment_text' => 'lorem ipsum dolor soteit'
        ]);


        $response->assertStatus(201);
    }

    public function test_get_all_comments()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('GET','api/comments');


        $response->assertStatus(200);
    }
}
