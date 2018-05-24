<?php
class PhanSo{
    // Thuộc tính
    public $_tuSo;
    public $_mauSo;

    // Phương thức
    public function __construct($tuSo, $mauSo) {
        $this->_tuSo = $tuSo;
        $this->_mauSo = $mauSo;
    }

    // Hiển thị
    public function showPS(){
        return $this->_tuSo . '/' . $this->_mauSo;
    }

    // Rút gọn
    public function rutGonPS(){
        $ucln = $this->UCLN($this->_tuSo, $this->_mauSo);
        $this->_tuSo = $this->_tuSo / $ucln;
        $this->_mauSo = $this->_mauSo / $ucln;
    }

    // Tìm UCLN
    private function UCLN($a, $b){
        $min = min(array($a, $b));
        while ($min > 0) {
            if ($a % $min == 0 && $b % $min == 0) return $min;
            $min--;
        }
    }

    // Tổng
    public function tongPS($phanSo){
        $this->_tuSo = $this->_tuSo * $phanSo->_mauSo + $phanSo->_tuSo * $this->_mauSo;
        $this->_mauSo = $this->_mauSo * $phanSo->_mauSo;
        $this->rutGonPS();
    }

    public function hieuPS($phanSo){
        $this->_tuSo = $this->_tuSo * $phanSo->_mauSo - $phanSo->_tuSo * $this->_mauSo;
        $this->_mauSo = $this->_mauSo * $phanSo->_mauSo;
        $this->rutGonPS();
    }

    public function tichPS($phanSo){
        $this->_tuSo = $this->_tuSo * $phanSo->_tuSo;
        $this->_mauSo = $this->_mauSo * $phanSo->_mauSo;
        $this->rutGonPS();
    }

    public function thuongPS($phanSo){
        $this->_tuSo = $this->_tuSo * $phanSo->_mauSo;
        $this->_mauSo = $this->_mauSo * $phanSo->_tuSo;
        $this->rutGonPS();
    }
}
?>