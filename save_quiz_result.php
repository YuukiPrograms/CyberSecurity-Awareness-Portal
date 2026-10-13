<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['score']) || !isset($data['total_questions'])) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

$score = filter_var($data['score'], FILTER_VALIDATE_INT);
$total = filter_var($data['total_questions'], FILTER_VALIDATE_INT);

if ($score === false || $total === false || $score < 0 || $total <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid score or total']);
    exit;
}

$userId = $_SESSION['user_id'] ?? null;

try {
    $conn = getDBConnection();
    if ($userId) {
        $stmt = $conn->prepare("INSERT INTO quiz_results (user_id, score, total_questions) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $score, $total]);
    } else {
        $stmt = $conn->prepare("INSERT INTO quiz_results (score, total_questions) VALUES (?, ?)");
        $stmt->execute([$score, $total]);
    }

    echo json_encode([
        'success' => true,
        'score' => $score,
        'total_questions' => $total,
        'percentage' => round(($score / $total) * 100, 1),
    ]);
} catch (PDOException $e) {
    error_log("Quiz result save error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error']);
}