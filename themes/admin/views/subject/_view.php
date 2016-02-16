<?php
/* @var $this SubjectController */
/* @var $data Subject */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id_subject')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_subject),array('view','id'=>$data->id_subject)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />


</div>