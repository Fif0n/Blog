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
                        </div>
                        <h2>Komentarze</h2>
                        <div class="comments">
                            <form>
                                <input type="text" name="comment" placeholder="Dodaj komentarz">
                            </form>
                        </div>'
                        
                    ;
                }
            }
        ?>
    </div>
</main>