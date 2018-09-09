<?php

require('./model/backend.php');

function listPosts()
{
    $posts = getPosts();

    require('./view/frontend/indexView.php');
}