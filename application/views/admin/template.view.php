<?php header('Access-Control-Allow-Origin: *'); //for all 
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
    require_once ROOT . "/application/functions/functions_html.php";
    require_once ROOT . "/application/functions/functions_template.php";

    load_css('Rich-Text-Editor/richtext.min.css');
    load_script('Rich-Text-Editor/jquery.richtext.min.js');
    ?>
    <title><?= !empty($breadcrumb) ? $breadcrumb . ' | ' : ''; ?>NviReview Administration</title>
    <link rel="shortcut icon" href="<?= BASE_PATH . '/public/img/' . FAVICON ?>">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-lg">
            <a class="navbar-brand" href="#"><?= SITE_NAME; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?= navItem('admin', 'Dashboard') ?>
                    <?= navItem('admin/builder', 'Page Builder') ?>
                </ul>
                <div class="float-end d-flex justify-content-end ">
                    <div class="mx-2 pt-2 dropdown">
                        <span class="pt-1 mx-1 float-end dropdown-toggle" data-bs-toggle="dropdown"><?= $_SESSION['login']['full_name']; ?></span>
                        <!-- <img class="rounded  float-end" style="width: 15%;" src="<?= BASE_PATH ?>/public/img/avatar.jpg" alt=""> -->
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= URL_WEBSITE ?>/admin/user/edit/<?= $_SESSION['login']['id_user']; ?>"><i class="fa fa-user"></i> Edit User</a></li>
                            <li><a class="dropdown-item" href="<?= URL_WEBSITE ?>/admin/user/edit_password/<?= $_SESSION['login']['id_user']; ?>"><i class="fa fa-lock"></i> Change Password</a></li>
                            <li>
                                <button type="button" id="btn-logout" class="btn btn-secondary dropdown-item"><i class="fa fa-power-off"></i> Logout</button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <?php
        $view  = new View($viewName);
        $view->bind('data', $data);
        $view->render();
        ?>
    </div>

    <div class="modal" tabindex="-1" id="modal-logout">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="<?= URL_WEBSITE; ?>/admin/logout">
                        <input type="hidden" id="id_delete" name="id_delete">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="logout" value="true" class="btn btn-danger"><i class="fa fa-power-off"></i> Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/4827f8a5ff.js" crossorigin="anonymous"></script>
    <script>
        $('#btn-logout').on('click', function() {
            console.log('clicked');
            $('#modal-logout').modal('show');
            $('.modal-title').text('Logout!!');
            $('.modal-body p').text('Apakah anda yakin?');
        })
    </script>
    <script script type="text/javascript">
        var currentBLang = navigator.language || navigator.userLanguage;
        console.log('Current browser lang ' + currentBLang);
    </script>
</body>

</html>