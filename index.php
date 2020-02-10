<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);


//Get post
/*if(isset($_POST['email']) == true && empty($_POST['email']) == false){

$email = $_POST['email'];

    function isEmailValid(string $email) {
        $acceptables = array('.com','.org','.be', '.net', '.int', '.edu', '.gov', '.mil','au', '@');

        foreach ($acceptables as $acceptable) {
            if (strpos($email, $acceptable) !== false) {
                echo 'valid email!<br>';
                return;
            }
        }
        echo 'email not valid!<br />';
    }
    isEmailValid($email);
}*/

if(isset($_POST['email']) == true && empty($_POST['email']) == false) {
    $email = $_POST['email'];
if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
    echo 'valid email!<br>';
}else{
    echo 'email not valid!<br />';
}


}
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