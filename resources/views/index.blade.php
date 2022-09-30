<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['/assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/azzara.min.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Silahkan Login</h3>
            <form action="/cek_login" method="post">
                @csrf
                <div class="login-form">
                    <div class="form-group">
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Email ..."
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="Password ..." required>
                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-action">
                        <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/ready.js"></script>
</body>

</html>
