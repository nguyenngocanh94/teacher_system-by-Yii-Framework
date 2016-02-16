<?php
/* @var $this SubjectController */
/* @var $model Subject */
?>

<?php
$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	$model->id_subject=>array('view','id'=>$model->id_subject),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subject', 'url'=>array('index')),
	array('label'=>'Create Subject', 'url'=>array('create')),
	array('label'=>'View Subject', 'url'=>array('view', 'id'=>$model->id_subject)),
	array('label'=>'Manage Subject', 'url'=>array('admin')),
);
?>

    <h1>Update Subject <?php echo $model->id_subject; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>