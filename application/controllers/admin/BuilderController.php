<?php

use application\controllers\admin\AdminMainController;

class BuilderController extends AdminMainController
{
    function __construct()
    {
        parent::__construct();
        $this->model('page_builder');
    }

    public function index()
    {
        $idUser = $_SESSION['login']['id_user'];
        $query = $this->page_builder->selectWhere(array('user_id' => $idUser), 'created_at', 'DESC');
        $lists = $this->page_builder->getResult($query);

        $this->template(
            'admin/page-builder/index',
            'Page Builder',
            array('lists' => $lists),
        );
    }

    public function create()
    {
        $this->template('admin/page-builder/create', 'Create Page');
    }

    public function store()
    {
        if ($_POST['submited']) :

            $query = $this->page_builder->selectWhere(array('slug' => $_POST['slug']));
            $getSlugRows = $this->page_builder->getRows($query);
            if ($getSlugRows >= 1) {
                $message = "SLUG SUDAH ADA";
                return $this->template('admin/page-builder/create', 'Create Page', array('error' => $message));
            }

            $username = $_SESSION['login']['username'];
            $idUser = $_SESSION['login']['id_user'];

            $public_path = 'public/img/uploads/';
            $upload_path = ROOT . DS . $public_path;
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            $allowedExtension = array('jpg', 'jpeg', 'gif', 'png');
            $maxSize = 10485760;

            if ($_POST['sumber_gambar_header'] == 'upload') {
                if (!empty($_FILES['gambar_header_upload']['name'])) {
                    $explFile = explode('.', $_FILES['gambar_header_upload']['name']);
                    $extensiFile = strtolower(end($explFile));
                    $sizeFile = $_FILES['gambar_header_upload']['size'];
                    $tempFile = $_FILES['gambar_header_upload']['tmp_name'];

                    $fileName = 'header_' . $username . '_' . $idUser . '_' . date('dmYhis') . '.' . $extensiFile;
                    $targetFilePath = $upload_path . $fileName;

                    if (in_array($extensiFile, $allowedExtension) === true) {
                        if ($sizeFile < $maxSize) {
                            move_uploaded_file($tempFile, $targetFilePath);
                            $gambar_header = BASE_PATH . '/' . $public_path . $fileName;
                        } else {
                            $message = "UKURAN FILE TERLALU BESAR";
                            return $this->template('admin/page-builder/create', 'Create Page', array('error' => $message));
                        }
                    } else {
                        $message = "EXTENSI TIDAK DI PERBOLEHKAN";
                        return $this->template('admin/page-builder/create', 'Create Page', array('error' => $message));
                    }
                } else {
                    $message = "FILE TIDAK BOLEH KOSONG";
                    return $this->template('admin/page-builder/create', 'Create Page', array('error' => $message));
                }
            } else if ($_POST['sumber_gambar_header'] == 'url') {
                $gambar_header = $_POST['gambar_header_url'];
            }

            if ($_POST['sumber_gambar_footer'] == 'upload') {
                if (!empty($_FILES['gambar_header_upload']['name'])) {
                    $explFile = explode('.', $_FILES['gambar_footer_upload']['name']);
                    $extensiFile = strtolower(end($explFile));
                    $sizeFile = $_FILES['gambar_footer_upload']['size'];
                    $tempFile = $_FILES['gambar_footer_upload']['tmp_name'];

                    $fileName = 'footer_' . $username . '_' . $idUser . '_' . date('dmYhis') . '.' . $extensiFile;
                    $targetFilePath = $upload_path . $fileName;

                    if (in_array($extensiFile, $allowedExtension) === true) {
                        if ($sizeFile < $maxSize) {
                            move_uploaded_file($tempFile, $targetFilePath);
                            $gambar_footer = BASE_PATH . '/' . $public_path . $fileName;
                        } else {
                            $message = "UKURAN FILE TERLALU BESAR";
                            return $this->template('admin/page-builder/create', 'Create Page', array('error' => $message));
                        }
                    } else {
                        $message = "EXTENSI TIDAK DI PERBOLEHKAN";
                        return $this->template('admin/page-builder/create', 'Create Page', array('error' => $message));
                    }
                } else {
                    $message = "FILE TIDAK BOLEH KOSONG";
                    return $this->template('admin/page-builder/create', 'Create Page', array('error' => $message));
                }
            } else if ($_POST['sumber_gambar_footer'] == 'url') {
                $gambar_footer = $_POST['gambar_footer_url'];
            }

            $data = [
                'user_id' => $idUser,
                'title' => $_POST['title'],
                'slug' => $_POST['slug'],
                'text_header' => str_replace('\'', '"', $_POST['text_header']),
                'sumber_gambar_header' => $_POST['sumber_gambar_header'],
                'gambar_header' => $gambar_header,
                'text_body' => str_replace('\'', '"', $_POST['text_body']),
                'btn_name' => $_POST['btn_name'],
                'btn_class' => $_POST['btn_class'],
                'btn_type' => $_POST['btn_type'],
                'btn_onclick' => str_replace('\'', '"', $_POST['btn_onclick']),
                'btn_target' => $_POST['btn_target'],
                'btn_link' => $_POST['btn_link'],
                'sumber_gambar_footer' => $_POST['sumber_gambar_footer'],
                'gambar_footer' => $gambar_footer,
                'text_footer' => $_POST['text_footer'],
                'custom_css' => str_replace('\'', '"', $_POST['custom_css']),
                'script_locker' => str_replace('\'', '"', $_POST['script_locker']),
            ];
            $save = $this->page_builder->insert($data);
            $idPage = $this->page_builder->getId();
            // var_dump($this->page_builder->getError());
            // die;
            if ($save) :
                $message = "SUCSESS";
                return $this->redirect('admin/builder/edit/' . $idPage);
            // return $this->template('admin/page-builder/create', 'Create Page', array('success' => $message));
            else :
                $message = "FAILED SAVE";
                return $this->template('admin/page-builder/create', 'Create Page', array('error' => $message));
            endif;
        else :
            return $this->redirect('admin/builder/create');
        endif;
    }

    public function edit($id)
    {
        $query = $this->page_builder->selectWhere(array('id_page_builder' => $id));
        $data = $this->page_builder->getResult($query);
        $this->template(
            'admin/page-builder/edit',
            'Edit Page',
            array('data' => $data)
        );
    }

    public function update($id)
    {
        $query = $this->page_builder->selectWhere(array('id_page_builder' => $id));
        $dataBefore = $this->page_builder->getResult($query);

        if ($_POST['submited']) :

            if ($dataBefore[0]['slug'] != $_POST['slug']) {
                $query = $this->page_builder->selectWhere(array('slug' => $_POST['slug']));
                $getSlugRows = $this->page_builder->getRows($query);
                if ($getSlugRows >= 1) {
                    $message = "SLUG SUDAH ADA";
                    return $this->template('admin/page-builder/edit', 'Edit Page', array(
                        'data' => $dataBefore,
                        'error' => $message
                    ));
                }
            }

            $username = $_SESSION['login']['username'];
            $idUser = $_SESSION['login']['id_user'];

            $public_path = 'public/img/uploads/';
            $upload_path = ROOT . DS . $public_path;
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            $allowedExtension = array('jpg', 'jpeg', 'gif', 'png');
            $maxSize = 10485760;

            if ($_POST['sumber_gambar_header'] == 'upload') {
                if (!empty($_FILES['gambar_header_upload']['name'])) {
                    $explFile = explode('.', $_FILES['gambar_header_upload']['name']);
                    $extensiFile = strtolower(end($explFile));
                    $sizeFile = $_FILES['gambar_header_upload']['size'];
                    $tempFile = $_FILES['gambar_header_upload']['tmp_name'];

                    $fileName = 'header_' . $username . '_' . $idUser . '_' . date('dmYhis') . '.' . $extensiFile;
                    $targetFilePath = $upload_path . $fileName;

                    if (in_array($extensiFile, $allowedExtension) === true) {
                        if ($sizeFile < $maxSize) {
                            move_uploaded_file($tempFile, $targetFilePath);
                            $gambar_header = BASE_PATH . '/' . $public_path . $fileName;
                        } else {
                            $message = "UKURAN FILE TERLALU BESAR";
                            return $this->template('admin/page-builder/edit', 'Edit Page', array(
                                'data' => $dataBefore,
                                'error' => $message
                            ));
                        }
                    } else {
                        $message = "EXTENSI TIDAK DI PERBOLEHKAN";
                        return $this->template('admin/page-builder/edit', 'Edit Page', array(
                            'data' => $dataBefore,
                            'error' => $message
                        ));
                    }
                } else {
                    if (!empty($dataBefore[0]['gambar_header'])) {
                        $gambar_header = $dataBefore[0]['gambar_header'];
                    } else {
                        $message = "FILE TIDAK BOLEH KOSONG";
                        return $this->template('admin/page-builder/edit', 'Edit Page', array(
                            'data' => $dataBefore,
                            'error' => $message
                        ));
                    }
                }
            } else if ($_POST['sumber_gambar_header'] == 'url') {
                $gambar_header = $_POST['gambar_header_url'];
            }

            if ($_POST['sumber_gambar_footer'] == 'upload') {
                if (!empty($_FILES['gambar_footer_upload']['name'])) {
                    $explFile = explode('.', $_FILES['gambar_footer_upload']['name']);
                    $extensiFile = strtolower(end($explFile));
                    $sizeFile = $_FILES['gambar_footer_upload']['size'];
                    $tempFile = $_FILES['gambar_footer_upload']['tmp_name'];

                    $fileName = 'footer_' . $username . '_' . $idUser . '_' . date('dmYhis') . '.' . $extensiFile;
                    $targetFilePath = $upload_path . $fileName;

                    if (in_array($extensiFile, $allowedExtension) === true) {
                        if ($sizeFile < $maxSize) {
                            move_uploaded_file($tempFile, $targetFilePath);
                            $gambar_footer = BASE_PATH . '/' . $public_path . $fileName;
                        } else {
                            $message = "UKURAN FILE TERLALU BESAR";
                            return $this->template('admin/page-builder/edit', 'Edit Page', array(
                                'data' => $dataBefore,
                                'error' => $message
                            ));
                        }
                    } else {
                        $message = "EXTENSI TIDAK DI PERBOLEHKAN";
                        return $this->template('admin/page-builder/edit', 'Edit Page', array(
                            'data' => $dataBefore,
                            'error' => $message
                        ));
                    }
                } else {
                    if (!empty($dataBefore[0]['gambar_footer'])) {
                        $gambar_footer = $dataBefore[0]['gambar_footer'];
                    } else {
                        $message = "FILE TIDAK BOLEH KOSONG";
                        return $this->template('admin/page-builder/edit', 'Edit Page', array(
                            'data' => $dataBefore,
                            'error' => $message
                        ));
                    }
                }
            } else if ($_POST['sumber_gambar_footer'] == 'url') {
                $gambar_footer = $_POST['gambar_footer_url'];
            }

            $data = [
                'title' => $_POST['title'],
                'slug' => $_POST['slug'],
                'text_header' => $_POST['text_header'],
                'sumber_gambar_header' => $_POST['sumber_gambar_header'],
                'gambar_header' => $gambar_header,
                'text_body' => $_POST['text_body'],
                'btn_name' => $_POST['btn_name'],
                'btn_class' => $_POST['btn_class'],
                'btn_type' => $_POST['btn_type'],
                'btn_onclick' => str_replace('\'', '"', $_POST['btn_onclick']),
                'btn_target' => $_POST['btn_target'],
                'btn_link' => $_POST['btn_link'],
                'sumber_gambar_footer' => $_POST['sumber_gambar_footer'],
                'gambar_footer' => $gambar_footer,
                'text_footer' => $_POST['text_footer'],
                'custom_css' => str_replace('\'', '"', $_POST['custom_css']),
                'script_locker' => str_replace('\'', '"', $_POST['script_locker']),
            ];

            $save = $this->page_builder->update($data, array('id_page_builder' => $id));
            if ($save) :
                $message = "SUCSESS";
                return $this->redirect('admin/builder/edit/' . $id);
            // return $this->template('admin/page-builder/edit', 'Edit Page', array('success' => $message));
            else :
                $message = "FAILED SAVE";
                return $this->template('admin/page-builder/edit', 'Edit Page', array(
                    'data' => $dataBefore,
                    'error' => $message
                ));
            endif;
        else :
            return $this->redirect('admin/builder/edit' . $id);
        endif;
    }

    public function delete()
    {
        if ($_POST['deleted']) :
            $id = $_POST['id_delete'];
            $hapus = $this->page_builder->delete(array('id_page_builder' => $id));
            return $this->redirect('admin/builder/');
        else :
            return $this->redirect('admin/builder/');
        endif;
    }
}
