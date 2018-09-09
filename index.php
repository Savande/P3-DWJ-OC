<?php

require('controller/frontend.php');
require('controller/backend.php');


// on test si une demande est fait
if (isset($_GET['action'])) {
    // on test si l'action est admin, essaye l'accès admin 
    if ($_GET['action'] == 'admin'){
        if(isset($_GET['try']) && isset($_POST['password'])){  
            tryAdmin($_POST['password']);
        }
        elseif (isset($_GET{'disconnect'})) {
            disconnect();
        }                        
        elseif (isset($_COOKIE['admin'])) { 

            // ON va dans un post avec ses commentaires          
            if (isset($_GET['postId'])) {
                if ($_GET['postId'] > 0) {
                    post($_GET['postId']);

                    //ajouter un commentaire 
                    if (isset($_GET['addComment'])) {
                        if (isset($_POST['author'], $_POST['comment'])){
                            addComment($_POST['author'], $_POST['comment'], $_GET['postId']);
                        }else{
                            echo "veullez remplir tous les champs";
                        }

                    // suprimer un commentaire 
                    }elseif (isset($_GET['deleteComment'], $_GET['commentId']) && $_GET['commentId'] > 0 ) {
                        deleteComment($_GET['commentId'], $_GET['postId']);
                    }

                    

                    // modifier un commentaire 
                    // modidier un billets 
                    elseif (isset($_GET['updatePost'])) {
                        updatePost($_POST['post'], $_POST['author'], $_GET['postId']);                                  
                    }
                }else{
                    echo('identifiant du billets invalide');
                }           
            }else{
                getAdmin();
                //action dans l'inteface d'administration

                // suprimer un billets 
                if (isset($_GET['delete'])) {
                    if ($_GET['delete'] > 0) {
                        deletePost($_GET['delete']);
                    }
                    else{
                        echo'identifiant du billet invalide !';
                    }
                }
                // creer un billets 
                if (isset($_GET['setPost'])){

                    if (!empty($_POST['author']) && !empty($_POST['post'])){
                        setPost($_POST['author'], $_POST['post']);
                    }
                    else{
                        echo 'Erreur : tous les champs ne sont pas remplis !';
                    }
                }
            }            
        }
        else{
            admin();
        }
    }else{

    }
}
// Pas d'action on affiche la page des billets 
else {
    listPosts();
}
