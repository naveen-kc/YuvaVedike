<?php
include "con.php";
if(isset($_POST['submit']))
{
    // echo "sjkdbvjksdu";exit;
    $from=$_POST['from'];
    $to=$_POST['to'];
    
   $payments=array(); 
 


$sql=mysqli_query($con,"select * from payments where date between '$from' and '$to' and status='Success' order by date ");

$payments=mysqli_fetch_all($sql, MYSQLI_ASSOC);

if($payments){
    
    
$html='<h3 class="text-center">Successful transactions from ' .$from. ' to '.$to.'</h3>';



$html .='<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Order Id</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>';

$i =1;
foreach($payments as $row){
    $html .='<tr scope="row">
            <td>'. $i .'</td>
             <td>'.$row['name'].'</td>
              <td>'.$row['amount'].'</td>
              <td>'.$row['order_id'].'</td>
                <td>'.$row['date'].'</td>
                
            </tr>';
            $i++;
}

$html .= '</tbody>
</table>';
    
}   
else{
    $html='<h2 class="text-center">No Records found </h2>';
}
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kumbarara Yuva Vedike</title>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

   <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
            padding-top: 0;
        }
        section {
            padding-top: 0;
        }
    </style>
  </head>
  <body
    id="top"
    data-spy="scroll"
    data-target=".navbar-collapse"
    data-offset="50"
  >
    <!-- PRE LOADER -->
    <section class="preloader">
      <div class="spinner">
        <span class="spinner-rotate"></span>
      </div>
    </section>

    

    <section>
      <div class="container">
        <div class="text-center">
          <h1>Admin Home</h1>

          <br />

          <p class="lead">Only Admin can Work here</p>
        </div>
      </div>
    </section>
    
    
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Pages</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Transactions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Programs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Banners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Achievers</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container"  style="padding: 20px;">


  <form  action='adminHome.php' method='POST'>
<div class="row">
  
  <div class="col">
    <input type="date" class="form-control" placeholder="From" aria-label="From Date" name='from'>
  </div>
  <div class="col">
    <input type="date" class="form-control" placeholder="To" aria-label="To Date" name='to'>
  </div>

<div class="col">
    <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
  </div>
  
  <div class="col">
<?php
    if(isset($payments) && count($payments)){
        
    
        ?>
<button class="btn btn-primary" onclick="printDiv()">Print </button>

<?php }  ?>
</div>
    
</div>
</form>
 
</div>

<div id="printable">
    
    <?php if(isset($payments)){ echo $html;} ?>
</div>





    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function printDiv() {
     var printContents = document.getElementById('printable').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
  </body>
</html>
