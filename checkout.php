<?php 
    //--Gursharan Kaur 8622669 Dated-28.02.2020-->
    require('mysqli_connect.php');
	$error = array();

    global $pizza_name,$amount;
       
    //getting bookid from store page
	if(isset($_GET['bid'])) {
       
        
		$bid = '';
        $pizza_name = '';
        $amount = '';
        $bookImage = '';		
		$bid = $_GET['bid'];
	
        $q = "SELECT * FROM product WHERE pizza_id = $bid";
        
        $r = mysqli_query($dbc, $q);
        
        echo mysqli_error($dbc);
		$db_form_query_results = mysqli_fetch_array($r);

		$pizza_name = $db_form_query_results['pizza_name'];
        $amount = $db_form_query_results['price'];
		$bookImage = $db_form_query_results['image']; 
        
	

echo mysqli_error($dbc);
$pizz=$pizza_name;

// checking form submission and santizing the strings
    if(isset($_POST['submit']))
    {
        echo $pizz;
    	$pizza_name=$_REQUEST['pizza_name'];
        echo $pizza_name;
        
        $firstname = $_POST['firstname'];
    	$lastname = $_POST['lastname'];
    	$address=$_POST['address'];
    	$payment = $_POST['payment'];          
        
        /*if(isset($pizza_name)) {
 			array_push($error, "Go back to store page to make selection again and then fill the following things in the form.<br><br>");
    	} else {
        	$pizza_name = filter_var($pizza_name, FILTER_SANITIZE_STRING);
   		}
        
          if(isset($amount)) {
 			array_push($error, "Go back to store page to make selection again and then fill the following things in the form.<br><br>");
    	} else {
        	$amount = filter_var($amount, FILTER_SANITIZE_STRING);
   		}*/
        
        if(empty($firstname) || strlen($firstname) == 0) {
 			array_push($error, "Go back to store page to make selection again and then fill the following things in the form.Please enter your firstname<br><br>");
    	} else {
        	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($lastname) || strlen($lastname) == 0) {
 			array_push($error, "Go back to store page to make selection again and then fill the following things in the form.Please enter your lastname<br><br>");
    	} else {
        	$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
   		}
        if(empty($address) || strlen($address) == 0) {
 			array_push($error, "Go back to store page to make selection again and then fill the following things in the form.Please enter your lastname<br><br>");
    	} else {
        	$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
   		}
		
		if(empty($payment) || strlen($payment) == 0) {
			array_push($error, "Please choose a payment method <br><br>");
		} else {
			$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		}
        $id = $_POST['id'];
        echo $id;
       
	 	
        //reducing quanity by 1
        if(empty($error))
	 	{
	 		echo $pizza_name;
            $q = "INSERT INTO users VALUES ('','$pizza_name','$amount','$firstname','$lastname','$address','$payment')";
	 		$insert_query = mysqli_query($dbc,$q);
            echo mysqli_error($dbc);

	 		$query = mysqli_query($dbc, "SELECT * FROM product WHERE id = $id");
             $details = mysqli_fetch_array($query);
             
	 		$quantity = $details['quantity'];
             echo $quantity;
            $newQuantity = $quantity - 1;
             

	 		$update = mysqli_query($dbc,"UPDATE product SET Quantity = '$newQuantity' WHERE ID='$id'");

	 		header("Location: success.php");
	 	}
        else{
	 		foreach ($error as $key => $value) {
	 			echo $value;
	 		}
	 		
	 	}
	}
    }

 ?>

<!DOCTYPE html>
<html>

<head>
<title>Check Out</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>

</style>
</head>

<body>
<!--navbar---->
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
    <div class=" text-center"><br><br>
        <div class='img_disp' style=" height: 100%; width: 100%; ">
            <img src="<?php echo $bookImage; ?>" style="width:250px;height:400px; ">
        </div>

        <div class='confirmation col-sm-12'>
        <label class="control-label col-sm-2">Pizza Name:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="pizza_name" value="<?php if(isset($pizza_name)) echo $pizza_name; ?>">
        </div>
        <br><br><br>
        <div>
            <label class="control-label col-sm-2">Price:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="price" value="<?php if(isset($amount)) echo $amount; ?>">
            </div>
        </div>
    </div>
    <div>
    <br>
    <div class='confirmation col-sm-12'>
        <br>

        <div class='form'>
            <form class="form-horizontal" action='checkout.php' method='post'>



                <div class="form-group">
                    <label class="control-label col-sm-2">First Name:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']?>" name="firstname">
                    </div>
          </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Last Name:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="" name="lastname">
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="control-label col-sm-2">Address:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="" name="address">
                    </div>
                </div>
             <div class="form-group">
                    <label class="control-label col-sm-2">Payment:</label>
                    <div class="col-sm-2">
                        <select name="payment" style="color: black">
                            <option value="Credit card">Credit Card</option>
                            <option value="Debit Card">Debit Card</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo $bid; ?>">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-primary" style='padding:2px;
				width: 150px;height:50px;' name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   
</body>
<footer style="background-color:black;color:white;text-align:center;max-height:200px;position:absolute;top:825px;width:100%;"><p>Copyright@2020 All Rights Are Reserved.</p></footer>
</html>
