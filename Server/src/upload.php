<?php
/**
 * PHP上传视频
 */

$upfile = $_FILES['file'];

function upload_file($files, $path = "./uploadVideo", $imagesExt = ['jpg', 'png', 'jpeg', 'gif', 'mp4','mp3'])
{
    // 判断错误号
    if (@$files['error'] == 00) {
        $ext = strtolower(pathinfo(@$files['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $imagesExt)) {
            return "非法文件类型";
        }

        // 判断是否存在上传到的目录
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        // 生成唯一的文件名
        $uploadFileId = date("Y").'-' .date("m").'-' .date("d").'-' .date("h").'-' .date("i").'-' .date("s");
        $fileName = $uploadFileId. '.' .$ext;

        // 将文件名拼接到指定的目录下
        $destName = $path . "/" . $fileName;


        $uploadFileName = $_FILES["file"]["name"];
        $uploadFileType = $_FILES["file"]["type"];
        $uploadFileSize = ($_FILES["file"]["size"] / 1024 / 1024);
        $uploadFileLocation = $destName;

        // 进行文件移动
        if (!move_uploaded_file($files['tmp_name'], $destName)) {
            return "文件上传失败！";
        }
        require"MysqlInsert.php";

        include_once "MysqlInsert.php";
        $InsertOj = new MysqlInsert();
        if($InsertOj->InsertData($uploadFileId,$uploadFileName,$uploadFileType,$uploadFileSize,$uploadFileLocation)){
            return "文件上传成功！";
        }
    } else {
        // 根据错误号返回提示信息
        switch (@$files['error']) {
            case 1:
                echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
                break;
            case 2:
                echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
                break;
            case 3:
                echo "文件只有部分被上传";
                break;
            case 4:
                echo "没有文件被上传";
                break;
            case 6:
            case 7:
                echo "系统错误";
                break;
        }
    }

}

$feedback = upload_file($upfile);
echo "<script>alert('$feedback');window.location='./index.php';</script>";

?>