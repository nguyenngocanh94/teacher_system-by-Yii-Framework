<?php
/* @var $this KindController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Kinds',
);

$this->menu=array(
	array('label'=>'Create Kind','url'=>array('create')),
	array('label'=>'Manage Kind','url'=>array('admin')),
);
?>

<h1>Kinds</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>