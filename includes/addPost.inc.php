<?php 
    if(isset($_POST['add-submit'])){
        session_start();
        $newFilename = $_POST['filename'];
        if(empty($newFilename)){
            $newFilename = 'photo';
        } else {
            $newFilename = strtolower(str_replace(" ", "-", $newFilename));
        }
        $title = $_POST['title'];
        $content = $_POST['content'];
        
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 2000000){
                    $imgFullName = $newFilename . "." . uniqid("", true) . "." . $fileActualExt;
                    $fileDestination = "../img/" . $imgFullName;

                    include_once 'dbh.inc.php';

                    if(empty($title) || empty($content)){
                        header("Location: /blog/index/add?upload=empty");
                        exit();
                    } else {
                        $sql = "SELECT * FROM blog_post;";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo 'SQL failed';
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $sql = "INSERT INTO blog_post (userID, title, content, imgName) VALUES (?, ?, ?, ?);";
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo 'SQL failed';
                            } else {
                                mysqli_stmt_bind_param($stmt, 'ssss', $_SESSION['userID'], $title, $content, $imgFullName);
                                mysqli_stmt_execute($stmt);

                                move_uploaded_file($fileTempName, $fileDestination);

                                header("Location: /blog/index/add?upload=success");
                            }
                        }
                    }
                } else {
                    echo 'Your file is too big';
                    exit();
                }

            } else {
                echo 'Your file has an error!';
                exit();
            }

        } else {
            echo 'The type of file isnt allowed!';
            exit();
        }
    }