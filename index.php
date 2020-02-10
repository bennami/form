<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);


//validate email, working, if u type .php it still gives u valid email
function validateEmail(){
    if(isset($_POST['email']) == true && empty($_POST['email']) == false) {
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
        echo 'valid email!';
    }else{
        echo 'email not valid!';
      }
    }
}


function requireStreet()
{
    if (isset($_POST['street'])) {
        $street = trim($_POST['street']);
        if (empty($street)) {
            echo 'street required<br>';
        } else {
            echo 'check!<br>';
        }
    }
}
function requireStreetnumber(){
    if (isset($_POST['streetnumber'])) {
        $streetnumber = trim($_POST['streetnumber']);
        if (is_numeric($streetnumber) == true) {
            echo 'its a number!<br>';
        } else {
            echo 'must be number<br>';
        }
        if (empty($streetnumber)) {
            echo 'streetnumber required<br>';
        } else {
            echo 'check<br>';
        }
    }
}

   function requireCity(){

    if(isset($_POST['city'])) {
        $city = trim($_POST['city']);
        if (empty($city)) {
            echo 'city required<br>';
        } else {
            echo 'check<br>';
        }
    }
   }

   function requireZipCode(){
        if(isset($_POST['zipcode'])) {
            $zipcode = trim($_POST['zipcode']);
           if(is_numeric($zipcode)  ==true){
               echo 'its a number!<br>';
           }else{
               echo 'must be number<br>';
           }
            if (empty($zipcode)) {
                echo 'zipcode required<br>';
            } else {
                echo 'check<br>';
            }
        }
   }

//var_dump(requireAdress());

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