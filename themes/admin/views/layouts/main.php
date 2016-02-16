<?php  $sc = Yii::app()->clientScript; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nca.nguyen.anh.this is main">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php
        $sc->registerCssfile(Yii::app()->theme->baseUrl.'/assets/bootstrap.min.css');
        $sc->registerCssfile(Yii::app()->theme->baseUrl.'/assets/dashboard.css');
        $sc->registerCssfile(Yii::app()->theme->baseUrl.'/assets/font-awesome.min.css');

    ?>
</head>
<?php Yii::import('application.controllers.back.UserInfoController');?>
<body>
   <?php $this->widget('bootstrap.widgets.TbNavbar', array(
        'brandLabel' => UserInfoController::getnamefromid(Yii::app()->user->getid()),
        'brandUrl' => Yii::app()->createUrl("userinfo/view",array("id"=>UserInfoController::getidfrom_userid(Yii::app()->user->getid()))),
        'collapse' => true, // requires bootstrap-responsive.css
        'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => 'Log out', 'url' => array('/site/logout')),
                ),
            ),
        ),
    )
);
?>



 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><?php echo CHtml::link('Dashboard', array('/'));?></li>
            <li><?php echo CHtml::link('Manager Notification', array('content/'));?></li>
             <li><?php echo CHtml::link('Create Notification', array('content/create'));?></li>
            <li><?php echo CHtml::link('Manager Document', array('document/'));?></li>
            <li><?php echo CHtml::link('Create Document', array('document/create'));?></li>
            <li><?php echo CHtml::link('Manager Account', array('userinfo/update'));?></li>
            <li><?php echo CHtml::link('Add More Kind', array('kind/create'));?></li>
            <li><?php echo CHtml::link('Manager Kind', array('kind/admin'));?></li>
            <li><?php echo CHtml::link('Add More Subject', array('subject/create'));?></li>
            <li><?php echo CHtml::link('Manager Subject', array('subject/admin'));?></li>
          </ul>
           <ul class="nav nav-sidebar">
            <li><?php
            Yii::import('application.controllers.back.QaController'); 
            $a = QaController::hasQuestion();
            if($a!= 0){
            echo CHtml::link(QaController::hasQuestion().' Question Need Answer', array('qa/admin'));
        }
            ?></li>
          <li><?php echo CHtml::link('Manager Qa system', array('qa/'));?></li>

            <li><?php 
            Yii::import('application.controllers.front.SiteController');
            $a = SiteController::pollcall();
            echo CHtml::link('Poll system',$a );?></li>
            <li><?php echo CHtml::link('Change Password', array('user/changepassword'));?></li>
          </ul>
        </div>
        <div class="magin col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          <?php echo $content;?>
          </div>
        </div>
      </div>


    
</body>

</html>
