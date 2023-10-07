<?php

use application\controllers\admin\AdminMainController;

class BuilderController extends AdminMainController
{
    public function index()
    {
        $this->template('admin/page-builder/index', 'Page Builder');
    }

    public function create()
    {
        $this->template('admin/page-builder/create', 'Page Builder');
    }

    public function store()
    {
        $username = 'pilotke3';
        $idUser = 12;

        $upload_path = ROOT . '/public/img/uploads/';
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        $allowedExtension = array('jpg', 'jpeg', 'gif', 'png');
        $maxSize = 10485760;

        if ($_POST['sumber_gambar_header'] == 'upload') {
            $explFile = explode('.', $_FILES['gambar_header_upload']['name']);
            $extensiFile = strtolower(end($explFile));
            $sizeFile = $_FILES['gambar_header_upload']['size'];
            $tempFile = $_FILES['gambar_header_upload']['tmp_name'];

            $fileName = $username . '_' . $idUser . '_' . date('dmYhis') . '.' . $extensiFile;
            $targetFilePath = $upload_path . $fileName;

            if (in_array($extensiFile, $allowedExtension) === true) {
                if ($sizeFile < $maxSize) {
                    move_uploaded_file($tempFile, $targetFilePath);
                } else {
                    $_SESSION['message']['failed'] = "UKURAN FILE TERLALU BESAR";
                    $this->redirect('admin/builder/create?error=UKURAN FILE TERLALU BESAR');
                }
            } else {
                $_SESSION['message']['failed'] = "EXTENSI TIDAK DI PERBOLEHKAN";
                $this->redirect('admin/builder/create?error=EXTENSI TIDAK DI PERBOLEHKAN');
            }
        }
        $_SESSION['message']['success'] = "SUCSESS";
        $this->redirect('admin/builder/create');
        $gambar_header_upload = $_POST['gambar_header_upload'];
        $gambar_header_url = $_POST['gambar_header_url'];

        $gambar_footer_upload = $_POST['gambar_footer_upload'];
        $gambar_footer_url = $_POST['gambar_footer_url'];

        $data = [
            'title' => $_POST['title'],
            'text_header' => $_POST['text_header'],
            'sumber_gambar_header' => $_POST['sumber_gambar_header'],
            'gambar_header' => $gambar_header_url,
            'text_body' => $_POST['text_body'],
            'btn_name' => $_POST['btn_name'],
            'btn_class' => $_POST['btn_class'],
            'btn_type' => $_POST['btn_type'],
            'btn_onclick' => $_POST['btn_onclick'],
            'btn_target' => $_POST['btn_target'],
            'btn_link' => $_POST['btn_link'],
            'sumber_gambar_footer' => $_POST['sumber_gambar_footer'],
            'gambar_footer' => $gambar_footer_url,
            'text_footer' => $_POST['text_footer'],
            'custom_css' => $_POST['custom_css'],
            'script_locker' => $_POST['script_locker'],
        ];
        var_dump($data);
        die;
    }
}
