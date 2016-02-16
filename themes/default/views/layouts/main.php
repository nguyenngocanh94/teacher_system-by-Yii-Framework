<!DOCTYPE html>
<!--
	teacher web system by thicongtu2
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (fb/nca.nguyen.anh)
-->
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->bootstrap->register(); ?>
    <?php  $sc = Yii::app()->clientScript; ?>
    <?php $sc->registerCssfile(Yii::app()->theme->baseUrl.'/assets/sticky-footer-navbar.css');?>

</head>
<body>
<div class="wrap">
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
        'color' => TbHtml::NAVBAR_COLOR_INVERSE,
        'brandLabel' => 'TEACHER WEB SYSTEM',
        'brandUrl' => array('/'),
        'collapse' => true, // requires bootstrap-responsive.css
        'display' => TbHtml::NAVBAR_DISPLAY_STATICTOP,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'items' => array(
                    array('label' => 'Get Started', 'url'=>array('/site/index'), 'active' => true),
                    ),
            ),
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => 'Register', 'url'=>array('/user/index')),
                    array('label' => 'Log in', 'url'=>Yii::app()->request->baseUrl.'/backend.php?r=site/login','visible'=>Yii::app()->user->isGuest),
                    array('label' => 'Log out', 'url' => array('/site/logout'),'visible'=>!Yii::app()->user->isGuest),
                ),
            ),
        ),
    )
);
?>
<div class="container">
<div class="jumbotron">
<?php echo $content;?>
</div>
</div>
<footer class="footer">
    <div class="container abc">
        <p class="pull-left">&copy; Anh Ngọc Nguyễn 2015</p>

        <p class="pull-right">Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a></p>
    </div>
</footer>
</body>
</html>