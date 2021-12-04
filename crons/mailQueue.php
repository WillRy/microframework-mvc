<?php
require __DIR__ . "/../vendor/autoload.php";

/**
 * MAIL QUEUE
 */
$emailQueue = new Services\Email();
$emailQueue->sendQueue();
