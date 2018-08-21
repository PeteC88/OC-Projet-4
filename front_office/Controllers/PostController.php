<?php

class PostController
{
	private $PostModel;

	public function __construct()
	{
		$this->PostModel = new PostModel();
	}


	public function listPosts()
	{
	    $post = $this->PostModel->getPosts(5);

	    require(FRONT_OFFICE_VIEW_PATH . 'listPostsView.php');
	}

	public function listAll()
	{
		$all = $this->PostModel->getPosts();
		
    	require(ADMIN_VIEW_PATH . 'admin.php');
	}

	public function post()
	{	
    	$post = $this->PostModel->getPost($_GET['id']);;
    	
    	if(!empty($post))
    	{
    		
    		$comments = $this->PostModel->getPostComments($_GET['id']);

    		require(FRONT_OFFICE_VIEW_PATH . 'postView.php');
	
    	}
    	else
    	{

    		require('view/front_office/404.html');

    	}
    	
	}
	
	public function about()
	{
		require('view/front_office/about.php');
	} 

}



