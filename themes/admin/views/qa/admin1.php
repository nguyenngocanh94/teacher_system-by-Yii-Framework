<?php
/* @var $this QaController */
/* @var $model Qa */


$this->breadcrumbs=array(
	'Qas'=>array('index'),
	'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#qa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Qas</h1>

<p>
    Status is <strong>1</strong> meaning it has been answered !!!
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'qa-grid',
	'itemsCssClass' => 'table table-striped table-hover',
	'dataProvider'=>$model->searchx(),
	'columns'=>array(
		'id',
		'question',
		array(
			'name'=>'status',
			'value'=>'($data->status)==2?"WAIT ANSWERED":"HAS BEEN ANSWERED"'
			),
		'answer',
		'auth',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=> '{view}{answer}{delete}',
			'buttons'=> array('answer'=>array(
				'label'=> 'Answer',
				'imageUrl'=>Yii::app()->request->baseUrl.'/img/a.png',
				'url'=> 'Yii::app()->controller->createUrl("qa/update&id",array("id"=>$data->id))'
				)),
		),
	),
)); ?>