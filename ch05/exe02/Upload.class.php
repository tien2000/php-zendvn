<?php
class Upload{
    // Thuộc tính
    // Biến lưu trữ tên tập tin
    private $_fileName;

    // Biến lưu trữ kích thước tập tin
    private $_fileSize;

    // Biến lưu trữ phần mở rộng tập tin
    private $_fileExtension;

    // Biến lưu trữ đường dẫn thư mục tạm
    private $_fileTemp;

    // Biến lưu trữ lỗi
    private $_errors;

    // Biến lưu trữ đường dẫn upload
    private $_uploadDir;

    // Phương thức
    // Phương thức khởi tạo
    public function __construct($fileName) {
        $fileInfo = $_FILES[$fileName];
        $this->_fileName        = $fileInfo['name'];
        $this->_fileSize        = $fileInfo['size'];
        $this->_fileExtension   = $this->getFileExtension();
        $this->_fileTemp        = $fileInfo['tmp_name'];
    }

    // Phương thức lấy phần mở rộng
    public function getFileExtension(){        
        $ext = pathinfo($this->_fileName, PATHINFO_EXTENSION);
        return $ext;
    }

    // Phương thức thiết lập phần mở rộng
    public function setFileExtension($arrExtension){
        if (in_array(strtolower($this->_fileExtension), $arrExtension) == false) {
            $this->_errors[] = 'Phần mở rộng không phù hợp';
        }        
    }

    // PHương thức thiết lập khích thước min & max
    public function setFileSize($min, $max){
        if ($this->_fileSize < $min || $this->_fileSize > $max) {
            $this->_errors[] = 'Kích thước không phù hợp';
        }
    }

    // Phương thức thiết lập đường dẫn đến Folder
    public function setUploadDir($dir){
        if (file_exists($dir)) {
            $this->_uploadDir = $dir;
        } else {
            $this->_errors[] = 'Thư mục không hợp lệ';
        }
    }

    // Phương thức kiểm tra điều kiện upload tập tin
    public function isVail(){
        $flag = false;
        if (@count($this->_errors) > 0) {
            $flag = true;
        }
        return $flag;
    }

    // Phương thức upload tập tin
    public function upload($rename = true){        
        if ($rename == true) {
            $fileName = $this->randomStr(6);
            @move_uploaded_file($this->_fileTemp, $this->_uploadDir . $fileName);    
        } else {
            @move_uploaded_file($this->_fileTemp, $this->_uploadDir . $this->_fileName);
        }
        
    }

    // Phương thức hiển thị lỗi
    public function showErrors(){
        echo "<pre>";
        print_r($this->_errors);
        echo "</pre>";
    }

    private function randomStr($length = 5){
        $arrChar = array_merge(range("A", "Z"), range("a", "z"), range("0", "9")) ;
        $arrChar = implode($arrChar);
        $arrChar = str_shuffle($arrChar);
        $result = substr($arrChar, 0, $length) . "." . $this->_fileExtension;
        return $result;
    }
}