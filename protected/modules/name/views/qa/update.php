<?php
/* @var $this QaController */
/* @var $model Qa */
?>

<?php
$this->breadcrumbs=array(
	'Qas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Qa', 'url'=>array('index')),
	array('label'=>'Create Qa', 'url'=>array('create')),
	array('label'=>'View Qa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Qa', 'url'=>array('admin')),
);
?>

    <h1>Update Qa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>