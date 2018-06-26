<?php 

include('lib/DbConnect.php');

Class PostModel extends DbConnect
{
    private $db;
    
    /*public function __construct()
    {
        $this->db = (new DbConnect())->dbConnect();
    }*/

    /*
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }*/

    public function getPosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC';

        $req = $this->dbConnect()->query($sql);
        $data =$req->fetchAll();
        return $data;
    }

    public function getPost($postId)
    {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId->postId()));
        $post = $req->fetch();

        return $post;
    }

    public function addPost(Posts $post)
    {
        $addPost = $this->db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $addPost->execute(array($post->title(), $post->content()));

        return $affectedLines;
    }
    
    public function editPost(Post $post)
    {
        
        $editPost = $this->db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $affectedLines = $editPost->execute(array(
                        ':title' => $post->title(),
                        ':content' => $post->content(),
                        ':id' => $post->id()
                    ));

        return $affectedLines;
    }

    function removePost($id)
    {
        //faire une requete delete (TRUE AND FALSE Pour les commentaires signalés et nouveau champs dans la base commentaires):
        $removePost = $this->db->prepare('DELETE FROM posts WHERE id = :id');
        $affectedLines = $removePost->execute(array( ':id' => $id->id()));
    }

}