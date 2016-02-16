<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */
?>

<?php
$this->breadcrumbs=array(
	'User Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserInfo', 'url'=>array('index')),
	array('label'=>'Manage UserInfo', 'url'=>array('admin')),
);
?>

<h1>Create UserInfo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>