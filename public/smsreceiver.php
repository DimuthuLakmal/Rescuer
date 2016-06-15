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
sendAnswer($con, $logger);
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

        $tag_number = $receiver->getAddress();

        $edited_tag_number = substr($tag_number, 4);

        $question = substr($message, 10);

        $sql = "SELECT id FROM subscribers WHERE tag_number='$edited_tag_number'";

        $user_id = 0;

        if ($result = mysqli_query($con, $sql)) {
            // Fetch one and one row
            while ($row = mysqli_fetch_row($result)) {
                $user_id = $row[0];
            }
            // Free result set
            mysqli_free_result($result);
        }

        $myfile = fopen("message.txt", "w") or die("Unable to open file!");
        $txt = $question . ' ' . substr($tag_number, 4) . ' ' . $user_id;
        fwrite($myfile, $txt);
        fclose($myfile);

        $r = mysqli_query($con, "INSERT INTO questions(user_id, description,type) VALUES ($user_id, '$question','SMS')");
    } catch (SMSServiceException $e) {
        $logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
    }
}

function sendAnswer($con, $logger) {
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

        $response = $sender->sms($reply, 'AZ110yxGccw0krCCE8/xKs5vjwMc06wDsg2cCqXtNoet7PpJhGNeqAG4I/dTpeSbADSOA');
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