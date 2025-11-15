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
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Name : <input type="text" name="name" required><br><br>
        E-Mail : <input type="email" name="email" required><br><br>
        Website:   <input type="text" name="website"><br><br>
        Comment: <textarea name="comment"></textarea><br><br>
        Gender: <input type="radio" name="gender" value="male">Male 
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="other">Other
        <br><br>
        <input type="submit" value="Submit">
        </form>
    </body>
</html>