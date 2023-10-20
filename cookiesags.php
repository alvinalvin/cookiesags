<?php

defined('_JEXEC') or die;
class plgsystemCookiesAgs extends JPlugin {
	protected $app;
	function onBeforeRender(){
  $doc = JFactory::getDocument();
	$app = JFactory::getApplication();
   // validate clients
	if ($app->isClient("administrator")) {
         return;
    }
  $doc->addScript('plugins/system/cookiesags/jquery.cookiebar.js');
  $doc->addStyleSheet('plugins/system/cookiesags/jquery.cookiebar.css');
  JHtml::_('jquery.framework');
	// params
	$background_cookies  = $this->params->get('background');
	$color_text          = $this->params->get('colortxt');
	$color_accept        = $this->params->get('colorbutton');
	$accept_hover        = $this->params->get('hoverbutton');
	$color_polic         = $this->params->get('colorbuttonpolic');
	$hover_polic         = $this->params->get('hoverbuttonpolic');
	$msg                 = $this->params->get('msg');
	$text_accept         = $this->params->get('text');
	$textpolic           = $this->params->get('textpolic');
	$expire              = $this->params->get('expire');
	$Position_cookies    = $this->params->get('Position');
	$validatepolic       = $this->params->get('validatepolic');
	$url                 = $this->params->get('url');
	// Position policy validate
	if ($Position_cookies==0) {
		$Position = "true";
	}
	if ($Position_cookies==1) {
		$Position = "false";
	}

	if ($validatepolic==0 ) {
			$validate = "true";
	}
	if ($validatepolic==1) {
		$validate = "false";
	}
  // add style
  $style = '	#cookie-bar {
			background:'.$background_cookies .';
			color:'.$color_text .';
			}
		#cookie-bar .cb-enable {
			background:'.$color_accept.';
			}

		#cookie-bar .cb-enable:hover {
			background:'.$accept_hover.';
		}
		#cookie-bar .cb-policy {
			background:'.$color_polic.';
			}

		#cookie-bar .cb-policy:hover {
			background:'.$hover_polic.';
		}';
  $doc->addStyleDeclaration($style);

	// add script
	$doc->addScriptDeclaration("
	 $(document).ready(function(){
	   $.cookieBar({
	   message:'$msg',
	   acceptText:'$text_accept',
	   policyText:'$textpolic ',
	   expireDays:$expire,
	   bottom:$Position ,
	   fixed:true,
	   policyButton:$validate,
	   policyURL: '$url',
	});
	 });

");
	// end
}
 }
