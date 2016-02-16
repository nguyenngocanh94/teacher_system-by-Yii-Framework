<?php
/* @var $this ContentController */
/* @var $model Content */


$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#content-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Contents</h1>

<p>
    all notification you had posted, in here check it, or do anything you want
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'content-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_content',
		'title',
		'time_create',
		'kind_content_id.category',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>