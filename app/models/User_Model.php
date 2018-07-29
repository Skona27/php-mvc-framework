<?php

class User_Model extends Model {

    public function __construct() {
        // connect do DB
        parent::__construct();
    }

    public function addUser($email, $password) {
        // hash user password
        $hash = Hash::make($password);

        // try insert user data to DB
        // data already sanitized!
        $insert = $this->_db->query('INSERT INTO users VALUES (:user_id, :user_email, :user_password, :joined_at)',
            [null, $email, $hash, null]);

        if(!$insert->error()) {
            // if no error, return true
           return true;
        }
        // if err, return false
        return false;
    }

    public function loginUser($email, $password) {
        // try find user in db
        $result = $this->_db->query('SELECT * FROM users WHERE user_email=:email', [$email])->first();

        if(!$result) {
            // if no user, return false
            return false;
        }

        // get user hash and id
        $hash =  $result->user_password;
        $user_id = $result->user_id;

        // check if password matches hash
        if(Hash::check($password, $hash)) {
            // set user session. return true
            Session::put("user", $user_id);
            return true;
        } else {
            // if error, return false
            return false;
        }
    }

    public function logoutUser() {
        // if session user exists. delete it
        if(Session::exists("user")) {
            Session::delete("user");
            return true;
        }
        return false;
    }

    public function validateUser($email, $password) {
        // validate email
        if(!Validation::email($email, 5)) {
            echo "Email musi mieć poprawny format i mieć przynajmniej 5 znaków!";
            return false;
        } else if(!Validation::unique($email, "user_email", "users")) {
            echo "Podany email znajduje się już w naszej bazie danych!";
            return false;
        }

        // validate password
        if(!Validation::string($password, 8, 32, true, true)) {
            echo "Hasło musi mieć przynajmniej 8 znaków, jedną cyfrę i jedną dużą literę!";
            return false;
        }

        // if ok, return true
        return true;
    }

}