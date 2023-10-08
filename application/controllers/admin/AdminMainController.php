<?php

namespace application\controllers\admin;

use Controller;

class AdminMainController extends Controller
{

    public function __construct()
    {
        if (empty($_SESSION['login']['username']) and empty($_SESSION['login']['password'])) {
            $this->redirect('login');
        }
    }

    public function template($viewName, $bc = '', $data = array())
    {

        $view = $this->view('admin/template');
        $view->bind('viewName', $viewName);
        $view->bind('breadcrumb', $bc);
        $view->bind('data', $data);
    }
}
