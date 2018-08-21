<?php

Class AdminPostController
{
	protected $PostModel;
	//private $CommentModel;

	public function __construct()
	{
		$this->PostModel = new PostModel();
	}
	
    function adminPost()
	{	
    	$post = $this->PostModel->getPost($_GET['id']);
    	$comments = $this->PostModel->getPostComments($_GET['id']);

    	require(ADMIN_VIEW_PATH . 'adminPostView.php');
	}
    
	function addPostAction()
		{
			$sessionAdmin = new SessionAdmin();
			if($sessionAdmin->isConnected() == false)
			{
				header('Location: index.php?action=adminUserConnect');
			}

		    if(empty($_POST))
		    {
		        require(ADMIN_VIEW_PATH . 'addpost.php');
		    } 
		    else
		    {
		        $titre = htmlspecialchars($_POST['titre']);
		        $texte = ($_POST['texte']);
		        //cambiare con testo inglese in $_POST['titre'] e $_POST['texte']

		        $affectedLines = $this->PostModel->addPost($titre, $texte);

		        if ($affectedLines === false) {
		            //Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
		            throw new Exception('Impossible d\'ajouter le commentaire !');
		        }
		        else {
		            header('Location: index.php?action=adminAll');
		        }
		     }

		}

	function editPostAction()
	{   
	    //affichage du formulaire prerempli
	    if(empty($_POST))
	    {
	        //creer les variables que je vais afficher dans le formulaire
	        $post = $this->PostModel->getPost($_GET['id']);
	        //test pour verifier si l'article existe ou pas.
	        if($post)
	        {
	            require(ADMIN_VIEW_PATH . 'editpost.php');
	        }
	        else
	        {
	            throw new Exception('Ce billet n\'existe pas !');
	        }
	    }
	    else
	    {
	        $title = $_POST['title'];
	        $content = $_POST['content'];
	        $id = $_POST['id'];
	    

	         $affectedLines = $this->PostModel->editPost($title, $content, $id);

	        if ($affectedLines === false) 
	        {
	        //Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
	        throw new Exception('Impossible de modifier le billet !');
	        }
	        else 
	        {
	            header('Location: index.php?action=adminAll');
	        }
	    }
	}

	function removePostAction()
	{

	    $id = htmlspecialchars($_GET['id']);

	    $affectedLines = $this->PostModel->removePost($id);

	    if ($affectedLines === false) 
	    {
	        throw new Exception('Impossible de supprimer le billet !');
	    }
	        else 
	    {
	        header('Location: index.php?action=adminAll');
	    }  
	}
}