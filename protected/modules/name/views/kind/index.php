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

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
