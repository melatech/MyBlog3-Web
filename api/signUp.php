<?php
include "functions.php";
//signUp

if(empty($_REQUEST['name']) || empty($_REQUEST['email']) ){
    header('Location: ../index.php');
}
else{
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $creation_date = date('Y-m-d H:i:s');

    $emailExist = isEmailExist($email);
    if($emailExist){
        $status = "ok";
        $result_code = 0;
        $message = "Email already exists";
        echo json_encode(array('status'=>$status, 'result_code'=>$result_code, 'message'=>$message));
    }
    else{
        $result = signup($name, $email, $password, $creation_date);
        if($result){
            $status = "ok";
            $result_code = 0;
            $message = "SignUp was successful";
            echo json_encode(array('status'=>$status, 'result_code'=>$result_code, 'message'=>$message));
            //var_dump($name);
        }
        else{
            $message = "SignUp Failed from signUp";
            echo json_encode(array('message'=>$message), JSON_FORCE_OBJECT);
        }

    }



}
