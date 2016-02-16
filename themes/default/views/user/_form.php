
<div class="row">
    <div class="col-lg-6">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<div class="form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<div class="input-group">
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Username')); ?>
		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		</div>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="input-group">
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Password')); ?>
		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		</div>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="input-group">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Email')); ?>
		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		</div>
		<?php echo $form->error($model,'email'); ?>
	</div>

	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-info pull-right')); ?>
	

<?php $this->endWidget(); ?>

</div>
</div>
</div>