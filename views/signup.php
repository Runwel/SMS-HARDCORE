<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <form id="signUp">
        <h1>Signup</h1>
        <div id="error-message"></div>
        <input type="text" name="username" placeholder="Username" require>
        <input type="text" name="email" placeholder="Email" require>
        <input type="password" name="pwd" placeholder="Password" require>
        <input type="password" name="pwdRepeat" placeholder="Password" require>
        <button type="submit">Submit</button>
    </form>
</body>
<script src="../public/js/signup.js"></script>
</html>