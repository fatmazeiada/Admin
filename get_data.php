<?php
require_once 'db_connection.php';

// دالة لإضافة الوحدة فقط لو مش موجودة
function withUnit($value, $unit) {
    return (strpos($value, $unit) === false) ? $value . $unit : $value;
}

try {
    $stmt = $conn->query("SELECT * FROM readings ORDER BY created_at DESC, id DESC");
    $readings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}

if (!empty($readings)) {
    echo "<script>";
    echo "document.getElementById('readings-body').innerHTML = '';";
    foreach ($readings as $reading) {
        $id = htmlspecialchars($reading['id']);
        $temperature = withUnit(htmlspecialchars($reading['temperature']), "°C");
        $humidity = withUnit(value: htmlspecialchars($reading['humidity']), "%");
        $co = withUnit(htmlspecialchars($reading['co']), " ppm");
        $ch4 = withUnit(htmlspecialchars($reading['ch4']), " ppm");
        $h = withUnit(htmlspecialchars($reading['h']), " ppm");
        $oh = withUnit(htmlspecialchars($reading['oh']), " ppm");
        $smoke = withUnit(htmlspecialchars($reading['smoke']), " μg/m³");
        $co2 = withUnit(htmlspecialchars($reading['co2']), " ppm");
        $created_at = htmlspecialchars($reading['created_at']);

        echo "var row = document.createElement('tr');";
        echo "row.innerHTML = '<td>$id</td><td>$temperature</td><td>$humidity</td><td>$co</td><td>$ch4</td><td>$h</td><td>$oh</td><td>$smoke</td><td>$co2</td><td>$created_at</td>';";
        echo "document.getElementById('readings-body').appendChild(row);";
    }
    echo "</script>";
} else {
    echo "<script>";
    echo "document.getElementById('readings-body').innerHTML = '<tr><td colspan=\"10\">لا توجد بيانات متاحة</td></tr>';";
    echo "</script>";
}
?>
