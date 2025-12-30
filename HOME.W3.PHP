* تكليف الاتصال بقاعدة البيانات

1. التحضير الأولي في XAMPP:
أ) تشغيل الخدمات:
افتح لوحة تحكم XAMPP

ابدأ خدمة Apache

ابدأ خدمة MySQL

اضغط على Admin بجانب MySQL لفتح phpMyAdmin

ب) إنشاء قاعدة بيانات عبر phpMyAdmin:
افتح المتصفح واذهب إلى: http://localhost/phpmyadmin

أنشئ قاعدة بيانات جديدة (مثال: mydatabase)

أنشئ جدول (مثال: users) مع بعض الحقول

2. ملف الاتصال الأساسي:
<?php
// إعدادات الاتصال
$host = "localhost";
$username = "root";      // المستخدم الافتراضي في XAMPP
$password = "";          // كلمة المرور الافتراضية فارغة في XAMPP
$database = "mydatabase"; // اسم قاعدة البيانات التي أنشأتها

// طريقة 1: باستخدام MySQLi (مستحسن)
$conn = new mysqli($host, $username, $password, $database);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// تعيين ترميز الأحرف
$conn->set_charset("utf8");

echo "تم الاتصال بنجاح!";
?>