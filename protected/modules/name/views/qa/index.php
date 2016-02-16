<?php
/* @var $this QaController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Qas 's</h1>
<h3><?php echo Yii::app()->session['teacher']; ?></h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>