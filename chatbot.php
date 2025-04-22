<?php
header("Content-Type: application/json");

// ✅ **Replace with your Mistral AI API Key**
$api_key = "4HDnessgw4HZOgIFKT0NpDBAr2SBbuZS"; 

$endpoint = "https://api.mistral.ai/v1/chat/completions";

// ✅ **Receive user input**
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data["message"]) || empty($data["message"])) {
    echo json_encode(["error" => "No message provided"]);
    exit;
}

// ✅ **Prepare API request for Mistral AI**
$request_data = [
    "model" => "mistral-medium",  // You can also use "mistral-small" or "mistral-medium"
    "messages" => [
        ["role" => "system", "content" => "You are an AI assistant."],
        ["role" => "user", "content" => $data["message"]]
    ]
];

$headers = [
    "Authorization: Bearer $api_key",
    "Content-Type: application/json"
];

// ✅ **Send API request**
$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_data));

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// ✅ **Handle API response**
if ($http_code == 200) {
    $response_data = json_decode($response, true);
    if (isset($response_data["choices"][0]["message"]["content"])) {
        echo json_encode(["reply" => $response_data["choices"][0]["message"]["content"]]);
    } else {
        echo json_encode(["error" => "Invalid response from AI"]);
    }
} else {
    echo json_encode(["error" => "API Error: " . $response]);
}
?>
