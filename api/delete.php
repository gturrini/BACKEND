<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/employees.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Employee($db);

    $data = json_decode(file_get_contents('php://input'), true);

    $item->id = $data['id'];

    if($item->deleteEmployee()){
        //echo json_encode("Employee deleted.");
        $data = '{ "result": "OK", "message": "Employee deleted."}';
    } else{
        //echo json_encode("Data could not be deleted");
        $data = '{ "result": "ERROR", "message": "Unable to delete Employee."}';
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
?>