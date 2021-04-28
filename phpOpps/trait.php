<?php

// trait is like a public function which can access every class
trait hello{
    public function sayHello(){
        echo "<h3>Hello Everyone</h3>";
    }
    public function sayHi(){
        echo "<h3>Hi Everyone</h3> <br><br>";
    }
}
trait bye{
    public function saybye(){
        echo "<h3>Bye Bye Everyone</h3> <br><br>";
    }
}

class A{
    use hello, bye;
}
class B{
    use hello;
    use bye;
}
class C{
    use hello;
}

$test_1=new A();
$test_2=new B();
$test_3=new C();

$test_1->sayHello();
$test_1->saybye();

$test_2->sayHello();
$test_2->saybye();

$test_3->sayHi();

?>