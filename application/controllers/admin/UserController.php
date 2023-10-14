<?php

use application\controllers\admin\AdminMainController;

class UserController extends AdminMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('users');
    }

    function edit($id)
    {
        // var_dump($_SESSION);
        // die;

        $data = $this->users->selectWhereId($id);
        $this->template(
            'admin/user/edit',
            'Edit User',
            array('data' => $data)
        );
    }

    public function update($id)
    {
        if ($_POST['submited']) :

            $dataBefore = $this->users->selectWhereId($id);

            if ($dataBefore[0]['username'] != $_POST['username']) {
                $getUsernameRow = $this->users->selectWhereCol(array('username' => $_POST['username']));
                var_dump($getUsernameRow);
                die;

                if ($getUsernameRow >= 1) {
                    $message = "USERNAME SUDAH ADA";
                    return $this->template('admin/user/edit', 'Edit User', array(
                        'data' => $dataBefore,
                        'error' => $message
                    ));
                }
            }

            if ($_SESSION['login']['role'] = 'admin') :
                $role = $_POST['role'];
            else :
                $role = $_SESSION['login']['role'];
            endif;

            $data = [
                'username' => $_POST['username'],
                'full_name' => $_POST['full_name'],
                'role' => $role,
            ];

            $save = $this->users->update($data, array('id_user' => $id));

            if ($save) :
                $this->updateSession($data);
                $message = "SUCSESS";
                return $this->redirect('admin/user/edit/' . $id);
            else :
                $this->updateSession($dataBefore[0]);
                $message = "FAILED SAVE";
                return $this->template('admin/user/edit', 'Edit User', array(
                    'data' => $dataBefore,
                    'error' => $message
                ));
            endif;
        else :
            return $this->redirect('admin/user/edit/' . $_SESSION['login']['id_user']);
        endif;
    }

    public function edit_password($id)
    {
        // var_dump($_SESSION);
        // die;
        $data = $this->users->selectWhereId($id);
        $this->template(
            'admin/user/edit-password',
            'Edit User Password',
            array('data' => $data)
        );
    }

    public function update_password($id)
    {
        if ($_POST['submited']) :

            $dataBefore = $this->users->selectWhereId($id);

            if (empty($_POST['password']) or empty($_POST['re_password'])) :
                $message = "PASSWORD ATAU RE PASSWORD TIDAK BOLEH KOSONG";
                return $this->template('admin/user/edit-password', 'Edit User Password', array(
                    'data' => $dataBefore,
                    'error' => $message
                ));
            else :
                if ($_POST['password'] == $_POST['re_password']) :

                    $data = [
                        'password' => md5($_POST['password']),
                    ];

                    $save = $this->users->update($data, array('id_user' => $id));

                    if ($save) :
                        $this->updateSession($data);
                        $message = "SUCSESS";
                        return $this->redirect('admin/user/edit_password/' . $id);
                    else :
                        $this->updateSession($dataBefore[0]);
                        $message = "FAILED SAVE";
                        return $this->template('admin/user/edit-password', 'Edit User Password', array(
                            'data' => $dataBefore,
                            'error' => $message
                        ));
                    endif;

                else :
                    $message = "PASSWORD DAN RE PASSWORD TIDAK SAMA";
                    return $this->template('admin/user/edit-password', 'Edit User Password', array(
                        'data' => $dataBefore,
                        'error' => $message
                    ));
                endif;
            endif;

        else :
            return $this->redirect('admin/user/edit_password/' . $_SESSION['login']['id_user']);
        endif;
    }

    function updateSession($data = array())
    {
        $_SESSION['login']['username'] = empty($data['username']) ? $_SESSION['login']['username'] : $data['username'];
        $_SESSION['login']['password'] = empty($data['password']) ? $_SESSION['login']['password'] : $data['password'];
        $_SESSION['login']['full_name'] = empty($data['full_name']) ? $_SESSION['login']['full_name'] : $data['full_name'];
        $_SESSION['login']['role'] = empty($data['role']) ? $_SESSION['login']['role'] : $data['role'];
    }
}
