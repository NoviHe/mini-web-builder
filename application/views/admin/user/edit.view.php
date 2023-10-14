<?php
$error = isset($data['error']) ? $data['error'] : false;
$success = isset($data['success']) ? $data['success'] : false;
$data = $data['data'][0];
// var_dump($data);
// die;

?>

<form action="<?= URL_WEBSITE; ?>/admin/user/update/<?= $data['id_user']; ?>" enctype="multipart/form-data" method="post">
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
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="<?= $data['username']; ?>">
            </div>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" id="full_name" value="<?= $data['full_name']; ?>">
            </div>
            <?php if ($data['role'] == 'admin') : ?>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option <?= $data['role'] == 'admin' ? 'selected' : '' ?> value="admin">Admin</option>
                        <option <?= $data['role'] == 'user' ? 'selected' : '' ?> value="user">User</option>
                    </select>
                </div>
            <?php endif; ?>
        </div>

    </div>
</form>
<script>

</script>