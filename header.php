<?php
    function generateHeader($links) {
        ?>
        <header class="p-3 bg-dark text-white" style="box-shadow: 7px 7px 15px 0 rgba(0, 0, 0, .3);">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                    </a>
                    
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <?php
                        foreach($links as $name => $filename) {
                            if(isset($_GET['page']) && $_GET['page'] != $name) {
                                echo "<li><a href='?page=$name' class='nav-link px-2 text-secondary'>".ucfirst($name)."</a></li>";
                            } else {
                                echo "<li><a href='?page=$name' class='nav-link px-2 text-white'>".ucfirst($name)."</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </header>
        <?php
    }
?>
