<?php

// ==========================================
// Ideamart : Sample PHP SMS API
// ==========================================
// Author : Pasindu De Silva
// Licence : MIT License
// http://opensource.org/licenses/MIT
// ==========================================
header('Content-Type: application/json');
ini_set('error_log', 'sms-app-error.log');
require_once 'lib/Log.php';
require_once 'lib/SMSReceiver.php';
require_once 'lib/SMSSender.php';
include './connection.php';


define('SERVER_URL', 'https://api.dialog.lk/sms/send');
define('APP_ID', 'APP_024848');
define('APP_PASSWORD', '70f203b738d0f3d744871a10f6612b56');

$logger = new Logger();

//echo getSubscribers($con)[0];

if (isset($_GET['title'])) {
    sendNotificationsByAuthority($con, $logger);
} else if (isset($_GET['q_id'])) {
    sendAnswer($con, $logger, $_GET['q_id'], $_GET['description']);
} else {
    sendAlertsByUsers($con, $logger);
}

//sendAlertsByDevice($con,$logger);

function sendNotificationsByAuthority($con, $logger) {
    $myfile = fopen("message.txt", "w") or die("Unable to open file!");
    $txt = $_GET['title'];
    fwrite($myfile, $txt);
    fclose($myfile);
//    try {
//
//        $number_list = getSubscribers($con);
//        //echo $number_list[0];
//        //$tag_number = '#AZ110yxGccw0krCCE8/xKs5vjwMc06wDsg2cCqXtNoet7PpJhGNeqAG4I/dTpeSbADSOA';
//        $reply = $_GET['title'];
//
//        // Creating a receiver and intialze it with the incomming data
//        $receiver = new SMSReceiver(file_get_contents('php://input'));
//
//        //Creating a sender
//        $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
//
//        //$logger->WriteLog($receiver->getAddress());
//        //list($keyword, $opt) = explode(" ", $message);
//        // Send a SMS to a particular user
//        $response = $sender->broadcast($reply, $number_list);
//    } catch (SMSServiceException $e) {
//        $logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
//    }
}

function sendAlertsByUsers($con, $logger) {
    try {
        // Creating a receiver and intialze it with the incomming data
        $receiver = new SMSReceiver(file_get_contents('php://input'));
//
//        //Creating a sender
        $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
//
        $message = $receiver->getMessage(); // Get the message sent to the app
        //$message = 'rescuer id=1,H=47.00,T=28.00,';
        // Get the phone no from which the message was sent 
//
        $logger->WriteLog($receiver->getAddress());
//        
//      
        $tag_number = $receiver->getAddress();
        //$number_list = getSubscribers($con);
        //$response = $sender->broadcast('sssss', $number_list);
        //$message = 'rescuer device_id%1';
        //list($keyword, $opt) = explode(" ", $message);

        $question = substr($message, 9);

        $sql = "SELECT id FROM subscribers WHERE tag_number='$tag_number'";

        $user_id = 0;

        if ($result = mysqli_query($con, $sql)) {
            // Fetch one and one row
            while ($row = mysqli_fetch_row($result)) {
                $user_id = $row[0];
            }
            // Free result set
            mysqli_free_result($result);
        }

        $r = mysqli_query($con, "INSERT INTO questions(user_id, tag_number,type) VALUES ($user_id, '$question','SMS')");

//        $myfile = fopen("message.txt", "w") or die("Unable to open file!");
//        $txt = $question . ' ' . $tag_number . ' ' . $user_id;
//        fwrite($myfile, $txt);
//        fclose($myfile);
//        if (strpos($opt, 'question') !== false) {
//            $details = explode(":", $opt);
//            $tag_number = $receiver->getAddress();
//            //$r = mysql_query("INSERT INTO smsfaq(tag_number,description) VALUES ('$tag_number','$details[1]');", $con);
//        } 
//        else {
//
//            $details = explode(",", $opt);
//
//            $temperature = explode("=", $details[2])[1];
//
//            if ($temperature > 27) { //rescuer id=1,H=47.00,T=26.00,           
//                $device_id = explode("=", $details[0])[1];
//
//                $lat = "";
//                $lng = "";
//                $address_1 = "";
//                $start_time = Date('Y-m-d H:i:s', strtotime("-3 days"));
//                $end_time = Date('Y-m-d H:i:s', strtotime("+3 days"));
//
//                $query_1 = "SELECT * FROM sensor WHERE sensor_id='$device_id'";
//
//                //$response = $sender->sms("Sent", $address);
//                //$result = array();
//                if ($query_run_1 = mysql_query($query_1)) {
//                    if (mysql_num_rows($query_run_1) != NULL) {
//                        while ($row_1 = mysql_fetch_assoc($query_run_1)) {
//                            $lat.=$row_1['lat'];
//                            $lng.=$row_1['lng'];
//                            $address_1.=$row_1['address'];
//                        }
//                    }
//                }
//
//                $query_2 = "select address,warning_id from warning order by warning_id desc limit 1";
//                $last_address = "";
//                $last_warning_id = "";
//                if ($query_run_2 = mysql_query($query_2)) {
//                    if (mysql_num_rows($query_run_2) != NULL) {
//                        while ($row_2 = mysql_fetch_assoc($query_run_2)) {
//                            $last_address.=$row_2['address'];
//                            $last_warning_id.=$row_2['warning_id'];
//                        }
//                    }
//                }
//
//                if ($last_address == $address_1) {
//                    $query_3 = "DELETE FROM warning WHERE warning_id='$last_warning_id'";
//                    mysql_query($query_3, $con);
//                } else {
//                    $response = $sender->broadcast($address_1 . ' is in danger of Wild Fire', $number_list);
//                }
//
//                $r = mysql_query("INSERT INTO warning(type,start_time,end_time,address,lat,lng,level) VALUES ('Wild Fire','$start_time','$end_time','$address_1','$lat','$lng','1');", $con);
//                // Send a broadcast message to all the subcribed users
//            } else {
////            $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
////            $txt = "John Doe\n";
////            fwrite($myfile, $txt);
////            $txt = "Jane Doe\n";
////            fwrite($myfile, $txt);
////            fclose($myfile);
//                // Send a SMS to a particular user
//                //$response = $sender->sms('Failed', $address);
//            }
//        }
    } catch (SMSServiceException $e) {
        $logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
    }
}

function sendAnswer($con, $logger, $q_id, $description) {
    try {
        $number_list = getSubscribers($con);
        echo $number_list[0];
        //echo $number_list[0];
        //$tag_number = '#AZ110yxGccw0krCCE8/xKs5vjwMc06wDsg2cCqXtNoet7PpJhGNeqAG4I/dTpeSbADSOA';
        $reply = $_GET['description'];

        // Creating a receiver and intialze it with the incomming data
        $receiver = new SMSReceiver(file_get_contents('php://input'));

        //Creating a sender
        $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);

        $response = $sender->broadcast($reply, $number_list);
        
        
    } catch (SMSServiceException $e) {
        $logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
    }
}

function getSubscribers($con) {

    $sql = "SELECT tag_number FROM subscribers";

    $result = array();
    if ($result_set = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result_set)) {
            $result[] = $row[0];
        }
        // Free result set
        mysqli_free_result($result_set);
    }

    return $result;
}

?>