<?php

include "config.php";

$pagename=basename($_SERVER['PHP_SELF']);

switch($pagename){
    case "single.php";
    if(isset($_GET['id'])){
        $query_title="SELECT * FROM post WHERE post_id={$_GET['id']}";
        $result_title=mysqli_query($conn,$query_title) or die("Title Query Failed");
        $row_title=mysqli_fetch_assoc($result_title);
        
        $page_title=$row_title['title'];
    }
    else{
        $page_title="No post found";
    }
    break;

    case "category.php";
    if(isset($_GET['cid'])){
        $query_title="SELECT * FROM category WHERE category_id={$_GET['cid']}";
        $result_title=mysqli_query($conn,$query_title) or die("Title Query Failed");
        $row_title=mysqli_fetch_assoc($result_title);
        
        $page_title=$row_title['category_name'] . " news";
    }
    else{
        $page_title="No category found";
    }
    break;
   
    case "search.php";
    if(isset($_GET['search'])){        
        $page_title=$_GET['search'];
    }
    else{
        $page_title="No search found";
    }
    break;

    case "author.php";
    if(isset($_GET['aid'])){
        $query_title="SELECT * FROM user WHERE user_id={$_GET['aid']}";
        $result_title=mysqli_query($conn,$query_title) or die("Title Query Failed");
        $row_title=mysqli_fetch_assoc($result_title);
        
        $page_title="news by " . $row_title['first_name'] . " " . $row_title['last_name'];
    }
    else{
        $page_title="No user found";
    }
    break;

    default :
        $page_title="News Site";
    break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo ucwords($page_title); ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($_GET['cid'])){
                    $cat_id=$_GET['cid'];
                }

                 $query="SELECT * FROM category WHERE post > 0";
                 $result=mysqli_query($conn,$query) or die("Query Failed : Category");
                 if(mysqli_num_rows($result)>0){
                                           
                ?>
                <ul class='menu'>
                    <?php
                       if(isset($_GET['cid'])){                           
                        echo "<li><a href='$hostname'>Home</a></li>";
                       }
                       else{
                           
                        echo "<li><a class='active' href='$hostname'>Home</a></li>";
                       }
                        $active='';
                        while($row=mysqli_fetch_assoc($result)){   
                            if(isset($_GET['cid'])){
                                if($row['category_id']==$cat_id){
                                    $active='active';
                                }
                                else{
                                    $active='';
                                }
                            }
                            echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                        }
                    ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
