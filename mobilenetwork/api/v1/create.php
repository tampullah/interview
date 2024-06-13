<?php 
require_once "classes/Mobile.php";
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json; charset=UTF-8");
header("Access-Control-Max-Age:3600");
header("Acess-Control-Allow-Method:POST");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,X-requested With, ");

$res =$_SERVER['REQUEST_METHOD'];

if($res!="POST"){
    http_response_code(405);
    $response = [
        
        "phone_number"=>null,
        "mobile_network"=>null,
        "status"=>"failure",
        "message"=>"Please use the right method",
        
    ];

    $resp = json_encode($response);
    echo $resp;
    exit;
}

$data = file_get_contents("php://input");
$data = json_decode($data);

if(!isset($data)){
    $response =[
        "phone_number"=>null,
        "mobile_network"=>null,
        "status"=>"failure",
        "message"=>"Please supply the relevant field",
    ];
    $resp = json_encode($response);
    echo $resp;
    exit;
}

if(empty($data->mobile_number)|| empty($data->mobile_network)||empty($data->mobile_message)||empty($data->ref_code)){
    $response =[
        "phone_number"=>null,
        "mobile_network"=>null,
        "status"=>"failure",
        "message"=>"Please all fields are required",
    ];
    $resp = json_encode($response);
    echo $resp;
    exit;
}

$mob = new Mobile;

$rec = $mob->register_network($data->mobile_number, $data->mobile_network, $data->mobile_message, $data->ref_code);

if($rec){
    http_response_code(200);

    $response =[
        "phone_number"=>$data->mobile_number,
        "mobile_network"=>$data->mobile_network,
        "status"=>"success",
        "message"=>"Registration Successfull",
    ];
    $resp = json_encode($response);
    echo $resp;

}else{

    

    $response =[
        "success"=>"Failed",
        "message"=>"Registeration Failed",
        "data"=>null,
    ];
    $resp = json_encode($response);
    echo $resp;
    exit;

}

?>