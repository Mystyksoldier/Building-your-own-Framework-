<?php
require_once "BaseController.php";

class UserController extends BaseController {


    function login()
    {
        render('user', 'login.html', ['users' => R::findAll('user'), 'error' => ('wrong password')]);
    }

    function loginPost()
    {
        $user = R::findOne('user', ' name = ? ', [$_POST['name']]);
        if (is_null($user)) {
            error('error', 404, "no user with name " . $_POST['name'] . " found");
        } else {
            if (password_verify($_POST['password'], $user->password)) {
                $_SESSION['user'] = $user;
                header('location:../recipe/index');
            } else {
                error('error', 404, "wrong password");
                }
            }
        }

    function logout()
    {
        session_destroy();
        header('location:../recipe/index');
    }

}

?>