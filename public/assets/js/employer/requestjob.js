let popupRequest = document.querySelector(".popup-view");
let overlay2 = document.getElementById("overlay2");

function openRequest() {
  alert("Do you want to Request this worker?");
  popupRequest.classList.add("open-popup-view");
  overlay2.classList.add("overlay-active");
}
function closeRequest() {
  alert("Request sent successfully!");
  popupRequest.classList.remove("open-popup-view");
  overlay2.classList.remove("overlay-active");
}
function cancelRequest() {
  alert("Request Cancelled");
  popupRequest.classList.remove("open-popup-view");
  overlay2.classList.remove("overlay-active");
}
