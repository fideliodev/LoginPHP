<?php

error_reporting(0);

require '../keyauth.php';
require '../credentials.php';

session_start();

if (!isset($_SESSION['user_data'])) // if user not logged in
{
    header("Location: ../");
    exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

function findSubscription($name, $list)
{
    for ($i = 0; $i < count($list); $i++) {
        if ($list[$i]->subscription == $name) {
            return true;
        }
    }
    return false;
}

$username = $_SESSION["user_data"]["username"];
$subscriptions = $_SESSION["user_data"]["subscriptions"];
$subscription = $_SESSION["user_data"]["subscriptions"][0]->subscription;
$expiry = $_SESSION["user_data"]["subscriptions"][0]->expiry;
$ip = $_SESSION["user_data"]["ip"];
$creationDate = $_SESSION["user_data"]["createdate"];
$lastLogin = $_SESSION["user_data"]["lastlogin"];

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../");
    exit();
}
?>
<html lang="en" class="bg-[#09090d] text-white overflow-x-hidden">

<head>
    <title>Dashboard</title>
    <script src="https://cdn.keyauth.cc/dashboard/unixtolocal.js"></script>

    <link rel="stylesheet" href="https://cdn.keyauth.cc/v3/dist/output.css">
</head>

<body>
    <?php
        $KeyAuthApp->log("New login from: " . $username); 
    ?>

    <form method="post">
        <button
            class="inline-flex text-white bg-red-700 hover:opacity-60 focus:ring-0 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 transition duration-200"
            name="logout">
            Logout
        </button>
    </form>

    <p class="text-md">Logged in as <?= $username; ?></p>
    <p class="text-md">IP <?= $ip; ?></p>
    <p>Não tem nada aqui, tchau.</p>
    <p>Projeto real será divulgado em outras plataformas.</p>
    <p class="text-md">Last Login <?= date('Y-m-d H:i:s', $lastLogin) ?></p>



</body>

</html>
