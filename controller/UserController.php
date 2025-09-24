<?php
class UserController {
    public function signup($data){
        $username = trim($data['username']);
        $email = trim($data['email']);
        $pwd = trim($data['pwd']);
        $pwdRepeat = trim($data['pwdRepeat']);
        $errors = [];

        if(empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)){
            $errors[] = "All fields are required";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Invalid email format!";
        };

        if($pwd !== $pwdRepeat){
            $error[] = "Password do not match";
        }

        if(!empty($errors)){
            echo json_encode(["success" => false, "errors" => $errors]);
            return;
        }

        $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);

        $user = new User();
        if($user->checkUser($email)){
            echo json_encode(["success" => false, "errors" => 'Email already existed']);
            return;
        }
        
        if($user->createUser($username, $email, $pwdhashed)){
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "errors" => 'Signup Failed. Try again']);
            return;
        }
    }
}