<?php
Yii::import('application.controllers.back.KindController');
$img = KindController::getimgfromid($data->kind_content);
?>
<h2>
<?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id_content)); ?>
</h2>
<p class="lead">
 	 by <?php 
 	 Yii::import('application.controllers.back.UserInfoController');
 	 $name = UserInfoController::getnamefromid($data->user_id);
 	 echo $name;
 	  ?>
</p>
<p><i class="fa fa-clock-o"></i> Posted on <?php echo CHtml::encode($data->time_create); ?> </p>
<hr>
<img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl;?>/<?php echo $img?>" alt="">
<hr>
<?php echo $data->content; ?>
<hr>
<p><i class="fa fa-user"></i>
Bach Khoa, Ha Noi, Viet Nam.
<?php echo CHtml::encode($data->time_create); ?> </p>