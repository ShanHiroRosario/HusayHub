// Function to toggle password visibility
export function togglePasswordVisibility(inputId, toggleElement) {
    const input = document.getElementById(inputId); // Get the input field by ID
    if (input) {
        const isPassword = input.type === "password";
        input.type = isPassword ? "text" : "password"; // Toggle input type

        // Update the toggle icon using Font Awesome classes
        if (toggleElement) {
            if (isPassword) {
                toggleElement.classList.remove("fa-eye-slash");
                toggleElement.classList.add("fa-eye");
            } else {
                toggleElement.classList.remove("fa-eye");
                toggleElement.classList.add("fa-eye-slash");
            }
        }
    }
}

// Function to hide the password when input loses focus
export function handlePasswordBlur(inputId, toggleElement) {
    const input = document.getElementById(inputId);
    if (input) {
        input.type = "password"; // Always revert to hidden state

        // Reset the toggle icon to the closed eye-slash (fa-eye-slash) state
        if (toggleElement) {
            toggleElement.classList.remove("fa-eye");
            toggleElement.classList.add("fa-eye-slash");
        }
    }
}

// Initialize password toggle functionality
export function initializePasswordToggles() {
    const toggles = document.querySelectorAll(".toggle-password");

    toggles.forEach((toggle) => {
        const inputId = toggle.getAttribute("data-target");
        const input = document.getElementById(inputId);
        const icon = toggle.querySelector("i");

        // Set default icon (fa-eye-slash by default)
        if (icon) {
            icon.classList.add("fa-eye-slash"); // Default to 'fa-eye-slash' when password is hidden
        }

        // Initially hide the icon if there is no input in the field
        if (input && input.value === "") {
            icon.style.display = "none";
        }

        // Add event listener to toggle password visibility on icon click
        toggle.addEventListener("click", () => {
            togglePasswordVisibility(inputId, icon); // Pass the <i> element
        });

        // Show icon when there is input in the field
        input.addEventListener("input", () => {
            if (input.value !== "") {
                icon.style.display = "inline"; // Show icon when there is input
            } else {
                icon.style.display = "none"; // Hide icon when input is empty
            }
        });

        // Add blur event to hide password and reset icon state
        if (input) {
            input.addEventListener("blur", () => {
                handlePasswordBlur(inputId, icon);

                // Hide the icon when the field loses focus and is empty
                if (input.value === "") {
                    icon.style.display = "none";
                }
            });
        }
    });
}
