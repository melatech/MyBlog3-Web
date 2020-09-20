<?php
include "functions.php";
//login
if(empty($_REQUEST['email']) || empty($_REQUEST['password']) ){
    header('Location: ../index.php');
}
else{
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $emailExists = isEmailExist($email);
    if($emailExists){
        $result = login($email, $password);
        if($result){
            $status = "ok";
            $result_code = 0;
            $message = "Login is successful from login";
            echo json_encode(array('status'=>$status, 'result_code'=>$result_code, 'message'=>$message));
        }
        else{
            $status = "ok";
            $result_code = 0;
            $message = "Login is unsuccessful from login";
            echo json_encode(array('status'=>$status, 'result_code'=>$result_code, 'message'=>$message));
        }
    }
    else{
        $message = "Email does not exist from login";
        echo json_encode(array('message'=>$message), JSON_FORCE_OBJECT);
    }
}
