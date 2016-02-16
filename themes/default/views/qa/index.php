<?php
/* @var $this QaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Qas',
);

$this->menu=array(
	array('label'=>'Create Qa','url'=>array('create')),
	array('label'=>'Manage Qa','url'=>array('admin')),
);
?>

<h1>Qas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>