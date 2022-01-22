<?php 
include_once('./auth.php');
include_once('./helper.php');
include_once('./userstorage.php');
$userStorage = new UserStorage("users.json");
$auth = new Auth($userStorage);
$errors = [];

function validate($username, $email, $pass)
{
    global $auth, $errors, $userStorage;
    if (trim($username) == "")
        $errors['username'] = "Username must not be empty";
    else {
        if ($auth->user_exists($username))
            $errors['global'] = "The user already exists";
        else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                $errors['email'] = 'Email is invalid';
            else
            if (count($userStorage->findAll(['email' => $email])) > 0)
                $errors['email'] = 'Email belong to another user';
            if (trim($pass[0]) == "")
                $errors['password']['primary'] = 'password must not be empty';
            else
            if ($pass[0] != $pass[1])
                $errors['password']['secondary'] = 'password confirmation is not correct';
        }
    }
}
$username = $_POST['username'] ?? "";
$email = $_POST['email'] ?? "";
$pass = $_POST['password'] ?? ['',''];

if (count($_POST) > 0) {

    validate($username, $email, $pass);
    if (count($errors) == 0) {
        $newUser = [
            "username" => $username,
            "email" => $email,
            "password" => $pass[0],
            "image" => "./assets/default.png"
        ];
        $auth->register($newUser);
        redirect("login.php");
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <nav style="border-bottom:none;backdrop-filter:none">
        <a href="./">
            <img  src="./assets/applogo.png" style="width: 10vw;" alt="">
        </a>
    </nav>

    <img class="bg-login" src="./assets/bg.jpg" alt="">
    <div style="display: flex;height: 100vh; width: 100vw;justify-content: flex-end;">
        <div class="login-cont">
            <h1>Register</h1>
            <form style="width:65%" action ="" method="post" novalidate>
                <div class="login-form">
                    <div>
                        <input type="email" name="email" id="email" value="<?= $email ?>" required>
                        <span>Email</span>
                        <?php if (isset($errors['email'])) : ?>
                            <p class="error"><?= $errors['email'] ?></p> 
                        <?php endif ?>
                    </div>
                    

                    <div>
                        <input type="text" name="username" id="username" value="<?= $username ?>" required>
                        <span>Username</span>
                        <?php if (isset($errors['username'])) : ?>
                            <p class="error"><?= $errors['username'] ?></p>
                        <?php endif ?>
                    </div>

                    <div>
                        <input type="password" name="password[]" value="<?= $pass[0] ?>" required>
                        <span>Password</span>
                        <?php if (isset($errors['password']['primary'])) : ?>
                            <p class="error"><?= $errors['password']['primary'] ?></p> 
                        <?php endif ?>

                    </div>

                    <div>
                        <input type="password" name="password[]" value="<?= $pass[1] ?>" required>
                        <span>Password confirmation</span>
                        <?php if (isset($errors['password']['secondary'])) : ?>
                            <p class="error"><?= $errors['password']['secondary'] ?></p> 
                        <?php endif ?>

                    </div>
                </div>


                <?php if (isset($errors['global'])) : ?>
                    <span style="margin-top:20px;" class="error"><?= $errors['global'] ?></span>
                <?php endif ?>
                <button class="btn-comment" style="margin: 25px 0;margin-top:45px;font-size:20px;">Register</button>
                <a style="width: 100%; display: flex;justify-content: center;" href="./login.php">
                    Already have an account?
                </a>
            </form>
        </div>
    </div>
</body>
</html>