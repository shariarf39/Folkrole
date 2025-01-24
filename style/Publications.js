document.addEventListener("DOMContentLoaded", () => {
  const publications = document.querySelectorAll(".publication");

  publications.forEach((publication) => {
    publication.addEventListener("click", () => {
      const link = publication.querySelector(".book-link");
      if (link) {
        link.style.display = link.style.display === "none" ? "block" : "none";
      }
    });
  });
});
