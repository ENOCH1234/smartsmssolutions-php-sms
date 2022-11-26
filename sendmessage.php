<?php
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://app.smartsmssolutions.com/io/api/client/v1/sms/');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
    'follow_redirects' => TRUE
));
$request->addPostParameter(array(
    'token' => 'your-api-key',
    'sender' => 'NBC',
    'to' => 'phone-number(s)',
    'message' => 'enter-message',
    'type' => '0',
    'routing' => '4',
    'ref_id' => '',
    'simserver_token' => '',
    'dlr_timeout' => '',
    'schedule' => ''
));
try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
        echo $response->getBody();
    } else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
    }
} catch (HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
