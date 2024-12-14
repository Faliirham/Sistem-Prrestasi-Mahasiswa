<?php
class Login extends Controller {
    public function index() {
        $this->view('Login/index');
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