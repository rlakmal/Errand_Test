const dropArea = document.querySelector(".form-drag-area");
const dropArea1 = document.querySelector(".form-drag-area1");
const browseButton = document.querySelector(".form-upload");
const browseButton1 = document.querySelector(".form-upload1");
let inputPath = document.querySelector("#job_image");
let inputPath1 = document.querySelector("#job_image1");
let file;

browseButton.onclick = () => {
  inputPath.click();
};

browseButton1.onclick = () => {
  inputPath1.click();
};

inputPath.addEventListener("change", function () {
  file = this.files[0];
  showImage();
});
inputPath1.addEventListener("change", function () {
  file = this.files[0];
  showImage1();
});

dropArea.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea.classList.add("active");
});

dropArea1.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea1.classList.add("active");
});

dropArea.addEventListener("dragleave", () => {
  dropArea.classList.remove("active");
});
dropArea1.addEventListener("dragleave", () => {
  dropArea1.classList.remove("active");
});

dropArea.addEventListener("drop", (event) => {
  event.preventDefault();
  file = event.dataTransfer.files[0];
  let list = new DataTransfer();
  list.items.add(file);
  inputPath.files = list.files;
  showImage();
  dropArea.classList.remove("active");
});
dropArea1.addEventListener("drop", (event) => {
  event.preventDefault();
  file = event.dataTransfer.files[0];
  let list = new DataTransfer();
  list.items.add(file);
  inputPath1.files = list.files;
  showImage1();
  dropArea1.classList.remove("active");
});

function showImage() {
  let fileType = file.type;
  let validExetensions = ["image/jpeg", "image/jpg", "image/png"];

  if (validExetensions.includes(fileType)) {
    let fileReader = new FileReader();
    fileReader.onload = () => {
      let fileUrl = fileReader.result;
      document
        .querySelector("#job_image_placeholder")
        .setAttribute("src", fileUrl);
    };

    fileReader.readAsDataURL(file);
  }
}
function showImage1() {
  let fileType = file.type;
  let validExetensions = ["image/jpeg", "image/jpg", "image/png"];

  if (validExetensions.includes(fileType)) {
    let fileReader = new FileReader();
    fileReader.onload = () => {
      let fileUrl = fileReader.result;
      document
        .querySelector("#job_image1_placeholder")
        .setAttribute("src", fileUrl);
    };

    fileReader.readAsDataURL(file);
  }
}
