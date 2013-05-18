<?php

/**
 * FacebookApi respresents Facebook API.
 */
class FacebookApi extends CComponent
{
	public $appId;
	public $divRoot;

	public function init()
	{

	}

	public function getInitScript()
	{
		return 
			"window.fbAsyncInit = function() {\n" .
			"	FB.init({\n" .
			"		appId: '$this->appId',\n" .
			"		status: true,\n" .
			"		cookie: true,\n" .
			"		xfbml: true\n" .
			"	});\n" .
			"};\n" .

			"(function() {\n" .
			"	var e = document.createElement('script');\n" .
			"	e.async = true;\n" .
			"	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';\n" .
			"	document.getElementById('$this->divRoot').appendChild(e);\n" .
			"}());\n";
	}

	public function getShareScript($buttonId, $message)
	{
		return 
			"$('#$buttonId').click(function(e){\n" .
			"	e.preventDefault();\n" .
			"	FB.ui({\n" .
			"		method: 'feed',\n" .
			"		name: '$message[name]',\n" .
			"		link: '" . Yii::app()->request->hostInfo . "/$message[link]',\n" .
			"		picture: '$message[picture]',\n" .
			"		caption: '$message[caption]',\n" .
			"		description: '$message[description]',\n" .
			"		message: ''\n" .
			"	});\n" .
			"});\n";
	}
}