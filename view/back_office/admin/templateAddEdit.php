<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add ou Edit Post</title>

    <!-- Bootstrap core CSS -->
    <link href="public/thème/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="public/thème/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="public/thème/css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>
    
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php?action=adminUserDeconnect">Deconnexion</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">voir le blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=adminAddPost">Ajoute un billet</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=adminShowReportedComment">Commentaires Signalés</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="index.php?action=adminAll">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Page Header -->
    <header class="masthead" style="background-image: url('public/thème/img/macchina.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-5 mx-auto">
            <div class="site-heading">
              <h1>Espace Admin</h1>
            </div>
          </div>
        </div>
      </div>
    </header>
    
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                  
              <?= $content ?>
         
            </div>
        </div>
      </div>
    </article>

    <hr>

    
    <!-- Bootstrap core JavaScript -->
    <script src="public/thème/vendor/jquery/jquery.min.js"></script>
    <script src="pubic/thème/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="public/thème/js/clean-blog.min.js"></script>

  </body>

</html>
