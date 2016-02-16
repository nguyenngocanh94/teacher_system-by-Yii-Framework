<?php
/* @var $this UserInfoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'User Infos',
);

$this->menu=array(
	array('label'=>'Create UserInfo','url'=>array('create')),
	array('label'=>'Manage UserInfo','url'=>array('admin')),
);
?>

<h1>User Infos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'summaryText' => '',
	'itemView'=>'_view',
)); ?>