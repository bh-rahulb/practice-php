<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .w-35 {
            width: 35%;
        }
    </style>
</head>

<body>
    <?php
       $fname_err=$lname_err=$email_err=$password_err=$c_password_err=$city_err=$state_err=$gender_err=$hobbies_err=$message_err=$image_err=$captcha_err="";

       $a=rand(1,50);
       $b=rand(0,12);
       $sum=$a+$b;

       if($_SERVER['REQUEST_METHOD']== 'POST'){

        
        if (isset($_POST['f_name'])){
            $fname=trim($_POST['f_name']);
            if (empty($fname)){
                $fname_err="first name is required";
            }
        }
        if (isset($_POST['l_name'])){
            $lname=trim($_POST['l_name']);
            if (empty($lname)){
                $lname_err="last name is required";
            }
        }
        if (isset($_POST['email'])){
            $email=trim($_POST['email']);
            if (empty($email)){
                $email_err="email is required";
            }
        }
        if (isset($_POST['password'])){
            $password=$_POST['password'];
            if (empty($password)){
                $password_err="password is required";
            }
        }
        if (isset($_POST['c_password'])){
            $c_password=$_POST['c_password'];
            if (empty($c_password)){
                $c_password_err="please confirm password";
            }
        }
        if (isset($_POST['city'])){
            $city=$_POST['city'];
            if (empty($city)){
                $city_err="city is required";
            }
        }
        if (isset($_POST['state'])){
            $state=$_POST['state'];
            if (empty($state)){
                $state_err="state is required";
            }
        }
        if (isset($_POST['gender'])){
            $gender=$_POST['gender'];
            if (empty($gender)){
                $gender_err="gender is required";
            }
        }else{
            $gender_err="gender is required";
         }
    
        if (isset($_POST['hobbies'])){
            $hobbies=$_POST['hobbies'];
            if (empty($hobbies)){
                $hobbies_err="hobby is required";
            }
        } else{
          $hobbies_err="hobby is required";
        }

        if (isset($_POST['message'])){
            $message=$_POST['message'];
            if (empty($message)){
                $message_err="message is required";
            }
        }

        if (isset($_FILES['image'])){
            $image=$_FILES['image'];
            if ($image['size']==0){
                $image_err="image is required";
            }
        }else{
            $image_err="image is required";
        }
        if (isset($_POST['captcha'])){
            $captcha=$_POST['captcha'];
            if(empty($captcha)){
                $captcha_err="enter captcha";
            }elseif ($sum==$captcha) {
                $captcha_err="";
            }
            elseif($sum!==$captcha){
                $captcha_err="incorect";
            }
        }

        foreach ($hobbies as $hobbs) {
            $hobby .= $hobbs . " ";
        }

        // echo ($captcha)."<br>";
        // echo ($captcha_err)."<br>";

 }

    ?>
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-12 col-md-8 col-lg-5 m-auto">
                <form action="form.php" method="post" enctype="multipart/form-data" class="rounded border p-3">
                    <h2 class="text-center pb-3">Form</h2>
                    <div class="d-flex pb-2">
                        <label class="w-35" for="f_name">First Name <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="text" name="f_name" id="f_name"
                                value="<?php echo isset($fname) ? $fname : ''?>" />
                            <div class="text-danger ps-2">
                                <?php echo $fname_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="l_name">Last Name <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="text" name="l_name" id="l_name"
                                value="<?php echo isset($lname) ? $lname : ''?>" />
                            <div class="text-danger ps-2">
                                <?php echo $lname_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="email">Email <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="email" name="email" id="email"
                                value="<?php echo isset($email) ? $email : ''?>" />
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
                                <option value="Mohali" <?php echo ($city=='Mohali' ) ? 'selected' : '' ?> >Mohali
                                </option>
                                <option value="Chandigarh" <?php echo ($city=='Chandigarh' ) ? 'selected' : '' ?>
                                    >Chandigarh</option>
                                <option value="Shimla" <?php echo ($city=='Shimla' ) ? 'selected' : '' ?> >Shimla
                                </option>
                                <option value="Hamirpur" <?php echo ($city=='Hamirpur' ) ? 'selected' : '' ?> >Hamirpur
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
                                <option value="Punjab" <?php echo ($state=='Punjab' ) ? 'selected' : '' ?> >Punjab
                                </option>
                                <option value="Himachal Pradesh" <?php echo ($state=='Himachal Pradesh' ) ? 'selected'
                                    : '' ?> >Himachal Pradesh</option>
                                <option value="Haryana" <?php echo ($state=='Haryana' ) ? 'selected' : '' ?> >Haryana
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
                            <label class="pe-2" for="male">Male</label>
                            <input class="" type="radio" name="gender" value="Male" id="male" <?php echo
                                ($gender=='Male' ) ? 'checked' : '' ?> />
                            <label class="ps-4 pe-2" for="female">Female</label>
                            <input class="" type="radio" name="gender" value="female" id="female" <?php echo
                                ($gender=='Female' ) ? 'checked' : '' ?> />
                            </div>
                        <div class="w-100 text-danger ps-2">
                            <?php echo $gender_err; ?>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="gender">Hobbies <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <div>
                                <label class="pe-2" for="coding">Coding</label>
                                <input class="" type="checkbox" name="hobbies[]" value="Coding" id="coding" <?php echo
                                    (stristr($hobby, "Coding" ))? "checked" : "" ; ?> />
                                <label class="ps-4 pe-2" for="gaming">Gaming</label>
                                <input class="" type="checkbox" name="hobbies[]" value="Gaming" id="gaming" <?php echo
                                    (stristr($hobby, "Gaming" ))? "checked" : "" ; ?> />
                            </div>
                            <div>
                                <label class="pe-2" for="dancing">Dancing</label>
                                <input class="" type="checkbox" name="hobbies[]" value="Dancing" id="dancing" <?php echo
                                    (stristr($hobby, "Dancing" ))? "checked" : "" ; ?> />
                                <label class="ps-4 pe-2" for="singing">Singing</label>
                                <input class="" type="checkbox" name="hobbies[]" value="Singing" id="singing" <?php echo
                                    (stristr($hobby, "Singing" ))? "checked" : "" ; ?> />
                            </div>
                            <div class="text-danger ps-2">
                                <?php echo $hobbies_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="image">Picture <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <input class="form-control" type="file" name="image" id="image" />
                            <div class="text-danger ps-2">
                                <?php echo $image_err; ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex py-2">
                        <label class="w-35" for="message">Message <span class="text-danger">*</span> :</label>
                        <div class="flex-fill w-50">
                            <textarea class="form-control" name="message" id="message"
                                rows="5"><?php echo isset($message) ? trim($message) : ''?></textarea>
                            <div class="text-danger ps-2">
                                <?php echo $message_err; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <label class="w-35" for="captcha">Enter captcha  <span class="text-danger">*</span> : </label>
                        <div class="flex-fill w-50">
                            <?php echo $a. " + ".$b ." ="; ?>
                            <input class="w-25 form-control" type="text" name="captcha" id="captcha">
                            <div class="text-danger ps-2">
                                <?php echo $captcha_err; ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="sum" value="<?php echo $sum; ?>">
                    </div>
                    <div class="d-flex align-items-center pt-3 text-center">
                        <div class="w-50">
                            <button class="btn btn-success w-50" type="submit">Submit</button>
                        </div>
                        <div class="w-50">
                            <button class="btn btn-success w-50" type="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>