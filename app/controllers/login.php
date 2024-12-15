<?php
class Login extends Controller {
    public function login() {
        $this->view('Login/login');
    }
    public function auth() {
        $this->model('loginauth')->authLogin();
    }
    public function logout() {
        $this->model('loginauth')->logout();
    }
    public function forgot() {
        $this->view('Login/forgot');
    }
    public function reset() {
        $this->model('loginauth')->reset();
    }
}