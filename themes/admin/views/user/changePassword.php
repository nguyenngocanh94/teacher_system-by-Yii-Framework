<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-body">
            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'change-password-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?><div class="form-group">
                <?php echo $form->passwordField($model, 'old_password', array('class' => 'form-control', 'placeholder' => 'Current Password')); ?>
                <?php echo $form->error($model, 'old_password'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->passwordField($model, 'new_password', array('class' => 'form-control', 'placeholder' => 'New Password')); ?>
                    <?php echo $form->error($model, 'new_password'); ?>

                </div>

                <div class="form-group">
                    <?php echo $form->passwordField($model, 'repeat_password', array('class' => 'form-control', 'placeholder' => 'Repeat Password')); ?>
                    <?php echo $form->error($model, 'repeat_password'); ?>

                </div>


                <?php echo CHtml::submitButton('Change Password', array('class' => 'btn btn-lg btn-success btn-block')); ?>


                <?php $this->endWidget(); ?>
            </div><!-- form -->
        </div>
    </div>
</div>