<?php

// require "first.php";
// require "second.php";

function __autoload($class){
    require $class .".php";
}

$test = new first();
$test1 = new second();

// __autoload k zariye classes ko bar bar require function k sate use nhi krna parta blke ak hi bar call krskte hai
// class ka name aur file ka nam ak hi hoona chaye
?>