let overlay = document.getElementById("overlay");
let popupReport = document.querySelector(".popup-report");
let popupView = document.querySelector(".popup-view");

function openView(button) {
  const itemData = button.getAttribute("data-order");
  console.log(itemData);
  const data = JSON.parse(itemData);

  dataBindtoForm(data);

  popupView.classList.add("open-popup-view");
  overlay.classList.add("overlay-active");
}
function closeView() {
  popupView.classList.remove("open-popup-view");
  overlay.classList.remove("overlay-active");
}

function openReport() {
  popupReport.classList.add("open-popup-report");
  overlay.classList.add("overlay-active");
}
function closeReport() {
  popupReport.classList.remove("open-popup-report");
  overlay.classList.remove("overlay-active");
}

// edit form for bind that data
function dataBindtoForm(data) {
  // console.log(data);

  document.querySelector('.popup-view input[name="id"]').value = data.id;
  document.querySelector('.popup-view input[name="email"]').value = data.email;
  document.querySelector('.popup-view input[name="name"]').value = data.name;
}
