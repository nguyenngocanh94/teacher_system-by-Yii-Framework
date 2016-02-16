<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i>Teacher Web System</i></h1>

<p>Congratulations! You have successfully createed account, let try it ! </p>
<p>You may change the content of this page by modifying the following two files:</p>
<ul style="list-style:none;">
	<li><p><span class ="glyphicon glyphicon-ok"></span>
	<?php echo CHtml::link('Login and start config your website at here',Yii::app()->request->baseUrl.'/backend.php?r=site/login',array('class'=>'dngaz')); ?></p></li>
</ul>

<p>For more details on how to further develop this application, please contact with author <a href="http://facebook.com/nca.nguyen.anh/" target="_blank">Anh Ngọc Nguyễn</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>

