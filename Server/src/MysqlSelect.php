<?php
$servername = "120.55.100.159";
$username = "root";
$password = "560528";
$dbname = "db_videostream";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT videoid,videoname, videotype, videosize,videolocation FROM videodetails";
$result = $conn->query($sql);

//if ($result->num_rows > 0) {
//    // 输出数据
//    while($row = $result->fetch_assoc()) {
//
//        echo " id: " . $row["videoid"]. " -Name: " . $row["videoname"]. "-Type: " . $row["videotype"]. "-Size: " . $row["videosize"]." -Location: " . $row["videolocation"]."<br>";
//        echo json_encode($row,JSON_UNESCAPED_UNICODE);
//        echo "<br>";
//    }
//} else {
//    echo "0 结果";
//}
$conn->close();
return $result;
?>