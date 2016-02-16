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
<p><?php if(strlen($data->content)<=300){
	echo $data->content;
	}else{
		echo substr($data->content,0,300);
		} ?></p>
		<br/>
		</br/>
<?php echo CHtml::link('Read More <span class="glyphicon glyphicon-chevron-right"></span>',array('view','id'=>$data->id_content),array('class'=>'btn btn-primary'));?>
