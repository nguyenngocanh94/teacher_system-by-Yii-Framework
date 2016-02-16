<?php
$this->breadcrumbs=array(
	'Kinds'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Kind','url'=>array('index')),
array('label'=>'Manage Kind','url'=>array('admin')),
);
?>

<h1>Create Kind</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>