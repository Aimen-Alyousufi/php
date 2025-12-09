1️⃣ التعامل مع الملفات
قراءة الملفات:

<?php
// قراءة ملف كامل
$content = file_get_contents('file.txt');
echo $content;

// قراءة الملف سطراً سطراً
$file = fopen('file.txt', 'r');
while(!feof($file)) {
    $line = fgets($file);
    echo $line;
}
fclose($file);

// قراءة الملف إلى مصفوفة
$lines = file('file.txt', FILE_IGNORE_NEW_LINES);
print_r($lines);
?>


كتابة الملفات:
<?php
// كتابة ملف (استبدال المحتوى)
file_put_contents('file.txt', 'Hello World!');

// إضافة نص للملف (بدون حذف المحتوى القديم)
file_put_contents('file.txt', PHP_EOL . 'New Line', FILE_APPEND);

// الكتابة باستخدام fopen
$file = fopen('file.txt', 'w');
fwrite($file, 'Text to write');
fclose($file);
?>

فحص الملفات:
<?php
// فحص وجود الملف
if (file_exists('file.txt')) {
    echo "الملف موجود";
}

// معرفة حجم الملف
$size = filesize('file.txt');
echo "حجم الملف: $size bytes";

// معرفة وقت التعديل الأخير
$modified = filemtime('file.txt');
echo "آخر تعديل: " . date('Y-m-d H:i:s', $modified);
?>


2️⃣ دوال الوقت والتاريخ
الوقت الحالي:

<?php
// الوقت الحالي ك timestamp
$timestamp = time();
echo $timestamp; // مثال: 1700000000

// الوقت الحالي كتنسيق
$date = date('Y-m-d H:i:s');
echo $date; // مثال: 2024-01-01 12:30:45

// الحصول على معلومات مفصلة
$dateInfo = getdate();
print_r($dateInfo);
?>


التنسيقات الشائعة:

<?php
echo date('Y-m-d');           // 2024-01-01
echo date('d/m/Y');           // 01/01/2024
echo date('l, F j, Y');       // Monday, January 1, 2024
echo date('h:i:s A');         // 12:30:45 PM
echo date('H:i:s');           // 14:30:45 (24-hour format)
?>


التحويل بين الصيغ:

<?php
// من نص إلى timestamp
$timestamp = strtotime('2024-01-01 10:30:00');
echo $timestamp;

// من timestamp إلى نص
$date = date('Y-m-d H:i:s', $timestamp);
echo $date;

// استخدام DateTime class (الأفضل)
$datetime = new DateTime('2024-01-01');
echo $datetime->format('Y-m-d H:i:s');
?>

العمليات الحسابية:

<?php
// إضافة وقت
$date = new DateTime('2024-01-01');
$date->modify('+7 days');
echo $date->format('Y-m-d'); // 2024-01-08

// حساب الفرق بين تاريخين
$date1 = new DateTime('2024-01-01');
$date2 = new DateTime('2024-01-10');
$interval = $date1->diff($date2);
echo $interval->days . " أيام"; // 9 أيام

// باستخدام strtotime
$nextWeek = strtotime('+1 week');
echo date('Y-m-d', $nextWeek);
?>


3️⃣ التعامل مع المنطقة الزمنية
إعداد المنطقة الزمنية:


<?php
// الطريقة القديمة (غير موصى بها الآن)
date_default_timezone_set('Asia/Riyadh');

// الطريقة الموصى بها باستخدام DateTime
$date = new DateTime('now', new DateTimeZone('Asia/Riyadh'));
echo $date->format('Y-m-d H:i:s');

// قائمة المناطق الزمنية المتاحة
$timezones = DateTimeZone::listIdentifiers();
print_r($timezones);
?>


المناطق الزمنية الشائعة في العالم العربي:

<?php
$arabicTimezones = [
    'Asia/Riyadh',      // السعودية
    'Asia/Dubai',       // الإمارات
    'Asia/Qatar',       // قطر
    'Asia/Kuwait',      // الكويت
    'Asia/Bahrain',     // البحرين
    'Asia/Muscat',      // عمان
    'Asia/Aden',        // اليمن
    'Africa/Cairo',     // مصر
    'Africa/Tripoli',   // ليبيا
    'Africa/Tunis',     // تونس
    'Africa/Algiers',   // الجزائر
    'Africa/Casablanca', // المغرب
];
?>


التحويل بين المناطق الزمنية:

<?php
// إنشاء تاريخ في منطقة زمنية معينة
$date = new DateTime('2024-01-01 12:00:00', new DateTimeZone('UTC'));

// التحويل إلى منطقة زمنية أخرى
$date->setTimezone(new DateTimeZone('Asia/Riyadh'));
echo $date->format('Y-m-d H:i:s'); // الوقت في الرياض

// مقارنة الأوقات بين المناطق
$utcTime = new DateTime('now', new DateTimeZone('UTC'));
$ksaTime = new DateTime('now', new DateTimeZone('Asia/Riyadh'));

echo "UTC: " . $utcTime->format('H:i:s') . "\n";
echo "KSA: " . $ksaTime->format('H:i:s') . "\n";
?>




مثال متكامل:

<?php
// إعداد المنطقة الزمنية للمشروع كاملاً
date_default_timezone_set('Asia/Riyadh');

class DateTimeHandler {
    public static function getCurrentDate($format = 'Y-m-d H:i:s') {
        return date($format);
    }
    
    public static function convertTimezone($date, $fromTZ, $toTZ, $format = 'Y-m-d H:i:s') {
        $datetime = new DateTime($date, new DateTimeZone($fromTZ));
        $datetime->setTimezone(new DateTimeZone($toTZ));
        return $datetime->format($format);
    }
    
    public static function logToFile($message) {
        $logFile = 'logs/' . date('Y-m-d') . '.log';
        $logMessage = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
}

// استخدام الفئة
echo "الوقت الحالي: " . DateTimeHandler::getCurrentDate() . "\n";

// تحويل الوقت
$converted = DateTimeHandler::convertTimezone(
    '2024-01-01 12:00:00', 
    'UTC', 
    'Asia/Riyadh'
);
echo "الوقت المحول: $converted\n";

// تسجيل في ملف
DateTimeHandler::logToFile('عملية جديدة تم تنفيذها');
?>







