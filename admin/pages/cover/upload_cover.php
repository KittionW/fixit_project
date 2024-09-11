<?php 
session_start();
	include("../dir_log/connection.php");

	// $output_dir = "upload/";/* Path for file upload */
	// $RandomNum   = time();
	// $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	// $ImageType      = $_FILES['image']['type'][0];
 
	// $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	// $ImageExt       = str_replace('.','',$ImageExt);
	// //$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	// $NewImageName = "Image".'-'.$RandomNum.'.'.$ImageExt;
    // $ret[$NewImageName]= $output_dir.$NewImageName;
	
	// /* Try to create the directory if it does not exist */
	// if (!file_exists($output_dir))
	// {
	// 	@mkdir($output_dir, 0777);
	// }               
	// move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );

	
	$impr_name = $_POST['pr_name'];


	// Image Cover Method
	$PR_CC_filename = $_FILES['imageCC']['name'][0];
	$PR_CC_NewImgName = "Image_CC-". $impr_name  . "_" . "0" . "-" . $PR_CC_filename ;
	move_uploaded_file($_FILES['imageCC']['tmp_name'][0],'../../../image/image_cover/'. $PR_CC_NewImgName);
	// Image Cover Method

		$pr_name = $_POST['pr_name'];
		$pr_price = $_POST['pr_price'];
		$pr_desc = $_POST['pr_desc'];

	    //  $sql = "INSERT INTO `cover`(`img`,`Type`) VALUES ('$NewImageName', '$type')";
	     $sql = "INSERT INTO `product` (`imagecover`, `title`, `price`, `description`) 
		 VALUES ('$PR_CC_NewImgName' , '$pr_name', '$pr_price', '$pr_desc')";
		
		if (mysqli_query($con2, $sql)) {
			echo '<script type="text/JavaScript"> 
			alert("Successfully upload the file");
			window.location.href="myupload_cover.php";</script>';
		}
		else {
		echo "Error: " . $sql . "" . mysqli_error($con2);
	 }

?>