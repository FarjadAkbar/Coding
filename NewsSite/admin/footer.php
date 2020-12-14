<?php
    include "config.php";
    
    $query = "SELECT * FROM `settings`";

    $result=mysqli_query($conn,$query) or die("Query Failed");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
?>
<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span><?php echo $row['footer_desc']; ?></span>
            <?php
                }
               }
            ?>

            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
