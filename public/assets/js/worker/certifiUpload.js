const dropArea1 = document.querySelector(".form-drag-area1");
const browseButton1 = document.querySelector(".form-upload1");
let inputPath1 = document.querySelector("#workergs_image");

browseButton1.onclick = () => {
  inputPath1.click();
};
inputPath1.addEventListener("change", function () {
  file = this.files[0];
  showImage1();
});

dropArea1.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea1.classList.add("active");
});

dropArea1.addEventListener("dragleave", () => {
  dropArea1.classList.remove("active");
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

function showImage1() {
  let fileType = file.type;
  let validExetensions = ["image/jpeg", "image/jpg", "image/png"];

  if (validExetensions.includes(fileType)) {
    let fileReader = new FileReader();
    fileReader.onload = () => {
      let fileUrl = fileReader.result;
      document
        .querySelector("#workergs_image_placeholder")
        .setAttribute("src", fileUrl);
    };

    fileReader.readAsDataURL(file);
  }
}
