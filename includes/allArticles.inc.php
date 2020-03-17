
<main>
    <h2>Wszystkie posty</h2>
    <div class="article">
    <?php
        $sql = "SELECT * FROM blog_post order by id desc";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo 'SQL failed';
        } else {
            mysqli_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while($row = mysqli_fetch_assoc($result)){
                echo '<a href="/blog/index/post/'.$row['id'].'">
                        <div class="article-card">
                            <img src="/blog/img/'.$row['imgName'].'">
                            <div class="article-text">
                                <h3>'.$row['title'].'</h3>
                                <p>'.$row['content'].'</p>
                                <p>Autor: '.$row['author'].'</p>
                            </div>
                        </div>
                    </a>';
            }
        }

    ?>
    </div>
</main>

