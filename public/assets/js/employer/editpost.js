let popupEdit = document.querySelector(".popup-view");
let overlay1 = document.getElementById("overlay1");
var editButton = document.getElementById("editButton");

// editButton.addEventListener("click", openEdit);

function openEdit(button) {
  // get edit data
  const itemData = button.getAttribute("data-order");
  const data = JSON.parse(itemData);

  dataBindtoForm(data);

  popupEdit.classList.add("open-popup-view");
  overlay1.classList.add("overlay-active");
}
function closeEdit() {
  popupEdit.classList.remove("open-popup-view");
  overlay1.classList.remove("overlay-active");
}

// edit form for bind that data
function dataBindtoForm(data) {
  // console.log(data);

  document.querySelector('.popup-view input[name="id"]').value = data.id;
  document.querySelector('.popup-view input[name="title"]').value = data.title;

  document.querySelector('.popup-view input[name="budget"]').value =
    data.budget;

  document.querySelector('.popup-view input[name="address"]').value =
    data.address;

  document.querySelector('.popup-view input[name="city"]').value = data.city;

  document.querySelector('.popup-view input[name="description"]').value =
    data.description;
}
