<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Facades\Videos;
use App\Models\Video;

class VideoLandingPageTest extends TestCase
{
    protected $landingPageMockData = '[{"tid":"1","channel":"Way2Learn","programmes":[{"tid":"2","title":"Minute Maths","episodes":{"nid":"9","title":"Global video 3","description":[{"value":"<p>Description of the third global video item.<\/p>\r\n","summary":"","format":"basic_html"}],"category":{"id":"2","title":"Minute Maths"},"thumbnail":"http:\/\/192.168.33.9\/sites\/default\/files\/2016-07\/minute-maths.png"}},{"tid":"3","title":"Job Smart","episodes":{"nid":"7","title":"Global video 1","description":[{"value":"<p>Description of the first global video item.<\/p>\r\n","summary":"","format":"basic_html"}],"category":{"id":"3","title":"Job Smart"},"thumbnail":"http:\/\/192.168.33.9\/sites\/default\/files\/2016-07\/job-smart.png"}}]},{"tid":"5","channel":"Prison Video Trust","programmes":[{"tid":"6","title":"PVT Series 1","episodes":{"nid":"8","title":"Global video 2","description":[{"value":"<p>The description of the second global video item.<\/p>\r\n","summary":"","format":"basic_html"}],"category":{"id":"6","title":"PVT Series 1"},"thumbnail":"http:\/\/192.168.33.9\/sites\/default\/files\/2016-07\/pvt-series-1.png"}}]}]';
    protected $mockVideo;

    public function __construct() {
      $this->mockVideo = new Video(
        9, "Video title", "<p>Video description</p>", "http://url.to/video.mp4"
      );
    }

    /**
     * Tests that channel titles are displayed within H2 tags.
     *
     * @return void
     */
    public function testChannelTitles()
    {
        Videos::shouldReceive('landingPageVideos')
          ->once()
          ->andReturn(json_decode($this->landingPageMockData));

        $this->visit('/video')
             ->seeInElement('h2', 'Way2Learn')
             ->seeInElement('h2', 'Prison Video Trust');
    }

    /**
     * Tests that programme titles are displayed within H6 tags.
     *
     * @return void
     */
    public function testProgrammeTitles()
    {
        Videos::shouldReceive('landingPageVideos')
          ->once()
          ->andReturn(json_decode($this->landingPageMockData));

        $this->visit('/video')
             ->seeInElement('h6', 'Minute Maths')
             ->seeInElement('h6', 'Job Smart')
             ->seeInElement('h6', 'PVT Series 1');
    }

    /**
     * Tests that programmes link through to videos.
     *
     * @return void
     */
    public function testProgrammeLinks()
    {
        Videos::shouldReceive('landingPageVideos')
          ->once()
          ->andReturn(json_decode($this->landingPageMockData));

        Videos::shouldReceive('find')
          ->with(9)
          ->once()
          ->andReturn($this->mockVideo);

        $this->visit('/video')
             ->click('programme-9')
             ->seePageIs('/video/9');
    }

}
