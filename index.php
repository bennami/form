<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

if(isset($_POST)){
//for each input field there is a function, validate, empty string when data is not valid, keep correct data so user doesnt need to retype it and return values in  array to echo in HTML

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
                array_push($alertStyle, $style, $isValid,$email);
                $_SESSION['email']= $email;
            } else {
                $style = 'alert-danger';
                $isValid = 'email not valid!';
                array_push($alertStyle, $style, $isValid);
                $_POST['email']='';
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
            $_POST['street']='';

        } else {
            $style = 'alert-success';
            $isValid = 'street valid!';
            array_push($alertStyle, $style, $isValid, $street);
            $_SESSION['street']= $street;
        }
    }return $alertStyle;
}

function requireStreetnumber(){
    $alertStyle= array();
    if (isset($_POST['streetnumber'])) {
        $streetnumber = trim($_POST['streetnumber']);
        if (empty($streetnumber)) {
            $style = 'alert-danger';
            $isValid = 'street number required';
            array_push($alertStyle, $style, $isValid);
        } else {
            $style = 'alert-success';
            $isValid =  'check';
            array_push($alertStyle, $style, $isValid);
            $_SESSION['streetnumber']= $streetnumber;

            if (is_numeric($streetnumber) == true) {
                $style = 'alert-success';
                $isNumber = 'its a number!';
                array_push($alertStyle, $style, $isNumber, $streetnumber);
            } else {
                $style = 'alert-danger';
                $isNumber = 'must be number';
                array_push($alertStyle, $style, $isNumber);
                $_POST['streetnumber']= '';

            }
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
            $_POST['city'] = '';
        } else {
            $style = 'alert-success';
            $isValid =  'check!';
            array_push($alertStyle, $style, $isValid, $city);
            $_SESSION['city']= $city;
        }
    }return $alertStyle;
   }


function requireZipCode(){
    $alertStyle= array();
        if(isset($_POST['zipcode'])) {
            $zipcode = trim($_POST['zipcode']);
            $alertStyle = array();
            if (empty($zipcode)) {
                $style = 'alert-danger';
                $isValid =  'zip code required';
                array_push($alertStyle, $style, $isValid);
            } else {
                $style = 'alert-success';
                $isValid =  'check!';
                array_push($alertStyle, $style, $isValid);
               // $_SESSION['zipcode']= $zipcode;

                if(is_numeric($zipcode)  ==true){
                    $style = 'alert-success';
                    $isNumber = 'its a number!';
                    array_push($alertStyle, $style, $isNumber,$zipcode);

                }else{
                    $_POST['zipcode'] = '';
                    $style = 'alert-danger';
                    $isNumber = 'must be number';
                    array_push($alertStyle, $style, $isNumber);
                }
            }
        }
        return $alertStyle;
   }
}

//put functions in var to echo the return properly
$zipcodeFunc = requireZipCode();
$streetNumber = requireStreetnumber();

//if some form info is empty show alert that the form needs to  be  complete
function formcomplete(){
    foreach ($_POST as $value) {
        $alertStyle = array();

        //also check for an array inside the $_POST, if empty alert-dangere
        if ( is_array($value))
        {
            if (empty($value) == true) {
                $alertClass = 'alert-danger';
                $alert = 'form  not complete, please  fill in all the required info';
                array_push($alertStyle, $alertClass, $alert);

            }
        }

        //check if strings inside $_POST are empty,
        if (empty($value) == true) {
            $alertClass = 'alert-danger';
            $alert = 'form  not complete, please  fill in all the required info';
            array_push($alertStyle, $alertClass, $alert);

        } else {
            //if not empty alert success
            $alerClass='alert-success';
            $alert = "form sent!";
            $alertStyle= array($alerClass, $alert) ;
        }
       //return array,  $alertStyle[0] = alert-danger/success and alertStyle[1] = text to be displayed. use  this in form-view.php
        return $alertStyle;
    }
}
//var_dump(formcomplete());




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
//header('refresh: 2');
require 'form-view.php';