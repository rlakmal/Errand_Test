const dropArea = document.querySelector(".form-drag-area");
const browseButton = document.querySelector(".form-upload");
let inputPath = document.querySelector("#profile_image");

let file;

browseButton.onclick = () => {
  inputPath.click();
};

inputPath.addEventListener("change", function () {
  file = this.files[0];
  showImage();
});

dropArea.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea.classList.add("active");
});
dropArea.addEventListener("dragleave", () => {
  dropArea.classList.remove("active");
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

function showImage() {
  let fileType = file.type;
  let validExetensions = ["image/jpeg", "image/jpg", "image/png"];

  if (validExetensions.includes(fileType)) {
    let fileReader = new FileReader();
    fileReader.onload = () => {
      let fileUrl = fileReader.result;
      document
        .querySelector("#profile_image_placeholder")
        .setAttribute("src", fileUrl);
    };

    fileReader.readAsDataURL(file);
  }
}
