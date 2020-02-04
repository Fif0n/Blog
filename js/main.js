const hamburger = document.querySelector('.hamburger');

const nav = document.querySelector('nav');


const handleClick = () => {
    hamburger.classList.toggle('hamburger-active');
    nav.classList.toggle('nav-active');
    
}

hamburger.addEventListener('click', handleClick);



document.getElementById('login').addEventListener('click', () =>{
    document.querySelector('.login-popup').style.display = 'flex';
})

document.querySelector('.x').addEventListener('click', () => {
    document.querySelector('.login-popup').style.display = 'none';
})
