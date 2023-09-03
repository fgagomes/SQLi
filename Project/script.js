
//this code below work for the message error but it didn't work properly
document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login_process.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var loginMessage = document.getElementById("login-message");
            if (xhr.responseText === "success") {
                loginMessage.textContent = "Login successful!";
            } else {
                loginMessage.textContent = "Invalid login credentials. Please try again.";
            }
        }
    };
    xhr.send(formData);
});