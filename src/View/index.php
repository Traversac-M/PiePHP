<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" type="text/css" href="/PiePHP/webroot/css/viewIndex.css">
    <link rel="stylesheet" type="text/css" href="/PiePHP/webroot/css/navbar.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="/PiePHP/webroot/js/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>View - index</title>
</head>
<body>
    <?php
    include('/src/View/User/navbar.php');
    echo $view; 
    ?>
</body>
</html>