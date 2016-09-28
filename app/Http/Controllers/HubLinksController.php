<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Facades\HubLinks;
use App\Http\Controllers\Controller;

class HubLinksController extends Controller
{
	function getItem(Request $request, $id = NULL) {
		$page_data = HubLinks::getItem($id, $request->input('user_id'));

		return view('hub.item', ['page' => $page_data]);
	}

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
