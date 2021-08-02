<html>
<head>
  <title>Space</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/create.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>
<body class = "bg-light">

  <nav aria-label="Eighth navbar example" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo site_url('news/home'); ?>">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active text-primary fw-bold border border-primary rounded m-1" aria-current="page" href="<?php echo site_url('news/index'); ?>">Explore</a>
      </li>
      <?php 
      if(isset($_SESSION['logged_in'])){
        $add_log = site_url('news/create');
        echo '<li class="nav-item"><a class="nav-link active text-primary fw-bold border border-primary rounded m-1" aria-current="page" href="'.$add_log.'">List your space</a></li>';
      }
      ?>

      <?php 
      if(isset($_SESSION['logged_in'])){
        $add_log = site_url('user_authentication/profile');
        echo ' <li class="nav-item"><a class="nav-link active text-primary fw-bold border border-primary rounded m-1" aria-current="page" href="'.$add_log.'">Profile</a></li>';
      }
      ?>

      <?php 
      if(!isset($_SESSION['logged_in'])){
        $add = site_url('user_authentication/signin');
        echo '<li class="nav-item"><a class="nav-link active text-primary fw-bold border border-primary rounded m-1" aria-current="page" href="'.$add.'">Singin</a></li>';
      }
      ?>

      <?php 
      if(isset($_SESSION['logged_in'])){
        $add_log_out = site_url('user_authentication/logout');
        echo '<li class="nav-item"><a class="nav-link active text-primary border border-primary rounded m-1" aria-current="page" href="'.$add_log_out.'">Logout</a></li>';
      }
      ?>
    </ul>

  </nav>





  <!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/edit/news_title_1-->
  <!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/pages/view/home-->
  <!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/index-->





