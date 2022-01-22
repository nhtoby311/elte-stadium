<?php
include_once('./auth.php');
include_once('./helper.php');
include_once('./userstorage.php');

session_start();
$userStorage = new UserStorage("users.json");
$errors = [];
$auth = new Auth($userStorage);
$username = $_POST['username']??"";
$password = $_POST['password']??"";
function validate($username,$password)
{
    global $errors;
    if (trim($username) == "")
        $errors['username'] = "Username must not be empty";
    else {
        if (trim($password) == "")
            $errors['password'] = "Password must not be empty";
    }
}

if(count($_POST)>0)
{
    validate($username,$password);
    if(count($errors)===0)
    {
        validate($username,$password);
        if(count($errors)===0)
        {
            $logged_in_user = $auth->authenticate($username, $password);
            if (!$logged_in_user) {
                $errors['global'] = "Login error";
            } else {
                $auth->login($logged_in_user);
                // echo 'o';
                redirect('index.php');
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <nav style="border-bottom:none;backdrop-filter:none">
        <a href="./">
            <img src="./assets/applogo.png" style="width: 10vw;" alt="">
        </a>
    </nav>

    <img class="bg-login" src="./assets/bg.jpg" alt="">
    <div style="display: flex;height: 100vh; width: 100vw;justify-content: flex-end;">
        <div class="login-cont">
            <h1>LOG IN</h1>
            <form style="width:65%;" action="" method="post" novalidate>
                <div class="login-form">
                    <div>
                        <input name="username" id="username" type="text" value="<?= $username ?>" required>
                        <span>Username</span>
                        <?php if (isset($errors['username'])) : ?>
                            <p style="margin-top:10px;" class="error"><?= $errors['username'] ?></p>
                        <?php endif ?>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" value="<?= $password ?>" required>
                        <span>Password</span>
                    </div>
                    <?php if (isset($errors['password'])) : ?>
                        <p style="margin-top:10px;" class="error"><?= $errors['password'] ?></p>
                    <?php endif ?>
                    
                </div>
                <?php if (isset($errors['global'])) : ?>
                    <p style="margin-top:20px;" class="error"><?= $errors['global'] ?></p><br>
                <?php endif ?>
                <button type="submit" style="margin: 25px 0;margin-top:45px;font-size:20px;" class="btn-comment">Log in</button>
                <a style="width: 100%; display: flex;justify-content: center;" href="./register.php">
                    Register
                </a>
            </form>
        </div>
    </div>
</body>
</html>