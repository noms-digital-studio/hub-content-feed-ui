<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Video;

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
        \App\Facades\Videos::shouldReceive('find')
          ->with(20)
          ->once()
          ->andReturn(new Video(
          "20",
          "Episode 1: Area - The Space inside a shape",
          "Lorem ipsum dolor sit amet conestur adoijvcsa elit. Sed commdoino or ojoasd ds. Donec porta lcudaj funsaoir congie. Sed adjnai sfshgdfhfd hfhrthgd iuy dhgd daf .",
          "1:20",
          "http://192.168.33.9/sites/default/files/videos/2016-07/SampleVideo_1280x720_2mb_2.mp4",
          array(
            (object) array(
              "id"=>2,
              "title"=>'Documentary'
            ),
            (object) array(
              "id"=>3,
              "title"=>'Shape'
            )
          ),
          (object) array(
            "id"=>4,
            "title"=>'Minute Maths'
          )
        ));

        $this->visit('/video/20')
             ->see('Episode 1: Area - The Space inside a shape');
    }
}
