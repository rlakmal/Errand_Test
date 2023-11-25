// Get the profile dropdown and menu elements
const profileDropdown = document.getElementById("profile-dropdown");
const profileMenu = document.getElementById("profile-menu");

// Add a click event listener to the profile dropdown
profileDropdown.addEventListener("click", function (event) {
  event.stopPropagation(); // Prevent the event from propagating to the document

  // Toggle the visibility of the profile menu
  if (profileMenu.style.display === "block") {
    profileMenu.style.display = "none";
  } else {
    profileMenu.style.display = "block";
  }
});

// Add a click event listener to the document to close the menu when clicking outside
document.addEventListener("click", function (event) {
  if (
    profileMenu.style.display === "block" &&
    event.target !== profileMenu &&
    event.target !== profileDropdown
  ) {
    profileMenu.style.display = "none";
  }
});
