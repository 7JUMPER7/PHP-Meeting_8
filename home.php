<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'shopdb');

    if(isset($_POST['delBut'])) {
        $ids = [];
        foreach($_POST as $name => $value) {
            if(str_contains($name, 'deleteItem')) {
                $ids[] = str_replace('deleteItem', '', $name);
            }
        }
        $size = count($ids);
        if($link && $size > 0) {
            $query = "DELETE FROM goods WHERE";
            for($i = 0; $i < $size; $i++) {
                if($i < $size - 1) {
                    $query .= " Id = ".$ids[$i]." OR";
                } else {
                    $query .= " Id = ".$ids[$i].";";
                }
            }
            // var_dump($query);
            mysqli_query($link, $query); // Делаю один запрос чтоб снизить нагрузку на БД и задержку.
        }
    }
?>

<div class="container">
    <form action="?page=home" method="POST" class="text-center">
        <table class="table table-dark table-hover mt-5" style="border-radius: 10px; overflow: hidden; box-shadow: 7px 7px 15px 0 rgba(0, 0, 0, .3);">
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Manufacturer</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if($link) {
                    $query = "SELECT g.Id, m.Name, g.Name, g.Price FROM goods AS g
                        JOIN manufacturers AS m ON m.Id = g.manufacturerId";
                    $res = mysqli_query($link, $query);
                    while($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='deleteItem".$row[0]."'></td>";
                        foreach($row as $k => $v) {
                            echo "<td>$v</td>";
                        }
                        echo "</tr>";
                    }
                    mysqli_close($link);
                }
            ?>
            </tbody>
        </table>
        <input class="btn btn-danger mt-3" type="submit" name="delBut" value="Delete selected">
    </form>
</div>