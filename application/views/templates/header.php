<html>
        <head>
                <title>CodeIgniter Tutorial</title>


<link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url(); ?>css/style.css">

        </head>
        <body>

<a href="<?php echo site_url('pages/view/home'); ?>">Home</a>
<a href="<?php echo site_url('pages/view/about'); ?>">About</a>
<a href="<?php echo site_url('news/index'); ?>">News</a>
<a href="<?php echo site_url('news/create'); ?>">Create News</a>
<a href="<?php echo site_url('user_authentication/admin'); ?>">Admin</a>
<a href="<?php echo site_url('user_authentication/signin'); ?>">Signin</a>
<a style = "float:right;" href="<?php echo site_url('user_authentication/logout'); ?>">Logout</a>
<h1><?php if(isset($title))echo $title; ?></h1>





<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/edit/news_title_1-->
<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/pages/view/home-->
<!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/index-->