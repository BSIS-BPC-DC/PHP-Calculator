<!DOCTYPE html>
<html>
<head>
	<title>Divino Division</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
<h1>Division</h1>
<form action="DivinoDivision.php" method="post">
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
				<td>The quotient of two number is: </td>
					<td><input type="text" id="DivinoQuotient" value="<?php include_once('DivinoConnection.php');
						if(isset($_POST['compute'])){
						$Divino_FirstNumber = $_POST['Divino_FirstNumber'];
						$Divino_SecondNumber = $_POST['Divino_SecondNumber'];
						$DivinoQuotient = $Divino_FirstNumber / $Divino_SecondNumber; echo $DivinoQuotient;
						$compute = mysqli_query($divino_Connection, "INSERT INTO divinoquotient(DivinoFirstNumber, DivinoSecondNumber, DivinoQuotient) VALUES('$Divino_FirstNumber', '$Divino_SecondNumber','$DivinoQuotient')");}?>"></td>
			
			</tr>
		</table>
	</h2>
	
</form>
	
</body>
</html>