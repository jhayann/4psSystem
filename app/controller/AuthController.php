<?php
@ob_start();
require '../autoload.php';
$db = new Database();
$db = $db->connect();
$auth = new Auth($db);

if(isset($_POST['request']) && $_POST['request'] = "authenticate")
{
    if($auth->authenticate($_POST))
    {
        header('location:../../dashboard.php?login_success');
    } else {
        header('location:../../index.php?login_error');
    }
}

