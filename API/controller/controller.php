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
                            // echo "add_todo_data called";
                            if ($request_method == "POST") {
                                // echo "add_todo_data inside post";
                                // echo "<pre>";
                                // print_r($_REQUEST);
                                if (isset($_POST['FormData']['todo_title'])) {
                                    // echo "add_todo_data get title";
                                    $DataForInsert = array("todo_title"=>$_POST['FormData']['todo_title'],"status"=>$_POST['FormData']['status']);
                                    $InsertData = $this->insert("todo", $DataForInsert);            
                                    if ($InsertData["Code"]==1 ) {
                                        # code...
                                        $Data = $this->select("todo");            
                                    }else{
                                        $Data = array("Code" => 0, "Data" => 0, "Msg" => "Error while inserting");
                                        
                                    }
                                }else{
                                    $Data = array("Code" => 0, "Data" => 0, "Msg" => "todo title is required");
                                }
                            } else {
                                header("HTTP/1.0 405 Method Not Allowed");
                                $Data = array("Code" => 0, "Data" => 0, "Msg" => "Invalid Method");
                            }
                            echo json_encode($Data);
                            break;
                        case '/delete_todo_data':
                            if ($request_method == "POST") {
                                $DeleteData = $this->delete("todo",array("id"=>$_POST['id']));
                                if ($DeleteData["Code"]==1 ) {
                                    $Data = $this->select("todo");            
                                }else{
                                    $Data = array("Code" => 0, "Data" => 0, "Msg" => "Error while inserting");
                                    
                                }
                            } else {
                                header("HTTP/1.0 405 Method Not Allowed");
                                $Data = array("Code" => 0, "Data" => 0, "Msg" => "Invalid Method");
                            }
                            echo json_encode($Data);
                            break;
                        case '/update_todo_data':
                            if ($request_method == "POST") {
                                $UpdateData = $this->update("todo",array("status"=>$_POST['status']),array("id"=>$_POST['id']));
                                if ($UpdateData["Code"]==1 ) {
                                    $Data = $this->select("todo");            
                                }else{
                                    $Data = array("Code" => 0, "Data" => 0, "Msg" => "Error while inserting");
                                    
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
