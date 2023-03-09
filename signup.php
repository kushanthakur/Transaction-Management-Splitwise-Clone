<!DOCTYPE html>
<html lang="en">

<head>
    <title>Splitwise Sign Up!</title>
    <link rel="icon" type="image/x-icon" href="/assets/splogofavicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: rgb(10, 111, 79);">
        <a class="navbar-brand" href="index.php"><img src="assets/splogo.png" alt="logo" class="rounded-circle"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <span class=".text-*-center"><h2 style="text-shadow: 0 0 3px #FF0000; text-align:center;">Welcome to Splitwise Cashflow Minimization, A Capstone Project Under Prof. Govinda K! Let's Make your Contris' Easier!</h2></span>
        </div>
    </nav>
    <div><br></div>
    <div class="container col-md-6 border border-success" style="background-color: rgba(66, 231, 171, 0.641) ;">
        <form action="insert.php" method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="fname">Name:</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter your Name" name="fname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter username" name="email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pw1" value="" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd2">Confirm Password:</label>
                <input type="password" class="form-control" id="pwd2" onmouseout="verifyPassword()" placeholder="Reenter password" name="pw2" value="" required>

                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback" id="message">Could not match above password!</div>
            </div>
            <div>

                <a href="login.php"><button type="button" class="btn btn-warning">Not registerd ? Register Now!</button></a>

            </div>
            <div class="text-center"><button type="submit" class="btn btn-primary " name="entry">Submit</button></div>
            <br><br>
        </form>
    </div>

    <script>
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function verifyPassword() {
            var pw = document.getElementById("pswd").value;
            //check empty password field  
            if (pw == "") {
                document.getElementById("message").innerHTML = "**Fill the password please!";
                return false;
            }

            //minimum password length validation  
            if (pw.length < 8) {
                document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";
                return false;
            }

            //maximum length of password validation  
            if (pw.length > 15) {
                document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";
                return false;
            } else {
                alert("Password is correct");
            }
        }
    </script>

</body>

</html>