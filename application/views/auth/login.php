<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Lelang</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/app.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/pages/auth.css">

    <!-- Toastify -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href=""><img src="<?= base_url('assets') ?>/images/logo/logo.png" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title" style="font-size: 30px;">Log in.</h1>
                    <p class="auth-subtitle mb-5" style="font-size: 20px;">Log in with your data that you entered during registration.</p>

                    <form action="<?= base_url('auth/login') ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn shadow mt-3">Log in</button>
                    </form>
                    <div class="text-center mt-5">
                        <p class='text-gray-600'>Don't have an account? <a href="<?= base_url('auth/register') ?>" class='font-bold'>Sign
                                up</a>.</p>
                        <!-- <p><a class='font-bold' href="">Forgot password?</a>.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Toastify -->
    <script src="<?= base_url('assets') ?>/vendors/toastify/toastify.js"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url('assets') ?>/js/extensions/sweetalert2.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <?php if ($this->session->flashdata('failed')) : ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: '<?= $this->session->flashdata('failed') ?>',
            })
        </script>
    <?php endif; ?>
</body>

</html>