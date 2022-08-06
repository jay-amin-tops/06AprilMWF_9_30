<?php
// mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);
date_default_timezone_set("Asia/Kolkata");
class model{
    public $Connection = "";
    public function __construct() {
        // $this->Connection =new mysqli("hostname","username","password","dbname");
        try {
            //code...
            // echo "inside try";
            // $this->Connection =mysqli_connect("localhost","root","","masterdatabase");
            $this->Connection =new mysqli("localhost","root","","masterdatabase");
        } catch (Exception $er) {
            // echo "<pre>";
            // print_r($er);
            if (!file_exists("log")) {
                mkdir("log");
            }
            $errorDateTime = "Error Date-Time >> ".date("d-m-Y H:i:s A");
            $errorMsg = "Error Msg >> ".$er->getMessage();
            $error = $errorDateTime.PHP_EOL.$errorMsg;
            $ErrorFileName = date("d_m_Y")."_Error.txt";
            file_put_contents("log/$ErrorFileName",PHP_EOL.$error.PHP_EOL,FILE_APPEND);

        }
        // echo "in construct";
        // echo "<pre>";
        // print_r($this->Connection);
        // exit;
    }
    public function insert($tbl,$data){
        $clms = implode(",",array_keys($data));
        $vals = implode("','",$data);
        $InsertSQL = "INSERT INTO $tbl ($clms) VALUES('$vals')";
        $SqlEx = $this->Connection->query($InsertSQL);
        // echo $SqlEx;
        if ($SqlEx > 0) {
            $ResData['Data'] =1; 
            $ResData['Code'] =1; 
            $ResData['Msg'] ="Success"; 
        } else {
            $ResData['Data'] =0; 
            $ResData['Code'] =0; 
            $ResData['Msg'] ="Error While Inserting"; 
        }
        return $ResData;
    }
    public function login($uname,$pass){
        $SQL = "SELECT * FROM users WHERE password='$pass' AND (username='$uname' OR email='$uname' OR mobile='$uname')";
        $SqlEx = $this->Connection->query($SQL);
        // echo "<pre>";
        // print_r($SqlEx);
        if ($SqlEx->num_rows > 0) {
            $FetchData = $SqlEx->fetch_object(); // return data in Object ->
            // $FetchData = $SqlEx->fetch_array(); // return data in Array Numeric and assoc []
            // $FetchData = $SqlEx->fetch_row(); // return data in Array only numeric []
            // $FetchData = $SqlEx->fetch_all();// return data in Array [] multi dimension
            // $FetchData = $SqlEx->fetch_assoc();// return data in Array only associative[]
            // print_r($FetchData);
            // exit;

            $ResData['Data'] =$FetchData; 
            $ResData['Code'] =1; 
            $ResData['Msg'] ="Success"; 
        } else {
            $ResData['Data'] =0; 
            $ResData['Code'] =0; 
            $ResData['Msg'] ="Error While Inserting"; 
        }
        return $ResData;
    }
    public function select($tbl,$where=""){
        $SQL = "SELECT * FROM $tbl";
        if ($where != "") {
            $SQL .= " WHERE ";
            foreach ($where as $key => $value) {
                $SQL .= "$key =  $value AND";
            }
            $SQL = rtrim($SQL,"AND") ;
        }
        // echo $SQL;
        $SqlEx = $this->Connection->query($SQL);
        if ($SqlEx->num_rows > 0) {
            while ($data = $SqlEx->fetch_object()) {
                $FetchData[] = $data;
            }
            $ResData['Data'] =$FetchData; 
            $ResData['Code'] =1; 
            $ResData['Msg'] ="Success"; 
        } else {
            $ResData['Data'] =0; 
            $ResData['Code'] =0; 
            $ResData['Msg'] ="Error While Inserting"; 
        }
        return $ResData;
    }
    public function delete($tbl,$where=""){
        $SQL = "DELETE FROM $tbl";
        if ($where != "") {
            $SQL .= " WHERE ";
            foreach ($where as $key => $value) {
                $SQL .= "$key =  $value AND";
            }
            $SQL = rtrim($SQL,"AND") ;
        }
        $SqlEx = $this->Connection->query($SQL);
        if ($SqlEx > 0) {
            $ResData['Data'] =1; 
            $ResData['Code'] =1; 
            $ResData['Msg'] ="Success"; 
        } else {
            $ResData['Data'] =0; 
            $ResData['Code'] =0; 
            $ResData['Msg'] ="Error While Inserting"; 
        }
        return $ResData;
    }
}


?>