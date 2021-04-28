<?php

require 'product.php';
require 'testing.php';

function wow(){
    echo "Wow From Index Page \n";
}

use pro as products;
$obj=new products\product;
// $obj=new pro\product;
// $obj1=new test\product;

wow();
pro\wow();
?>