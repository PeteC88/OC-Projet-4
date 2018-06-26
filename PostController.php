<?php

class PostController
{
	private $PostModel;

	public function __construct()
	{
		$this->PostModel = new PostModel();
	}

	function listPosts()
	{
	    $post = $this->PostModel->getPosts(5);

	    require('view/frontend/listPostsView.php');
	}

	function listAll()
	{
		$all = $this->PostModel->getPosts();
    	require('view/frontend/admin.php');
	}

	function post()
	{
    	$post = $this->getPost($_GET['id']);
    	$comments = $this->getComments($_GET['id']);

    	require('view/frontend/postView.php');
	}

	function addPostAction()
	{
	    if(empty($_POST))
	    {
	        require('view/frontend/addpost.php');
	    } 
	    else
	    {
	        $titre = $_POST['titre'];
	        $texte = $_POST['texte'];
	        

	        $affectedLines = $this->addPost($titre, $texte);

	        if ($affectedLines === false) {
	            //Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
	            throw new Exception('Impossible d\'ajouter le commentaire !');
	        }
	        else {
	            header('Location: index.php?action=all');
	        }
	     }

	}

	function editPostAction()
	{   
	    //affichage du formulaire prerempli
	    if(empty($_POST))
	    {
	        //creer les variables que je vais afficher dans le formulaire
	        $post = $this->getPost($_GET['id']);
	        //test pour verifier si l'article existe ou pas.
	        if($post)
	        {
	            require('view/connection/editpost.php');
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
	    

	         $affectedLines = editPost($title, $content, $id);

	        if ($affectedLines === false) 
	        {
	        //Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
	        throw new Exception('Impossible de modifier le billet !');
	        }
	        else 
	        {
	            header('Location: index.php?action=all');
	        }
	    }
	}

	function removePostAction()
	{

	    $id = htmlspecialchars($_GET['id']);

	    $affectedLines = $this->removePost($id);

	    if ($affectedLines === false) 
	    {
	        //Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
	        throw new Exception('Impossible de supprimer le billet !');
	    }
	        else 
	    {
	        header('Location: index.php?action=all');
	    }  
	}
}



