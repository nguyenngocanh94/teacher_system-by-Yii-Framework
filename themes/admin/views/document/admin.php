<?php
/* @var $this DocumentController */
/* @var $model Document */


$this->breadcrumbs=array(
	'Documents'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'Create Document', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#document-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Documents</h1>

<p>
    With that controller, you can view, delete and update infomation of each record,delete action 's using AJAX, quickly and asomeware !
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'document-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_document',
		'title',
		'document_src',
		'time_create',
		'kinddocument.subject',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>