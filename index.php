<?php

CONST ADMIN_VIEW_PATH = 'view/back_office/admin/';
CONST CONNECTION_VIEW_PATH = 'view/back_office/connection/';
CONST FRONT_OFFICE_VIEW_PATH = 'view/front_office/';

require'lib/autoload.php';


$PostController = new PostController(); 
$AdminPostController = new AdminPostController();
$CommentController = new CommentController();
$AdminCommentController = new AdminCommentController();



try 
{
    if (isset($_GET['action'])) 
    {
        if(substr($_GET['action'], 0,5) == 'admin')
        {
            $sessionAdmin = new SessionAdmin;
            
            if($sessionAdmin->isConnected() == false)
            {
                header('Location: index.php?action=userConnect');
                exit;
            }

        }

        if ($_GET['action'] == 'listPosts') 
        {
            $PostController->listPosts();
        }
        elseif($_GET['action'] == 'adminAll')
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
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'adminAddPost') //Mettere un prefisso tipo AdminAddpost //
        {
            if(empty($_POST['title']) && empty($_POST['content']))
            {
                $AdminPostController->addPostAction();
            }
        }
        elseif($_GET['action'] == 'adminEditPost')
        {
                $AdminPostController->editPostAction();  
        }
        elseif($_GET['action'] == 'adminRemovePost')
        {
                $AdminPostController->removePostAction();  
        }
        elseif($_GET['action'] == 'reportComment')
        //if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $CommentController->reportCommentAction();
        }
        elseif($_GET['action'] == 'adminShowReportedComment')
        {
                $CommentController->showReportedComment();
        }
        elseif ($_GET['action'] == 'adminRemoveComment') 
        {
            $AdminCommentController->removeCommentAction();
        }
        elseif($_GET['action'] == 'adminUserDeconnect')//mettere il prefisso ADMIN per tutte le azioni admin
        {
            $adminUserController = new AdminUserController();
            $adminUserController->signOut();
        }
        elseif($_GET['action'] == 'userConnect')//mettere il prefisso ADMIN per tutte le azioni admin
        {
            $adminUserController = new AdminUserController();
            $adminUserController->signIn();
        }

    }
    else 
        {
            $PostController->listPosts();
        }
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}
