<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Video;

class VideoPlayerTest extends TestCase
{
    protected $mockVideo;
    protected $mockEpisodeVideos = array();

    public function __construct()
    {
        $tags = array(
            (object) array("id" => 2, "name" => 'Documentary'),
            (object) array("id" => 3, "name" => 'Shape')
        );

        $category = (object) array(
            "id" => 4,
            "name" => 'Minute Maths'
        );

        $this->mockVideo = new Video(
            9,
            "Episode 1: Area - The Space inside a shape",
            "Lorem ipsum dolor sit amet conestur adoijvcsa elit. Sed commdoino or ojoasd ds. Donec porta lcudaj funsaoir congie. Sed adjnai sfshgdfhfd hfhrthgd iuy dhgd daf .",
            "http://192.168.33.9/sites/default/files/videos/2016-07/SampleVideo_1280x720_2mb_2.mp4",
            "http://placehold.it/300x300",
            "1:20",
            $category,
            $tags,
            "Way2Learn"
        );

        $this->mockEpisodeVideos[] = new Video(
            21,
            "Episode 1: Area - The Space inside a shape",
            "Lorem ipsum dolor sit amet conestur adoijvcsa elit. Sed commdoino or ojoasd ds. Donec porta lcudaj funsaoir congie. Sed adjnai sfshgdfhfd hfhrthgd iuy dhgd daf .",
            "http://192.168.33.9/sites/default/files/videos/2016-07/SampleVideo_1280x720_2mb_2.mp4",
            "http://placehold.it/300x300",
            "1:20",
            $category,
            $tags,
            "Way2Learn"
        );

        $this->mockEpisodeVideos[] = new Video(
            22,
            "Episode 1: Area - The Space inside a shape",
            "Lorem ipsum dolor sit amet conestur adoijvcsa elit. Sed commdoino or ojoasd ds. Donec porta lcudaj funsaoir congie. Sed adjnai sfshgdfhfd hfhrthgd iuy dhgd daf .",
            "http://192.168.33.9/sites/default/files/videos/2016-07/SampleVideo_1280x720_2mb_2.mp4",
            "http://placehold.it/300x300",
            "1:20",
            $category,
            $tags,
            "Way2Learn"
        );

        $this->mockEpisodeVideos[] = new Video(
            23,
            "Episode 1: Area - The Space inside a shape",
            "Lorem ipsum dolor sit amet conestur adoijvcsa elit. Sed commdoino or ojoasd ds. Donec porta lcudaj funsaoir congie. Sed adjnai sfshgdfhfd hfhrthgd iuy dhgd daf .",
            "http://192.168.33.9/sites/default/files/videos/2016-07/SampleVideo_1280x720_2mb_2.mp4",
            "http://placehold.it/300x300",
            "1:20",
            $category,
            $tags,
            "Way2Learn"
        );
    }

    public function testMockVideoPlayer()
    {
        \App\Facades\Videos::shouldReceive('find')
          ->with(9)
          ->once()
          ->andReturn($this->mockVideo);

        \App\Facades\Videos::shouldReceive('getCategoryEpisodes')
          ->with(9)
          ->once()
          ->andReturn(array());

        $this->visit('/video/9')
             ->seeInElement('h2', 'Episode 1: Area - The Space inside a shape')
             ->see('Lorem ipsum dolor sit amet conestur adoijvcsa elit. Sed commdoino or ojoasd ds. Donec porta lcudaj funsaoir congie. Sed adjnai sfshgdfhfd hfhrthgd iuy dhgd daf ')
             ->see('1:20')
             ->see('Documentary')
             ->see('Shape')
             ->see('Minute Maths')
             ->seeElement("#video_player > source[src='http://192.168.33.9/sites/default/files/videos/2016-07/SampleVideo_1280x720_2mb_2.mp4']");
    }

    public function testMockVideoWithNoId()
    {
        \App\Facades\Videos::shouldReceive('find')
          ->with(202)
          ->once()
          ->andThrow(new \App\Exceptions\VideoNotFoundException("Video not found"));

        try {
            $this->visit('/video/202');
        } catch (Exception $e) {
            $this->assertContains("Received status code [404]", $e->getMessage());
        }
    }
}
