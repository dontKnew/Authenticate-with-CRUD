<?= $this->extend("app") ?>
<?= $this->section("body") ?>

<div class="container-fluid mt-5">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <h1 class="text-center text-primary mb-2"> <u> Create New Account </u></h1>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger" role="alert"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form action="<?= base_url('register')?>" method="post">
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="InputForName" value="<?= set_value('name') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="InputForPassword">
                </div>
                <div class="mb-3">
                    <label for="InputForConfPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                </div>
                <div class=" mb-3">
                    <button type="submit" class="btn btn-warning my-1">Register</button>
                    <span class="text-light text-primary"> Already have an Account ? <a href="login" class="text-primary"> Login</a> </span>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>