<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();
require_once './classes/Auth.class.php';

?>

    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
    
      <h1>Вы уже зарегистрированы!</h1>

      <form class="ajax" method="post" action="./ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit">Выйти</button>
          </div>
      </form>

      <?php else: ?>

      <form class="form-signin ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Регистрация</h2>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-user icon"></i></span>
        </div>
      <input type="text" class="form-control" name='username' placeholder="Логин" aria-label="Username" aria-describedby="basic-addon1" autofocus>
    </div>
     <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope icon"></i></span>
        </div>
      <input type="email" class="form-control" name='email' placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" autofocus>
    </div>
             <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-key icon"></i></span>
        </div>
      <input type="password" class="form-control" name='password1' placeholder="Пароль" aria-label="Username" aria-describedby="basic-addon1" autofocus>
    </div>
              <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-key icon"></i></span>
        </div>
      <input type="password" class="form-control" name='password2' placeholder="Подвердить пароль" aria-label="Username" aria-describedby="basic-addon1" autofocus>
    </div>
    <div class="input-group mb-3">
         <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-key icon"></i></span>
        </div>
      <input type="text" class="form-control" name='fio' placeholder="ФИО" aria-label="Username" aria-describedby="basic-addon1" autofocus>
    </div>            
       
       
       
        <input type="hidden" name="act" value="register">
        <button class="btn btn-large btn-primary" type="submit">Регистрация</button>
        <div class="alert alert-info" style="margin-top:15px;">
            <p>Уже есть аккаунт? <a href="/">Войти.</a>
        </div>
      </form>

      <?php endif; ?>

    </div> <!-- /container -->

    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>

  </body>
</html>
