<?php
class BackEndController extends CController
{
    public $menu=array();
    public $breadcrumbs=array();
  
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
  
    public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('*'),
                'actions'=>array('login'),
            ),
            array('allow',
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
}
?>