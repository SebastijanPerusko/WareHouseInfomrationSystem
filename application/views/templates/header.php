<html>
        <head>
                <title>CodeIgniter Tutorial</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/create.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">

        </head>
        <body>

<a href="<?php echo site_url('pages/view/home'); ?>">Home</a>
<a href="<?php echo site_url('pages/view/about'); ?>">About</a>
<a href="<?php echo site_url('news/index'); ?>">News</a>
<a href="<?php echo site_url('news/create'); ?>">Create News</a>
<a href="<?php echo site_url('user_authentication/profile'); ?>">Admin</a>
<a href="<?php echo site_url('user_authentication/signin'); ?>">Signin</a>
<a style = "float:right;" href="<?php echo site_url('user_authentication/logout'); ?>">Logout</a>
<h1><?php if(isset($title))echo $title; ?></h1>





<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/edit/news_title_1-->
<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/pages/view/home-->
<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/index-->