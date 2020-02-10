<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);


//validate email, working, if u type .php it still gives u valid email
function validateEmail(){
    if(isset($_POST['email']) == true && empty($_POST['email']) == false) {
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
        echo 'valid email!<br>';
    }else{
        echo 'email not valid!<br />';
      }
    }
}


function requireAdress(){
   if(isset($_POST['street'])){
       $street = trim($_POST['street']);
       if(empty($street)) {
           echo'street required';
       }else{
           echo 'check!';
       }
   }

    if(isset($_POST['streetnumber'])){
        $streetnumber = trim ($_POST['streetnumber']);
        if(is_numeric($streetnumber)  ==true){
            echo 'its a number!';
        }else {
            echo 'must be number';
        }
        if(empty($streetnumber)) {
            echo'streetnumber required';
        }else{
        echo'check';}
    }
    if(isset($_POST['city'])) {
        $city = trim($_POST['city']);
        if (empty($city)) {
            echo 'city required';
        } else {
            echo 'check';
        }
    }
        if(isset($_POST['zipcode'])) {
            $zipcode = trim($_POST['zipcode']);
           if(is_numeric($zipcode)  ==true){
               echo 'its a number!';
           }else{
               echo 'must be number';
           }
            if (empty($zipcode)) {
                echo 'zipcode required';
            } else {
                echo 'check';
            }
        }
}
var_dump(requireAdress());

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//whatIsHappening();
//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;

require 'form-view.php';