const form = document.querySelector(".signup form"),
      continueBtn = form.querySelector(".button input"),
      errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); // This prevents the form from submitting traditionally
}

continueBtn.onclick = () => {
    // Start the Ajax request
    let xhr = new XMLHttpRequest(); // Create XML object
    xhr.open("POST", "assets/php/sign-up.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    console.log("SUCCESS"); // Logging "SUCCESS" string
                    location.href = "users.php"; // Redirect to users.php on success
                } else {
                    errorText.textContent = data; // Display error message
                    errorText.style.display = "block";
                }
            }
        }
    }
    // Error handling
    xhr.onerror = () => {
        console.error("An error occurred during the XMLHttpRequest");
    }

    // Send the form data through AJAX to PHP
    let formData = new FormData(form); // Create a new FormData object
    xhr.send(formData); // Send the form data through AJAX to PHP
}
