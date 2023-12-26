<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
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

        $google->setClientId('581288437206-3i7s40ua9qp0sj4o3avtu9ordrv4t86p.apps.googleusercontent.com');
        $google->setClientSecret('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');
        $google->setredirectUri('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);

        $google->addScope('email');
        $google->addScope('profile');

        if(isset($_SESSION['message'])){
            echo '<h4 class="text-center pt-3">'.$_SESSION['message'].'</h4>';
        }
        unset($_SESSION['message']);

        $fname_err=$lname_err=$email_err=$password_err=$c_password_err=$city_err=$state_err=$gender_err=$skills_err=$message_err=$image_err=$captcha_err="";
        
        $a=rand(1,21);
        $b=rand(0,12);

        if($_SERVER['REQUEST_METHOD']== 'POST'){
           include '1-validation.php';
           $sum=$a+$b;
        
        }

        if(isset($_GET['code'])){
            $token=$google->fetchAccessTokenWithAuthCode($_GET['code']);
            if(!isset($token['error'])){
                $google->setAccessToken($token['access_token']);
                $_SESSION['access_token']=$token['access_token'];
                $google_service= new Google_Service_Oauth2($google);

                $data=$google_service->userinfo->get();
                // var_dump($data);
                // echo '<br>';

                $_SESSION['f_name']=$data['given_name'];
                $_SESSION['l_name']=$data['family_name'];
                $_SESSION['email']=$data['email'];
                $_SESSION['profile']=$data['picture'];
                header('location:1-g_insert.php');
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
                <form action="1-data.php" method="post" enctype="multipart/form-data" class="rounded border p-3">
                    <h2 class="text-center pb-3">Signup Form</h2>
                    <div class="d-flex pb-2">
                        <label class="w-35" for="f_name">First Name <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="text" name="f_name" id="f_name"
                                value="<?php echo isset($fname) ? $fname : null?>" />
                            <div class="text-danger ps-2">
                                <?php echo $fname_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="l_name">Last Name <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="text" name="l_name" id="l_name"
                                value="<?php echo isset($lname) ? $lname : null?>" />
                            <div class="text-danger ps-2">
                                <?php echo $lname_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="email">Email <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="text" name="email" id="email"
                                value="<?php echo isset($email) ? $email : null?>" />
                            <div class="text-danger ps-2">
                                <?php echo $email_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="password">Password <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="password" name="password" id="password" />
                            <div class="text-danger ps-2">
                                <?php echo $password_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="c_password">Confirm Password <span class="text-danger">*</span>
                            :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="password" name="c_password" id="c_password" />
                            <div class="text-danger ps-2">
                                <?php echo $c_password_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="city">City <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <select class="form-control" name="city" id="city">
                                <option value="">--select--</option>
                                <option value="Mohali" <?php echo ($city=='Mohali' ) ? 'selected' : null ?> >Mohali
                                </option>
                                <option value="Chandigarh" <?php echo ($city=='Chandigarh' ) ? 'selected' : null ?>
                                    >Chandigarh</option>
                                <option value="Shimla" <?php echo ($city=='Shimla' ) ? 'selected' : null ?> >Shimla
                                </option>
                                <option value="Hamirpur" <?php echo ($city=='Hamirpur' ) ? 'selected' : null ?> >Hamirpur
                                </option>
                            </select>
                            <div class="text-danger ps-2">
                                <?php echo $city_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="state">State <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <select class="form-control" name="state" id="state">
                                form.php <option value="">--select--</option>
                                <option value="Punjab" <?php echo ($state=='Punjab' ) ? 'selected' : null ?> >Punjab
                                </option>
                                <option value="Himachal Pradesh" <?php echo ($state=='Himachal Pradesh' ) ? 'selected'
                                    : '' ?> >Himachal Pradesh</option>
                                <option value="Haryana" <?php echo ($state=='Haryana' ) ? 'selected' : null ?> >Haryana
                                </option>
                            </select>
                            <div class="text-danger ps-2">
                                <?php echo $state_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="gender">Gender <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <div>
                                <input class="ms-1" type="radio" name="gender" value="Male" id="male" <?php echo ($gender_=='Male' ) ? 'checked' : null ?> />
                                <label class="px-2" for="male">Male</label>
                                <input class="ms-2" type="radio" name="gender" value="Female" id="female" <?php echo  ($gender_=='Female' ) ? 'checked' : null ?> />
                                <label class="px-2" for="female">Female</label>
                            </div>
                        <div class="w-100 text-danger ps-2">
                            <?php echo $gender_err; ?>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="gender">Skills <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <div>
                                <input class="ms-1" type="checkbox" name="skills[]" value="HTML" id="html" <?php echo
                                    (stristr($skill, "HTML" ))? "checked" : null ; ?> />
                                <label class="px-2" for="html">HTML</label>
                                <input class="ms-2" type="checkbox" name="skills[]" value="CSS" id="css" <?php echo
                                    (stristr($skill, "CSS" ))? "checked" : null ; ?> />
                                <label class="px-2" for="css">CSS</label>
                            </div>
                            <div>
                                <input class="ms-1" type="checkbox" name="skills[]" value="JavaScript" id="javascript" <?php echo
                                    (stristr($skill, "JavaScript" ))? "checked" : null ; ?> />
                                <label class="px-2" for="javascript">JavaScript</label>
                                <input class="ms-2" type="checkbox" name="skills[]" value="PHP" id="php" <?php echo
                                    (stristr($skill, "PHP" ))? "checked" : null ; ?> />
                                <label class="px-2" for="php">PHP</label>
                            </div>
                            <div class="text-danger ps-2">
                                <?php echo $skills_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="image">images <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="file" name="image[]" id="image" multiple />
                            <div class="text-danger ps-2">
                                <?php echo $image_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="message">Message <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <textarea class="form-control" name="message" id="message"
                                rows="5"><?php echo isset($message) ? trim($message) : null?></textarea>
                            <div class="text-danger ps-2">
                                <?php echo $message_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="captcha">Enter captcha  <span class="text-danger">*</span> : </label>
                        <div class="flex-fill w-50">
                            <div class='d-flex align-items-center'>
                                <div class='me-3'><?php echo $a. " + ".$b ." ="; ?></div>
                                <input class="w-25 form-control py-1" type="text" name="captcha" id="captcha">
                             </div>
                            <div class="text-danger ps-2">
                                <?php echo $captcha_err; ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="sum" value="<?php echo $sum; ?>">
                    </div>
                    <div class="d-flex align-items-center pt-3 text-center">
                        <div class="w-100">
                            <button class="btn btn-success w-75" type="submit">Submit</button>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center pt-3 text-center">
                        <div class="w-100">
                            <a class="btn btn-primary w-75" href="<?php echo $google_url; ?>">Signup with Google</a>
                        </div>
                        <div class="text-danger text-center ps-2">
                            <?php echo isset($_SESSION['google_err']) ? $_SESSION['google_err'] : null;?>
                        </div>
                    </div>
                    <a href="1-login.php" class='mt-2'>Login Here</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php

session_destroy();

?>