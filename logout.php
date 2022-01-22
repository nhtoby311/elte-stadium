<?php
include_once("./auth.php");
include_once("./userstorage.php");
include_once("./helper.php");
session_start();
$userStorage = new UserStorage("users.json");
$auth = new Auth($userStorage);
$auth->logout();
redirect("../index.php");