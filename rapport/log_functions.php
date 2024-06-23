<?php
session_start();  // Démarrer la session pour accéder aux informations de l'utilisateur

function writeLog($message) {
    $logFile = __DIR__ . '/logs/logs.txt';
    $currentDateTime = date('Y-m-d H:i:s');
    
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'unknown';
    $userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'unknown';
    
    $logMessage = "[$currentDateTime] [User ID: $userId, User Name: $userName] $message" . PHP_EOL;

    file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}
?>
