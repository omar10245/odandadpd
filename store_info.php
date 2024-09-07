<?php
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة مرور قاعدة البيانات
$dbname = "my_database"; // اسم قاعدة البيانات

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// الحصول على البيانات من الطلب
$ip = $_POST['ip'] ?? '';
$userAgent = $_POST['userAgent'] ?? '';
$networkType = $_POST['networkType'] ?? '';

// إدخال البيانات في قاعدة البيانات
$sql = "INSERT INTO user_info (ip, user_agent, network_type) VALUES ('$ip', '$userAgent', '$networkType')";

if ($conn->query($sql) === TRUE) {
    echo "تم تخزين البيانات بنجاح";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>