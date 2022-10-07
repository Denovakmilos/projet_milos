<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le projet de Milos</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' .DIRECTORY_SEPARATOR . 'app' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="/public/js/script.js" defer></script>
</head>

<body>
<style>
body {margin:0;height:2000px;}

.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar a:hover {
  background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}

.content {
  margin-left: 75px;
  font-size: 30px;
}
</style>
<body>

<div class="icon-bar">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
</div>


<nav class="navbar navbar-expand-lg" style="background-color: lightgray; position:sticky; top:0px;z-index:2;">
  <a class="navbar-brand" href="/"><i class="fa fa-fw fa-home"></i>Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts">Les derniers articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pictures">Galerie d'Images</a>
      </li>
    </ul>
  </div>

  <div>
  <?php if (!isset($_SESSION['auth'])):?>
  <ul class="navbar-nav ml-auto" style="background-color: rgba(0, 0, 0, 0.2);" >
      <li class="nav-item">
        <a class="nav-link" href="/login"><i class="fa fa-fw fa-user"></i>Se connecter</a>
      </li>
    </ul>
    <?php endif ?>
    <?php if (isset($_SESSION['auth'])):?>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="/logout">Se déconnecter</a>
      </li>
      
    </ul>
    <?php endif ?>
      </div>
</nav>
    <div class="container">
    <?= $content ?>
      </div>



      <footer class="text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- twitter -->
      <a
      <a href="#" class="fa fa-twitter"></a>
      ></a>

      <!-- facebook -->
      <a
        <a href="#" class="fa fa-facebook"></a> 
      ></a>

      <!-- Linkedin -->
      <a
      <a href="#" class="fa fa-linkedin"></a>
      ></a>

      <!-- youtube -->
      <a
      <a href="#" class="fa fa-youtube"></a>
      ></a>

      <!-- instagram -->
      <a
      <a href="#" class="fa fa-instagram"></a>
      ></a>
      <!-- snapchat -->
      <a href="#" class="fa fa-snapchat-ghost"></a>

    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <a href="mailto:milosnono@gmail.com"><i class="fa fa-fw fa-envelope"></i>Contact</a>
    © 2022 Copyright:
    <a class="text-white" href="#">Milos DeNovak</a>
  </div>
  <!-- Copyright -->
</footer>

</body>
</html>