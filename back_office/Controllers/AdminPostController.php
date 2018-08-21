<?php

Class AdminPostController
{
	protected $PostModel;

	public function __construct()
	{
		$this->PostModel = new PostModel();
	}
	
    public function adminPost()
	{	
    	$post = $this->PostModel->getPost($_GET['id']);;
    	
    	if(!empty($post))
    	{
    		
    		$comments = $this->PostModel->getPostComments($_GET['id']);

    	require(ADMIN_VIEW_PATH . 'adminPostView.php');
    	}
    	else
    	{
    		header('Location: view/front_office/404.html');

    	}
    	
	}
    
	public function addPostAction()
		{
			$sessionAdmin = new SessionAdmin();
			if($sessionAdmin->isConnected() == false)
			{
				header('Location: index.php?action=adminUserConnect');
				exit();
			}

		    if(empty($_POST))
		    {
		        require(ADMIN_VIEW_PATH . 'addpost.php');
		    } 
		    else
		    {
		        $titre = htmlspecialchars($_POST['titre']);
		        $texte = ($_POST['texte']);

		        $affectedLines = $this->PostModel->addPost($titre, $texte);

		        if ($affectedLines === false) {
		            throw new Exception('Impossible d\'ajouter le commentaire !');
		        }
		        else {
		            header('Location: index.php?action=adminAll');
		            exit();
		        }
		     }

		}

	public function editPostAction()
	{   
	    //This function will display the pre-filled form.
	    if(empty($_POST))
	    {
	        //get the id of the post
	        $post = $this->PostModel->getPost($_GET['id']);
	        //test to verify if the post exist.
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
	        	throw new Exception('Impossible de modifier le billet !');
	        }
	        else 
	        {
	            header('Location: index.php?action=adminAll');
	            exit();
	        }
	    }
	}

	public function removePostAction()
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
	        exit();
	    }  
	}
}