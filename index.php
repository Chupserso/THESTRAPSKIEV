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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="src/style.css">
    <title>THESTRAPSKIEV</title>
</head>
<body>
    <?php
    if (isset($_POST["addCommentBtn"])) {
        $name = $_POST["name"];
        $text = $_POST["comment_text"];
        $connect->query("INSERT INTO comments (name, text) VALUES ('$name', '$text')");
    }
    ?>
    <section class="hat">
        <div>
            <img src="img/logotype.jpg" alt="logotype" class="logotype" style="border-radius: 100%;width: 170px;height: 170px;">
        </div>
        <div>
            <a href="https://www.instagram.com/thestrapskiev/"><img class="insta" src="img/insta.png" alt="insta"></a>
            <a href="tel:+380938579472" style="color: white;font-size: 20px;">+380938579472</a>
        </div>
    </section>
    <section class="content">
        The straps - мы маленькая крафтовая компания, которая специализируется на пошиве ремешков для наручных часов из разных видов кожи и других необычных материалов. Основной миссией компании всегда было, есть и будет создавать эксклюзивные изделия из кожи под индивидуальный запрос каждого клиента.
    </section>
    <section class="portfolio">
        <div class="img_wrapper">
            <div class="img_block1">
                <div class="img_item">
                    <div>
                        <img src="img/w1.jpg" alt="w" id="img1" class="img">
                    </div>
                    <div id="text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eveniet, optio molestias quis quas sunt aperiam reiciendis itaque sed eius facilis impedit eaque tenetur voluptatibus sint est fugiat suscipit aut.
                    </div>
                </div>
                <div class="img_item">
                    <div>
                        <img src="img/w2.jpg" alt="w" id="img1" class="img">
                    </div>
                    <div id="text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eveniet, optio molestias quis quas sunt aperiam reiciendis itaque sed eius facilis impedit eaque tenetur voluptatibus sint est fugiat suscipit aut.
                    </div>
                </div>
                <div class="img_item">
                    <div>
                        <img src="img/w3.jpg" alt="w" id="img1" class="img">
                    </div>
                    <div id="text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eveniet, optio molestias quis quas sunt aperiam reiciendis itaque sed eius facilis impedit eaque tenetur voluptatibus sint est fugiat suscipit aut.
                    </div>
                </div>
            </div>
            <div class="img_block2">
                <div class="img_item">
                    <div>
                        <img src="img/w4.jpg" alt="w" id="img2" class="img">
                    </div>
                    <div id="text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eveniet, optio molestias quis quas sunt aperiam reiciendis itaque sed eius facilis impedit eaque tenetur voluptatibus sint est fugiat suscipit aut.
                    </div>
                </div>
                <div class="img_item">
                    <div>
                        <img src="img/w5.jpg" alt="w" id="img2" class="img">
                    </div>
                    <div id="text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eveniet, optio molestias quis quas sunt aperiam reiciendis itaque sed eius facilis impedit eaque tenetur voluptatibus sint est fugiat suscipit aut.
                    </div>
                </div>
                <div class="img_item">
                    <div>
                        <img src="img/w6.jpg" alt="w" id="img2" class="img">
                    </div>
                    <div id="text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eveniet, optio molestias quis quas sunt aperiam reiciendis itaque sed eius facilis impedit eaque tenetur voluptatibus sint est fugiat suscipit aut.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div><img src="img/w1.jpg" alt="w" class="wimg" id="wimg1"></div>
    <div><img src="img/w2.jpg" alt="w" class="wimg" id="wimg2"></div>
    <div><img src="img/w3.jpg" alt="w" class="wimg" id="wimg3"></div>
    <div><img src="img/w4.jpg" alt="w" class="wimg" id="wimg4"></div>
    <div><img src="img/w5.jpg" alt="w" class="wimg" id="wimg5"></div>
    <div><img src="img/w6.jpg" alt="w" class="wimg" id="wimg6"></div>
    <section class="order">
        <button class="buy" onclick="buyBtn(this)">Заказать</button>
    </section>
    <section class="comments_block" style="align-items:flex-start;padding-bottom:15px;">
        <button class="addCommentBtn" onclick="addCommentBtn(this)" style="display:block;margin:0 auto;">Добавить отзыв</button>
        <?php
        $query = $connect->query("SELECT * FROM comments");
        while ($result = $query->fetch_assoc()) {
            $name = $result["name"];
            $text = $result["text"];
            echo '<div class="comment_block" style="margin-bottom: 15px;"><h2>'.$name.'</h2><div>'.$text.'</div></div>';
        }
        ?>
    </section>
    <section class="addcomment">
        <div>
            <form action="#" method="POST" onclick="commentBtn(this)">
                <input type="text" name="name" placeholder="Имя" required>
                <br><textarea name="comment_text" cols="30" rows="10" placeholder="Текст" required></textarea>
                <br>
                <input type="submit" name="addCommentBtn" class="sendcommentBtn" value="Отправить" style="cursor:pointer;background: green; color: white;border: none;margin-top: 1px;">
                <button onclick="escapeBtn(this)" class="escapeBtn" style="cursor:pointer;background: red; color: white;border: none;margin-top: 1px;width: 300px;height: 30px;">X</button>
            </form>
        </div>
    </section>
    <section class="buyblock">
        <div>
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Имя" required>
                <br><input type="tel" name="number" placeholder="Телефон" required>
                <br><textarea name="text" placeholder="Описание заказа" style="width: 300px;height: 100px;color: black;border: none;"></textarea>
                <br>
                <input type="submit" name="buyBtn" class="buyBtn" value="Отправить" style="cursor:pointer;background: green; color: white;border: none;margin-top: 1px;">
                <button onclick="escapeBtn(this)" class="escapeBtn" style="cursor:pointer;background: red; color: white;border: none;margin-top: 1px;width: 300px;height: 30px;">X</button>
            </form>
        </div>
    </section>
    <section class="footer">
        <div class="footer_wrapper">
            <div><a href="https://www.instagram.com/thestrapskiev/"><img class="insta" style="margin-bottom: 5px;" src="img/insta.png" alt="insta"></a></div>
            <div><a href="tel:+380938579472" style="color: white;font-size: 20px;">+380938579472</a></div>
        </div>
    </section>
    <?php
    if (isset($_POST["buyBtn"])) {
        $name = $_POST["name"];
        $number = $_POST["number"];
        $textOrder = $_POST["text"];
        $connect->query("INSERT INTO orders (name, number, text) VALUES ('$name', '$number', '$textOrder')");
    }
    ?>
    <script>
        "use strict";
        document.onmousemove = function (){
            document.getElementsByTagName('body')[0].insertAdjacentHTML('beforeEnd', '<img src="img/cursor.png" alt="cursor" id="cursor">');
            var cursor = document.getElementById('cursor');
            cursor.style.position = 'fixed';
 
            document.onmousemove = function(event){
                cursor.style.left = event.clientX + -380 + 'px';
                cursor.style.top = event.clientY - 300 + 'px';
            }
        }
        let counter = 0;
        $(function(){
            $(".addcomment").hide();
            $(".buyblock").hide();
            $("#wimg1").hide();
            $("#wimg2").hide();
            $("#wimg3").hide();
            $("#wimg4").hide();
            $("#wimg5").hide();
            $("#wimg6").hide();
            $(".img_block1").animate({"margin-left":"1500px"}, 0).animate({"margin-left":"0px"}, 2000);
            $(".img_block2").animate({"margin-left":"-1500px"}, 0).animate({"margin-left":"0px"}, 2000);
        });
        function escapeBtn(btn) {
            $(".addcomment").hide(500);
            $(".buyblock").hide(500);
        }
        function addCommentBtn(form) {
            $(function(){
                $(".addcomment").show(500);
            });
        }
        function buyBtn(btn) {
            $(function(){
                $(".buyblock").show(500);
            });
        }
        let slider = function(){
            if (counter >= 0 && counter <= 50) {
                $(function(){
                    $("#wimg1").show();
                    $("#wimg2").hide();
                    $("#wimg3").hide();
                    $("#wimg4").hide();
                    $("#wimg5").hide();
                    $("#wimg6").hide();
                });
            }
            if (counter > 50 && counter <= 100) {
                $(function(){
                    $("#wimg1").hide();
                    $("#wimg2").show();
                    $("#wimg3").hide();
                    $("#wimg4").hide();
                    $("#wimg5").hide();
                    $("#wimg6").hide();
                });
            }
            if (counter > 100 && counter <= 150) {
                $(function(){
                    $("#wimg1").hide();
                    $("#wimg2").hide();
                    $("#wimg3").show();
                    $("#wimg4").hide();
                    $("#wimg5").hide();
                    $("#wimg6").hide();
                });
            }
            if (counter > 150 && counter <= 200) {
                $(function(){
                    $("#wimg1").hide();
                    $("#wimg2").hide();
                    $("#wimg3").hide();
                    $("#wimg4").show();
                    $("#wimg5").hide();
                    $("#wimg6").hide();
                });
            }
            if (counter > 200 && counter <= 250) {
                $(function(){
                    $("#wimg1").hide();
                    $("#wimg2").hide();
                    $("#wimg3").hide();
                    $("#wimg4").hide();
                    $("#wimg5").show();
                    $("#wimg6").hide();
                });
            }
            if (counter > 250 && counter <= 300) {
                $(function(){
                    $("#wimg1").hide();
                    $("#wimg2").hide();
                    $("#wimg3").hide();
                    $("#wimg4").hide();
                    $("#wimg5").hide();
                    $("#wimg6").show();
                });
            }
            if (counter >= 306) {
                counter = 0;
            }
            counter += 0.5;
            requestAnimationFrame(slider);
        };
        slider();
    </script>
</body>
</html>