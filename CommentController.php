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

	    if ($affectedLines === false) {
	        //Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	        header('Location: index.php?action=post&id=' . $postId);
	    }
	}

	function reportCommentAction()
	{
	    //au clic du bouton signaler (changer dans la bdd le champs reported comment e le mettre à 1)
	    //recupere l'id du commentaire à modifier (depuis le name du champ du formulaire)
	    $commentId = $_POST['commentId'];
	    $postId = $_POST['postId'];

	    //modifier l'information en base de donnée
	    //mettre la valeur directe comme paramètre à la place de l'attribut $reportedComment
	    //DONNER DES VALEURS AUX PARAMETRES
	    //$commentId comme attribut pour recuperer l'id du commentaire:
	    $this->CommentModel->reportComment(1, $commentId);

	    //ecrire un petit message pour dire que le commentaire a bien été signalé.



	    header('Location: index.php?action=post&id=' . $postId);
	}

	function showReportedComment()
	{
	    $comments = $this->CommentModel->getReportedComments();
	    require('view/frontend/reportedComment.php');
	}

	function removeCommentAction()
	{
	    $id = htmlspecialchars(($_GET['id']));
	    $affectedLines = $this->CommentModel->removeComment($id);

	    if ($affectedLines === false) 
	    {
	        //Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
	        throw new Exception('Impossible de supprimer le commentaire !');
	    }
	        else 
	    {
	        header('Location: index.php?action=showReportedComment');
	    }  
	}
}