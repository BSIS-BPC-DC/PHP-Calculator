<!DOCTYPE html>
<html>
<head>
	<title>Divino Subtraction</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
<h1>Subtraction</h1>
<form action="DivinoSubtraction.php" method="post">
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
				<td>The difference of two number is: </td>
					<td><input type="text" id="DivinoDiff" value="<?php include_once('DivinoConnection.php');
						if(isset($_POST['compute'])){
						$Divino_FirstNumber = $_POST['Divino_FirstNumber'];
						$Divino_SecondNumber = $_POST['Divino_SecondNumber'];
						$DivinoDiff = $Divino_FirstNumber - $Divino_SecondNumber; echo $DivinoDiff;
						$compute = mysqli_query($divino_Connection, "INSERT INTO divinosubtraction(DivinoFirstNumber, DivinoSecondNumber, DivinoDiff) VALUES('$Divino_FirstNumber', '$Divino_SecondNumber','$DivinoDiff')");}?>"></td>
			
			</tr>
		</table>
	</h2>
	
</form>
	
</body>
</html>