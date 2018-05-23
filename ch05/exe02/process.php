<?php
    require_once 'Upload.class.php';

    $upload = new Upload('fileUpload');

    $upload->setFileExtension(array('rar'));
    $upload->setFileSize(102400, 5242880);
    $upload->setUploadDir('./images/');

    if ($upload->isVail() == false) {
        $upload->upload(true);
    } else {
        $upload->showErrors();
    }
?>