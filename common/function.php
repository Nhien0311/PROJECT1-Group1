<?php
// Hàm kết nối CSDL
function connectDB() {
    $host = DB_HOST;
    $port = DB_PORT;
    $dbName = DB_NAME;


    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbName",DB_USER,DB_PASS);
        return $conn;
    } catch (Exception $e) {
        echo "Lỗi: " .$e->getMessage();
        echo "<hr>";
    }
}
?>