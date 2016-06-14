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

if (isset($_GET['q_id'])) {
    sendAnswer($con, $logger, $_GET['q_id'], $_GET['description']);
}

function sendAnswer($con, $logger, $q_id, $description) {
    try {
        $number_list = array('AZ110yxGccw0krCCE8/xKs5vjwMc06wDsg2cCqXtNoet7PpLXLtO5bQcoL19krKaTE+Yh');

        $reply = "rescuerdm".' '.$_GET['description'];

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