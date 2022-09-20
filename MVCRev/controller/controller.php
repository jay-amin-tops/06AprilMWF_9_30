<?php
include_once('model/model.php');
session_start();
class Controller extends model
{
    public $baseURL =""; 
    public function __construct() {
        $ReqURI = explode("/",$_SERVER['REQUEST_URI']);
        $this->baseURL =$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/".$ReqURI[1]."/".$ReqURI[2]."/".$ReqURI[3]."/".$ReqURI[4]."/".$ReqURI[5]."/assets/"; 
        ob_start();
        parent::__construct();
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    require_once('views/header.php');
                    require_once('views/mainpage.php');
                    require_once('views/footer.php');
                    if (isset($_REQUEST["login"])) {
                        $LoginResponse = $this->login($_POST['username'],$_POST['password']);
                        if ($LoginResponse['Code'] == 1) {
                            // echo "<pre>";
                            // print_r($LoginResponse);
                            $_SESSION['UserData'] = $LoginResponse['Data'];
                            if ( $LoginResponse['Data']->role_id == 1) {
                                header("location:admindashboard");
                            } else {
                                header("location:home");
                                # code...
                            }
                            
                            echo "inside if";
                        } else {
                            echo "inside else";
                        }
                    }
                    break;
                case '/registration':
                    // require_once('views/header.php');
                    require_once('views/registration.php');
                    // require_once('views/footer.php');
                    // echo "<pre>";
                    // print_r($_REQUEST);
                    if (isset($_REQUEST["regist"])) {
                        array_pop($_POST);
                        $DataForInsert = $_POST;
                        $hob = implode(",", $_POST['chk']);
                        $DataForInsert = array_merge($DataForInsert, array("hobby" => $hob));
                        unset($DataForInsert['chk']);
                        $RegistrationResponse = $this->insert("users", $DataForInsert);
                        if ($RegistrationResponse['Code'] == 1) { ?>
                            <script>
                                alert("Registration completed successfully");
                                window.location.href = "home";
                            </script>
                        <?php
                            // header("location:home");
                        } else { ?>
                            <script>
                                alert("Error While Inserting Try after some time");
                            </script>
<?php }
                    }
                    break;
                case '/admindashboard':
                    // echo "<h1>welcome admin</h1>"; 

                    require_once('views/admin/header.php');
                    require_once('views/admin/admindashboard.php');
                    require_once('views/admin/footer.php');
                    
                    break;
                case '/addnewuser':
                    require_once('views/admin/header.php');
                    require_once('views/admin/addnewuser.php');
                    require_once('views/admin/footer.php');
                    
                    break;
                case '/viewallusers':
                    $SelectAllUsers = $this->select("users");
                    // echo "<pre>";
                    // print_r($SelectAllUsers);
                    require_once('views/admin/header.php');
                    require_once('views/admin/viewallusers.php');
                    require_once('views/admin/footer.php');
                    
                    break;
                case '/edituser':
                    $SelectUsersById = $this->select("users",array("id"=>$_REQUEST['id']));
                    $allCitiesData = $this->select("cities_data");
                    // echo "<pre>";
                    // print_r($SelectAllUsers);
                    require_once('views/admin/header.php');
                    require_once('views/admin/userupdatedata.php');
                    require_once('views/admin/footer.php');
                    
                    break;
                case '/viewalltask':
                    require_once('views/admin/header.php');
                    require_once('views/admin/viewalltask.php');
                    require_once('views/admin/footer.php');
                    break;    
                case '/logout':
                    session_destroy();
                    header("location:home");
                    break;

                default:
                    # code...
                    break;
            }
        } else {
            header("location:home");
        }
        ob_flush();
    }
}
$Controller = new Controller;
