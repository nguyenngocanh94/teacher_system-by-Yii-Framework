<?php
/* @var $this DocumentController */
/* @var $data Document */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id_document')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_document),array('view','id'=>$data->id_document)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('document_src')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->document_src),array('document/download','filename'=>$data->document_src)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_create')); ?>:</b>
	<?php echo CHtml::encode($data->time_create); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_subject')); ?>:</b>
	<?php Yii::import('application.controllers.back.SubjectController');
 	 $name = SubjectController::getsubjectfromid($data->id_subject);
 	 echo $name; ?>
	<br />


</div>