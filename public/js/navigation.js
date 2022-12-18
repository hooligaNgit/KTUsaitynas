const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const Button = document.querySelector(".button-27");

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");

})

document.querySelectorAll(".nav-link").forEach(n =>n.addEventListener("click",() =>{
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}))


const profileButton = document.getElementById('profile-button');
const dropdownMenu = document.getElementById('dropdown-menu');

profileButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
});
