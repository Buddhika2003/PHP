<!DOCTYPE html>
<html>
    <head>
    <title>PHP Form Validation</title>
    </head>
    <body>
        <?php
            $name=$email=$website=$comment=$gender="";

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $website = htmlspecialchars($_POST['website']);
                $comment = htmlspecialchars($_POST['comment']);
                $gender = htmlspecialchars($_POST['gender']);
                echo "<h2>Your Input:</h2>";
                echo "Name: $name<br>"; 
                echo "Email: $email<br>";
                echo "Website: $website<br>";
                echo "Comment: $comment<br>";
                echo "Gender: $gender<br><br>";
            }

            function test_input($data){
                $data = trim($data);
                $data = striplashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            $nameErr = $emailErr = $genderErr = $websiteErr = $commentErr ="";
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(empty($_POST['name'])){
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST['name']);
                    if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
                        $nameErr = "Only letters and white space allowed";
                    }
                }
                if(empty($_POST['email'])){
                    $emailErr = "Email is required";
                }else{
                    $email = test_input($_POST['email']);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $emailErr = "Invalid email format";
                    }
                }
                if(empty($_POST['gender'])){
                    $genderErr = "Gender is required";
                }else{
                    $gender = test_input($_POST['gender']);
                }
                if(empty($_POST['website'])){
                    $website = "";
                }else{
                    $website = test_input($_POST['website']);
                    if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
                        $websiteErr = "Invalid URL";
                    }
                }
                if(empty($_POST['comment'])){
                    $comment = "";
                }else{
                    $comment = test_input($_POST['comment']);
                }
            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Name : <input type="text" name="name">
        <span class= "error">* <?php echo $nameErr; ?></span>
        <br><br>
        E-Mail : <input type="email" name="email" >
        <span class= "error">* <?php echo $emailErr; ?></span>
        <br><br>
        Website:   <input type="text" name="website">
        <span class= "error"><?php echo $websiteErr; ?></span>
        <br><br>
        Comment: <textarea name="comment"></textarea><br><br>
        Gender: <input type="radio" name="gender" value="male">Male 
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="other">Other
                <span class= "error">* <?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" value="Submit">
        </form>
    </body>
</html>