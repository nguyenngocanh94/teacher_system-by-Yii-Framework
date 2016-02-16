<?php

class DefaultController extends Controller
{
	public $layout = 'application.modules.name.views.layouts.main0';
	public function actionIndex()
	{
		$this->render('index');
	}
}