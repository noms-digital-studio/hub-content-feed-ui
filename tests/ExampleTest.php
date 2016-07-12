<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }

    public function testFacadeMock()
    {
        /*\App\Facades\Videos::shouldReceive('all')
          ->once()
          ->andReturn('a mocked result?');*/

        $this->visit('/video')
             ->see('a mocked result?');
    }
}
