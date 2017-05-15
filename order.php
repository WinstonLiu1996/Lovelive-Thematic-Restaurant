<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dish Ordering</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link href="css/order.css" rel="stylesheet">
</head>

<body>

<!-- Header with image -->



<header class="bgimg w3-display-container w3-grayscale-min">
<div class="w3-display-middle w3-center">
<span class="w3-text-white w3-hide-small w3-tag" style="font-size:100px; margin-left: 700px">Welcome</span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>Welcome</b></span>
    <p><a href="#menu" class="w3-text-white" style="font-size: 60px; margin-left: 700px">See The Menu</a ></p >
</div>
<div class="w3-display-bottommiddle">
    <span class="w3-text-white" style="font-size:50px">Your  <span>Customer  <span class="w3-hide-small">No: </span> <?php echo $_COOKIE['CID']; ?></span>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-light-grey w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:10px">THE MENU</h1>
   

    <div id = "section">
    <?php
    //This Part Is OK: SELECT QUERY PDO
    require_once "pdoconnect.php";
    try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM DishList");
    $stmt->execute();
    dbcommit($dbh);
} catch(Exception $e) {    
    dberror($dbh,$e);
  }
    $result = $stmt->fetchAll();
?>   

<table align = "center" cell spacing = "5" cellpadding = "8">
    <tr>
        <th style="font-size:35px;">Dish Name</th>
        <th style="font-size:35px;">Price</th>
        <th style="font-size:35px;">Add</th>
        <th style="font-size:35px;">Delete</th>
    </tr>
<form>
    <?php
    //This Part is OK: PRINT (DishName, DishPrice) Onto Web
    $size = sizeof($result);
    for ($x = 0; $x < $size; $x++) {
        $a = $result[$x][0];
        $b =  $result[$x][1]; 
        $c = $result[$x];
?>
    <tr>
        <td width = "25%"; style="font-size:25px;"> <label>
           <?php echo $a; ?></label>
        </td>
        <td width = "20%"; style="font-size:25px;"> <label>
           <?php echo $b; ?></label>
        </td>  
        <td width = "15%"; style="font-size:25px;"> <label>
            <a href="order.addhandle.php?dname=<?php echo $a;?>">Oui</a></label> 
        </td>
        <td width = "15%"; style="font-size:25px;"><label>
            <a href="order.deletehandle.php?dname=<?php echo $a;?>">Non</a></label>
        </td>      
    </tr>
        <?php
        //Must Have This Part!
        }
    ?>
</form>
</table>
</div>



<div id = "section">
<h1 class="w3-center w3-jumbo" style="margin-bottom:10px">Ordered List</h1>
    <?php
    $cid=$_COOKIE["CID"];
    //This Part Is OK: SELECT QUERY PDO
    require_once "pdoconnect.php";
    try{
    $dbh1=dbconnect();
    $stmt1 = $dbh1->prepare("SELECT DishList.DishName, Price FROM Order_From_Cook_Deliver_Dish, DishList WHERE DishList.DishName = Order_From_Cook_Deliver_Dish.DishName AND CustomerID='$cid'");
    $stmt1->execute();
    dbcommit($dbh1);
} catch(Exception $e) {    
    dberror($dbh1,$e);
  }
    $result1 = $stmt1->fetchAll();
?>   

<table align = "center" cell spacing = "5" cellpadding = "8">
    <tr>
        <th width = "30%"; style="font-size:35px;"> Dish Name</th>
        <th width = "30%"; style="font-size:35px;">Price</th>
    </tr>
<form>
    <?php
    //This Part is OK: PRINT (DishName, DishPrice) Onto Web
    $size1 = sizeof($result1);
    for ($x = 0; $x < $size1; $x++) {
        $a1 = $result1[$x][0];
        $b1 =  $result1[$x][1]; 
?>
    <tr>
        <td width = "30%"; style="font-size:25px;"> <label>
           <?php echo $a1; ?></label>
        </td>
        <td width = "30%"; style="font-size:25px;"> <label>
           <?php echo $b1; ?></label>
        </td>    
    </tr>
        <?php
        //Must Have This Part!
        }
    ?>
</form>
</table>
</div>



<form action="order.checkhandle.php" method="post">
<div id = "section">
<button type="submit" >Confirm Order</button>
</div>
</form>


</div>

</body>
</html>