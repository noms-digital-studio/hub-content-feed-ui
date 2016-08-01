<?php

namespace App\Http\Controllers;

use App\Facades\HubLinks;
use App\Http\Controllers\Controller;

class HubLinksController extends Controller
{

	function showHubPage()
	{
		$links = HubLinks::topLevelItems();

		return view('hub.hub', ['links' => $links]);
	}

	function showHubSubPage($tid)
	{
		$links = HubLinks::subLevelItems($tid);

		return view('hub.subHub', ['links' => $links]);
	}

}
