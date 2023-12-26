<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .w-35 {
            width: 35%;
        }
    </style>
</head>

<body>
    <?php
        require_once 'vendor/autoload.php';
        if(!session_id()){
            session_start();
        }
        $google= new Google_Client();

        $google->setClientId('581288437206-5ukuvb00jcjlkdu9ouq9bjv1incl26aq.apps.googleusercontent.com');
        $google->setClientSecret('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');
        $google->setredirectUri('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);

        $google->addScope('email');
        $google->addScope('profile');

        if(isset($_GET['code'])){
            $token=$google->fetchAccessTokenWithAuthCode($_GET['code']);
            if(!isset($token['error'])){
                $google->setAccessToken($token['access_token']);
                $_SESSION['access_token']=$token['access_token'];
                $google_service= new Google_Service_Oauth2($google);

                $data=$google_service->userinfo->get();
                // var_dump($data);

                $_SESSION['email']=$data['email'];

                header('location:1-g_user.php');
                exit();
            }
        }
        if(!$_SESSION['access_token']){
            $google_url=$google->createAuthUrl();
        }
    ?>
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-12 col-md-8 col-lg-5 m-auto">
                <form action="1-user.php" method="post" class="rounded border p-3">
                    <h2 class="text-center pb-3">Login Form</h2>
                    <div class="d-flex py-2">
                        <label class="w-35" for="email">Email <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="text" name="email" id="email"
                                value="<?php echo isset($_SESSION['email_address']) ? $_SESSION['email_address'] : null; ?>" />
                            <div class="text-danger ps-2">
                                <?php echo isset($_SESSION['email_err']) ? $_SESSION['email_err'] : null; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="password">Password <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="password" name="password" id="password" />
                            <div class="text-danger ps-2">
                                <?php echo isset($_SESSION['password_err']) ? $_SESSION['password_err'] : null;  session_destroy();?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3 text-center">
                        <div class="w-100">
                            <button class="btn btn-success w-75" type="submit">Submit</button>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center pt-3 text-center">
                        <div class="w-100">
                            <a class="btn btn-primary w-75" href="<?php echo $google_url; ?>">Login with Google</a>
                        </div>
                        <div class="text-danger text-center ps-2">
                            <?php echo isset($_SESSION['google_err']) ? $_SESSION['google_err'] : null; session_destroy();?>
                        </div>
                    </div>
                    <a href="1-signup.php" class='mt-2'>Signup Here</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>