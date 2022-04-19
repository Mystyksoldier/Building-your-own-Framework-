<?php
require_once "BaseController.php";

class RecipeController extends BaseController {

    const TYPES = ['breakfast', 'lunch', 'dinner'];

    const LEVELS = ['easy', 'medium', 'hard'];

    function index()
    {
        $isLoggedIn = $this->isLoggedIn();
        render('recipe', 'index.html', ['recipes' => R::findAll('recipes'), 'isLoggedIn' => $isLoggedIn ]);
    }

    function show()
    {
        $isLoggedIn = $this->isLoggedIn();
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            error('error', 404, "no recipe id specified");
        }
        $id = $_GET['id'];
        $recipes = $this->getBeanById('recipes', $id);
        if (is_null($recipes)) {
            error('error', 404, "no recipes with ID $id found");
        } else {
            render('recipe', 'show.html', ['recipes' => $recipes, 'isLoggedIn' => $isLoggedIn ]);
        }
    }

    function create()
    {
        $isLoggedIn = $this->isLoggedIn();
        $logincheck = $this->logincheck();
            render('recipe', 'create.html', [
                'recipes' => R::findAll('recipes'),
                'isLoggedIn' => $isLoggedIn,
                'types' => self::TYPES,
                'levels' => self::LEVELS
            ]);
    }

    function createPost()
    {
        $logincheck = $this->logincheck();
        $recipe = R::dispense( 'recipes' );
        $recipe->name = $_POST['titel'];
        $recipe->type = $_POST['type'];
        $recipe->level = $_POST['level'];
        R::store($recipe);
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
        $recipe = $this->getBeanById('recipes', $id);
        if (is_null($recipe)) {
            error('error', 404, "no recipe with ID $id found");
        } else {
            render('recipe', 'edit.html', ['recipe' => $recipe,
            'isLoggedIn' => $isLoggedIn,
            'types' => self::TYPES,
            'levels' => self::LEVELS
            ]);
        }
    }

    function editPost()
    {
        $logincheck = $this->logincheck();
        $id = $_GET['id'];
        $recipes = $this->getBeanById('recipes', $id);
        $recipes->name = $_POST['name'];
        $recipes->type = $_POST['type'];
        $recipes->level = $_POST['level'];
        R::store($recipes);
        header('Location:index');
    }
}






