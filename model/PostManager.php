<?php
class PostManager{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function addPost($author, $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $addPost = $req->execute(array($author, $post));

        return $addPost;
    }

    public function delPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id=?');
        $delete = $req->execute(array($postId));

        return $delete;
    }

    public function upPost($postContent, $postTitle, $postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET content=?, title=? WHERE id=?');
        $delete = $req->execute(array($postContent,$postTitle, $postId));

        return $delete;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($author, $comment, $postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function delComment($commentId){
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id=?');
        $delete = $comments->execute(array($commentId));

        return $delete;
    }

    public function delComments($postId){
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE post_id=?');
        $delete = $comments->execute(array($postId));

        return $delete;
    }

    // Nouvelle fonction qui nous permet d'éviter de répéter du code
    public function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

}

