<?php
class Posts
{
	protected $errors = [],
			  $id,
			  $title,
			  $content,
			  $creation_date;


	const INVALID_TITLE = 1;
	const INVALID_CONTENT =2;

	public function __construct($values = [])
	{
		if(!empty($values))
		{
			$this->hydrate($values);
		}
	}

	public function hydrate($data)
	{
		foreach ($data as $attribute =>$value)
		{
			$method = 'set'.ucfirst($attribute);

			if(is_callable([$this, $method]))
			{
				$this->$method($value);
			}
		}
	}

	public function isValid()
	{
		return !(empty($this->title)) || empty($this->content);	
	}


	//SETTERS//

	public function setId($id)
	{
		$this->id = (int)$id;
	}

	public function setTitle($title)
	{
		if(!is_string($title) || empty($title))
		{
			$this->errors[] = self::INVALID_TITLE;
		}
		else
		{
			$this->title = $title;
		}
	}

	public function setContent($content)
	{
		if(!is_string($content) || empty($content))
		{
			$this-> $errors = self::INVALID_CONTENT;
		}
		else
		{
			$this->content = $content;
		}
	}

	public function setCreationDate(DateTime $creationDate)
	{
		$this->creation_date = $creationDate;
	}

	//GETTERS//

	public function errors()
	{
		return $this->errors;
	}

	public function id()
	{
		return $this->id;
	}

	public function title()
	{
		return $this->title;
	}

	public function content()
	{
		return $this->content;
	}

	public function creation_date()
	{
		return $this->creation_date;
	}
	
}

