<!DOCTYPE html>
<html>
<head>
	<title>Divino Multiplication</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
<h1>Multiplication</h1>
<form action="DivinoMultiplication.php" method="post">
	<h2>
		<table>
			<tr>
				<td>
					<label for="DivinoFirstNumber">First Number</label>
				</td>
				<td><input type="number" id="Divino_FirstNumber" name="Divino_FirstNumber" required></td>
			</tr>				

			<tr>
				<td><label for="DivinoSecondNumber">Second Number</label></td>
				<td><input type="number" id="Divino_SecondNumber" name="Divino_SecondNumber" required></td>				
			</tr>


			<tr>
				<td>
					<button type="submit" name="compute" class="DivinoCompute">Compute</button>
				</td>
			</tr>
			<tr>
				<td>The product of two number is: </td>
					<td><input type="text" id="DivinoProduct" value="<?php include_once('DivinoConnection.php');
						if(isset($_POST['compute'])){
						$Divino_FirstNumber = $_POST['Divino_FirstNumber'];
						$Divino_SecondNumber = $_POST['Divino_SecondNumber'];
						$DivinoProduct = $Divino_FirstNumber * $Divino_SecondNumber; echo $DivinoProduct;
						$compute = mysqli_query($divino_Connection, "INSERT INTO divinomultiplication(DivinoFirstNumber, DivinoSecondNumber, DivinoProduct) VALUES('$Divino_FirstNumber', '$Divino_SecondNumber','$DivinoProduct')");}?>"></td>
			
			</tr>
		</table>
	</h2>
	
</form>
	
</body>
</html>