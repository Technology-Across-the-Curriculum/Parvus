<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Parvus</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- Google fonts !-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- CSS -->
    <link href="<?php echo URL; ?>css/landing-page.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="content">

        <?php require APP . 'view/_templates/header.php'; ?>
        <?php ##require APP . 'view/_templates/navigation.php'; ?>
        <?php $this->model['modelexample']->ParvusInfo(); ?>
    </div>
</div>

</body>
</html>
