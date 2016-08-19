<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\News as NewsItem;
use App\Facades\News;

class NewsPageTest extends TestCase
{
    protected $landingPageMockData = '{"21":{"title":"Planned C Wing Lockdown Today at 12:30","nid":"21","description":"\u003Cp\u003EPlease be aware that there is a planned lockdown for the C wing today at 12:30. Lockdown is due to general\u0026nbsp;maintenance for the wing and security checks. More updates will be posted and we apologies for any inconvenience\u0026nbsp;this may cause.\u003C\/p\u003E\r\n\r\n\u003Cp\u003EThank you.\u003C\/p\u003E\r\n","date":"1471424877"},"19":{"title":"Changes to Canteen Menu","nid":"19","description":"\u003Cp\u003EAs of 28th July we\u0027ll be adding a few new items to the canteen menu. We\u0027ve added a new chicken burger and several pasta dishes to the menu. You\u0027ll see them on your meal order forms starting next week.\u003C\/p\u003E\r\n","date":"1471341526"},"17":{"title":"D Wing Lockdown 27\/07\/15 at 14:00","nid":"17","description":"\u003Cp\u003ED Wing will be locked down on the 27\/07\/16 at 14:00 due to an offender climbing onto the roof of one of the workshops. The wing needs to be locked down so the offender can be safely removed from the incident contained. We apologies for any inconvenience this may cause.\u003C\/p\u003E\r\n\r\n\u003Cp\u003ERegards\u003Cbr \/\u003E\r\nAndy Wright\u003C\/p\u003E\r\n","date":"1471341384"},"20":{"title":"Summer Football Tournament","nid":"20","description":"\u003Cp\u003EWe are pleased to announce that a summer football tournament is being arranged for the 10th and 11th August. The games will follow 5-a-side format and each time will be allowed substitutes. Players can register their interest in the tournament by putting an App in to their wing.\u003C\/p\u003E\r\n\r\n\u003Cp\u003EPlayers will be able to register as a team or individually. Individual players will be grouped into teams once all application are in. The tournament will run over both days with the final match being played on the afternoon of the 11th.\u003C\/p\u003E\r\n\r\n\u003Cp\u003EThe format of the tournament will be decided once we know how many teams are entering. More details will be posted closer to the time of the tournament but in the mean time, get those Apps in and we\u0027ll see you on the football pitch.\u003C\/p\u003E\r\n","date":"1470836053"},"18":{"title":"B Wing Lockdown 18\/07\/16 at 14:00","nid":"18","description":"\u003Cp\u003EB Wing is currently in lockdown due to an incident. An update will be posted once we have more details.\u003C\/p\u003E\r\n","date":"1468157653"}}';
    protected $mockNews;
    protected $mockOtherNews = array();

    protected $newsRepository;

    public function __construct() {

      $this->mockVideo = new NewsItem(
          1,
          "Planned C Wing Lockdown Today at 12:30",
          "Please be aware that there is a planned lockdown for the C wing today at 12:30. Lockdown is due to general maintenance for the wing and security checks. More updates will be posted and we apologies for any inconvenience this may cause. Thank you.",
          "17/08/2016",
          "09:07"
      );

		$this->mockOtherNews = array(
			new NewsItem(
        1,
        "Planned C Wing Lockdown Today at 12:30",
        "Please be aware that there is a planned lockdown for the C wing today at 12:30. Lockdown is due to general maintenance for the wing and security checks. More updates will be posted and we apologies for any inconvenience this may cause. Thank you.",
        mktime(9, 7, 0, 8, 17, 2016)
			),
			new NewsItem(
        2,
        "Changes to Canteen Menu",
        "As of 28th July we'll be adding a few new items to the canteen menu. We've added a new chicken burger and several pasta dishes to the menu. You'll see them on your meal order forms starting next week.",
        mktime(9, 58, 0, 8, 16, 2016)
			)
      );
    }

    /**
     * Tests content displays on the news page.
     *
     * @return void
     */
    public function testLandingPage()
    {
        News::shouldReceive('landingPageNews')
          ->once()
          ->andReturn($this->mockOtherNews);

        $this->visit('/news')
             ->seeInElement('h3', 'Planned C Wing Lockdown Today at 12:30');
    }

}
