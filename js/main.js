const hamburger = document.querySelector('.hamburger');

const nav = document.querySelector('nav')

const handleClick = () => {
    hamburger.classList.toggle('hamburger-active');
    nav.classList.toggle('nav-active');
}

hamburger.addEventListener('click', handleClick);