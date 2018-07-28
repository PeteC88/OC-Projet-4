<?php

class PostController
{
	private $PostModel;
	//private $CommentModel;

	public function __construct()
	{
		$this->PostModel = new PostModel();
	}


	function listPosts()
	{
	    $post = $this->PostModel->getPosts(5);

	    require(FRONT_OFFICE_VIEW_PATH . 'listPostsView.php');
	}

	function listAll()
	{
		$all = $this->PostModel->getPosts();
		
    	require(ADMIN_VIEW_PATH . 'admin.php');
	}

	function post()
	{	
    	$post = $this->PostModel->getPost($_GET['id']);
    	$comments = $this->PostModel->getPostComments($_GET['id']);

    	require(FRONT_OFFICE_VIEW_PATH . 'postView.php');
	}

}



