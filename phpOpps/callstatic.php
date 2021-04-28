<?php

class student{
    private static function hello($name){
        // echo "This is static function";
        echo "Hello $name";
    } 

    public static function __callStatic($method,$arg){
        if(method_exists(__class__,$method)){
            call_user_func_array([__class__, $method], $arg);
            // method_exists(object,methodname) use to search method exist in class
        }
        else{
            echo "Method does not exist ($method) \n ";
        }

    }
}

student::hello("farjad");

// :: scope resolution operator
// static function ko bna object bnae bhi call kia ja skta hai 

// private static method ya non existing method ko professionally 
// handle krne k liye __callStatic() function istmal krte hai

// __class__ (ye ak constant method hai jo class ka nam utha kr lae ga (js class m mojod ha usi ka nam hi utahe ga))
// q k hm ne class ka object nhi bnaya isliye hm ne __class__ use kiya
?>