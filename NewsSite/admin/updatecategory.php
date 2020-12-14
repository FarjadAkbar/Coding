<?php include "header.php"; 

if($_SESSION['role']=='0'){
    header("Location:{$hostname}/admin/post.php");
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <?php
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                }
                else{
                    header("Location:{$hostname}/admin/category.php");
                }

                $query="SELECT * FROM category WHERE category_id={$id}";                
                $result=mysqli_query($conn,$query) or die("Query Failed");                
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
              ?>                        
              <div class="col-md-offset-3 col-md-6">
                  <form action="saveupdatecategory.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
              <?php
                    }
                }            
              ?>
            </div>
          </div>
<?php include "footer.php"; ?>
