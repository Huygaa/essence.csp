<?php

class Library_Bootstrap extends Zend_Application_Module_Bootstrap {
	function _initSetTranslations(){
		$bootstrap= $this->getApplication();
		$layout= $bootstrap->getResource('layout');
		$view=$layout->getView();
		
		$translate=new Zend_Translate('gettext',
						APPLICATION_PATH.'/languages',
						null,
						array('scan'=>Zend_Translate::LOCALE_FILENAME));
		$session=new Zend_Session_Namespace('zftutorial');
		$locale=new Zend_Locale();
		
		if (isset($session->language)){
			$requestedLanguage = $session->language;
			$locale->setLocale($requestedLanguage);
		} else {
			$locale->setLocale(Zend_Locale::BROWSER);
			$requestedLanguage = key($locale->getBrowser());	
		}
		if (in_array($requestedLanguage, $translate->getList())){
			$language = $requestedLanguage;
		} else {
			$language = 'ru';
		}
		$translate->setLocale($language);
		$view->translate=$translate;
	}
}