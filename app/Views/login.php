<?= $this->extend("app") ?>
<?= $this->section("body") ?>

<div class="container">
    <div class="row justify-content-md-center mt-5">

        <div class="col-md-6 mt-2">
        <h1 class="text-center text-primary mb-5 "> <u> Log into Account </u></h1>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <form action="<?= base_url('login') ?>" method="post">
                <div class="mb-3">
                    <label for="InputForEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="InputForPassword">
                </div>
                <div class=" mb-3">
                    <button type="submit" class="btn btn-danger my-1">Login</button>
                    <span class="text-light text-primary"> Don't have an Account ? <a href="register" class="text-primary"> click here </a> </span>
                </div>
            </form>
        </div>

    </div>
</div>

<?= $this->endSection() ?>