<!DOCTYPE html>
<html lang="de" class="h1">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?> | Mein Bücherregal</title>

    <!-- Bootstrap core CSS -->
    

    <!-- Custom styles for this template -->
    <link href="/css/css.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container1">
        
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav">
              <?php if(strlen($_SESSION['uid'])>0): ?>
                  <li><a href="/">Home</a></li>
                  <li><a href="/genre/index">Genres</a></li>
                  <li><a href="/login/logout">Logout</a></li>
              <?php else: ?>
            	<li><a class="navbar-brand" href="/">Mein Bücherregal</a></li>
                <li><a href="/">Home</a></li>
                <li><a href="/genre/index">Genres</a></li>
                <li><a href="/Login/index">Login</a></li>
                <li><a href="/registration/index">Registration</a></li>
              <?php endif ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

    <h1><?= $heading ?></h1>
