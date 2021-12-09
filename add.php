<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'shopdb');
    $resultBox = '';

    if(isset($_POST['addBut'])) {
        $query = "INSERT INTO goods (Name, Price, ManufacturerId) VALUES ('".$_POST['name']."', ".$_POST['price'].", ".$_POST['manufacturerId'].")";
        if(mysqli_query($link, $query)) {
            $resultBox = '<div>Successfully added</div>';
        } else {
            $resultBox = '<div>Some error happened</div>';
        }
    }
?>

<div class="container" style="text-align: center;">
    <form class="form" action="?page=add" method="POST">
        <select class="form-control mt-5" name="manufacturerId" required>
            <?php
            var_dump($link);
            if($link) {
                $res = mysqli_query($link, "SELECT * FROM manufacturers");
                while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    echo "<option value='".$row['Id']."'>".$row['Name']."</option>";
                }
                mysqli_close($link);
            }
            ?>
        </select>
        <input class="form-control mt-2" type="text" name="name" placeholder="Title" required>
        <input class="form-control mt-2" type="number" name="price" placeholder="Price" required>
        <?php if($resultBox != '') echo $resultBox ?>
        <input class="btn btn-success mt-2" type="submit" value="Add" name="addBut">
    </form>
</div>