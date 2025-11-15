<!DOCTYPE html>
<html>
    <head>
    <title>PHP Form Validation</title>
    </head>
    <body>
        <form action="" method="post">
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