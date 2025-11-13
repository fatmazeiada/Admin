
<?php
header('Content-Type: text/plain; charset=utf-8');

// بيانات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_dashboard";

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// فحص الاتصال
if ($conn->connect_error) {
    http_response_code(500);
    die("❌ فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استقبال البيانات المرسلة من ESP32
$temperature = $_POST['temperature'] ?? null;
$humidity    = $_POST['humidity'] ?? null;
$co          = $_POST['co'] ?? null;
$ch4         = $_POST['ch4'] ?? null;
$h           = $_POST['h'] ?? null;
$oh          = $_POST['oh'] ?? null;
$smoke       = $_POST['smoke'] ?? null;

// التحقق من وصول كل البيانات المطلوبة
if ($temperature && $humidity && $co && $ch4 && $h && $oh && $smoke) {
    // تحضير جملة SQL باستخدام prepared statement
    $stmt = $conn->prepare("INSERT INTO readings (temperature, humidity, co, ch4, h, oh, smoke) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ddddddd", $temperature, $humidity, $co, $ch4, $h, $oh, $smoke);

    if ($stmt->execute()) {
        echo "✅ تم إدخال البيانات بنجاح";
    } else {
        echo "❌ خطأ أثناء الإدخال: " . $stmt->error;
    }

    $stmt->close();
} else {
    http_response_code(400);
    echo "⚠️ لم يتم استقبال كل القيم المطلوبة.";
}

$conn->close();
?>
