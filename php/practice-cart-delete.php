<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'practice-menu.php'; ?>
<?php
unset($_SESSION['product'][$_REQUEST['id']]);
echo 'カートから商品を削除しました。';
echo '<hr>';
require 'practice-cart.php';
?>

<?php require '../footer.php'; ?>