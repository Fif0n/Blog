<?php 
session_start();

$username = '';
$email = '';
if(isset($_POST['signup-submit'])){
    include_once 'dbh.inc.php';

    $errors = array();

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordRepeat = mysqli_real_escape_string($conn, $_POST['password-repeat']);

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: register.inc.php?error=emptyfield&username=$username&email=$email");
        exit();

    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: register.inc.php?error=invalidemailusername");
        exit();

    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: register.inc.php?error=invalidemail&username=$username");
        exit();

    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: register.inc.php?error=invaliduername&email=$email");
        exit();

    } else if($password !== $passwordRepeat){
        header("Location: register.inc.php?error=passwordcheck&username=$username&email=$email");
        exit();

    } else {

        $sql = "SELECT username FROM blog_user WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location : register.inc.php?error=sqlerror");
            exit();

        } else {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: register.inc.php?error=usertaken&email=$email");
                exit();

            } else {
                $sql = "INSERT INTO blog_user (username, email, password, userRank) VALUES (?, ?, ?, 'member')";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location : register.inc.php?error=sqlerror");
                    exit();

                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: register.inc.php?signup=success");
                    exit();
                }
            }

        }

    
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
    header("Location: register.inc.php");
}
