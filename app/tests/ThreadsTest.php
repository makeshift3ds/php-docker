<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function sends_thread_list()
    {
        // $threads = factory(App\Thread::class, 10)->create();
        // // $this->json('GET', '/threads')->seeJson($threads);
        // $response = $this->json('GET', '/threads');
        
        // // dd($response);

        // $response
        //     ->assertStatus(200)
        //     ->assertExactJson([
        //         'created' => true,
        //     ]);

        // $this->get('/api/tasks', $this->headers($user));

        // $response = $this->response->getContent();

        // $tasks = $user->tasks;

        // $this->assertEquals($tasks->toJson(),$response);

        $threads = factory(App\Thread::class, 2)->create();

        $this->json('GET', '/threads')[0]
            ->seeJsonStructure([
                    'id',
                    'title',
                    'body',
                    'created_at',
                    'updated_at'
            ])
            ->assertResponseOk(200);
            // ->seeJson($threads->getContent());

        // $response = $this->json('GET', '/threads');
        // $response = $this->response->getContent();

        // $this->response->assertStatus(200);

        // $this->response->assertJsonStructure([
        //     'data' => [
        //         'id',
        //         'title',
        //         'body',
        //         'created_at',
        //         'updated_at'
        //     ]
        // ]);
    }
}
