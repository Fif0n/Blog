
<main>
    <h2>Najnowsze posty</h2>
    <div class="latest-posts">
        <?php
            $sql = "SELECT * FROM blog_post order by id desc LIMIT 6";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo 'SQL failed';
            } else {
                mysqli_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while($row = mysqli_fetch_assoc($result)){
                    echo '<a href="/blog/index/post/'.$row['id'].'">
                            <div class="post-card">
                                <img src="/blog/img/'.$row['imgName'].'">
                                <div class="post-title">
                                    <h3>'.$row['title'].'</h3>
                                </div>
                            </div>
                        </a>';
                }
            }
                
        ?>
    </div>
    </main>
