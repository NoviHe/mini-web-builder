<?php

class LoginController extends Controller
{
    function __construct()
    {
        $this->model('users');
    }

    public function template($viewName, $title = 'Login', $data = array())
    {

        $view = $this->view('admin/auth/template');
        $view->bind('viewName', $viewName);
        $view->bind('data', $data);
        $view->bind('title', $title);
    }

    public function index()
    {
        // $this->view('admin/auth/login');
        $this->template('admin/auth/login', 'Login');
    }

    public function check()
    {
        $username = $this->validate($_POST['username']);
        $password = md5($this->validate($_POST['password']));

        $query = $this->users->selectWhere(array('username' => $username, 'password' => $password));

        $data = $this->users->getResult($query);
        $jml = $this->users->getRows($query);

        if ($jml > 0) {
            $data = $data[0];
            $_SESSION['login']['id_user'] = $data['id_user'];
            $_SESSION['login']['username'] = $data['username'];
            $_SESSION['login']['password'] = $data['password'];
            $_SESSION['login']['full_name'] = $data['full_name'];

            $this->redirect('admin');
        } else {
            $this->template(
                'admin/auth/login',
                'Login',
                array('msg' => 'Username atau Password salah')
            );
        }
    }

    public function register()
    {
        $this->template('admin/auth/register', 'Register');
    }

    public function signup()
    {
        if ($_POST['submited']) {
            if (preg_match('/\s/', $_POST['username'])) {
                return $this->template(
                    'admin/auth/register',
                    'Register',
                    array('msg' => 'Username Tidak Valid'),
                );
            } else {
                $username = $_POST['username'];
            }

            $query = $this->users->selectWhere(array('username' => $username));
            $getSlugRows = $this->users->getRows($query);
            if ($getSlugRows >= 1) {
                $message = "Username Tidak Valid";
                return $this->template(
                    'admin/auth/register',
                    'Register',
                    array('msg' => $message),
                );
            }

            $data = [
                'username' => $username,
                'password' => md5($_POST['password']),
                'full_name' => $_POST['fullname'],
            ];

            $save = $this->users->insert($data);
            if ($save) {
                $id = $this->users->getId();
                $query = $this->users->selectWhere(array('id_user' => $id));
                $dataLogin =  $this->users->getResult($query);
                if ($this->users->getRows($query) > 0) {

                    $dataLogin = $dataLogin[0];

                    $_SESSION['login']['id_user'] = $dataLogin['id_user'];
                    $_SESSION['login']['username'] = $dataLogin['username'];
                    $_SESSION['login']['password'] = $dataLogin['password'];
                    $_SESSION['login']['full_name'] = $dataLogin['full_name'];

                    return $this->redirect('admin');
                } else {
                    return $this->template(
                        'admin/auth/register',
                        'Resgi',
                        array('msg' => 'Berhasil Daftar, Gagal Masuk coba ke Login page'),
                    );
                }
            } else {
                return $this->template(
                    'admin/auth/register',
                    'Register',
                    array('msg' => 'Gagal Daftar Akun'),
                );
            }
        } else {
            return $this->redirect('login/register');
        }
    }
}
