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
	<?php
	$a = Yii::app()->session['name'];
	 $this->widget('bootstrap.widgets.TbNavbar', array(
        'color' => TbHtml::NAVBAR_COLOR_INVERSE,
        'brandLabel' => 'TEACHER WEB SYSTEM',
        'brandUrl' => '',
        'collapse' => true, // requires bootstrap-responsive.css
        'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'items' => array(
                    array('label' => 'Notification', 'url'=>array('/name'), 'active' => true),
                    ),
            ),
        ),
    )
);
?>


	<!-- Page Content -->
	<div class="container">

		<?php echo $content;?>
		<!-- /.row -->

		<hr>

		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; Your Website 2014</p>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</footer>

	</div>
	<!-- /.container -->

	<!-- jQuery -->
	

</body>

</html>
<?php
