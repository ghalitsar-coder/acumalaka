// import './bootstrap';
import "preline";

const toggleButton = document.getElementById("sidebar-toggle");
const sidebar = document.getElementById("sidebar");

toggleButton.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
});
