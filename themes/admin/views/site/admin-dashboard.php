<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
Yii::import('application.controllers.back.UserInfoController');   
Yii::import('application.controllers.back.QaController'); 

?>
<h1>Admin Dashboard</h1>

<p style="font-family: Verdana;font-size:24px;">Wellcome <?php echo UserInfoController::getnamefromid(Yii::app()->user->getid()); ?> Has Comebacked the Dashboard.</p>
<p style="font-family: Verdana; font-size: 20px; color: red;"> You have <strong><?php echo QaController::hasQuestion();?> question</strong> need to answer.

</p>