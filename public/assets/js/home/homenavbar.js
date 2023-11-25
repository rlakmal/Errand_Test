document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".homenavbar nav ul li a");

  navLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      // Remove the "clicked" class from all links
      navLinks.forEach((otherLink) => {
        otherLink.classList.remove("clicked");
      });

      // Add the "clicked" class to the clicked link
      link.classList.add("clicked");
    });
  });
});
