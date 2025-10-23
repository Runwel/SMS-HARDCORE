<?php
class UserController {
    protected $validator, $userModel;

    public function __construct(){   
        $this->validator = new Validator;
        $this->userModel = new User;
    }

    public function signup(array $data): void {
        $username = trim($data['username']);
        $email = trim($data['email']);
        $pwd = trim($data['pwd']);
        $pwdRepeat = trim($data['pwdRepeat']);

        $this->validator->reset();
        $this->validator->required($data, ['username', 'email', 'pwd', 'pwdRepeat']);
        $this->validator->checkEmail($email);
        $this->validator->passwordMatch($pwd, $pwdRepeat);

        if($this->validator->hasErrors()){
            echo json_encode(["success" => false, "errors" => $this->validator->getErrors()]);
            return;
        }

        $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);

        if($this->userModel->checkUser($email)){
            echo json_encode(["success" => false, "errors" => 'Email already existed']);
            return;
        }
        
        if($this->userModel->createUser($username, $email, $pwdhashed)){
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "errors" => 'Signup Failed. Try again']);
            return;
        }
    }

    public function login($data) {
        $email = trim($data['email']);
        $pwd = trim($data['password']);
        
        $this->validator->required($data, ['email','password']);
    }
}