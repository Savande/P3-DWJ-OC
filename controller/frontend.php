<?php

require('./model/PostManager.php');


function listPosts($page){

$nbbillets = 0;
$finBillets = 0;

    while ($nbbillets < $page ) {
    	
    	$finBillets += 4;
    	$nbbillets ++ ;

    };

    $debutBillets = $finBillets - 4;
    if ($page > 1) {
        $finBillets -= 4;
    }
    
	$postManager = new PostManager();
    $posts = $postManager->getPosts($debutBillets, $finBillets);

    $nbPost = $postManager->getpage();   

    require('./view/frontend/indexView.php');

}

function post($postId){
	$postManager = new PostManager();
	$post = $postManager->getPost($postId);
	$comments = $postManager->getComments($postId, "1");
	require('./view/frontend/postView.php');
}

function ddComment($author, $comment, $postId) {
	$postManager = new PostManager();

	$postManager->postComment($author, $comment,  $postId);
	header('Location: index.php?action=post&postId=' . $postId);

}

function report($commentId, $postId, $flag){
	$postManager = new PostManager();

	$postManager->reportComment($commentId, $flag);

    if ($postId == "no") {
    	header('Location: index.php?action=admin&pageComment');
    }else{
    	header('Location: index.php?action=post&postId=' . $postId);
    }	
}

?>