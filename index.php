<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
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
            $email =trim($_POST['email']);
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
        $_POST['email']='';
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

$streetnumber = requireStreetnumber();

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
            //$alertStyle = array();
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
                    $_SESSION['zipcode'] =$zipcode;
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
$validEmail = validateEmail();

//if some form info is empty show alert that the form needs to  be  complete
function formcomplete(){
    foreach ($_POST as $value) {
        $alertStyle = array();

        //also check for an array inside the $_POST, if empty alert-dangere
        if ( is_array($value)) {
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
$drinks = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

//toggle between food and drinks
if(!isset($_GET['food'])){

    $_GET['food']=1;
} else{

        if ($_GET['food'] == 1) {
            $products = [
                ['name' => 'Club Ham', 'price' => 3.20],
                ['name' => 'Club Cheese', 'price' => 3],
                ['name' => 'Club Cheese & Ham', 'price' => 4],
                ['name' => 'Club Chicken', 'price' => 4],
                ['name' => 'Club Salmon', 'price' => 5]
            ];

        } else {
           $products =  $drinks;
        }
    }
//get total price of order
$total = array();
$orderList =array();
$totalSum = 0;
$_SESSION['total']='0';

if (isset($_POST["products"])){
    $order = $_POST["products"];

    for ($i = 0; $i < count($order); $i++) {
    //get name of products you order
        array_push($orderList, $order[$i]['name']);

    //get total, i think there is an issue with float and integers

        array_push($total,$order[$i]["price"]);
         $totalSum = strval(array_sum($total));
         setcookie('total', strval($totalSum ));
         $_SESSION['total'] = $totalSum;

    }
//check for express delivery
    function expressDelivery(){
        if(isset($_POST[ 'expressDelivery'])){
            $date= date('h:i:sa');
            $express = $date + strtotime('+ 45 minutes');
            return '<br>you chose express delivery, food will arrive at '.$express;

        }else{
            $date= date('h:i:sa');
            $express = $date + strtotime('+ 2 hours');
            return '<br>you chose normal delivery, food will arrive at '.$express;
        }
    }
    $express = expressDelivery();
    echo $express;
    //var_dump($_GET[ 'expressDelivery']);


    //get order summary to send in email
    $orderSummary = implode('<br>', $orderList);


    //email  with summary order, data from session, total time to deliver, total price, extra cost for delivery and predefined email  of user
    $merge =array($orderSummary,  $totalSum, 'thank you for your order', $express);
    $summary = implode('<br>', $merge);
    mail($_SESSION['email'],'order receipt from restaurant', $summary);
}
//save total spent in session
//setcookie('total', strval($totalSum )); //86400 = 1day
//$_COOKIE ['total'] = $totalSum;








//var_dump($summary);
//header('refresh: 2');
require 'form-view.php';