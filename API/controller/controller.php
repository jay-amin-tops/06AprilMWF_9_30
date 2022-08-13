<?php
include_once('model/model.php');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Content-Type: application/json');
session_start();
class Controller extends model
{
    public $baseURL = "";
    public function __construct()
    {
        $headers = apache_request_headers();
        ob_start();
        parent::__construct();
        $request_method = $_SERVER["REQUEST_METHOD"];
        if (isset($headers['applicationkey'])) {
            if ($headers['applicationkey'] === "786") {
                if (isset($_SERVER['PATH_INFO'])) {
                    switch ($_SERVER['PATH_INFO']) {
                        case '/getallusers':
                            if ($request_method == "GET") {
                                $Data = $this->select("users");
                            } else {
                                header("HTTP/1.0 405 Method Not Allowed");
                                $Data = array("Code" => 0, "Data" => 0, "Msg" => "Invalid Method");
                            }
                            echo json_encode($Data);
                            break;
                        case '/getalltodo':
                            if ($request_method == "GET") {
                                $Data = $this->select("todo");
                            } else {
                                header("HTTP/1.0 405 Method Not Allowed");
                                $Data = array("Code" => 0, "Data" => 0, "Msg" => "Invalid Method");
                            }
                            echo json_encode($Data);
                            break;
                        case '/add_todo_data':
                            if ($request_method == "POST") {
                                if (isset($_POST['todo_title'])) {
                                    $DataForInsert = array("todo_title"=>$_POST['todo_title'],"status"=>"Pending");
                                    $Data = $this->insert("todo", $DataForInsert);            
                                }else{
                                    $Data = array("Code" => 0, "Data" => 0, "Msg" => "todo title is required");
                                }
                            } else {
                                header("HTTP/1.0 405 Method Not Allowed");
                                $Data = array("Code" => 0, "Data" => 0, "Msg" => "Invalid Method");
                            }
                            echo json_encode($Data);
                            break;
                       
        
                        default:
                            # code...
                            break;
                    }
                } else {
                    header("location:home");
                }
            } else {
                echo "dnt try to hack";
            }
        }else{
            header("HTTP/1.0 405 Invalid Header key");
            echo "Header Key required!!!";
        }
        
       
        ob_flush();
    }
}
$Controller = new Controller;
