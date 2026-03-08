<?php

require_once "./index.php";

$data = json_decode(file_get_contents("php://input"), true);
if ($data['token'] != $_SESSION['csrf_token']) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid cookie"
    ]);
    exit();
} else {
    echo json_encode([
        "success" => true,
        "message" => "Cookie valid",
        "data" => [
            "username" => $_SESSION['username'], 
            "email" => $_SESSION['email'], 
            "first_name" => $_SESSION['first_name'],
            "last_name" => $_SESSION['last_name'],
            "profile_picture" => $_SESSION['profile_picture']
        ]
    ]);
    exit();
}
?>