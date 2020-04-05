<main>
    <div class="post">
        <?php
            $_SESSION['postID'] = $_GET['id'];
            $sql = "SELECT p.title, p.content, p.imgName, u.username FROM blog_post AS p, blog_user AS u WHERE postID=".$_SESSION['postID']."";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){                     
                echo 'SQL failed';
            } else {
                mysqli_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
    
                while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="post-box">
                            <h1>'.$row['title'].'</h1>
                            <p class="author">Autor: '.$row['username'].'</p>
                            <hr/>
                            <img src="/blog/img/'.$row['imgName'].'"/>
                            <p>'.$row['content'].'</p>
                        </div>';
                }      
                
                echo '<h2>Komentarze</h2>
                        <div class="comments-section">';
                        if(isset($_SESSION['userID'])){
                            echo '<form method="POST" action="/blog/includes/addComment.inc.php">
                                <input type="text" name="comment" placeholder="Dodaj komentarz jako '.$_SESSION['username'].'">
                                <button type="submit" name="comment-submit">Dodaj komentarz</button>
                            </form>';
                        } else {
                            echo '<div class="needLogin">
                                    <h4>Musisz się zalogować aby dodać kometarz</h4>
                                </div>';
                        }

                        $sql = "SELECT u.username, p.postID, c.postID, c.content FROM blog_user AS u, blog_post AS p, blog_comment AS c WHERE ".$_SESSION['postID']." = c.postID AND ".$_SESSION['postID']." = p.postID";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){                     
                            echo 'SQL failed';
                        } else {
                            mysqli_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<div class="comment">
                                        <p>'.$row['username'].' napisał: </p>
                                        <h4>'.$row['content'].'</h3>
                                    </div>';
                            } 
                        }
            }
        ?>
    </div>
</main>