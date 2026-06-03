<!DOCTYPE html>
<html>
<style >
	table{
		border: 1px solid black;
	}
	tr{
		border: 1px solid black;
	}
	th{
		border: 1px solid black;
	}
	body{
		background: #10044A;
		color: #fff;
	}
	table {
    margin: 8px;
	margin: auto;
	border-collapse:collapse;
	margin-top: 100px;
}

th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    background:#10044A;
    color: #FFF;
    padding: 12px 20px;
    border: 1px solid #fff;
}

td {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    border: 1px solid #DDD;
	padding: 12px 20px;
	letter-spacing:4px
	
}

.back-btn {
    background:#DA255B;
    font-size: 15px;
    padding:10px 20px;
    border:1px solid #10044A;
    border-radius: 5px;  
	color: #fff;
}
.sub-btn {
    background:#DA255B;
    font-size: 18px;
    padding:12px 35px;
    border:1px solid #10044A;
    border-radius: 5px;  
	color: #fff;
}
.back-btn a{
  text-decoration: none;
  color: #fff
}
.p{
	font-size: 25px;
	text-align:center;
	margin-right: 10px;
}
.search-bar{
	padding: 12px 25px;
}
.container{
	width: 80%;
	margin: auto;
}
</style>
<head>
	<title>RANKS</title>
</head>
<body>
	<div class="container">
	<button class='back-btn'><a href="admin1st.html" >Back</a></button>
	 <div style="margin-top:225px; style : center" >
	<table >
		<tr>
			<th>Stadium Name</th>
			<th>Capacity</th>
			<th>DOI</th>
			<th>Home ground</th>
			<th>Team's Stadium</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="call stadium()";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr><th>".$row["stadium_name"]."</th>"."<th>".
			$row["capacity"]."</th><th>".
			$row["DOI"]."</th><th>".
			$row["team_name"]."</th><th>".
			$row["team"]."</th></tr>";
			}
		}
		mysqli_close($con);
		?>
	</table>
	</div>
</body>
</html>