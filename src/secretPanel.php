<?php
$connect = new mysqli("localhost", "chupse1x_straps", "Xr10Xr10", "chupse1x_straps");
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
    <section class="hat" style="background-color: #48355a;">
        <h1>Админ панель</h1>
    </section>
    <section class="delOrder" style="margin-top:10px;">
        <form action="#" method="POST" style="line-height: 1px;">
            <input type="text" name="id" style="display:block;margin:0 auto;width:80%;height:50px;" placeholder="ID заказа который хотите удалить">
            <br><input type="submit" name="delBtn" value="Удалить заказ" class="delBtn" style="display:block;margin:0 auto;width:80%;height:50px;border: none;background: #636663;cursor: pointer;color: white;">
            <br><input type="submit" name="delOrders" value="Очистить заказы" class="delOrders" style="display:block;margin:0 auto;width:80%;height:50px;border: none;background: #636663;cursor: pointer;color: white;">
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
            <br><input type="submit" name="delComment" value="Удалить отзыв" class="delComment" style="display:block;margin:0 auto;width:80%;height:50px;border: none;background: #636663;cursor: pointer;color: white;">
            <br><input type="submit" name="delComments" value="Очистить отзывы" class="delComment" style="display:block;margin:0 auto;width:80%;height:50px;border: none;background: #636663;cursor: pointer;color: white;">
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
            echo '<div class="order"><h2 class="name">'.$name.'</h2><a class="number" href="tel:'.$number.'">'.$number.'</a><div class="text" style="width:100%;">'.$text.'</div><h2 class="indificator" style="color: yellow;font-size: 25px;">ID: '.$id.'</h2></div>';
        }
        ?>
    </section>
    <section class="comments" style="width: 100%;margin: 0px auto;padding: 10px;padding-top: 20px;background: wheat;">
        <?php
        $query = $connect->query("SELECT * FROM comments");
        while ($result = $query->fetch_assoc()) {
            $name = $result["name"];
            $text = $result["text"];
            $id = $result["id"];
            echo '<div class="comment" style="margin-bottom:10px;display: flex;flex-direction:column;align-items:center;"><h2 class="comment_name" style="font-size:25px;color:black;text-align-center;">'.$name.'</h2><div class="comment_text" style="text-align-center;">'.$text.'</div><h2 class="id" style="font-size:25px;color:blue;text-align-center;">ID: '.$id.'</h2></div>';
        }
        ?>
    </section>
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }
        .hat {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 130px;
            background: #5f4676;
        }
        h1 {
            color: white;
            font-size: 50px;
        }
        .orders {
            width: 100%;
            margin: 20px auto;
            padding: 10px;
            padding-top: 20px;
            background: wheat;
        }
        .order {
            display: flex;
            /* justify-content: space-around; */
            /* text-align: center; */
            background: black;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
        }
        .name {
            font-size: 25px;
            color: white;
        }
        .number {
            font-size: 25px;
            color: skyblue;
        }
        .text {
            font-size: 20px;
            color: white;
            text-align: center
            width:100%;
        }
    </style>
</body>
</html>
