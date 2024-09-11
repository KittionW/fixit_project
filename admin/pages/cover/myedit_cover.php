<?php 
session_start();

	// include("../dir_log/connection.php");
  include("../dir_log/connection.php");
	// include("../dir_log/functions.php");
	// include("../dir_log/time-5123.php");

	// $user_data = check_login($con);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>New Home Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../index.php"><img src="../../images/logo.jpg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/logo-mini.jpg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
            
            
        
            
            
            
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/myface.jpg" alt="profile"/>
            </a>
          </li>
   
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->

        
        
        
        
        
        
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

            
            
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
               <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Pages Upload</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="myupload_cover.php">Upload Product</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="../../pages/construction/myupload_construction.php">Construction</a></li>
                <li class="nav-item"><a class="nav-link" href="../interior/myupload_interior.php">Interior</a></li>
                <li class="nav-item"><a class="nav-link" href="../boothevent/myupload_booth_event.php">Booth & Event</a></li> -->
                
              </ul>
            </div>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Page Edit</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="myedit_cover.php">Edit Product</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="../construction/myedit_construction.php">Constrution</a></li>
                <li class="nav-item"> <a class="nav-link" href="../interior/myedit_interior.php">Interior</a></li>
                <li class="nav-item"> <a class="nav-link" href="../boothevent/myedit_booth_event.php">Booth & Event</a></li> -->
                
              </ul>
            </div>
          </li>
            
            


              
            
            
            
                        
  
            
            
      </nav>



      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
              


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Product Detail
                  </h4>
              
                  <div class="table-responsive">

                  <?php
	// $objConnect = mysqli_connect("localhost","myhomeDBB12","KJL6A}a,@SYNSWhome") or die("Error Connect to Database");
	$objDB = mysqli_select_db($con2, "fixit");
	$sql1 = "SELECT * FROM product";
	$query = mysqli_query($con2,$sql1) or die ("Error Query [".$sql1."]");
?>




                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Product Code</th>
                          <th>Price</th>
                          <th>Title</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>


                      <tbody>
                     
                      <?php
	while($run7 = mysqli_fetch_array($query)){
?>
                        <tr>

                          
                          <td><img style="width: 250px; height: auto; border-radius: 0;" src="../../../image/image_cover/<?=$run7["imagecover"];?>"></td>
                          
                          <td><?=$run7["product_code"];?></td>
                      
                          <td><?= number_format($run7["price"]);?></td>
                          
                          <td><?=$run7["title"];?></td>
                          <td><a href="editting_page.php?id=<?=$run7["product_code"];?>" class="badge badge-warning" style="font-weight: 500; padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px;">Edit</a></td>
                          <td><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delete_cover.php?id=<?php echo $run7["product_code"];?>&img=<?php echo $run7["imagecover"];?>&imgdet=<?php echo $run7["image_detail"];?>';}" class="badge badge-danger" style="font-weight: 500; padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px;">Delete</a></td>
                        
                          <!-- <td><a href="#" class="badge badge-danger delete-btn" data-id="<?= $run7["product_code"]; ?>" data-img="<?= $run7["imagecover"]; ?>" data-imgdet="<?= $run7["image_detail"]; ?>" style="font-weight: 500; padding: 10px 15px;">Delete</a></td> -->

                        </tr>
                        <?php
	}
?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

              
              
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
    
    
    
    
    <script>
$('#upload').bind("click",function() 
    { 
        var imgVal = $('#fileq').val(); 
        if(imgVal=='') 
        { 
            alert("It is empty, Please choose your file"); 
            return false;
        } 
       else
         {
           //alert('file fill in');
         }
    }); 


// <input type="file" name="image" id="uploadImage" size="30" /> 
// <input type="submit" name="upload" id="upload"  class="send_upload" value="upload" /> 



function fileValidationq(){
var fileInput = document.getElementById('fileq');
var filePath = fileInput.value;
var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
//var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;




if(!allowedExtensions.exec(filePath)){
alert('Please upload file having format .jpeg/.jpg/.png/ only.');
fileInput.value = '';
return false;
}else{
//Image preview
if (fileInput.files && fileInput.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
    };
    reader.readAsDataURL(fileInput.files[0]);
}
}
}

</script>
    
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
