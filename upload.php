<?php
$target_dir = "C:\Users\Alex Leow\Videos\VideoDatabase\\";
$target_file = $target_dir . basename($_FILES["video"]["name"]);
$uploadOk = 1;
$videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// 检查文件类型
if($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov"
&& $videoFileType != "wmv" ) {
    echo "只允许上传 MP4, AVI, MOV, WMV 格式的视频文件。";
    $uploadOk = 0;
}

// 检查文件大小
if ($_FILES["video"]["size"] > 500000000) {
    echo "文件过大，只允许上传最大500MB的视频文件。";
    $uploadOk = 0;
}

// 检查上传是否成功
if ($uploadOk == 0) {
    echo "上传失败，请检查文件格式和大小。";
} else {
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_dir . "123." . $videoFileType)) {
        echo "文件 " . htmlspecialchars(basename( $_FILES["video"]["name"])) . " 上传成功。";
    } else {
        echo "上传失败，请检查文件格式和大小。";
    }
}
?>