<?php
/* @var $this UserInfoController */
/* @var $data UserInfo */
?>

<div class="view">

    
	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	
	<?php echo CHtml::encode($data->male); ?>
	
	<?php echo CHtml::encode($data->position); ?>

	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	


	<b><?php echo CHtml::encode($data->getAttributeLabel('prologue')); ?>:</b>
	<?php echo CHtml::encode($data->prologue); ?>
	<br />

	


	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone')); ?>:</b>
	<?php echo CHtml::encode($data->telephone); ?>
	<br />

	<hr/>

</div>