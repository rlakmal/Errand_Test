const sidebar = document.querySelector('.sidebar');
const main = document.querySelector('.main');
const header = document.querySelector('.header');

const handleClick = () => {
    sidebar.classList.toggle('open');
    main.classList.toggle('open');
    header.classList.toggle('open');
    menuBtnChange();
}

const menuBtn = document.getElementById('btn');
menuBtn.addEventListener('click', handleClick);

function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        menuBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else {
        menuBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
}
