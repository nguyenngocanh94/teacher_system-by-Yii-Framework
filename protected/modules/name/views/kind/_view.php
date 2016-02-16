<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_kind')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kind),array('view','id'=>$data->id_kind)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img_src')); ?>:</b>
	<?php echo CHtml::encode($data->img_src); ?>
	<br />


</div>
