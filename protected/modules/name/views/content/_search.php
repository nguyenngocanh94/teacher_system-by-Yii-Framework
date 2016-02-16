  <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'method'=>'post',
)); ?>
                    <?php
                        $this->widget ('zii.widgets.jui.CJuiAutoComplete', array (
                                'id' => 'Content_title',
                                'name' => 'Content[title]',
                                'source' => $this->createUrl ('request/suggestCountry' ),
                                'htmlOptions' => array (
                                        'style'=>'height:34px; width: 277px;',
                                )
                        ) );
                        ?>  

                            <div style="margin-top: 5px;"></div>
                            <button class="btn btn-primary" type="submit" name="yt0">Search 
                            </button>
                        

    <?php $this->endWidget(); ?>

