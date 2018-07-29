<?php

class User extends Controller {

    public function __construct() {
        $this->_model = $this->model("User_Model");
    }

    // middleware to check if user is logged in
    private function mustBeLoggedIn() {
        if(!Session::exists("user")) {
            // if not logged in, redirect to login
            Redirect::to("user/login");
        }
    }

    // middleware to check if user is not logged in
    private function mustNotBeLoggedIn() {
        if(Session::exists("user")) {
            // if logged in, redirect to index page
            Redirect::to("user/index");
        }
    }

    public function index() {
        // use middleware
        $this->mustBeLoggedIn();

        Request::method('GET', function(){
            // load view
            $this->view('user/index');
        });
    }

    public function login() {
        // use middleware
        $this->mustNotBeLoggedIn();

        Request::method('GET', function(){
            // load view
            $this->view('user/login');
        });

        Request::method("POST", function() {
            // read and sanitize inputs
            $email = Input::get("email");
            $password = Input::get("password");

            // if user logged in redirect to index
            if($this->_model->loginUser($email, $password)) {
                Redirect::to("user/index");
            } else {
                // if error, redirect to login
                // error msg already set
                Redirect::to("user/login");
            }
        });
    }

    public function register() {
        $this->mustNotBeLoggedIn();

        Request::method('GET', function(){
            $this->view('user/register');
        });

        Request::method("POST", function() {
            // read and sanitize inputs
            $email = Input::get("email");
            $password = Input::get("password");

            // run user validation, if returned false
            // then go to register page, error set
            if(!$this->_model->validateUser($email, $password)) {
                Redirect::to("user/register");
            }

            // if validation ok, try add user and log him in
            if($this->_model->addUser($email, $password)) {
                if($this->_model->loginUser($email, $password)) {
                    // case success, redirect to index
                    Redirect::to("user/index");
                } else {
                    // if login error, redirect to login
                    Redirect::to("user/login");
                }
            } else {
                // if register error, redirect to register
                // with errorr
                Redirect::to("user/register");
            }
        });
    }

    public function logout() {
        $this->mustBeLoggedIn();

        Request::method('GET', function(){
            // delete session
            if($this->_model->logoutUser()) {
                Redirect::to("user/login");
            }
        });
    }
}