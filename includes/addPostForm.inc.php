<?php
if($_SESSION['userRank'] == 'admin'){
?>
    <main>
        <h2>Dodaj post</h2>
        <form action="/blog/includes/addPost.inc.php" method="POST" class="add" enctype="multipart/form-data">
            <input type="text" name="filename" placeholder="Nazwa pliku">
            <input type="text" name="title" placeholder="Tytuł">
            <textarea name="content" cols="40" rows="15" placeholder="Tutaj wpisz treść..."></textarea>
            <input type="file" name="file">
            <button type="submit" name="add-submit">Dodaj post</button>
        </form>
    </main>
<?php
} else {
    header("Location: /blog/index/home");
}