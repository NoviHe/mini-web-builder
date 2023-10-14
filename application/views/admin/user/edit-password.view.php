<?php
$error = isset($data['error']) ? $data['error'] : false;
$success = isset($data['success']) ? $data['success'] : false;
$data = $data['data'][0];
// var_dump($data);
// die;

?>

<form action="<?= URL_WEBSITE; ?>/admin/user/update_password/<?= $data['id_user']; ?>" method="post">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-3">
            <button type="submit" name="submited" value="true" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
        </div>

        <?php if ($error) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class=""> <?= $error; ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($success) : ?>
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <div class=""> <?= $success; ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-md-8">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="rePassword" class="form-label">Re Password</label>
                <input type="password" name="re_password" class="form-control" id="rePassword">
            </div>
        </div>

    </div>
</form>
<script>

</script>