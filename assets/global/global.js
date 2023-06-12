// Responsive Side Nav

const burger = document.querySelector(".burger");
const sideNav = document.querySelector(".sideNav");
const sideNavCover = document.querySelector(".sideNavCover");
const close = document.querySelector(".close");

burger.addEventListener("click", () => {
    sideNav.classList.add("show");
    sideNavCover.classList.add("show");
    close.classList.add("show");
})

close.addEventListener("click", () => {
    sideNav.classList.remove("show");
    sideNavCover.classList.remove("show");
    close.classList.remove("show");
})