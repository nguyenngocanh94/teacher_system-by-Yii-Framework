<?php
/* @var $this QaController */
/* @var $data Qa */
?>

<div class="panel panel-danger">
	<div class="panel-body">
	<i class="fa fa-question"></i>
	<b><?php echo CHtml::encode($data->auth); ?> :</b><p> <?php echo CHtml::encode($data->question); ?></p>
	</div>
	<div class="panel-footer">
	<i class="fa fa-pencil-square-o"></i>
	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	</div>	
</div>

