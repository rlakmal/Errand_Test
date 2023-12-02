let popupRequest = document.querySelector(".popup-view");
let overlay2 = document.getElementById("overlay2");

function openRequest() {
  popupRequest.classList.add("open-popup-view");
  overlay2.classList.add("overlay-active");
}
function closeRequest() {
  popupRequest.classList.remove("open-popup-view");
  overlay2.classList.remove("overlay-active");
}
