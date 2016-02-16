<?php

class NameModule extends CWebModule
{
	public $baseUrl = '/name';
	public $layout = 'name.views.layouts.main';
	public $appLayout = 'name.views.layouts.main';	
	public function init()
	{

		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		$this->layoutPath = Yii::getPathOfAlias('name.views.layouts');
		$this->layout ='main';
		// import the module-level models and components
		$this->setImport(array(
			'name.models.*',
			'name.controllers.*',
			'name.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
