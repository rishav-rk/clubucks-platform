const navbar = document.getElementById('main-nav');
const menuBtn = document.querySelector('.lucide');
const compname = document.querySelector('.compname');
const signup = document.querySelector('.signup');
window.onscroll = function() {
  if (window.scrollY > navbar.offsetTop) {
    console.log("hello");
    navbar.classList.add('sticky');
    menuBtn.style.stroke = "white";
    compname.style.color = "white";
    signup.style.color="white";
  } else{
    console.log("bye");
    navbar.classList.remove('sticky');
    menuBtn.style.stroke = "";
    compname.style.color = "black";
    signup.style.color="black";
  }
};