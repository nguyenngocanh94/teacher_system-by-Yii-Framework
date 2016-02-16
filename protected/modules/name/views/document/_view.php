<?php
Yii::import('application.controllers.back.SubjectController');
$img = SubjectController::getsubjectfromid($data->id_subject);
?>
<h2>
<?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id_document)); ?>
</h2>
<p class="lead">
 	 by <?php 
 	 Yii::import('application.controllers.back.UserInfoController');
 	 $name = UserInfoController::getnamefromid($data->user_id);
 	 echo $name;
 	  ?>
</p>
<p><i class="fa fa-clock-o"></i> Posted on <?php echo CHtml::encode($data->time_create); ?> </p>

<p>Click that button for download</p>
<?php
$url = "/yii1/backend.php?r=document/download&filename=".urlencode($data->document_src);
echo CHtml::link('Download',$url,array('class'=>'btn btn-primary')); ?>
 <hr>
 