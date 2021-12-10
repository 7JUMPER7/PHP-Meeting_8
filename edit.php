<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'shopdb');
    $resultBox = '';

    if(isset($_POST['editBut'])) {
        $query = "UPDATE  goods SET Name='".$_POST['name']."', Price=".$_POST['price'].", ManufacturerId=".$_POST['manufacturerId']." WHERE Id=".$_POST['id'];
        if(mysqli_query($link, $query)) {
            $resultBox = '<div>Successfully edited</div>';
        } else {
            $resultBox = '<div>Some error happened</div>';
        }
    }

    if(isset($_GET['id'])) {
        $res = mysqli_query($link, "SELECT * FROM goods WHERE Id = ".$_GET['id']);
        $good = mysqli_fetch_array($res, MYSQLI_ASSOC);
        ?>
            <div class="container" style="text-align: center;">
                <form class="form" action="?page=edit&id=<?php echo $_GET['id'] ?>" method="POST">
                    <input class="form-control mt-5" type="text" name="id" readonly value=<?php echo $good['Id']; ?>>
                    <select class="form-control mt-2" name="manufacturerId" required>
                        <?php
                        if($link) {
                            $res = mysqli_query($link, "SELECT * FROM manufacturers");
                            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                echo "<option value='".$row['Id']."' ".(($row['Id'] === $good['ManufacturerId']) ? 'selected' : '').">".$row['Name']."</option>";
                            }
                        }
                        ?>
                    </select>
                    <input class="form-control mt-2" type="text" name="name" placeholder="Title" required value="<?php echo $good['Name']; ?>">
                    <input class="form-control mt-2" type="number" name="price" placeholder="Price" required value=<?php echo $good['Price']; ?>>
                    <?php if($resultBox != '') echo $resultBox ?>
                    <input class="btn btn-success mt-2" type="submit" value="Edit" name="editBut">
                </form>
            </div>
        <?php
    } else {
        ?>
            <div class="container">
                Id not found.
            </div>
        <?php
    }
    mysqli_close($link);
?>
