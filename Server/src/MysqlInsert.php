<?php
class MysqlInsert{
    function InsertData($videoid,$videoname, $videotype, $videosize,$videolocation){
        $servername = "120.55.100.159";
        $username = "root";
        $password = "560528";
        $dbname = "db_videostream";

        // 创建连接
        $conn = new mysqli($servername, $username, $password, $dbname);
        // 检测连接
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }

        $sql = "INSERT INTO videodetails (videoid,videoname,videotype,videosize,videolocation) VALUES ('$videoid','$videoname', '$videotype', $videosize,'$videolocation')";

        if ($conn->query($sql) === TRUE) {
//            echo "新记录插入成功! ";
            $conn->close();
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $conn->close();
            return false;
        }

    }
}
?>
