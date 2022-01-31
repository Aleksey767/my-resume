const menuIcon = document.querySelector('.menu__icon')
if (menuIcon) {
    const menu = document.querySelector('.menu')
    const main = document.querySelector('main')
    const footer = document.querySelector('footer')
    menuIcon.addEventListener('click', function (e) {
        menu.classList.toggle('_active');
        main.classList.toggle('_active');
        footer.classList.toggle('_active');
    })
}
