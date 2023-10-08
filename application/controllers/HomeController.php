<?php

use application\controllers\MainController;

class HomeController extends MainController
{
    function __construct()
    {
        $this->model('page_builder');
    }

    public function index()
    {
        $this->template('index');
    }

    public function page($slug)
    {
        $slug = explode('.', $slug);

        $query = $this->page_builder->selectWhere(array('slug' => $slug[0]));
        $data = $this->page_builder->getResult($query);
        $view = $this->view('page-builder');
        $view->bind('data', $data);
    }
}
