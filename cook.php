<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose A Dish to Cook</title>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <style>
        table, th, td {
            border: 1px solid white;
            text-align: center;
        }
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
        body, html {
            height: 100%;
            color: #777;
            line-height: 1.8;
        }

        .bgimg-1 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("images/Dish/Cook.jpg");
            min-height: 100%;
        }


        .w3-wide {letter-spacing: 10px;}
        .w3-hover-opacity {cursor: pointer;}

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1024px) {
            .bgimg-1 {
                background-attachment: scroll;
            }
        }

        #section {
            background-color:#eeeeee;
            width: 100%;
            text-align:center;
            padding:10px;        
        }

    </style>
</head>

<body>

    <div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
      <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity">Hello <span class="w3-hide-small">Chef: </span> <?php echo $_COOKIE['CHID']; ?> <span><?php echo $_COOKIE['CN']; ?></span></span>
    </div>
</div>



<div id = "section">
    <?php
    require_once "pdoconnect.php";
    /*function DishList($DishName, $Price) {
    return "{$DishName}: {$Price}";
}*/

try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT CustomerID, DishName FROM Order_From_Cook_Deliver_Dish WHERE Status = 'Queued'");
    $stmt->execute();
    dbcommit($dbh);
} 
catch(Exception $e) {
  dberror($dbh,$e);
}

  /* 获取结果集中所有剩余的行 
$result = $stmt->fetchAll(PDO::FETCH_FUNC, "DishList");
//var_dump($result);
    foreach ($result as $value) {
        echo "$value <br />";
    } */

    /* 获取结果集中所有剩余的行 */
//$result = $stmt->fetchAll(PDO::FETCH_FUNC, "DishList");
    $result = $stmt->fetchAll();
//var_dump($result);
//print($result);

    ?>
    <table align = "center" cell spacing = "5" cellpadding = "8">
        <tr>
            <th style="font-size:35px;">Customer ID</th>
            <th style="font-size:35px;">Dish Name</th>
            <th width=10%></th>
        </tr>
        <form>
            <?php
            $size = sizeof($result);

   // echo '<table align = "center"
   // cell spacing = "5" cellpadding = "8">
   // '


            for ($x = 0; $x < $size; $x++) {
                $a = $result[$x][0];
                $b = $result[$x][1]; 
                $c = $result[$x];
                ?>

                <tr>

                    <td width = "25%"; style="font-size:25px;"> <label><?php echo $a;?></label> </td>

                    <td width = "25%"; style="font-size:25px;"><label><?php echo $b;?> </label></td>  

                    <td width = "15%"; style="font-size:25px;"> <label>
                        <a href="cook.addhandle.php?cid=<?php echo $a;?> && dname=<?php echo $b;?>">Cook</a ></label></td>  

                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</form>

</body>
</html>