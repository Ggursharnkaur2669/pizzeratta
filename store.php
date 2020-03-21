<?php
//--Gursharan Kaur 8622669 Dated-28.02.2020-->
session_start();


?>

<!DOCTYPE html>
<html>

<head>
<title>Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
footer{
  background-color:black;
  padding:10px;
  text-align:center;
  color:white;
  /*position:relative;
  top:600px;*/
  }
.products{
  display:block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
  height:auto;
}


</style>
</head>

<body>
<!--Navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">PizzeraTTa</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="store.php">Menu</a></li>
      <li><a href="checkout.php">Check Out</a></li>
      
    </ul>
  </div>
</nav>
<!--Product Display-->
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-6 products-grid-left">
                    <div class="products-grid-lft">
                        <em>
                            <h1 style="text-align:center; color:brown;font-style:italic;font-family: Times;padding-left:80%;font-size: 6em;">Menu</h1>
                        </em><br><br>
                        <?php
                        
                        require('mysqli_connect.php');
						
						$q =  "SELECT * FROM product";
                        $r  = mysqli_query($dbc, $q);
                        
						$_SESSION['id'] = 'pizza_id';
						$_SESSION['bTitle'] = 'pizza_name';
						
						$_SESSION['bDesc'] = 'pizza_description';
						$_SESSION['bQuantity'] = 'quantity';
						$_SESSION['bPrice']='price';
						$_SESSION['bImage'] = 'image';

						

						$form = "";
						
						if(mysqli_num_rows($r) > 0) {
							

						while($row = mysqli_fetch_array($r)) {
								$id = $row['pizza_id'];
								$bTitle = $row['pizza_name'];
								
								$bDesc = $row['pizza_description'];
								$bQuantity = $row['quantity'];
								$bPrice = $row['price'];
								$bImage = $row['image'];

								
				        $form .= "<div class='products' style='width:200%; margin:auto;border:2px solid;'>
								<div class='pname' style='text-align:center;'>
				                <em><h4 style='font-weight:bold;color:brown;font-size:2em;'><strong>$bTitle</strong></h4></em><br>
								</div>
								<div class='ppic' style='text-align:center;'>
								<img src=$bImage class='Img' style='height:80%; width:50%'>
								</div><br>
								<div class='pdesc' style='text-align:center;'>
				                <p style='font-weight:bold;color:brown;font-size:1.5em;'><b>Description:</b><br><p style='text-align:justify;color:brown;font-size:1.2em;padding-left:40px;padding-right:40px;'><em>$bDesc</em></p></p>
								</div><br>
                                                
                                <div class='pprice' style='text-align:center;'>
				                <p style='font-weight:bold;color:brown;font-size:1.5em;'>Price: $bPrice</p><br>
								</div>
												
                                <div class='pquantity' style='text-align:center;'>
				                <p style='font-weight:bold;color:brown;font-size:1.5em;'>Stock: $bQuantity</p>
								</div><br>
												
								

				<div class='buyform' style='text-align:center;'>
				<a href='checkout.php?bid=$id'>
				<button type='submit' name='submit' value='Buy' class='btn btn-primary' style='padding: 20px;
				width: 200px;'>Buy Now</button>
				</a>
				</div><br>
				</div>
				<hr>";
       }
				echo $form;
       }
						?>
                        <div class='posts_area'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer><p>Copyright@2020 All Rights Are Reserved.</p></footer>
</html>