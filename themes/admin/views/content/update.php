<?php
/* @var $this ContentController */
/* @var $model Content */
?>

<?php
$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->id_content),
	'Update',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
	array('label'=>'View Content', 'url'=>array('view', 'id'=>$model->id_content)),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

    <h1>Update Content <?php echo $model->id_content; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>