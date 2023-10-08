<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg">
                    <div class="card-body p-5">
                        <form class="mb-3 mt-md-4" action="<?= URL_WEBSITE; ?>/login/signup" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">Register to Simple Page Builder</h2>
                            <p class=" mb-4">Please fill your full name, username and password!</p>
                            <?php if (isset($data['msg'])) : ?>
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <div class=""> <?= $data['msg']; ?></div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="fullname" class="form-label ">Full Name</label>
                                <input name="fullname" type="text" class="form-control" id="fullname" placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label ">Username</label>
                                <input name="username" type="text" class="form-control" id="username" placeholder="Userxxx01" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label ">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="*******" required>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-outline-dark" type="submit" name="submited" value="true">Sign Up</button>
                            </div>
                        </form>
                        <div>
                            <p class="mb-0  text-center">I have an account? <a href="<?= URL_WEBSITE . DS . 'login'; ?>" class="text-primary fw-bold">Sign
                                    In</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>