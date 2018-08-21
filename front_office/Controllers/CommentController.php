<?php

class CommentController
{
	private $CommentModel;

	public function __construct()
	{
		$this->CommentModel = new CommentModel();
	}

	function addComment($postId, $author, $comment)
	{
	    $affectedLines = $this->CommentModel->postComment($postId, $author, $comment);

	    if ($affectedLines === false) 
	    {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	        header('Location: index.php?action=post&id=' . $postId);
	        exit();
	    }
	}
	
	function reportCommentAction()
	{
	    $commentId = $_POST['commentId'];
	    $postId = $_POST['postId'];

	  
	    //when you click on the button it will modify the value reported comment of the db.
	    $this->CommentModel->reportComment(1, $commentId);


	    header('Location: index.php?action=post&id=' . $postId);
	    exit();
	}

	function showReportedComment()
	{
	    $comments = $this->CommentModel->getReportedComments();
	    require(ADMIN_VIEW_PATH . 'reportedComment.php');
	}

}