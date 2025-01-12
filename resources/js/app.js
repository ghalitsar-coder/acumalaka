// import './bootstrap';
import "preline";

import flatpickr from "flatpickr";
import rangePlugin from "flatpickr/dist/plugins/rangePlugin";
import 'flatpickr/dist/flatpickr.css';  // Add the default styling


document.addEventListener('DOMContentLoaded', function() {
    const dateInputs = document.querySelectorAll('#check_in');
    if (dateInputs.length > 0) {
        flatpickr("#check_in", {
            plugins: [new rangePlugin({ input: "#check_out" })],
            minDate: "today",
            dateFormat: "Y-m-d",
            disableMobile: "true",
            monthSelectorType: "static",
            mode: "range",
            numberOfMonths: 2,
            defaultHour: 14,
            onChange: function(selectedDates, dateStr, instance) {
                console.log('Selected dates:', selectedDates);
            }
        });
    }
});

const toggleButton = document.getElementById("sidebar-toggle");
const sidebar = document.getElementById("sidebar");

toggleButton.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
});

