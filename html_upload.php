<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $target_directory = "html_data/";
    $target_file = $target_directory . basename($_FILES["file"]["name"]);

    // �t�H���_�����݂��Ȃ��ꍇ�͍쐬
    if (!file_exists($target_directory)) {
        mkdir($target_directory, 0777, true);
    }

    // �t�@�C����HTML�t�@�C���ł��邩�m�F
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($file_type != "html") {
        echo "HTML�t�@�C���̂݃A�b�v���[�h�\�ł��B";
        exit;
    }

    // �t�@�C���̏㏑���܂��͐V�K�ۑ�
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "�t�@�C�� " . htmlspecialchars(basename($_FILES["file"]["name"])) . " ���A�b�v���[�h����A�ۑ�����܂����B";
    } else {
        echo "�t�@�C���̃A�b�v���[�h�Ɏ��s���܂����B";
    }
}
?>
