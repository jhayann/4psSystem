<?php
@ob_start();
require '../autoload.php';
$db = new Database();
$db = $db->connect();

if(isset($_POST['newmember']))
{
    $member = new Member($db);
    $member->create($_POST);
    header('location:../../dashboard.php?page=newmember');
} 
else if(isset($_POST['updatemember']))
{
    $member = new Member($db);
    $member->update($_POST);
    header('location:../../dashboard.php?page=memberupdate&id='.$_POST['id']);
} 
else if(isset($_POST['chart']))
{
    $member = new Member($db);
    $member->chart();
}
else if(isset($_POST['updateMemberStatus']))
{
    $member = new Member($db);
    $member->disable($_POST['id']);
     header('location:../../dashboard.php?page=memberlist');
}



