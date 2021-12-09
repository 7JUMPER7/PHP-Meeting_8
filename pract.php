<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'shopdb');
    if($link) {
        $query = "SELECT name FROM goods";
        $res = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            var_dump($row);
        }
        mysqli_close($link);
    }
?>