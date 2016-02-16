  <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'method'=>'post',
)); ?>
                    		<?php echo $form->dropDownListControlGroup($model,'id_subject',$this->getsubject()); ?> 
                            <div style="margin-top: 40px;"></div>
                            <button class="btn btn-primary" type="submit" name="yt0">Search 
                            </button>
                        

    <?php $this->endWidget(); ?>

