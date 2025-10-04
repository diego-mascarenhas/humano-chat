<?php

namespace Idoneo\HumanoChat\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ChatController extends BaseController
{
	public function index()
	{
		return view('humano-chat::chat.index');
	}
}


