<?php
class User {
    public function createUser($username, $email, $pwdhashed){
        $db = DB::Connect();
        $stmt = $db->prepare('INSERT INTO users (username, email, password) values (?, ?, ?)');
        return $stmt->execute([$username, $email, $pwdhashed]);
    }

    public function findEmailAndPassword($email, $pwd){
        $db = DB::Connect();
        $stmt = $db->prepare('SELECT * FROM users where email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($pwd, $user['password'])){
            return $user;
        }

        return false;
    }

    public function checkUser($email){
        $db = DB::Connect();
        $stmt = $db->prepare('SELECT id from users where email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch() ? true : false;
    }


}
