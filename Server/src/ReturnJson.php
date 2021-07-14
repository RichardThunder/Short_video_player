<?php

$result=require('MysqlSelect.php');

$results = array();

while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

if($results){
//    echo json_encode($results);
    return json_encode($results);
}else{
    echo "0 结果";
}

?>