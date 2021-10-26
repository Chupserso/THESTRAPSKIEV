<?php
$connect = new mysqli("localhost", "root", "root", "thestrapskiev");
if ($connect->connect_error == true) {
    echo "<script>console.log(0)</script>";
} else {
    echo "<script>console.log(1)</script>";
}
?>
<!DOCTYPE html>
<html lang="en-ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminka.css">
    <title>Админ панель</title>
</head>
<body>
    <section class="hat">
        <h1>Админ панель</h1>
    </section>
    <section class="delOrder" style="margin-top:10px;">
        <form action="#" method="POST" style="line-height: 1px;">
            <input type="text" name="id" style="display:block;margin:0 auto;width:80%;height:50px;" placeholder="ID заказа который хотите удалить">
            <br><input type="submit" name="delBtn" value="Удалить заказ" class="delBtn" style="display:block;margin:0 auto;width:80%;height:50px;border: none;background: green;cursor: pointer;color: white;">
            <br><input type="submit" name="delOrders" value="Очистить заказы" class="delOrders" style="display:block;margin:0 auto;width:80%;height:50px;border: none;background: green;cursor: pointer;color: white;">
        </form>
        <?php
        if (isset($_POST["delBtn"])) {
            $indificator = $_POST["id"];
            $query = $connect->query("DELETE FROM orders WHERE id='$indificator'");
        }
        if (isset($_POST["delOrders"])) {
            $query = $connect->query("DELETE FROM orders");
        }
        ?>
    </section>
    <section class="delComment" style="margin-top:10px;">
        <form action="#" method="POST" style="line-height: 1px;">
            <input type="text" name="id" style="display:block;margin:0 auto;width:80%;height:50px;" placeholder="ID комментария который хотите удалить">
            <br><input type="submit" name="delComment" value="Удалить отзыв" class="delComment" style="display:block;margin:0 auto;width:80%;height:50px;border: none;background: green;cursor: pointer;color: white;">
            <br><input type="submit" name="delComments" value="Очистить отзывы" class="delComment" style="display:block;margin:0 auto;width:80%;height:50px;border: none;background: green;cursor: pointer;color: white;">
        </form>
        <?php
        if (isset($_POST["delComment"])) {
            $indificatorComment = $_POST["id"];
            $query = $connect->query("DELETE FROM comments WHERE id='$indificatorComment'");
        }
        if (isset($_POST["delComments"])) {
            $query = $connect->query("DELETE FROM comments");
        }
        ?>
    </section>
    <section class="orders">
        <?php
        $query = $connect->query("SELECT * FROM orders");
        while ($result = $query->fetch_assoc()) {
            $name = $result["name"];
            $number = $result["number"];
            $text = $result["text"];
            $id = $result["id"];
            echo '<div class="order"><h2 class="name">'.$name.'</h2><a class="number" href="tel:'.$number.'">'.$number.'</a><div class="text">'.$text.'</div><h2 class="indificator" style="color: yellow;font-size: 25px;">ID: '.$id.'</h2></div>';
        }
        ?>
    </section>
    <section class="comments" style="width: 80%;margin: 20px auto;padding: 10px;padding-top: 20px;background: wheat;">
        <?php
        $query = $connect->query("SELECT * FROM comments");
        while ($result = $query->fetch_assoc()) {
            $name = $result["name"];
            $text = $result["text"];
            $id = $result["id"];
            echo '<div class="comment" style="margin-bottom:10px;display: flex;justify-content: space-around;"><h2 class="comment_name" style="font-size:25px;color:black;">'.$name.'</h2><div class="comment_text">'.$text.'</div><h2 class="id" style="font-size:25px;color:blue;">ID: '.$id.'</h2></div>';
        }
        ?>
    </section>
</body>
</html>