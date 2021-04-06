<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mediship Inventory Management</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.css"
    crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css">


  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Mediship <i class="fas fa-box-open"></i></a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">IT Support <i class="far fa-question-circle"></i></a>
          </li>
          
        </ul>
        <form class="form-inline my-2 my-lg-0" action="logout.php">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button>
        </form>
      </div>
    </nav>

    <section>
      <div class="jumbotron text-center">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1>Mediship Company Intranet</h1>
              
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <div class="col-lg-6"></div>
    <div class="container">
       <div class="row text-center">
		  <div class="col-lg-6 offset-lg-3"><h4>Facility Inventory Records</h4>
		  </div>
       </div>
       <br>
       <hr>
       <br>

       <div class="container">
        <h3 class="accordion">Query Product in Inventory</h3>
        <div class="panel">
          <p>Search for product within Mediship Inventory</p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputQueryProduct">Product Name or Product ID</label>
              <input type="text" class="form-control" id="inputQueryProduct" placeholder="Product Name or ID">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
 
        </div>
        <h3 class="accordion">Add New Product from Vendor</h3>
        <div class="panel">
          <p>Add a new product record with all required fields in Inventory</p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputProductName">Product Name</label>
              <input type="text" class="form-control" id="inputProductName" placeholder="Product Name">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCostPerProduct">Product Cost Per Unit</label>
              <input type="text" class="form-control" id="inputCostPerProduct" placeholder="Cost Per Unit">
            </div>
            <div class="form-group col-md-6">
              <label for="inputVendorID">Vendor ID</label>
              <input type="text" class="form-control" id="inputVendorID" placeholder="Vendor ID">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
          </div>
          
        </div>
        <h3 class="accordion">Delete Product from Inventory</h3>
        <div class="panel">
          <p>
          Delete a discontinued product from Inventory
          </p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputDeleteProduct">Product Name or Product ID</label>
              <input type="text" class="form-control" id="inputDeleteProduct" placeholder="Product Name or ID">
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </div>
        <h3 class="accordion">Ship Product</h3>
        <div class="panel">
          <p>
          Ship product to a Mediship facility
          </p>
            <div class="form-group col-md-12">
              <label for="inputQueryProduct">Product Name or Product ID</label>
              <input type="text" class="form-control" id="inputQueryProduct" placeholder="Product Name or ID">
            </div>
            <div class="form-group col-md-12">
              <label for="inputFacilityID">Facility Location</label>
              <input type="text" class="form-control" id="inputFacilityID" placeholder="Facility Name or ID">
            </div>
            <button type="submit" class="btn btn-success">Ship to facility</button>
      </div>
       


       <hr>
       <footer class="text-center">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <p>Copyright © Mediship. All rights reserved.</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
  integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="./js/app.js"></script>
    

  </body>
</html>
