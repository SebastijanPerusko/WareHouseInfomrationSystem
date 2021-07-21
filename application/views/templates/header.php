<html>
        <head>
                <title>CodeIgniter Tutorial</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/create.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

        </head>
        <body class = "bg-light">

<a href="<?php echo site_url('pages/view/home'); ?>">Home</a>
<a href="<?php echo site_url('pages/view/about'); ?>">About</a>
<a href="<?php echo site_url('news/index'); ?>">News</a>
<a href="<?php echo site_url('news/create'); ?>">Create News</a>
<a href="<?php echo site_url('user_authentication/profile'); ?>">Admin</a>
<a href="<?php echo site_url('user_authentication/signin'); ?>">Signin</a>
<a style = "float:right;" href="<?php echo site_url('user_authentication/logout'); ?>">Logout</a>

<nav aria-label="Eighth navbar example" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
                <a class="navbar-brand" href="<?php echo site_url('pages/view/home'); ?>">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
        </div>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('pages/view/about'); ?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('news/index'); ?>">List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('news/create'); ?>">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('user_authentication/profile'); ?>">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('user_authentication/signin'); ?>">Singin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('user_authentication/logout'); ?>">Logout</a>
          </li>
        </ul>

  </nav>





<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/edit/news_title_1-->
<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/pages/view/home-->
<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/index-->





