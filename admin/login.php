<?php
require_once("../config/db.php");
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $user = $stmt->fetchObject();

    // Temporarily using plain-text comparison for password (insecure)
    if($user && $password === $user->password){
        $_SESSION['admin'] = $user;
        if($user->role === 'admin'){
            header("Location: index.php");
            exit();
        } else {
            echo "Something is wrong with the role.";
        }
    } else {
        echo "Invalid email or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url('../image/zodiac-icons/wallpaperflare.com_wallpaper (5).jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }

        .login-container {
            width: 100%;
            max-width: 350px;
            height: 380px; /* Adjusted for new input fields */
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            color: white;
            box-sizing: border-box;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .input-container input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
            box-sizing: border-box;
        }

        .input-container input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-container .icon-img {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
        }

        .input-container .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            width: 20px;
            height: 20px;
        }

        .login-button {
            width: 40%;
            margin: 0 auto;
            padding: 10px;
            background-color: rgba(0, 51, 102, 0.8);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            display: block;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: rgba(3, 102, 201, 0.452);
        }

        .login-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>လော့ခ်အင်</h2>
        
        <form method="POST" action="" onsubmit="return validateForm()">
            <div class="input-container">
                <img src="../image/zodiac-icons/icons8-user-50.png" alt="Email Icon" class="icon-img">
                <input type="email" placeholder="အီးမေးလ်" id="email" name="email" required>
            </div>
            <div class="input-container" style="margin-bottom: 40px;">
                <img src="../image/zodiac-icons/icons8-password-60.png" alt="Password Icon" class="icon-img">
                <input type="password" placeholder="စကားဝှက်" id="password" name="password" required>
                <img src="../image/zodiac-icons/icons8-eye-60.png" alt="Toggle Password Visibility" class="toggle-password" onclick="togglePassword()">
            </div>
            <button type="submit" class="login-button" name="submit">ဝင်ရောက်မည်</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var toggleIcon = document.querySelector('.toggle-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.src = '../image/zodiac-icons/icons8-eye-60.png';
            } else {
                passwordInput.type = 'password';
                toggleIcon.src = '../image/zodiac-icons/icons8-closed-eye-48.png';
            }
        }

        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            if (!email.endsWith('@gmail.com')) {
                alert("အီးမေးလ်သည် '@gmail.com' ဖြင့်ဆုံးရမည်။");
                return false;
            }

            var digitRegex = /\d/;
            if (!digitRegex.test(password)) {
                alert("စကားဝှက်တွင် ဂဏန်းတစ်လုံးအနည်းဆုံးပါဝင်ရမည်။");
                return false;
            }

            return true;  // Submit the form if all validations pass
        }
    </script>

</body>
</html>
