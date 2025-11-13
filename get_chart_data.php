<?php
require_once './db_connection.php'; // الاتصال بقاعدة البيانات
header('Content-Type: application/json');

try {
    // جلب آخر 10 قراءات من كل القيم
    $stmt = $conn->query("SELECT created_at, temperature, humidity, co, ch4, h, oh, smoke FROM readings ORDER BY created_at DESC LIMIT 10");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
} catch(PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
ِِ