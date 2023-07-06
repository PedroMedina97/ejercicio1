<?php

require 'User.php';

use classes\User;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");

$body = json_decode(file_get_contents("php://input"), true);
$user1 = new User("Pedro Medina", "pedro@correo.com", "123456", "admin");
$user2 = new User("Luis Sanchez", "luis@correo.com", "123456", "normal");

$response = "";
$db = [
    "pedro@correo.com" => $user1,
    "luis@correo.com" => $user2
];

$email = $body['email'];
$password = $body['password'];



if (isset($db[$email])) {
    $instance = $db[$email];
    if ($instance->password == $password) {
        session_start();
        $_SESSION['name'] = $instance->name;
        $_SESSION['status'] = true;
        $_SESSION['type'] = $instance->type;

        $response = array(
            "status" => true,
            "msg" => "Login Exitoso",
            "type" => $instance->type
        );
        echo json_encode($response);
    }else{
        $response = array(
            "status" => false,
            "msg" => "credenciales no validas"
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        "status" => false,
        "msg" => "no se encontró el usuario"
    );
    echo json_encode($response);
}
