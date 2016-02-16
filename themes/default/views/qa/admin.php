<?php
/* @var $this QaController */
/* @var $model Qa */


$this->breadcrumbs=array(
	'Qas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Qa', 'url'=>array('index')),
	array('label'=>'Create Qa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
        // $.fn.yiiGridView.update('your-grid', {
        $.fn.yiiListView.update('your-list', {
                data: $(this).serialize()
        });
        return false;
});
");
?>

<h1>Manage Qas</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_view',
)); ?>