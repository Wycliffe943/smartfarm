<?php
    include ('config/db_connect.php'); 
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

     
    $firstName = $lastName = $userName = $email = $phone = $password = $cpassword = '';
    $errors = array('firstName'=>'', 'lastName'=>'', 'userName'=>'', 'email'=>'', 'phone'=>'', 'password'=>'','cpassword'=>'');

    if(isset($_POST['submit'])){

        if(empty($_POST['firstName'])){
            $errors['firstName'] = 'A name is required <br />';
        }else {
            $firstName = $_POST['firstName']; 
            if(!preg_match('/^[a-zA-Z\s]+$/', $firstName)) {
                $errors['firstName'] = 'Name must be letters and spaces only';
            }
        }

        if(empty($_POST['lastName'])){
            $errors['lastName'] = 'A name is required <br />';
        }else {
            $lastName = $_POST['lastName']; 
            if(!preg_match('/^[a-zA-Z\s]+$/', $lastName)) {
                $errors['lastName'] = 'Name must be letters and spaces only';
            }
        }

        if(empty($_POST['userName'])){
            $errors['userName'] = 'A name is required <br />';
        }else {
            $userName = $_POST['userName']; 
            if(!preg_match('/^[a-zA-Z\s]+$/', $userName)) {
                $errors['userName'] = 'Name must be letters and spaces only';
            }
        }
       

        if(empty($_POST['email'])){ 
            $errors['email'] = 'An email is required <br />';
        }else {
            $email = $_POST['email'];  
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'email must be a valid email address';
            } 
        }

        if(empty($_POST['phone'])){
            $errors['phone'] = 'A phone number is required <br />';
        }else {
            $phone = $_POST['phone']; 
        }

        if(empty($_POST['password'])){
            $errors['password'] = 'A password is required <br />';
        }else {
            $password = $_POST['password']; 
        }


        if(empty($_POST['cpassword'])){
            $errors['cpassword'] = 'Please confirm password <br />';
        }else {
            $cpassword = $_POST['cpassword'];
            if(!$password==$cpassword) {
                $errors['cpassword'] = 'Passwords do not match!';
            }
        }


        if(array_filter($errors)) {
            // echo 'errors in the form';
        }else {
           // echo 'form is valid';
            $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
            $lastName = mysqli_real_escape_string($conn, $_POST['lastName']); 
            $userName = mysqli_real_escape_string($conn, $_POST['userName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']); 
            $phone = mysqli_real_escape_string($conn, $_POST['phone']); 
            $password = mysqli_real_escape_string($conn, $_POST['password']); 
            $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);      
            

            //create sql
            $sql = "INSERT INTO sf_users(first_name, last_name, username, email, phone, password, confirm_password) VALUES('$firstName', '$lastName', '$userName', '$email', '$phone', '$password', '$cpassword')";

            //save to db and check
            if(mysqli_query($conn, $sql)){
                //success
                header('Location: index.php');
            }else {
                //error
                echo 'query error: ' . mysqli_error($conn);
            }
        }

            // end of POST check

    }

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>


<div class="container">

<form class="well form-horizontal" action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<fieldset>

<!-- Form Name -->
<legend>User Registration</legend>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">First Name</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="firstName" placeholder="First Name" class="form-control"  type="text" value="<?php echo htmlspecialchars($firstName); ?>">
<div class = "red-text"><?php echo $errors['firstName']; ?></div>
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" >Last Name</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="lastName" placeholder="Last Name" class="form-control"  type="text" value="<?php echo htmlspecialchars($lastName); ?>">
<div class = "red-text"><?php echo $errors['lastName']; ?></div>
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" >User Name</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="userName" placeholder="User Name" class="form-control"  type="text" value="<?php echo htmlspecialchars($userName); ?>">
<div class = "red-text"><?php echo $errors['userName']; ?></div>
</div>
</div>
</div>

<!-- Text input-->
   <div class="form-group">
<label class="col-md-4 control-label">E-Mail</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input name="email" placeholder="E-Mail Address" class="form-control"  type="text" value = "<?php echo htmlspecialchars($email); ?>">
<div class = "red-text"><?php echo $errors['email']; ?></div>
</div>
</div>
</div>


<!-- Text input-->
   
<div class="form-group">
<label class="col-md-4 control-label">Phone #</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
<input name="phone" placeholder="(+254)123456" class="form-control" type="text" value = "<?php echo htmlspecialchars($phone); ?>">
<div class = "red-text"><?php echo $errors['phone']; ?></div>
</div>
</div>
</div>

<!-- Text input-->
  
<div class="form-group">
<label class="col-md-4 control-label">Password</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
<input name="password" placeholder="Address" class="form-control" type="password" value = "<?php echo htmlspecialchars($password); ?>">
<div class = "red-text"><?php echo $errors['password']; ?></div>
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">Confirm Password</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
<input name="cpassword" placeholder="Confirm Password" class="form-control"  type="password" value = "<?php echo htmlspecialchars($cpassword); ?>">
<div class = "red-text"><?php echo $errors['cpassword']; ?></div>
</div>
</div>
</div>



<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4">
<button name = "submit" type="submit" class="btn btn-secondary" value = "submit" >Submit</button>
</div>
</div>

</fieldset>
</form>
</div>
</div><!-- /.container -->

<?php include('templates/footer.php'); ?>
    

</html>