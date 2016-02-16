<?php
/* @var $this KindController */
/* @var $model Kind */
?>

<?php
$this->breadcrumbs=array(
	'Kinds'=>array('index'),
	$model->id_kind,
);

$this->menu=array(
	array('label'=>'List Kind', 'url'=>array('index')),
	array('label'=>'Create Kind', 'url'=>array('create')),
	array('label'=>'Update Kind', 'url'=>array('update', 'id'=>$model->id_kind)),
	array('label'=>'Delete Kind', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kind),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kind', 'url'=>array('admin')),
);
?>

<h1>View Kind #<?php echo $model->id_kind; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id_kind',
		'category',
		'img_src',
	),
)); ?>