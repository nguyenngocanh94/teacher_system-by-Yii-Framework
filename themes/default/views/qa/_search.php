<?php
/* @var $this QaController */
/* @var $model Qa */
/* @var $form CActiveForm */

?>

<div class="wide form">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'method'=>'post',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    
        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->