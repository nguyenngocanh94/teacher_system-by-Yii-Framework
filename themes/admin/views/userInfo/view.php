<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */
?>

<?php
$this->breadcrumbs=array(
	'User Infos'=>array('index'),
	$model->iduser_info,
);

$this->menu=array(
	array('label'=>'List UserInfo', 'url'=>array('index')),
	array('label'=>'Create UserInfo', 'url'=>array('create')),
	array('label'=>'Update UserInfo', 'url'=>array('update', 'id'=>$model->iduser_info)),
	array('label'=>'Delete UserInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iduser_info),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserInfo', 'url'=>array('admin')),
);
?>

<h1>View UserInfo 's <?php echo $model->fullname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		array('label'=>'Homepage','type'=>'raw','value'=>CHtml::link('Your Homepage',Yii::app()->createUrl("name/content/admin",array("name"=>$model->username)))),
		array('label'=>'FullName','value'=>$model->male.' '.$model->position.' '.$model->fullname),
		'address',
		'telephone',
	),
)); ?>