<?php

Class AdminCommentController
{
	private $CommentModel;

	public function __construct()
	{
		$this->CommentModel = new CommentModel();
	}

	function removeCommentAction()
	{
	    $id = htmlspecialchars(($_GET['id']));
	    $affectedLines = $this->CommentModel->removeComment($id);

	    if ($affectedLines === false) 
	    {
	        //Error managed. It will be up to the router's try block and the error will be displayed in a new page!
	        throw new Exception('Impossible de supprimer le commentaire !');
	    }
	        else 
	    {
	    	if(isset($_GET['postId']))
	    	{
	    		header('Location: index.php?action=post&id=' . $_GET['postId']);
	    		exit(); // exit will stop the script
	    	}
	    	 else
	        {
	        	header('Location: index.php?action=adminShowReportedComment');
	        exit();
	    	}  
		}
	}
}

?>