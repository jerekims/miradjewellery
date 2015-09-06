<?php
require_once 'vendor/autoload.php';

define('MAILGUB_KEY','');
define ('MAILGUN_PUBKEY','');
define('MAILGUN_DOMAIN','');
define('MAILGUN_LIST','');
define('MAILGUN_SECRET','leslie_jerre_willy_orre');

$mailgun = new Mailgun\Mailgun(MAILGUN_KEY);
$mailgunValidate = new Mailgun\Mailgun(MAILGUN_PUBKEY);

$mailgunOptIn = $mailgun->OptInHandler();

 
?>