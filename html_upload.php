<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $target_directory = "html_data/";
    $target_file = $target_directory . basename($_FILES["file"]["name"]);

    // フォルダが存在しない場合は作成
    if (!file_exists($target_directory)) {
        mkdir($target_directory, 0777, true);
    }

    // ファイルがHTMLファイルであるか確認
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($file_type != "html") {
        echo "HTMLファイルのみアップロード可能です。";
        exit;
    }

    // ファイルの上書きまたは新規保存
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "ファイル " . htmlspecialchars(basename($_FILES["file"]["name"])) . " がアップロードされ、保存されました。";
    } else {
        echo "ファイルのアップロードに失敗しました。";
    }
}
?>
