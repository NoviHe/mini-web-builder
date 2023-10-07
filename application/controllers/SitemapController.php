<?php

use application\controllers\MainController;

class SitemapController extends MainController
{
    public function index()
    {
        // $sub_id = !empty($_GET['sub_id']) ? $_GET['sub_id'] : '';
        $view = $this->view('sitemap/index');
        // $view->bind('sub_id', $sub_id);
    }
}
