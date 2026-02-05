const langToggle = document.getElementById("langToggle");
const languageMenu = document.getElementById("languageMenu");

langToggle.addEventListener("click", () => {
    languageMenu.style.display =
        languageMenu.style.display === "block" ? "none" : "block";
});

document.addEventListener("click", (e) => {
    if (!langToggle.contains(e.target) && !languageMenu.contains(e.target)) {
        languageMenu.style.display = "none";
    }
});

