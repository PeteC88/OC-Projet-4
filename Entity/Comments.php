<?php
class Comments
{
	protected $errors = [],
			  $id,
			  $post_id,
			  $author,
			  $comment,
			  $comment_date,
			  $reported_comment;

	const INVALID_AUTHOR = 1;
	const INVALID_TITLE = 2;
	const INVALID_COMMENT = 3;

	public function __construct($values = [])
	{
		if(!empty($values))
		{
			$this->hydrate($values)
		}
	}

	public function hydrate($data)
	{
		foreach ($data as $attribute => $value) 
		{
			$method = 'set'.ucfirst($attribute);

			if(is_callable([$this->, $method]))
			{
				$this->$method($value);
			}
		}
	}

	//SETTERS// 

	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function setPostId($postId)
	{
		$this->post_id = (int) $postId;
	}

	public function setAuthor($author)
	{
		if(!is_string($author) || empty($author))
		{
			$this->errors = self::INVALID_AUTHOR;
		}
		else
		{
			$this->author = $author;
		}
	}

	public function setComment($comment)
	{
		if(!is_string($comment) || empty($comment))
		{
			$this->errors[] = self::INVALID_COMMENT;
		}
		else
		{
			$this->comment = $comment;
		}
	}

	public function setCommentDate($commentDate)
	{
		this->comment_date = $commentDate;
	} 

	public function setReportedComment($reportedComment)
	{
		$this->reported_comment = $reportedComment;
	}


	//GETTERS //

	public function errors()
	{
		return $this->errors;
	}

	public function id()
	{
		return $this->id;
	}

	public function postId()
	{
		return $this->post_id;
	}

	public function author()
	{
		return $this->author;
	}

	public function comment()
	{
		return $this->comment;
	}

	public function commentDate()
	{
		return $this->comment_date;
	}

	public function reportedComment()
	{
		return $this->reported_comment;
	}
}