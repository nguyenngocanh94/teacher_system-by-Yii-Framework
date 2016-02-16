<?php
/* @var $this QaController */
/* @var $model Qa */
?>

<?php
$this->breadcrumbs=array(
	'Qas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Qa', 'url'=>array('index')),
	array('label'=>'Create Qa', 'url'=>array('create')),
	array('label'=>'Update Qa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Qa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Qa', 'url'=>array('admin')),
);
?>

<h1>View Qa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'question',
		'answer',
		'statusx.name',
		'auth',
	),
)); ?>