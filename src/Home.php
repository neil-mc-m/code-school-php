<?php

namespace App;

class Home
{
    public function home()
    {
        $headView = new View('./views/partials/head.html.php');
        $headView->title = 'Homepage | Neils recipes';

        $navView = new View('./views/partials/nav.html.php');

        $mainView = new View('./views/home.html.php');

        $footerView = new View('./views//partials/footer.html.php');

        $connection = (new DatabaseConnection())->getConnection();
        $stmt = $connection->prepare('select * from recipes');
        $stmt->execute();
        $recipes = $stmt->get_result();
        if ($recipes->num_rows > 0) {
            $mainView->recipes = $recipes;
        }

        echo $headView->render();
        echo $navView->render();
        echo $mainView->render();
        echo $footerView->render();
    }

    public function faq()
    {
        $view = new View('./views/partials/head.html.php');
        $view->title = 'FAQ';
        echo $view->render();

        $view = new View('./views/partials/nav.html.php');
        echo $view->render();

        $view = new View('./views/faq.html.php');
        $view->content = 'The FAQ content';
        echo $view->render();
    }

    public function recipeList()
    {
        $headView = new View('./views/partials/head.html.php');
        $headView->title = 'Recipe list | Neils recipes';

        $navView = new View('./views/partials/nav.html.php');
        $mainView = new View('./views/recipes.html.php');
        $footerView = new View('./views//partials/footer.html.php');

        $connection = (new DatabaseConnection())->getConnection();
        $stmt = $connection->prepare('select * from recipes');
        $stmt->execute();
        $recipes = $stmt->get_result();
        if ($recipes->num_rows > 0) {
            $mainView->recipes = $recipes;
        }

        echo $headView->render();
        echo $navView->render();
        echo $mainView->render();
        echo $footerView->render();
    }

    public function productById($id)
    {
        $view = new View('./views/partials/head.html.php');
        $view->title = 'Product ID page';
        echo $view->render();

        $view = new View('./views/partials/nav.html.php');
        echo $view->render();

        $view = new View('./views/product_item.html.php');
        $view->content = "This is the product with an id of $id";
        echo $view->render();
    }

    public function login()
    {
        session_start();
        var_dump($_POST);
        $_SESSION['loggedin'] = $_POST['loggedInName'];
        var_dump($_SESSION);
    }
}
