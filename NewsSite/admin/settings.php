<?php include "header.php";?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Your Site</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
       <?php
        include "config.php";
        
        $query = "SELECT * FROM `settings`";

        $result=mysqli_query($conn,$query) or die("Query Failed");
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
       ?>
        <!-- Form for show edit-->
        <form action="savesettings.php" method="POST" enctype="multipart/form-data" autocomplete="off">            
            <div class="form-group">
                <label for="website_name">Website Name</label>
                <input type="text" name="website_name"  class="form-control" id="website_name" value="<?php echo $row['website_name']; ?>">
            </div>
            <div class="form-group">
                <label for="">Site Logo</label>
                <input type="file" name="logo-image">
                <img  src="images/<?php echo $row['logo']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['logo']; ?>">
            </div>
            <div class="form-group">
                <label for="footer_desc">Footer Description</label>
                <textarea name="footer_desc" id="footer_desc" rows="3" class="form-control"><?php echo $row['footer_desc']; ?></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php                
            }
        }       
        else{
            echo "Result Not Found";
        }     
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
