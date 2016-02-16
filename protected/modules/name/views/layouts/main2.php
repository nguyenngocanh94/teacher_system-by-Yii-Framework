<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Homepage - teacher websystem</title>

<!-- Bootstrap Core CSS -->
<link
	href="<?php echo Yii::app()->request->baseUrl;?>/asset/css/bootstrap.min.css"
	rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<!-- Custom CSS -->
<link
	href="<?php echo Yii::app()->request->baseUrl;?>/asset/css/blog-home.css"
	rel="stylesheet">
</head>

<body>
	<!-- Navigation -->
	<?php Yii::import('application.controllers.back.UserInfoController'); ?>
<body>
	<!-- Navigation -->
	<?php
	$a = Yii::app()->session['name'];
	$b = Yii::app()->session['teacher'];
	 $this->widget('bootstrap.widgets.TbNavbar', array(
        'color' => TbHtml::NAVBAR_COLOR_INVERSE,
        'brandLabel' => UserInfoController::getnamefromid($a),
        'brandUrl' => '',
        'collapse' => true, // requires bootstrap-responsive.css
        'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'items' => array(
                    array('label' => 'Notification', 'url'=>Yii::app()->createUrl("name/content/admin/",array("name"=>$b)), 'active' => true),
                    ),
            ),
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => 'Document', 'url'=>Yii::app()->createUrl("name/document/admin/",array("id"=>$a))),
                    array('label' => 'Ask a Question', 'url'=>Yii::app()->createUrl("name/qa/index/",array("id"=>$a)),),
                    array('label' => 'About Me', 'url'=>Yii::app()->createUrl("name/userinfo/index/",array("id"=>$a))),

                ),
            ),
        ),
    )
);
?>

	<!-- Page Content -->
	<div class="container">

		<?php echo $content;?>

		<hr>

		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; Your Website 2015</p>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</footer>

	</div>
	<!-- /.container -->

	<!-- jQuery -->

	<!-- Bootstrap Core JavaScript -->

</body>

</html>
