<?php

function admin() {
	require('./view/backend/formulaire.php');
}

function tryAdmin($mdp, $test) {
	$postManager = new PostManager();
	if(password_verify($test , $mdp)){
        setcookie('admin', 'admin', time() + 365*24*3600, null, null, false, true); 
        header('Location: index.php?action=admin');
	}else{
		require('./view/backend/formulaire.php');
	}	
}

function getAdmin($page) {
	

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

	require('./view/backend/indexView.php');
}


function disconnect(){
	$postManager = new PostManager();
	setcookie('admin', 'admin', time() - 365*24*3600, null, null, false, true);
    header('Location: index.php?action=admin');
}