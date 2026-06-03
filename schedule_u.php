<!DOCTYPE html>
<html>
<style >
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
<head><p>
	<title>SCHEDULES</title>
</head>
<body>
	<button style="background-color:" class= 'back-btn'><a href="user1st.html" style="color:">Back</a></button>
	 <div style="margin-top:115px; style : center" >
	<table >
		<tr>
			<th>Date</th>
			<th>Team1</th>
			<th>Team2</th>
			<th>Match Number</th>
			<th>VENUE</th>
		
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from schedules s,played_in p where  s.date=p.date and s.team1=p.team1 order by s.date";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr><th>".$row["date"]."</th><th>".
			$row["team1"]."</th><th>".
			$row["team2"]."</th><th>".
			$row["match_no"]."</th><th>".$row["stadium_name"]."</th></tr>";
			}
		}
		mysqli_close($con);
		?>



		 <form action="ttu.php" method="post"><table><tr>
            <p class='p' style="text-align: center;font-size: 25;">Enter Match Number to retrieve players
            <input type="number" name="match_no" style="width: 300;height: 25;"><br><br>
            <input type="submit" style="float:center;" value="Submit" class = 'sub-btn'>
            </p></tr></table>
    </form>




</body>
</html>