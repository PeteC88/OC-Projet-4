
<?php

require('lib/autoload.php');
//require('DbConnect.php');

//$db = DbConnect::dbConnect();
$PostController = new PostController(); 
$CommentController = new CommentController();

try 
{
    if (isset($_GET['action'])) 
    {
        if ($_GET['action'] == 'listPosts') 
        {
            $PostController->listPosts();
        }
        elseif($_GET['action'] == 'all')
        {
            $PostController->listAll();
         }
        elseif ($_GET['action'] == 'post') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                $PostController->post();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                {
                    $CommentController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else 
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                else 
                {
                throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
        }
        elseif ($_GET['action'] == 'addPost') 
        {
            if(empty($_POST['title']) && empty($_POST['content']))
            {
                $PostController->addPostAction();
            }
        }
        elseif($_GET['action'] == 'editPost')
        {
                $PostController->editPostAction();  
        }
        elseif($_GET['action'] == 'removePost')
        {
                $PostController->removePostAction();  
        }
        elseif($_GET['action'] == 'reportComment')
        //if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $CommentController->reportCommentAction();
        }
        elseif($_GET['action'] == 'showReportedComment')
        {
                $CommentController->showReportedComment();
        }
        elseif ($_GET['action'] == 'removeComment') 
        {
            $CommentController->removeCommentAction();
        }
        else 
        {
        $PostController->listPosts();
        }
    }
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}
