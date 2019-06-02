<?php
if (isset($_SESSION['customer'])) {
    echo '<table>';
    echo '<th>商品番号</th><th>商品名</th><th>価格</th>';
    $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
        'staff', 'password');
    $sql=$pdo->prepare(
        'select * from favorite, product '.
        'where costomer_id=? and product_id=?');
    $sql->execute([$_SESSION['customer']['id']]);
    foreach($sql as $row) {
        $id = $row['id'];
        echo '<tr>';
        echo '<td>'.$id.'</td>';
        echo '<td><a href="practice-detail.php?='.$id.'">'.$row['name'].'</a></td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td><a href="practice-favorite-delete.php?id='.$id.'">削除</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'お気に入りを表示するには、ログインしてください。';
}

?>