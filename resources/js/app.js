import "./bootstrap";

// resources/js/app.js

document.addEventListener("DOMContentLoaded", function () {
    const inputElement = document.getElementById("id");
    const formatHint = document.querySelector(".format-hint");

    if (inputElement && formatHint) {
        // Initially, hide the format hint when the page loads
        formatHint.style.opacity = 0;

        // Show the format hint when the input field is focused, but only if the field is empty
        inputElement.addEventListener("focus", function () {
            if (this.value.length === 0) {
                // Only show the hint if the input is empty
                formatHint.style.opacity = 1;
            }
        });

        // Hide the format hint when the user starts typing
        inputElement.addEventListener("input", function () {
            if (this.value.length > 0) {
                formatHint.style.opacity = 0; // Hide the format hint when there is input
            } else {
                formatHint.style.opacity = 1; // If the input is empty, show the hint
            }
        });

        // Hide the format hint when the input field is blurred
        inputElement.addEventListener("blur", function () {
            formatHint.style.opacity = 0; // Hide the format hint when input is unfocused
        });

        inputElement.addEventListener("input", function () {
            let value = inputElement.value;

            // Remove any non-numeric characters except the dash
            value = value.replace(/[^0-9\-]/g, "");

            // Ensure that there is only one dash and it's in the correct position
            if (value.length > 2 && value.charAt(2) !== "-") {
                value = value.slice(0, 2) + "-" + value.slice(2);
            }

            // Make sure the input doesn't exceed the length of 9 characters (2 digits + 1 dash + 6 digits)
            if (value.length > 9) {
                value = value.slice(0, 9); // Allow only 9 characters total
            }

            // Update the input field value
            inputElement.value = value;
        });
    }
});
