<?php
class User {
    public function createUser($username, $email, $pwdhashed){
        $db = DB::Connect();
        $stmt = $db->prepare('INSERT INTO users (username, email, password) values (?, ?, ?)');
        return $stmt->execute([$username, $email, $pwdhashed]);
    }

    public function checkUser($email){
        $db = DB::Connect();
        $stmt = $db->prepare('SELECT id from users where email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch() ? true : false;
    }
}
