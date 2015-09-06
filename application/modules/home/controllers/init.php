<?php

require_once 'vendor/autoload.php';

define('MAILGUN_KEY','key-49d4b9779df1cd952fe9c83a8c3ca474');
define ('MAILGUN_PUBKEY','pubkey-8f3ce41a424256ea0b3408fb17c073df');
define('MAILGUN_DOMAIN','sandboxef945da4f4bb451b8395a9ea2e8c1bd6.mailgun.org');
define('MAILGUN_LIST',' up@sandboxef945da4f4bb451b8395a9ea2e8c1bd6.mailgun.org ');
define('MAILGUN_SECRET','leslie_jerre_willy_orre');

$mailgun = new Mailgun\Mailgun(MAILGUN_KEY);
$mailgunValidate = new Mailgun\Mailgun(MAILGUN_PUBKEY);

$mailgunOptIn = $mailgun->OptInHandler();

?>