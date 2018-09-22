<?php
require_once("post.php");

class PostManager extends Post{

    public function getPosts($page, $finBillets)
    {

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT :first, :seconde');

        $first = $page ;
        $seconde = $finBillets ;
        
        $req ->bindValue(':first', $first, PDO::PARAM_INT);
        $req ->bindValue(':seconde', $seconde, PDO::PARAM_INT);
        $req->execute();
        return $req;
    }

    public function getpage()
    {

        $db = $this->dbConnect();
        $page = $db->query('SELECT COUNT(*) AS nb_billets FROM posts');
      
        return $page;
    }

     public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
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

    public function getComments($postId, $flag)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? && flag=? ORDER BY comment_date DESC');
        $comments->execute(array($postId, $flag));

        return $comments;
    }

    public function getRepComments($flag)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE flag=? ORDER BY comment_date DESC');
        $comments->execute(array($flag));

        return $comments;
    }

    public function postComment($author, $comment, $postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, flag) VALUES(?, ?, ?, NOW(), "1")');
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

    public function reportComment($commentId, $flag){

        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET flag=? WHERE  id=?');
        $delete = $comments->execute(array($flag, $commentId));
        
        return $delete;
    }
}

