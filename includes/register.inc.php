<?php
    include_once 'header.inc.php';
?>

<main>
    <h2>Rejestracja użytkownika</h2>
    <form action="registerForm.inc.php" class="register" method="POST">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" name="username">
        <label for="email">E-mail:</label>
        <input type="text" name="email">
        <label for="password">Hasło:</label>
        <input type="password" name="password">
        <label for="password">Powtórz hasło:</label>
        <input type="password" name="password-repeat">
        <button type="submit" name="signup-submit">Rejestruj</button>
    </form>
    <p><?php echo $errors ?></p>
</main>

<?php 
    include_once 'footer.inc.php';
?>