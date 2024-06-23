<?php
if (!is_dir('logs')) {
    mkdir('logs', 0755, true);
}

$logFile = 'logs/logs.txt';
if (!file_exists($logFile)) {
    touch($logFile);
    echo "Le répertoire 'logs' et le fichier 'logs.txt' ont été créés.";
} else {
    echo "Le fichier 'logs.txt' existe déjà.";
}
?>
