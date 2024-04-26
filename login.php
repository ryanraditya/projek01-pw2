<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" type="text/css" href="ryan.css">
</head>

<?php
if(isset($_POST['submit'])){
    require_once 'dbkoneksi.php';

    $user = $dbh->prepare ("SELECT * FROM users WHERE email =? AND password =?");
    $user->execute([
        $_POST['email'], $_POST['password']
    ]);

    $count = $user->rowCount(); 

    if($count > 0) {//jika login berhasil
        session_start();

        $_SESSION['user'] = $user->fetch();
    
        header("location:index.php");
    }else{//jika login gagal
        header("location:login.php");
    }

}

?>


<body>
    <div class="form-login">
    <div><h1>login</h1></div>
    <div>
        <form action="" method="POST">
            <div>
                <label for="">Email</label>
                <input type="email" name="email" required>
            </div>
            <br>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
            <br>
            <div>
                <button type="submit" name="submit">Login</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>