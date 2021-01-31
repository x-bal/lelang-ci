<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/app.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/pages/auth.css">
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
                        <div class="form-check form-check d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn shadow mt-5">Log in</button>
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
</body>

</html>