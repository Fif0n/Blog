<?php
    include_once 'includes/header.inc.php';

    
    $view = $_GET['view'];
    
    
    if($view == "home"){
        include_once 'includes/home.inc.php';
    } else if($view == "register"){
        include_once 'includes/register.inc.php';
    } else if($view == "article"){
        include_once 'includes/allArticles.inc.php';
    } else if($view == "add"){
        include_once 'includes/addPostForm.inc.php';
    } else if($view == "post"){
        include_once 'includes/post.inc.php';
    } else if($view == ""){
        include_once 'includes/home.inc.php';
    }

    include_once 'includes/footer.inc.php';
?>