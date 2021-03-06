<?php require_once("../resources/config.php") ?>
<!DOCTYPE html>
<html lang="en">
    <?php include(TEMPLATE_CUSTOMER.DS."head.php"); ?>
    <body>

        <!-- Navigation -->
        <?php include(TEMPLATE_CUSTOMER.DS."navigation.php"); ?>
    
        <!-- Page Content -->
        <div class="container">

            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer">
                <h1>Purfleet Book Store</h1> 
                <p>The Ultimate second hand book store in Essex</p>
            </header>

            
       
            <!-- Page Features -->
            <div class="row text-center">
                <?php include(TEMPLATE_CUSTOMER.DS."thumbnails_index.php"); ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- Footer -->
        <?php include(TEMPLATE_CUSTOMER.DS."footer.php"); ?>
    </body>
</html>
