دوال المصفوفات

<?php
// 1. إنشاء مصفوفات
$array1 = array("apple", "banana", "orange");
$array2 = ["red", "green", "blue"]; // PHP 5.4+

// 2. دوال أساسية
$fruits = ["apple", "banana", "orange"];

// count() - عدد العناصر
echo count($fruits); // 3

// is_array() - التحقق إذا كان متغير مصفوفة
var_dump(is_array($fruits)); // bool(true)

// in_array() - البحث عن قيمة في المصفوفة
echo in_array("apple", $fruits); // 1 (true)

// array_search() - البحث عن قيمة وإرجاع المفتاح
echo array_search("banana", $fruits); // 1

// 3. إضافة وحذف عناصر
$numbers = [1, 2, 3];

// array_push() - إضافة عنصر في النهاية
array_push($numbers, 4, 5);
print_r($numbers); // [1, 2, 3, 4, 5]

// array_pop() - إزالة عنصر من النهاية
$last = array_pop($numbers);
echo $last; // 5

// array_unshift() - إضافة عنصر في البداية
array_unshift($numbers, 0);
print_r($numbers); // [0, 1, 2, 3, 4]

// array_shift() - إزالة عنصر من البداية
$first = array_shift($numbers);
echo $first; // 0

// 4. دمج وتقسيم المصفوفات
$arr1 = [1, 2];
$arr2 = [3, 4];

// array_merge() - دمج مصفوفات
$merged = array_merge($arr1, $arr2);
print_r($merged); // [1, 2, 3, 4]

// array_slice() - استخراج جزء من المصفوفة
$slice = array_slice($merged, 1, 2);
print_r($slice); // [2, 3]

// array_splice() - إزالة واستبدال جزء من المصفوفة
$colors = ["red", "green", "blue", "yellow"];
array_splice($colors, 1, 2, ["purple", "pink"]);
print_r($colors); // ["red", "purple", "pink", "yellow"]

// 5. دوال المفاتيح والقيم
$user = ["name" => "John", "age" => 30, "city" => "New York"];

// array_keys() - الحصول على جميع المفاتيح
$keys = array_keys($user);
print_r($keys); // ["name", "age", "city"]

// array_values() - الحصول على جميع القيم
$values = array_values($user);
print_r($values); // ["John", 30, "New York"]

// array_key_exists() - التحقق من وجود مفتاح
echo array_key_exists("name", $user); // 1

// 6. الفرز
$numbers = [3, 1, 4, 1, 5, 9, 2];

// sort() - ترتيب تصاعدي
sort($numbers);
print_r($numbers); // [1, 1, 2, 3, 4, 5, 9]

// rsort() - ترتيب تنازلي
rsort($numbers);
print_r($numbers); // [9, 5, 4, 3, 2, 1, 1]

// asort() - ترتيب تصاعدي مع الحفاظ على المفاتيح
$ages = ["John" => 30, "Jane" => 25, "Bob" => 35];
asort($ages);
print_r($ages);

// ksort() - ترتيب حسب المفاتيح
ksort($ages);
print_r($ages);

// 7. دوال متقدمة
$numbers = [1, 2, 3, 4, 5];

// array_map() - تطبيق دالة على جميع العناصر
$squared = array_map(function($n) {
    return $n * $n;
}, $numbers);
print_r($squared); // [1, 4, 9, 16, 25]

// array_filter() - تصفية المصفوفة
$even = array_filter($numbers, function($n) {
    return $n % 2 == 0;
});
print_r($even); // [2, 4]

// array_reduce() - اختزال المصفوفة إلى قيمة واحدة
$sum = array_reduce($numbers, function($carry, $item) {
    return $carry + $item;
}, 0);
echo $sum; // 15

// 8. دوال أخرى مهمة
$array1 = ["a" => "green", "red", "blue"];
$array2 = ["b" => "green", "yellow", "red"];

// array_intersect() - التقاطع بين مصفوفتين
$intersection = array_intersect($array1, $array2);
print_r($intersection); // ["a" => "green", 0 => "red"]

// array_diff() - الفرق بين مصفوفتين
$difference = array_diff($array1, $array2);
print_r($difference); // [1 => "blue"]

// array_unique() - إزالة التكرارات
$duplicates = [1, 2, 2, 3, 4, 4, 5];
$unique = array_unique($duplicates);
print_r($unique); // [1, 2, 3, 4, 5]

// array_reverse() - عكس المصفوفة
$reversed = array_reverse($numbers);
print_r($reversed);
?>

دوال النصوص

<?php
// 1. دوال الطول والتحويل
$text = "Hello World";

// strlen() - طول النص
echo strlen($text); // 11

// strtolower() - تحويل إلى أحرف صغيرة
echo strtolower($text); // hello world

// strtoupper() - تحويل إلى أحرف كبيرة
echo strtoupper($text); // HELLO WORLD

// ucfirst() - أول حرف كبير
echo ucfirst("hello"); // Hello

// ucwords() - أول حرف من كل كلمة كبير
echo ucwords("hello world"); // Hello World

// 2. البحث والاستبدال
$sentence = "The quick brown fox jumps over the lazy dog";

// strpos() - البحث عن النص (الحساس لحالة الأحرف)
echo strpos($sentence, "brown"); // 10

// stripos() - البحث عن النص (غير حساس لحالة الأحرف)
echo stripos($sentence, "BROWN"); // 10

// str_replace() - استبدال النص
$new_sentence = str_replace("fox", "cat", $sentence);
echo $new_sentence; // The quick brown cat jumps over the lazy dog

// str_ireplace() - استبدال النص (غير حساس لحالة الأحرف)
echo str_ireplace("THE", "A", $sentence); // A quick brown fox jumps over a lazy dog

// substr_replace() - استبدال جزء من النص
echo substr_replace("Hello World", "PHP", 6); // Hello PHP

// 3. استخراج أجزاء من النص
$text = "Hello World";

// substr() - استخراج جزء من النص
echo substr($text, 0, 5); // Hello
echo substr($text, 6); // World
echo substr($text, -5); // World

// strstr() - استخراج النص من أول ظهور لنص معين
echo strstr($text, "World"); // World
echo strstr($text, "World", true); // Hello

// 4. تقسيم النص
$csv = "apple,banana,orange,grape";

// explode() - تقسيم النص إلى مصفوفة
$fruits = explode(",", $csv);
print_r($fruits); // ["apple", "banana", "orange", "grape"]

// implode() - دمج مصفوفة إلى نص
$new_csv = implode(";", $fruits);
echo $new_csv; // apple;banana;orange;grape

// str_split() - تقسيم النص إلى أحرف
$chars = str_split("Hello");
print_r($chars); // ["H", "e", "l", "l", "o"]

// 5. التنظيف والتعديل
$dirty_text = "   Hello World   \n";

// trim() - إزالة المسافات من الطرفين
echo trim($dirty_text); // "Hello World"

// ltrim() - إزالة المسافات من الطرف الأيسر
echo ltrim($dirty_text); // "Hello World   \n"

// rtrim() - إزالة المسافات من الطرف الأيمن
echo rtrim($dirty_text); // "   Hello World"

// nl2br() - تحويل الأسطر الجديدة إلى <br>
echo nl2br("Hello\nWorld");
// Hello<br>World

// 6. التشفير والتنسيق
$text = "Hello World";

// md5() - التشفير باستخدام MD5
echo md5($text);

// sha1() - التشفير باستخدام SHA1
echo sha1($text);

// urlencode() - ترميز URL
echo urlencode("Hello World & More");

// urldecode() - فك ترميز URL
echo urldecode("Hello+World+%26+More");

// htmlspecialchars() - تحويل الأحرف الخاصة في HTML
echo htmlspecialchars("<div>Hello</div>"); // &lt;div&gt;Hello&lt;/div&gt;

// 7. المقارنة
$str1 = "Hello";
$str2 = "hello";

// strcmp() - مقارنة نصين (حساس لحالة الأحرف)
echo strcmp($str1, $str2); // -32 (غير متساويين)

// strcasecmp() - مقارنة نصين (غير حساس لحالة الأحرف)
echo strcasecmp($str1, $str2); // 0 (متساويين)

// strncmp() - مقارنة أول n حرف
echo strncmp($str1, $str2, 3); // -32

// 8. دوال نصية متقدمة
$text = "Hello World";

// str_repeat() - تكرار النص
echo str_repeat("-", 10); // ----------

// str_pad() - إضافة نص لتكملة الطول
echo str_pad("Hello", 10, "-", STR_PAD_BOTH); // --Hello---

// strrev() - عكس النص
echo strrev($text); // dlroW olleH

// wordwrap() - تقسيم النص إلى أسطر
$long_text = "This is a very long text that needs to be wrapped";
echo wordwrap($long_text, 15, "<br>\n");

// 9. معالجة النصوص
$text = "Hello World";

// chr() - الحصول على حرف من رقم ASCII
echo chr(65); // A

// ord() - الحصول على رقم ASCII من حرف
echo ord('A'); // 65

// number_format() - تنسيق الأرقام
echo number_format(1234567.89, 2); // 1,234,567.89
echo number_format(1234567.89, 2, ',', ' '); // 1 234 567,89

// 10. دوال إضافية مهمة
$html = "<div class='test'>Hello World</div>";

// strip_tags() - إزالة وسوم HTML
echo strip_tags($html); // Hello World

// addslashes() - إضافة شرطات مائلة
echo addslashes("It's a test"); // It\'s a test

// stripslashes() - إزالة الشرطات المائلة
echo stripslashes("It\'s a test"); // It's a test

// parse_str() - تحليل النص إلى متغيرات
$query = "name=John&age=30&city=New+York";
parse_str($query, $output);
print_r($output);
// Array ( [name] => John [age] => 30 [city] => New York )
?>