<?php
$data = json_decode(file_get_contents("php://input"), true);

file_put_contents("logs/merged_log.json", json_encode($data, JSON_PRETTY_PRINT) . "\n", FILE_APPEND);
echo "Data received";
?>
