<?php
$servername = "localhost";
$username = "root";
$password = ""; // لو في باسوورد حطيه هنا
$dbname = "iot_dashboard";

// الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// دالة تساعدنا نضيف الرمز بس لو مش موجود
function withUnit($value, $unit) {
    return (strpos($value, $unit) === false) ? $value . $unit : $value;
}

// جلب آخر قراءة من جدول readings
$sql = "SELECT * FROM readings ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
    
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo "
    <div id='Temperature'>
        <h2 class='text-white invoice-num'>" . withUnit($row['temperature'], '°C') . "</h2>
        <span class='text-white fs-18'>Temperature</span>
    </div>

    <div id='humidity'>
        <h2 class='text-white invoice-num'>" . withUnit($row['humidity'], '%') . "</h2>
        <span class='text-white fs-18'>Humidity</span>
    </div>

    <div id='co'>
        <h2 class='text-white invoice-num'>" . withUnit($row['co'], ' ppm') . "</h2>
        <span class='text-white fs-18'>CO</span>
    </div>

    <div id='ch4'>
        <h2 class='text-white invoice-num'>" . withUnit($row['ch4'], ' ppm') . "</h2>
        <span class='text-white fs-18'>CH₄</span>
    </div>

    <div id='h'>
        <h2 class='text-white invoice-num'>" . withUnit($row['h'], ' ppm') . "</h2>
        <span class='text-white fs-18'>H₂</span>
    </div>

    <div id='oh'>
        <h2 class='text-white invoice-num'>" . withUnit($row['oh'], ' ppm') . "</h2>
        <span class='text-white fs-18'>OH</span>
    </div>

    <div id='smoke'>
        <h2 class='text-white invoice-num'>" . withUnit($row['smoke'], ' µg/m³') . "</h2>
        <span class='text-white fs-18'>Smoke</span>
    </div>
    ";
} else {
    echo "لا توجد بيانات";
}

$conn->close();
?>
