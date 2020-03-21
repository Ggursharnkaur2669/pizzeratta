
<!DOCTYPE html>
<html lang="en">
<!--Gursharan Kaur 8622669 Dated-28.02.2020-->
<head>
  <title>PizzeraTTa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

/* Container css*/
.container {
  /*position: relative;*/
  width: 100%;
  max-width: 1000px;
  max-height:100px;
}
/* Container image css*/
.container img {
  width: 100%;
  height: auto;
    margin-top:100px;
    
}
/*Container button css */
.container .btn {
  position: absolute;
  top: 520%;
  left: 80%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: 5px solid;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

/*button hover style*/ 
.container .btn:hover {
  background-color: black;
}
.container {
  position: relative;
  font-family: Arial;
}
/*text placed on image styling */
.text-block {
  position: absolute;
  bottom: 9.5px;
  right: 80px;
  left:80px;
  background-color: black;
  color: white;
  padding-left: 50px;
  padding-right: 50px;
}
footer{
  background-color:black;
  padding:10px;
  text-align:center;
  color:white;
  position:relative;
  top:600px;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PizzeraTTa</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="store.php">Menu</a></li>
      <li><a href="checkout.php">Check Out</a></li>
      
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3 style="color:Dark Blue; font-weight:Bold">PizzeraTTa</h3>
  
  </div>
  <div class ="container">
  
      <a href="store.php"> <img src="images/home.jpg" alt="home" style="width:100%"></a>
  
  <div class="text-block">
    <h4>Scrumptious Slice</h4>
      <div >
    <p>Mouth-watering pizza's are available.Dine-in,take out and home delivery is possible. We satisfy your hunger even at remote locations.Extremly delicious and hot pizza are served with customized topping option. </p></div>
  </div>
  <a href="store.php"><button class="btn btn-primary">Browse Menu</button></a>
</div>
  
  



</body>
<footer><p>Copyright@2020 All Rights Are Reserved.</p></footer>
</html>





