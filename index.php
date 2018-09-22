<?php

require('controller/frontend.php');
require('controller/log.php');
require('controller/backend.php');



// on test si une demande est fait
if (isset($_GET['action'])) {





    // on test si l'action est admin, essaye l'accès admin 
    if ($_GET['action'] == 'admin'){
        $mdp = password_hash("admin", PASSWORD_DEFAULT);
        
        if(isset($_GET['try']) && isset($_POST['password'])){  
            $test = $_POST['password'];
            tryAdmin($mdp, $test);
        }
        elseif (isset($_GET{'disconnect'})) {
            disconnect();
        }                        
        elseif (isset($_COOKIE['admin'])) { 

            // ON va dans un post avec ses commentaires          
            if (isset($_GET['postId'])) {
                if ($_GET['postId'] > 0) {
                    aPost($_GET['postId']);

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
            }elseif (isset($_GET['pagePost'])){
                require('view/backend/addPost.php');
            }elseif (isset($_GET['pageComment'])){
                if (isset($_GET['reupload'])) {
                    report($_GET['reupload'], "no", "1");
                }elseif (isset($_GET['defDel'])) {
                    deleteComment($_GET['defDel'], "no");
                }else{
                    repComment();
                }                
            }else{
                if (isset($_GET['page'])) {
                    getAdmin($_GET['page']);
                }else{
                      getAdmin(1);
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


    }
    else{
        admin();
    }



}elseif ($_GET['action'] == 'post' && isset($_GET['postId']) && $_GET['postId'] > 0) {

    if (isset($_GET['addComment']) && isset($_POST['author'], $_POST['comment'])) {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            ddComment($_POST['author'], $_POST['comment'], $_GET['postId']);
        }
    }else{
        post($_GET['postId']);   
    }   
}elseif (isset($_GET['report']) && $_GET['report'] > 0) {
    report($_GET['report'], $_GET['postId'], "2");
}  

}
// Pas d'action on affiche la page des billets 
else {
    if (isset($_GET['page']) && $_GET['page'] >  0 ) {
        listPosts($_GET['page']);
    }else{
        listPosts(1);
    }
}


