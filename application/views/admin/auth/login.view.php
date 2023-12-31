<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg">
                    <div class="card-body p-5">
                        <form class="mb-3 mt-md-4" action="<?= URL_WEBSITE; ?>/login/check" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">Login to Simple Page Builder</h2>
                            <p class=" mb-5">Please enter your username and password!</p>
                            <div class="mb-3">
                                <label for="username" class="form-label ">Username</label>
                                <input name="username" type="text" class="form-control" id="username" placeholder="Userxxx01">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label ">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="*******">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-outline-dark" type="submit">Login</button>
                            </div>
                        </form>
                        <div>
                            <p class="mb-0  text-center">Don't have an account? <a href="<?= URL_WEBSITE . DS . 'login\register'; ?>" class="text-primary fw-bold">Sign
                                    Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>