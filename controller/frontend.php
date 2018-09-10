<?php

require('./model/PostManager.php');
require('./model/frontend.php');

function listPosts(){
	$postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('./view/frontend/indexView.php');
}

function post($postId){
	$postManager = new PostManager();
	$post = $postManager->getPost($postId);
	$comments = $postManager->getComments($postId);

	require('./view/frontend/postView.php');

}

function ddComment($author, $comment, $postId) {
	$postManager = new PostManager();

	$postManager->postComment($author, $comment,  $postId);
	header('Location: index.php?action=post&postId=' . $postId);

}

function report(){
	
}

