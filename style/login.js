
        document.addEventListener("DOMContentLoaded", function () {
            const togglePassword = document.querySelector("#togglePassword");
            const passwordInput = document.querySelector("#password");

            togglePassword.addEventListener("click", function () {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
                this.classList.toggle("fa-eye");
                this.classList.toggle("fa-eye-slash");
            });
        });