<?php $sc = Yii::app()->clientScript; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap Core CSS -->
    <?php
        $sc->registerCssfile(Yii::app()->theme->baseUrl.'/assets/bootstrap.min.css');
        $sc->registerCssfile(Yii::app()->theme->baseUrl.'/assets/metisMenu.min.css');
        $sc->registerCssfile(Yii::app()->theme->baseUrl.'/assets/sb-admin-2.css');
        $sc->registerCssfile(Yii::app()->theme->baseUrl.'/assets/font-awesome.min.css');
        $sc->registerCssfile(Yii::app()->theme->baseUrl.'/css/error.css');
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <?php echo $content;?>
        </div>
    </div>

    
</body>

</html>
