<?php 
// clone: Gán đối tượng B vào đối tượng A mà không thay đổi giá trị của đối tượng A.

require_once 'Cat.class.php';

$catA = new CAT('Morna', 'White', 3, '3kg');

$catB = clone $catA;
$catB->setName('Doraemon');
$catB->setColor('Green');
$catB->setAge(10);
$catB->setWeight('7kg');
echo "<hr>";
$catA->showInfoOfCat();

echo "<hr>";

$catB->showInfoOfCat();
?>