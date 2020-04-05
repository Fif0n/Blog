<?php
    if(isset($_POST['comment-submit'])){
        session_start();
        include_once 'dbh.inc.php';
        
        $comment = $_POST['comment'];
        if(empty($comment)){
            exit();
        } else {
            $sql = "SELECT * FROM blog_comment";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo 'SQL error';
                exit();
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $sql = "INSERT INTO blog_comment (postID, userID, content) VALUES (?, ?, ?);";
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo 'SQL error';
                } else {
                    mysqli_stmt_bind_param($stmt, 'sss', $_SESSION['postID'], $_SESSION['userID'], $comment);
                    mysqli_stmt_execute($stmt);

                    header("Location: /blog/index/post/".$_SESSION['postID']."");

                }
            }
        }
        
    }