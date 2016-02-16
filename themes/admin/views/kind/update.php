<?php
/* @var $this KindController */
/* @var $model Kind */
?>

<?php
$this->breadcrumbs=array(
	'Kinds'=>array('index'),
	$model->id_kind=>array('view','id'=>$model->id_kind),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kind', 'url'=>array('index')),
	array('label'=>'Create Kind', 'url'=>array('create')),
	array('label'=>'View Kind', 'url'=>array('view', 'id'=>$model->id_kind)),
	array('label'=>'Manage Kind', 'url'=>array('admin')),
);
?>

    <h1>Update Kind <?php echo $model->id_kind; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>