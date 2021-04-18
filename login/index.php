<?php
require_once __DIR__ . "../../config.php";
require_once __DIR__.'/auth.php';

if (Auth::status())
{
  header("Location: ../consultas.php");
  exit();
}

$res = [];

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

  if ($email === false)
  {
    array_push($res, "O Campo E-mail é invalido!");
  }

  if (strlen($pass) > 0)
  {
    array_push($res, "O Campo Password é invalido!");
  }

  if(count($res) > 0)
  {
    if (Auth::login($email, $pass))
    {
      header("Location: ../index.php");
    }
    else
    {
      array_push($res, "Usuario ou/e senha invalido/s!");
    }
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin Template · Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form method="POST" action="index.php" class="form-signin">
      <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <?php if(count($res) != 0) { 
        echo('<div class="alert alert-danger">');
        foreach($res as $index)
        {
          echo('<p>'.$index.'</p>');
        }
        echo('</div>');
      } ?>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
    </form>
  </body>
</html>
