<?php
require_once __DIR__ . "/config.php";
require_once __DIR__.'/login/auth.php';

if (Auth::status())
{
    Auth::logout();
}

header("Location: login/index.php");
exit();
