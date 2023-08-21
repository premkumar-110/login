document.addEventListener("DOMContentLoaded", () => {
  const inputDiv = document.querySelector(".input-div");
  const input = document.querySelector("input");
  const output = document.querySelector("output");
  let imagesArray = [];

  input.addEventListener("change", () => {
    const files = input.files;
    for (let i = 0; i < files.length; i++) {
      imagesArray.push(files[i]);
    }
    displayImages();
  });

  inputDiv.addEventListener("drop", (e) => {
    e.preventDefault();
    const files = e.dataTransfer.files;
    for (let i = 0; i < files.length; i++) {
      if (!files[i].type.match("image")) continue;

      if (imagesArray.every((image) => image.name !== files[i].name))
        imagesArray.push(files[i]);
    }
    displayImages();
  });

  function displayImages() {
    let images = "";
    imagesArray.forEach((image, index) => {
      images += `<div class="image">
                  <img src="${URL.createObjectURL(image)}" alt="image">
                  <span onclick="deleteImage(${index})">&times;</span>
                </div>`;
    });
    output.innerHTML = images;
  }

  function deleteImage(index) {
    imagesArray.splice(index, 1);
    displayImages();
  }

  window.onload = () => {
    alert("Loaded");
  };
});
