<?php
$name=$userName=$mobileNo=$password=$Cpassword=$category=$gender=$question=$answer=$dob=$nameerr=$userNameerr=$mobileNoerr=$passworderr=$Cpassworderr=$categoryerr=$gendererr=$questionerr=$answererr=$doberr="";

function text_input($data){
    $data=htmlspecialchars($data);
    return $data;
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=($_POST['name']);
    $userName=($_POST['user_name']);
    $mobileNo=($_POST['mobileNo']);
    $password=($_POST['password']);
    $Cpassword=($_POST['C_password']);
    $category=($_POST['category']);
    $gender=($_POST['gender']);
    $question=($_POST['question']);
    $answer=($_POST['answer']);
    $dob=($_POST['dob']);
}


if(empty($name)){
    $nameerr ="Please enter your name";
}elseif((strlen($name)<4)){
    $nameerr ="name must be minimum four characters";
}elseif(!preg_match("/^[a-z]*$/i",$name)){
    $nameerr = "only letters";
}else{
    $name=text_input($name);
}


if(empty($userName)){
    $userNameerr ="Please enter user name";
}elseif (!preg_match("/^[a-z]+[0-9]$/", $userName)) {
    $userNameerr = "Username should start with a letter and end with a number.";
}else{
    $userName=text_input($userName);
}


if(empty($mobileNo)){
    $mobileNoerr= "Please enter mobile no.";
}elseif((strlen($mobileNo)==10)&&(!preg_match("/^[0-9]*$/",$mobileNo))){
    $mobileNoerr= "enter ten digis Mobile no.";
}else{
    $mobileNo=text_input($mobileNo);
}


if(empty($password)){
    $passworderr= "Please enter password";
}elseif((strlen($password)<8 || strlen($password)>12)){
    $passworderr= "password must be minimum eight characters and maximum 12 characters";
}elseif(!preg_match("/^[0-9]*$/",$password)){
    $passworderr = "only digits";
}else{
    $password=text_input($password);
}


if(empty($Cpassword)){
    $Cpassworderr= "Please confirm password";
}elseif(($password !== $Cpassword)){
    $Cpassworderr= "password does't match";
}else{
    $Cpassword=text_input($Cpassword);
}


if(empty($category)){
    $categoryerr= "Please select category";
}else{
    $category=text_input($category);
}


if(empty($gender)){
    $gendererr= "Please select gender";
}else{
    $gender=text_input($gender);
}


if(empty($question)){
    $questionerr= "Please select question";
}
else{
    $question=text_input($question);
}

if(empty($answer)){
    $answererr= "Please enter answer";
}else{
    $answer=text_input($answer);
}


if(empty($dob)){
    $doberr= "Please select date of birth";
}else{
    $dob=text_input($dob);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 650px;
            margin: 50px auto;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }

        .flex {
            display: flex;
            margin: 10px 0;
        }

        .label {
            width: 30%;
        }

        .input input {
            margin-right: 10px;
        }

        span {
            margin-left: 200px;
        }
    </style>
</head>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <h1>Registration Form</h1>
        <div class='flex'>
            <label class='label' for="">1. Applicant Name :</label>
            <input class='input' type="text" name="name">
        </div>
        <span>
            <?php echo $nameerr; ?>
        </span>
        <div class='flex'>
            <label class='label' for="">2. User Name :</label>
            <input class='input' type="text" name="user_name">
        </div>
        <span>
            <?php echo $userNameerr;?>
        </span>
        <div class='flex'>
            <label class='label' for="">3. Mobile No. :</label>
            <input class='input' type="text" name="mobileNo">
        </div>
        <span>
            <?php echo $mobileNoerr;?>
        </span>
        <div class='flex'>
            <label class='label' for="">4. Password :</label>
            <input class='input' type="text" name="password">
        </div>
        <span>
            <?php echo $passworderr; ?>
        </span>
        <div class='flex'>
            <label class='label' for="">5. Confirm Password :</label>
            <input class='input' type="text" name="C_password">
        </div>
        <span>
            <?php echo $Cpassworderr; ?>
        </span>

        <div class='flex'>
            <label class='label' for="">6. Category :</label>
            <div class='input'>
                General<input type="radio" name="category" value='general'>
                SC<input type="radio" name="category" value='sc'>
                OBC<input type="radio" name="category" value='obc'>
            </div>
        </div>
        <span>
            <?php echo $categoryerr; ?>
        </span>

        <div class='flex'>
            <label class='label' for="">7. Gender :</label>
            <div class='input'>
                Male<input type="radio" name="gender" value='male'>
                Female<input type="radio" name="gender" value='female'>
                Other<input type="radio" name="gender" value='other'>
            </div>
        </div>
        <span>
            <?php echo $gendererr; ?>
        </span>

        <div class='flex'>
            <label class='label' for="">8. a) Security Question :</label>
            <select name="question">
                <option value="">select</option>
                <option value="favorite teacher name">Your favorite teacher name?</option>
                <option value="first school name">Your first school name?</option>
                <option value="childhood friend name">Your childhood friend name?</option>
            </select>
        </div>
        <span>
            <?php echo $questionerr; ?>
        </span>
        <div class='flex'>
            <label class='label' for="" style="padding-left:15px; width:28%">b) Security Answer :</label>
            <input class='input' type="text" name="answer">
        </div>
        <span>
            <?php echo $answererr; ?>
        </span>
        <div class='flex'>
            <label class='label' for="">9. Date of Birth :</label>
            <input type="date" name="dob">
        </div>
        <span>
            <?php echo $doberr; ?>
        </span>
        <div class='flex' style='gap:20px; margin-left:150px'>
            <input type="submit" value="Create User">
            <input type="reset" value="Reset">
        </div>
    </form>
    <h2>
        <?php
            echo "Applicant name : $name <br>";
            echo "User name : $userName <br>";
            echo "Mobile no : $mobileNo <br>";
            echo "Password : $Cpassword <br>";
            echo "Category : $category <br>";
            echo "Gender : $gender <br>";
            echo "Security Question : $question <br>";
            echo "Security answer : $answer <br>";
            echo "Applicant Date of Birth : $dob <br>";
        ?>
    </h2>
</body>

</html>