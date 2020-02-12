

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<form action="" method='get'>
<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link active" href="?food=1" name="food">Order food</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0" name="food">Order drinks</a>
            </li>

        </ul>
    </nav>
    </form>
    <form action="" method="post">
        <p class="alert <?php echo  formcomplete()[0]; ?>"> <?php echo formcomplete()[1]; ?> </p>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>"/>
                <div class ='alert <?php echo $validEmail[0]; ?>'> <?php echo $validEmail[1]; ?></div>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php if(isset($_SESSION['street'])){echo $_SESSION['street'];} ?>">
                    <div class ='alert <?php echo requireStreet()[0]; ?>' > <?php echo requireStreet()[1]; ?></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php if(isset($_SESSION['streetnumber'])){echo $_SESSION['streetnumber'];} ?>">
                    <div class ='alert <?php echo $streetnumber[0]; ?>'> <?php echo $streetnumber[1]; ?></div>
                    <div class ='alert <?php echo $streetnumber[2]; ?>'> <?php echo $streetnumber[3]; ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php if(isset($_SESSION['city'])){echo $_SESSION['city'];} ?>">
                    <div class ='alert <?php echo requireCity()[0];?>'> <?php echo requireCity()[1]; ?></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php if(isset($_SESSION['zipcode'])){echo $_SESSION['zipcode'];} ?>">
                    <div class ='alert <?php echo $zipcodeFunc[0]; ?>'> <?php echo $zipcodeFunc[1];?></div>
                    <div class ='alert <?php echo $zipcodeFunc[2]; ?>'> <?php echo $zipcodeFunc[3];?></div>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
            <label>
            <input type="checkbox" value="1" name="expressDelivery"/>
                express delivery?
            </label>
        </fieldset>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php
            echo $totalSum; ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>