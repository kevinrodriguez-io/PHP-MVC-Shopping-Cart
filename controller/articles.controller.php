<?php
class ArticlesController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = User::GetAllUsers();
        parent::RenderPage(
            'Articles', 
            'view/shared/dtadmin/layout.php', 
            'view/articles/articles.php',
            $model
        );
    }
    
    public function Edit () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Article(
                $_REQUEST['code'], 
                $_REQUEST['brand'],
                $_REQUEST['description'],
                $_REQUEST['price'],
                $_REQUEST['quantity'],
                $_REQUEST['id']
            );
            $model->Edit();
            parent::RedirectToController('articles');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_REQUEST['id'];
            $model = Article::GetArticleById($id);
            parent::RenderPage(
                'Articles',
                'view/shared/dtadmin/layout.php', 
                'view/articles/edit.php',
                $model
            );
        }
    }

    public function Create () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Article(
                $_REQUEST['code'], 
                $_REQUEST['brand'],
                $_REQUEST['description'],
                $_REQUEST['price'],
                $_REQUEST['quantity']
            );
            $model->Create();
            parent::RedirectToController('articles');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Articles',
                'view/shared/dtadmin/layout.php', 
                'view/articles/create.php'
            );
        }
    }

    public function Delete () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_REQUEST['id'];
            $model = Article::GetArticleById($id);
            $model->Delete();
            parent::RedirectToController('articles');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_REQUEST['id'];
            $model = Article::GetArticleById($id);
            parent::RenderPage(
                'Articles',
                'view/shared/dtadmin/layout.php', 
                'view/articles/delete.php',
                $model
            );
        }
    }

    public function Details () {
        $id = (int)$_REQUEST['id'];
        $model = Article::GetArticleById($id);
        parent::RenderPage(
            'Articles',
            'view/shared/dtadmin/layout.php', 
            'view/articles/details.php',
            $model
        );
    }

}

?>