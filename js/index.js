const popup = document.querySelector(".show-add-cart");
function showAddCart() {
  popup.style.display = "block";
  setTimeout(() => {
    popup.style.display = "none";
  }, 2000);
}
// show sign up (login.php)
const btnSignUp = document.querySelector(".content__signin");
function showSignUp() {
  document.querySelector(".content__signup").style.display = "block";
  btnSignUp.style.display = "none";
}
// show sign in (login.php)
const btnsignIn = document.querySelector(".content__signup");
function showSignIn() {
  document.querySelector(".content__signin").style.display = "block";
  btnsignIn.style.display = "none";
}

// button nhấn vào thì hiện đăng ký thành công
function submitSignIn() {
  document.querySelector("popup-passed").style.display = "none";
}

// ẩn hiện menu trang admin
function hidden_menu() {
  var menu = document.getElementById("menu");
  var content = document.getElementById("content");
  content.classList.toggle("hidden");
  menu.classList.toggle("hidden");
}
// .content {
//   width: 81%;
//   height: calc(100vh - 20px);
//   margin-left: calc(19% + 20px);
//   border-radius: 10px;
// }
