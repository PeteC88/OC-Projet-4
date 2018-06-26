<?php

Class CommentModel extends DbConnect 
{
	public function getComments($postId)
	{
	    $comments = $this->db->prepare('SELECT id, author, comment, post_id, reported_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
	    $comments->execute(array($postId->postId()));

	    return $comments;
	}

	public function getReportedComments()
	{
	    $comments = $this->db->prepare('SELECT id, author, comment, post_id, reported_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE reported_comment = 1 ORDER BY comment_date DESC');
	    
	    $comments->execute(array());

	    return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
	    $comments = $this->db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($postId->postId(), $author->author(), $comment->comment()));

	    return $affectedLines;
	}

	public function reportComment($reportedComment, $id)
	{

	    $reportComment = $this->db->prepare('UPDATE comments SET reported_comment = :reported_comment WHERE id = :id');
	    $affectedLines = $reportComment->execute(array(
	                    ':reported_comment' => $reportedComment,
	                    ':id' => $id
	                ));

	    return $affectedLines;
	}

	function removeComment($id)
	{
	    $removeComment = $this->db->prepare('DELETE FROM comments WHERE id = :id');
	    $affectedLines = $removeComment->execute(array(':id' => $id));
	}
}