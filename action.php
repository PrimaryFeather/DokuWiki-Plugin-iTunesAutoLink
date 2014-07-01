<?php
if(!defined('DOKU_INC')) die();

class action_plugin_itunesautolink extends DokuWiki_Action_Plugin {

	function register(Doku_Event_Handler &$controller) {
	    $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE',  $this, '_hookjs');
	}

	function _hookjs(&$event, $param) {
		$token = $this->getConf('affiliate_token');
		if ($token)
		{
			$event->data["script"][] = array (
			  "type" => "text/javascript",
			  "charset" => "utf-8",
			  "_data" => "var _merchantSettings=_merchantSettings || [];_merchantSettings.push(['AT', '".$token."'], ['CT', 'Wiki']);(function(){var autolink=document.createElement('script');autolink.type='text/javascript';autolink.async=true; autolink.src= ('https:' == document.location.protocol) ? 'https://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js' : 'http://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(autolink, s);})();"
			);
		}
	}
}
?>
