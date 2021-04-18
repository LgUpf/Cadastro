<?php

require_once __DIR__.'/../banco_de_dados/conexao.php';

session_start();

class Auth
{
    private static $session_name = '';
    private static $token = null;
    private static $id = null;
    private static $status = false;
    private static $dados = [];

    private static function session()
    {
        global $link;

        if(
            isset($_SESSION[self::$session_name]) and
            isset($_SESSION[self::$session_name]['id']) and
            isset($_SESSION[self::$session_name]['token'])
        )
        {
            self::$id = $_SESSION[self::$session_name]['id'];

            $res = $link->query("SELECT * FROM `session` WHERE `token` = '".$_SESSION[self::$session_name]['token']."' AND `id` = '".$_SESSION[self::$session_name]['id']."' LIMIT 1;");

            if ($res != false)
            {
                self::$status = true;
                return true;
            }

            unset($_SESSION[self::$session_name]);
        }

        unset($_SESSION[self::$session_name]);
        self::$status = false;
        return false;
    }

    public static function login($login, $password)
    {
        if (self::validationLogin($login))
        {
            if (self::validationPassword($password))
            {
                self::$status = true;
                self::createSession();
                return true;
            }
        }

        return false;
    }

    private static function validationLogin($login)
    {
        global $link;
        $res = $link->query("SELECT `id`,`email`,`senha` FROM `usuario` WHERE `email` = '".$login."' LIMIT 1;");

        if($res != false)
        {
            $res = $res->fetch_assoc();

            if ($res["email"] === $login)
            {
                self::$token = $res["senha"];
                self::$id = $res['id'];
                return true;
            }
        }

        return false;
    }

    private static function validationPassword($password)
    {
        if (self::$token !== null)
        {
            $res = password_verify($password, self::$token);
            self::$token = null;
            return $res;
        }

        return false;
    }

    private static function createSession()
    {
        global $link;

        $token = self::randToken();

        $res = $link->query("INSERT INTO `session` (`id`, `id_user`, `token`, `date`) VALUES (NULL, '".self::$id."', '".$token."', '".date('Y-m-d H:i:s')."')");

        $_SESSION[self::$session_name] = [
            "id" => self::$id,
            "token" => $token
        ];

        return;
    }

    private static function randToken()
    {
        return sha1(md5(rand()));
    }

    public static function status()
    {
        self::session();
        self::getDados();
        return self::$status;
    }

    public static function logout()
    {
        global $link;

        if(self::status())
        {
            $res = $link->query('DELETE FROM `session` WHERE `id_user` = "'.self::$id.'";');
        }

        unset($_SESSION[self::$session_name]);
        return;
    }

    private static function getDados()
    {
        global $link;

        if (self::$status == true and self::$dados == [])
        {
            $res = $link->query('SELECT `id`,`nome` FROM `usuario` WHERE `id` = "'.self::$id.'" LIMIT 1;');
            $res = $res->fetch_assoc();
            self::$dados = $res;
            return true;
        }

        return false;
    }

    public static function user()
    {
        return self::$dados;
    }
}
