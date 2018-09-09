<?php


// CONNEXION DANS L ADMIN
function admin() {
	require('./view/backend/formulaire.php');
}

function tryAdmin($mdp) {
	if($mdp ==  'admin'){
        setcookie('admin', 'admin', time() + 365*24*3600, null, null, false, true); 
        header('Location: index.php?action=admin');
	}else{
		require('./view/backend/formulaire.php');
	}	
}

function getAdmin() {
	$posts = getPosts();
	require('./view/backend/indexView.php');
}

// deconnexion de l'admin
function disconnect(){
	setcookie('admin', 'admin', time() - 365*24*3600, null, null, false, true);
    header('Location: index.php?action=admin');
}
// OBTENIR LA PAGE D UN BILLET
function post($id)
{
	$post = getPost($id);
    $comments = getComments($id);

    require('./view/backend/postView.php');
}

// OPERATIONS DANS L ADMIN 

function setPost($author, $post){
	addPost($author, $post);
    header('Location: index.php?action=admin');
}

function deletePost($postid){
	delPost($postid);
	delComments($postid);
	header('Location: index.php?action=admin');
}

function updatePost($postContent, $postTitle, $postid){
	upPost($postContent, $postTitle, $postid);
	header('Location: index.php?action=admin&postId=' . $postid);
}

// commentaire 

function addComment($author, $comment, $postid){
	postComment($author, $comment,  $postid);
	header('Location: index.php?action=admin&postId=' . $postid);
}

function deleteComment($commentId, $postid){
	delComment($commentId);
	header('Location: index.php?action=admin&postId=' . $postid);
}