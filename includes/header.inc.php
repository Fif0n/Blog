<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="/blog/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> 
</head>
<body>

<button class="hamburger">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
</button>
<nav>
    <header class="logo">
        <a href="/blog/index.php"><h1>Logo</h1></a>
    </header>
    <form class="search">
        <input type="text" placeholder="Szukaj artykułów...">
        <button class="fa fa-search"></button>
    </form>
    <div class="nav-panel">
        <a href="/blog/index.php"><p>Strona główna</p></a>
        <a href="includes/allArticles.inc.php"><p>Wszystkie posty</p></a>
    </div>
    <div class="buttons">
        <button>Sign up</button>
        <button id="login">Log in</button>
    </div>
</nav>

<div class="login-popup">
    <div class="login-content">
        <div class="x">&times;</div>
        <h1>Login</h1>
        <form action="">
            <input type="text" placeholder="Username">
            <input type="password" placeholder="Password">
            <button>Login</button>
        </form>
    </div>
</div>
