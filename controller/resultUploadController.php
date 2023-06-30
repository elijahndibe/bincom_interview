<?php
session_start();
require "./database.php";

 if (isset($_POST['upload'])) {
    $pu_id = $_POST['pu_id'];
    $party_id = $_POST['party_id'];
    $partyscore = $_POST['party_score'];
    $entered_user = $_POST['entered_user'];
    $userIpAddress = $_SERVER['REMOTE_ADDR'];

    $partyscore = filter_var($partyscore, FILTER_SANITIZE_STRING);
    $entered_user = filter_var($entered_user, FILTER_SANITIZE_STRING);

    $stmt= $conn->prepare("INSERT INTO announced_pu_results (polling_unit_uniqueid,party_abbreviation, party_score, entered_by_user, user_ip_address) VALUES(?,?,?,?,?)");
    $stmt->bind_param('sssss', $pu_id, $party_id, $partyscore, $entered_user, $userIpAddress);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['message'] = 'Result uploaded successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /");
    }else {
        $_SESSION['message'] = 'Something went wrong';
        $_SESSION['alert-type'] = 'error';
        header("Location: /result/upload");
    }
 }

