<main>
    <div class="post">
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM blog_post WHERE id='$id'";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){                     
                echo 'SQL failed';
            } else {
                mysqli_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
    
                while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="post-box">
                            <h1>'.$row['title'].'</h1>
                            <p class="author">Autor: '.$row['author'].'</p>
                            <hr/>
                            <img src="/blog/img/'.$row['imgName'].'"/>
                            <p>'.$row['content'].'</p>
                        </div>';
                        
                }
                echo '<h2>Komentarze</h2>
                        <div class="comments-section">';
                        if(isset($_SESSION['id'])){
                            echo '<form>
                                <input type="text" name="comment" placeholder="Dodaj komentarz jako '.$_SESSION['username'].'">
                                <button type="submit" name="comment-submit">Dodaj komentarz</button>
                            </form>';
                        } else {
                            echo '<div class="needLogin">
                                    <h4>Musisz się zalogować aby dodać kometarz</h4>
                                </div>';
                        } 
                            echo '<div class="comment">
                                <p>Ktoś napisał:</p>
                                <h4>lorem ipsum elo benc pozdro 6000000000000000000000000000000000 xd. Wisz o co chodzi mordooooo.</h3>
                            </div>
                            <div class="comment">
                                <p>Ktoś napisał:</p>
                                <h4>No proste ziomuś. równo na rejonie </h3>
                            </div>
                        </div>';
            }
        ?>
    </div>
</main>