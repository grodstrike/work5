<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$page['name']?></title>
	<link rel="stylesheet/less" type="text/css" href="/css/styles.less" />

	<script src="https://kit.fontawesome.com/b69ec444b5.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="/js/ajax-form.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.3/less.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Work</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/"><i class="fas fa-home"></i> Главная</a>
      </li>
     

	  <?php if (Auth\User::isAuthorized()):?>
       <li class="nav-item">
        <a class="nav-link" href="/user"><i class="fas fa-user"></i> Личный кабинет</a>
      </li>
		<li class="nav-item">
		
		<form class="ajax" method="post" action="./ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit"  style="background-color: #007bff00; color: rgba(0,0,0,.5);    border-color: #ffffff00;"><i class="fas fa-sign-out-alt"></i> Выйти</button>
          </div>
      </form>
		
        
      </li>
	  <?php 
	  
	  else:
	  
	  ?>
        
      <li class="nav-item">
        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Авторизация</a>
      </li>
	<?php endif;?>
    </ul>
  </div>
</nav>
<body>