<?php

// Require SendGrid PHP Library
// Download from https://github.com/sendgrid/smtpapi-php

require("sendgrid-php/sendgrid-php.php");

// SendGrid API key
// About API keys: https://sendgrid.com/docs/Classroom/Send/api_keys.html
// Manage API keys: https://app.sendgrid.com/settings/api_keys

$sendgrid = new SendGrid('SG.3Q9IB5xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');


// Build message

$email = new SendGrid\Email();
$email->addTo('bob@example.com')
      ->addTo('alice@example.com')
      ->setFrom('SendGrid@example.com')
      ->setSubject('Sent from Azure App Service')
      ->setText('Hey.')
      ->setHtml('<h3>Here is some HTML</h3>')
;


// Send message

try {
    $response = $sendgrid->send($email);
    // Show response body
    echo $response->raw_body;
} catch(\SendGrid\Exception $e) {
    echo $e->getCode() . "\n";
    foreach($e->getErrors() as $er) {
        echo $er;
    }
}

?>
