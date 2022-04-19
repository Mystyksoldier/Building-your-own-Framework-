<?php

require_once "BaseController.php";

class kitchenController extends BaseController {

function index()
{
    $isLoggedIn = $this->isLoggedIn();
    echo render('kitchen', 'index.html', [ 'kitchens' => R::findAll('kitchen'), 'isLoggedIn' => $isLoggedIn ]);
}


function show()
{
    $isLoggedIn = $this->isLoggedIn();
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        error('error', 404, "no recipe id specified");
    }
    $id = $_GET['id'];
    $kitchen = $this->getBeanById('kitchen', $id);
    if (is_null($kitchen)) {
        error('error', 404, "no kitchen with ID $id found");
    } else {
        render('kitchen', 'show.html', ['kitchen' => $kitchen, 'isLoggedIn' => $isLoggedIn ]);
    }
    }

        function create()
    {
        $isLoggedIn = $this->isLoggedIn();
        $logincheck = $this->logincheck();
        render('kitchen', 'create.html', ['recipes' => R::findAll('recipes'), 'isLoggedIn' => $isLoggedIn ]);
    }

    function createPost()
    {
        $logincheck = $this->logincheck();
        $kitchen = R::dispense( 'kitchen' );
        $kitchen->title = $_POST['titel'];
        $kitchen->description = $_POST['Omschrijving'];
        $kitchen->recipe = $this->getBeanById('recipes', $_POST['recipe']);
        R::store($kitchen);
        header('Location:index');
    }

    function edit()
    {
        $isLoggedIn = $this->isLoggedIn();
        $logincheck = $this->logincheck();
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            error('error', 404, "no recipe id specified");
        }
        $id = $_GET['id'];
        $kitchen = $this->getBeanById('kitchen', $id);
        if (is_null($kitchen)) {
            error('error', 404, "no kitchen with ID $id found");
        } else {
            render('kitchen', 'edit.html', ['kitchen' => $kitchen,
            'recipes' => R::findAll('recipes'), 'isLoggedIn' => $isLoggedIn ]);
        }
    }

    function editPost()
    {
        $logincheck = $this->logincheck();
        $id = $_GET['id'];
        $kitchen = $this->getBeanById('kitchen', $id);
        $kitchen->title = $_POST['titel'];
        $kitchen->description = $_POST['Omschrijving'];
        $kitchen->recipe_id = $_POST['recipe'];
        R::store($kitchen);
        header('Location:index');
    }
}





