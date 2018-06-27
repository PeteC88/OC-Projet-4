<?php

Class CommentModel extends DbConnect 
{

	public function getReportedComments()
	{
	    $comments = $this->dbConnect()->prepare('SELECT id, author, comment, post_id, reported_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE reported_comment = 1 ORDER BY comment_date DESC');
	    
	    $comments->execute(array());

	    return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
	    $comments = $this->dbConnect()->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())');
	    $affectedLines = $comments->execute(array(
	    	
	    	':post_id' => (int) $postId, 
	    	':author' => $author, 
	    	':comment' => $comment
	    ));

	    return $affectedLines;
	}

	public function reportComment($reportedComment, $id)
	{

	    $reportComment = $this->dbConnect()->prepare('UPDATE comments SET reported_comment = :reported_comment WHERE id = :id');
	    $affectedLines = $reportComment->execute(array(
	                    ':reported_comment' => $reportedComment,
	                    ':id' => $id
	                ));

	    return $affectedLines;
	}

	function removeComment($id)
	{
	    $removeComment = $this->dbConnect()->prepare('DELETE FROM comments WHERE id = :id');
	    $affectedLines = $removeComment->execute(array(':id' => $id));
	}
}