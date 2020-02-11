<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);



if(isset($_POST)){
//validate email, working, if u type .php it still gives u valid email.
function validateEmail(){
    $alertStyle = array();

    //if string is not empty
    if (empty($_POST['email']) == false) {
        if (isset($_POST['email']) == true) {
            $email = $_POST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
                $style = 'alert-success';
                $isValid = 'valid email!';
                array_push($alertStyle, $style, $isValid);
                $_COOKIE['email']= $email;
            } else {
                $style = 'alert-danger';
                $isValid = 'email not valid!';
                array_push($alertStyle, $style, $isValid);
            }
            return $alertStyle;
        }
    } else {
        //if string is empty
        $style = 'alert-danger';
        $isValid = 'email required!';
        array_push($alertStyle, $style, $isValid);
        return $alertStyle;
    }
}

function requireStreet(){
    $alertStyle= array();
    if (isset($_POST['street'])) {
        $street = trim($_POST['street']);
        if (empty($street)) {
            $style = 'alert-danger';
            $isValid = 'no valid street!';
            array_push($alertStyle, $style, $isValid);

        } else {
            $style = 'alert-success';
            $isValid = 'street valid!';
            array_push($alertStyle, $style, $isValid);
            $_COOKIE['street']= $street;
        }
    }return $alertStyle;
}
function requireStreetnumber(){
    $alertStyle= array();
    if (isset($_POST['streetnumber'])) {
        $streetnumber = trim($_POST['streetnumber']);
        if (is_numeric($streetnumber) == true) {
            $style = 'alert-success';
            $isNumber = 'its a number!';
            array_push($alertStyle, $style, $isNumber);
        } else {
            $style = 'alert-danger';
            $isNumber = 'must be number';
            array_push($alertStyle, $style, $isNumber);
        }
        if (empty($streetnumber)) {
            $style = 'alert-danger';
            $isValid = 'street number required';
            array_push($alertStyle, $style, $isValid);
        } else {
            $style = 'alert-success';
            $isValid =  'check';
            array_push($alertStyle, $style, $isValid);
            $_COOKIE['streetnumber']= $streetnumber;
        }
    }return $alertStyle;
}

   function requireCity(){
       $alertStyle= array();
    if(isset($_POST['city'])) {
        $city = trim($_POST['city']);
        if (empty($city)) {
            $style = 'alert-danger';
            $isValid = 'city required';
            array_push($alertStyle, $style, $isValid);
        } else {
            $style = 'alert-success';
            $isValid =  'check!';
            array_push($alertStyle, $style, $isValid);
            $_COOKIE['city']= $city;
        }
    }return $alertStyle;
   }

   function requireZipCode(){
       $alertStyle= array();
        if(isset($_POST['zipcode'])) {
            $zipcode = trim($_POST['zipcode']);
           if(is_numeric($zipcode)  ==true){
               $style = 'alert-success';
               $isNumber = 'its a number!';
               array_push($alertStyle, $style, $isNumber);
           }else{
               $style = 'alert-danger';
               $isNumber = 'must be number';
               array_push($alertStyle, $style, $isNumber);
           }
            if (empty($zipcode)) {
                $style = 'alert-danger';
                $isValid =  'zip code required';
                array_push($alertStyle, $style, $isValid);
            } else {
                $style = 'alert-success';
                $isValid =  'check!';
                array_push($alertStyle, $style, $isValid);
                $_COOKIE['zipcode']= $zipcode;
            }
        }return $alertStyle;
   }

}

function formcomplete(){
    $data = array();

    for ($i=0; $i< count($_POST); $i++){
        array_push($data, $_POST[$i]);
        }
    foreach($data as $data){
        $alertStyle =array();
        if(empty($data) == true){
            $alerClass = 'alert-danger';
            $alert = 'form  not complete, please  fill in all the required info';
            array_push($alertStyle, $alerClass, $alert );

        }else{
            $alerClass = 'alert-success';
            $alert = 'form complete, your order has been sent!';
            array_push($alertStyle, $alerClass, $alert );
        }return $alertStyle;
     }

    }

var_dump(formcomplete());


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
var_dump(whatIsHappening());

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
function food(){

    if(isset($_POST['food'])){
        $menu = $_POST['food'];

        if ($menu == 0){
           echo $drinks = [
                ['name' => 'Cola', 'price' => 2],
                ['name' => 'Fanta', 'price' => 2],
                ['name' => 'Sprite', 'price' => 2],
                ['name' => 'Ice-tea', 'price' => 3],
            ];
        }else{
            echo  $food = [
                ['name' => 'Club Ham', 'price' => 3.20],
                ['name' => 'Club Cheese', 'price' => 3],
                ['name' => 'Club Cheese & Ham', 'price' => 4],
                ['name' => 'Club Chicken', 'price' => 4],
                ['name' => 'Club Salmon', 'price' => 5]
            ];
        }

    }

}
//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];



$totalValue = 0;

require 'form-view.php';