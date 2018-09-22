<?php

// OBTENIR LA PAGE D UN BILLET
function aPost($id){
	$postManager = new PostManager();
	$post = $postManager->getPost($id);
    $comments = $postManager->getComments($id, "1");

    require('./view/backend/postView.php');
}

function repComment(){
	$postManager = new PostManager();
	
    $comments = $postManager->getRepComments("2");

    require('./view/backend/comment.php');
}

// OPERATIONS DANS L ADMIN 

function setPost($author, $post){
	$postManager = new PostManager();
	$postManager->addPost($author, $post);
    header('Location: index.php?action=admin');
}

function deletePost($postid){
	$postManager = new PostManager();
	$postManager->delPost($postid);
	$postManager->delComments($postid);
	header('Location: index.php?action=admin');
}

function updatePost($postContent, $postTitle, $postid){
	$postManager = new PostManager();
	$postManager->upPost($postContent, $postTitle, $postid);
	header('Location: index.php?action=admin&postId=' . $postid);
}

// commentaire 

function addComment($author, $comment, $postid){
	$postManager = new PostManager();
	$postManager->postComment($author, $comment,  $postid);
	header('Location: index.php?action=admin&postId=' . $postid);
}

function deleteComment($commentId, $postid){
	$postManager = new PostManager();
	$postManager->delComment($commentId);

	if ($postid == "no") {
		header('Location: index.php?action=admin&pageComment');
	}else{
		header('Location: index.php?action=admin&postId=' . $postid);
	}	
}

