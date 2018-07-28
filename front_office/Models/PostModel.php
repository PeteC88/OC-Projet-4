<?php 

Class PostModel extends DbConnect
{

    public function getPosts()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC';

        $req = $this->dbConnect()->query($sql);
        $data =$req->fetchAll();
        return $data;
    }

    public function getPostComments($postId)
    {
        $comments = $this->dbConnect()->prepare('SELECT id, author, comment, post_id, reported_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = :postId ORDER BY comment_date DESC');


        $comments->bindValue(':postId', (int) $postId);
        $comments->execute();

        $data = $comments->fetchAll();

        return $data;
    }

    public function getPost($id)
    {
        $req = $this->dbConnect()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = :id');

        $req->bindValue(':id', (int) $id);
        $req->execute();

        $post = $req->fetch();
        
        return $post;
    }

    public function addPost($title, $content)
    {

        $addPost = $this->dbConnect()->prepare('INSERT INTO posts(title, content, creation_date) VALUES(:title, :content, NOW())');

        $addPost->bindValue(':title', $title);
        $addPost->bindValue(':content', $content);

        $affectedLines = $addPost->execute();


        //$addPost = $this->dbConnect()->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');

        //$affectedLines = $addPost->execute(array($post->title(), $post->content()));

        //return $affectedLines;
    }
    
    public function editPost($title, $content, $id)
    {
        
        $editPost = $this->dbConnect()->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $affectedLines = $editPost->execute(array(
                        ':title' => $title,
                        ':content' => $content,
                        ':id' => $id
                    ));

        return $affectedLines;
    }

    function removePost($id)
    {
        //faire une requete delete (TRUE AND FALSE Pour les commentaires signalés et nouveau champs dans la base commentaires):
        $removePost = $this->dbConnect()->prepare('DELETE FROM posts WHERE id = :id');
        $affectedLines = $removePost->execute(array( ':id' => $id));
    }

}