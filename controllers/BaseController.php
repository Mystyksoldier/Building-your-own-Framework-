<?php

class BaseController {
    public function getBeanById($typeOfBean, $queryStringKey)
    {
        return R::findOne( $typeOfBean, ' id = ? ', [ $queryStringKey ] );
    }

    public function logincheck() {
        if (!isset($_SESSION['user'])) {
            header('location:../user/login');
        }
    }

    public function isLoggedIn() {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    public function logoutbuttom() {
        if (isset($_SESSION['user'])) {
            header('location:../user/logout');
        } else {
            header('location:../user/login');
        }
    }
}

?>