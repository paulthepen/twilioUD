<?php
require __DIR__ . '/vendor/autoload.php';

$db = mysqli_connect('localhost', 'twilio_app', '5H!afoNHxD${LJ9#', 'twilio_ud');
$query = mysqli_query($this->db, 'SELECT * FROM call_sms');
$results = $this->query->fetch_array(MYSQLI_ASSOC);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = (new TwilioDevEd\App())->get($results);
$app->run();
?>
