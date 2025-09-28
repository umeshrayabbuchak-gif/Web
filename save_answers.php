<?php
// Set the content type to application/json to respond correctly
header('Content-Type: application/json');

// --- SECURITY CHECK (Basic measure) ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

// Get the JSON data sent from the JavaScript fetch request
$json_data = file_get_contents("php://input");
$answers_array = json_decode($json_data, true);

// Check if data was received and is an array
if (empty($answers_array)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No data received.']);
    exit;
}

// --- Data Logging ---
$log_file = 'answers.txt';
$timestamp = date('Y-m-d H:i:s');
$client_ip = $_SERVER['REMOTE_ADDR'];
$log_entry = "========================================================\n";
$log_entry .= "Date/Time: {$timestamp}\n";
$log_entry .= "IP Address: {$client_ip}\n";
$log_entry .= "Ruchika's Answers:\n";

foreach ($answers_array as $entry) {
    $question = htmlspecialchars($entry['question'] ?? 'N/A');
    $answer = htmlspecialchars($entry['answer'] ?? 'N/A');
    
    $log_entry .= "Q: {$question}\n";
    $log_entry .= "A: {$answer}\n\n";
}

if (file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX) !== false) {
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Answers saved successfully.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to write to log file. Check file permissions.']);
}

?>
