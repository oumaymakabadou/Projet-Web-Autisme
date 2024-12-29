<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            background: linear-gradient(to right,rgb(196, 193, 193),rgb(6, 0, 110));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .container {
            background: #fff;
            width: 100%;
            max-width: 450px;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }
        h1.form-title {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
            color: #4e4e4e;
        }
        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #757575;
        }
        input {
            width: 100%;
            padding: 10px 20px;
            padding-left: 40px;
            border: 1px solid #757575;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        input:focus {
            border-color: #5b6df1;
        }
        label {
            position: absolute;
            left: 10px;
            top: -10px;
            font-size: 12px;
            color: #757575;
            transition: 0.3s;
        }
        input:focus ~ label,
        input:not(:placeholder-shown) ~ label {
            top: -25px;
            color: #5b6df1;
            font-size: 14px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #5b6df1;
            color: white;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #4a59d1;
        }
        .or {
            text-align: center;
            margin-top: 1rem;
            font-size: 14px;
            color: #757575;
        }
        .icons {
            text-align: center;
            margin: 1rem 0;
        }
        .icons i {
            color: #5b6df1;
            font-size: 1.5rem;
            margin: 0 10px;
            cursor: pointer;
            padding: 10px;
            border-radius: 50%;
            border: 2px solid #dfe9f5;
            transition: 0.3s;
        }
        .icons i:hover {
            background-color: #5b6df1;
            color: white;
            border-color: #5b6df1;
        }
        .links {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }
        button {
            background: transparent;
            color: #5b6df1;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }
        button:hover {
            text-decoration: underline;
        }
        .recover {
            text-align: right;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Register</h1>
      <form method="post" action="register.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
           <label for="fname">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">
        ----------or--------
      </p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email" required>
              <label for="email">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" required>
              <label for="password">Password</label>
          </div>
          <p class="recover">
            <a href="#">Recover Password</a>
          </p>
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
      </div>
      <script src="script.js"></script>
</body>
</html>