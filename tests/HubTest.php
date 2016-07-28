<?php

use App\Facades\HubLinks;

class HubTest extends TestCase
{

	protected $hubLandingPageMockData = '[{
		"tid": 7,
		"name": "Video",
		"thumbnail": "http://192.168.33.9/sites/default/files/2016-07/hubthumb_2.png",
		"url": "video",
		"external_link": false,
		"parent": ""
		},
		 {
		"tid": 6,
		"name": "Radio",
		"thumbnail": "http://192.168.33.9/sites/default/files/2016-07/hubthumb_1.png",
		"url": "radio",
		"external_link": false,
		"parent": ""
		},
		 {
		"tid": 8,
		"name": "Education",
		 "thumbnail": "http://192.168.33.9/sites/default/files/2016-07/folderthumb_2.png",
		 "url": "hub/8",
		 "external_link": false,
		 "parent": ""
		},
		 {
		"tid": 9,
		"name": "Local News",
		 "thumbnail": "http://192.168.33.9/sites/default/files/2016-07/folderthumb_3.png",
		 "url": "hub/9",
		 "external_link": false,
		 "parent": ""
		}
	]';
	protected $hubSubPageMockedData = '[
		{
	    "tid": 10,
		"name": "Minute Maths",
		"thumbnail": "http://192.168.33.9/sites/default/files/2016-07/mathsthumb.jpg",
		"url": "video/195",
		"external_link": false,
		"parent": "Education"
		},
		{
		"tid": "11",
		"name": "BBC Bitesize",
		"thumbnail": "http://192.168.33.9/sites/default/files/2016-07/bitesize.png",
		"url": "http://www.bbc.co.uk/education",
		"external_link": true,
		"parent": "Education"
		}
	]';

	public function __construct()
	{
		
	}

	/**
	 * Tests that hub link titles are displayed within H2 tags.
	 *
	 * @return void
	 */
	public function testLinkTitle()
	{
		HubLinks::shouldReceive('topLevelItems')
			->once()
			->andReturn(json_decode($this->hubLandingPageMockData));

		$this->visit('/')
			->seeInElement('h2', 'Video')
			->seeInElement('h2', 'Radio')
			->seeInElement('h2', 'Education')
			->seeInElement('h2', 'Local News');
	}

	/**
	 * Tests that hub link thumbnails are displayed correctly.
	 *
	 * @return void
	 */
	public function testLinkThumbs()
	{
		HubLinks::shouldReceive('topLevelItems')
			->once()
			->andReturn(json_decode($this->hubLandingPageMockData));

		$this->visit('/')
			->seeInElement('a', '<img src="http://192.168.33.9/sites/default/files/2016-07/hubthumb_2.png" alt="">')
			->seeInElement('a', '<img src="http://192.168.33.9/sites/default/files/2016-07/hubthumb_1.png" alt="">')
			->seeInElement('a', '<img src="http://192.168.33.9/sites/default/files/2016-07/folderthumb_2.png" alt="">')
			->seeInElement('a', '<img src="http://192.168.33.9/sites/default/files/2016-07/folderthumb_3.png" alt="">');
	}

	/**
	 * Tests that hub link paths are correct.
	 *
	 * @return void
	 */
	public function testLinkPaths()
	{
		HubLinks::shouldReceive('topLevelItems')
			->once()
			->andReturn(json_decode($this->hubLandingPageMockData));

		$this->visit('/')
			->click('term-7')
			->seePageIs('/video');
	}

	/**
	 * Tests that hub link paths to sub hub pages are correct.
	 *
	 * @return void
	 */
	public function testLinksToSubHub()
	{
		HubLinks::shouldReceive('topLevelItems')
			->once()
			->andReturn(json_decode($this->hubLandingPageMockData));

		HubLinks::shouldReceive('subLevelItems')
			->once()
			->andReturn(json_decode($this->hubSubPageMockedData));

		$this->visit('/')
			->click('term-8')
			->seePageIs('/hub/8');
	}

	/**
	 * Tests that sub hub link paths are correct
	 *
	 * @return void
	 */
	public function testSubHubLinkPaths()
	{
		HubLinks::shouldReceive('subLevelItems')
			->once()
			->andReturn(json_decode($this->hubSubPageMockedData));

		$this->visit('/hub/8')
			->click('term-10')
			->seePageIs('/video/195');
	}

	/**
	 * Tests that sub hub link paths are correct
	 *
	 * @return void
	 */
	public function testSubHubExternalLinkPaths()
	{
		HubLinks::shouldReceive('subLevelItems')
			->once()
			->andReturn(json_decode($this->hubSubPageMockedData));

		$this->visit('/hub/8')
			->seeInElement('li', '<a href="http://www.bbc.co.uk/education" target="_blank" rel="noopener" id="term-11">');
	}

	/**
	 * Tests that sub hub titles are correct
	 *
	 * @return void
	 */
	public function testSubHubTitles()
	{
		HubLinks::shouldReceive('subLevelItems')
			->once()
			->andReturn(json_decode($this->hubSubPageMockedData));

		$this->visit('/hub/8')
			->seeInElement('h1', 'Education');
	}

	/**
	 * Tests that sub hub 'no links' title is correct
	 *
	 * @return void
	 */
	public function testSubHubNoLinksPage()
	{
		HubLinks::shouldReceive('subLevelItems')
			->once()
			->andReturn(array());

		$this->visit('/hub/9')
			->seeInElement('h1', 'No links');
	}

	/**
	 * Tests that sub hub 'back link' returns to hub
	 *
	 * @return void
	 */
	public function testSubHubBackLink()
	{

		HubLinks::shouldReceive('topLevelItems')
			->once()
			->andReturn(json_decode($this->hubLandingPageMockData));

		HubLinks::shouldReceive('subLevelItems')
			->once()
			->andReturn(array());

		$this->visit('/hub/9')
			->click('hub-back')
			->seePageIs('/');
	}
}
