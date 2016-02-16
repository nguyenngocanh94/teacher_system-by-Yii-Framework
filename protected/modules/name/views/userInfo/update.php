<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */
?>

<?php
$this->breadcrumbs=array(
	'User Infos'=>array('index'),
	$model->iduser_info=>array('view','id'=>$model->iduser_info),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserInfo', 'url'=>array('index')),
	array('label'=>'Create UserInfo', 'url'=>array('create')),
	array('label'=>'View UserInfo', 'url'=>array('view', 'id'=>$model->iduser_info)),
	array('label'=>'Manage UserInfo', 'url'=>array('admin')),
);
?>

    <h1>Update UserInfo <?php echo $model->iduser_info; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>