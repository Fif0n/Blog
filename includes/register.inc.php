<?php
    include_once 'header.inc.php';
?>

<main>
    <h2>Rejestracja użytkownika</h2>
    <form action="" class="register">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" name="username">
        <label for="email">E-mail:</label>
        <input type="text" name="email">
        <label for="password">Hasło:</label>
        <input type="password" name="password">
        <button>Rejestruj</button>
    </form>
</main>

<?php 
    include_once 'footer.inc.php';
?>