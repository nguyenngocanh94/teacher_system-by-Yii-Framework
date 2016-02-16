<?php
/* @var $this QaController */
/* @var $model Qa */
?>

<?php
$this->breadcrumbs=array(
	'Qas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Qa', 'url'=>array('index')),
	array('label'=>'Manage Qa', 'url'=>array('admin')),
);
?>

<h1>Create Qa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>