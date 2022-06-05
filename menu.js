let open = document.querySelector(".open");
let close = document.querySelector(".close");
let menuAppear = document.querySelector(".menuAppear");

function openMenu () {
    menuAppear.style.display = 'flex'; 
}
open.addEventListener('click', openMenu);

