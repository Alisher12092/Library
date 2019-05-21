 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Search</title>
 </head>
 <body>
 	<form action="insert_site.php" method="post" enctype="multipart/form-data">
 		<table width="500" border="2" cellspacing="2" align="center" bgcolor="orange">
 			
			<tr>
				<td colspan="5" align="center"><h2>Inserting new website:</</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Site Title:</b></td>
				<td><input type="text" name="site_title"></td>
			</tr>
			<tr>
				<td align="right"><b>Site Title_url:</b></td>
				<td><textarea name="" id="" cols="30" rows="8" name ="site_url"></textarea></td>
			</tr>
			<tr>
				<td align="right"><b>Site Img:</b></td>
				<td><input type="file" name="site_img"></td>
			</tr>
			<tr>
				<td align="center" colspan="5"><input type="submit" name="submit" value="add site NOW"></td>
			</tr>
 		</table>
 	</form>
 </body>
 </html>
 <?php 
 	include '../dbh.php';

 	if (isset($_POST['submit'])) {
 		$site_title = $_POST['site_title'];
 		$site_url = $_POST['site_url'];
 		$site_img = $_FILES['site_img']['name'];
 		$site_img_tmp = $_FILES['site_img']['tmp_name'];


 		if($site_title == '' OR $site_url == ''){
 			echo "
 			<script>
 			alert('please fill all the fields')
 			</script>";
 			exit();
 		}else{
 		global $conn;
 		$insert_query = "INSERT INTO book(title,title_url,site_img) values ('$site_title','$site_url','$site_img')";
 		move_uploaded_file($site_img_tmp,"images/($site_img)");
  		if($conn ->query($insert_query) === TRUE){
 			echo "<script>
 					alert('DATA inserted into table');
 				</script>";
 			}
		}
 	}
  ?>
