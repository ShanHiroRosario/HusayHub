import { initializePasswordToggles } from "./togglePassword";

document.addEventListener("DOMContentLoaded", function () {
    initializePasswordToggles();

    const inputElement = document.getElementById("jru_id");
    const formatHint = document.querySelector(".format-hint");

    // Handle the format hint for the ID field
    if (inputElement && formatHint) {
        formatHint.style.opacity = 0; // Initially hide the format hint

        inputElement.addEventListener("focus", function () {
            if (this.value.length === 0) {
                formatHint.style.opacity = 1; // Show hint only if the field is empty
            }
        });

        inputElement.addEventListener("input", function () {
            if (this.value.length > 0) {
                formatHint.style.opacity = 0; // Hide hint when there is input
            } else {
                formatHint.style.opacity = 1; // Show hint again if input is empty
            }

            // Allow only numbers and dashes
            let value = this.value.replace(/[^0-9\-]/g, ""); // Remove invalid characters
            if (value.length > 2 && value.charAt(2) !== "-") {
                value = value.slice(0, 2) + "-" + value.slice(2); // Add dash after 2 characters
            }
            if (value.length > 9) {
                value = value.slice(0, 9); // Limit to 9 characters
            }
            this.value = value;
        });

        inputElement.addEventListener("blur", function () {
            formatHint.style.opacity = 0; // Always hide hint when unfocused
        });
    }
});
