<?php


// CONNEXION DANS L ADMIN
function admin() {
	require('./view/backend/formulaire.php');
}

function tryAdmin($mdp) {
	$postManager = new PostManager();
	if($mdp ==  'admin'){
        setcookie('admin', 'admin', time() + 365*24*3600, null, null, false, true); 
        header('Location: index.php?action=admin');
	}else{
		require('./view/backend/formulaire.php');
	}	
}

function getAdmin() {
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	require('./view/backend/indexView.php');
}

// deconnexion de l'admin
function disconnect(){
	$postManager = new PostManager();
	setcookie('admin', 'admin', time() - 365*24*3600, null, null, false, true);
    header('Location: index.php?action=admin');
}
// OBTENIR LA PAGE D UN BILLET
function aPost($id){
	$postManager = new PostManager();
	$post = $postManager->getPost($id);
    $comments = $postManager->getComments($id);

    require('./view/backend/postView.php');
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
	header('Location: index.php?action=admin&postId=' . $postid);
}