<!DOCTYPE html>
<html>
<style >
	body{
		background:#10044A;
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
.container{
	width: 80%;
	margin: auto;
}
.back-btn {
    background:#DA255B;
    font-size: 15px;
    padding:10px 20px;
    border:1px solid #10044A;
    border-radius: 5px;  
	color: #fff;
}
.back-btn a{
  text-decoration: none;
  color: #fff
}
.sub-btn {
    background:#DA255B;
    font-size: 18px;
    padding:12px 35px;
    border:1px solid #10044A;
    border-radius: 5px;  
	color: #fff;
	margin-top: 20px;
}
.table1{
	width: 100%;
	margin-top: 0px;
}
.form input{
	padding: 12px 20px;
	margin:5px 0;
}


</style>
<head>
	<title>RANKS</title>
</head>
<body>
<div class="container">
<button class= 'back-btn'><a href="admin1st.html" style="color:">Back</a></button>

<div ><table width="100%"><tr><th><p style="align-content: center;"><h1 style="color:">TEAM RANKING</table>
<table class = 'table1'>
   <tr>
	   <th>Rank</th>
	   <th>Name</th>
	   <th>Rating</th>
   </tr>
   <?php
   $con=mysqli_connect("localhost","root","","cricket");
   



   $query="select * from team order by rating desc";
   $result=mysqli_query($con,$query);
   [$i]=floor(1);
   if(mysqli_num_rows($result)>0)
   {
	   while ($row=mysqli_fetch_assoc($result)) {

		$i=$i+1;
	   $nm = $row["name"];
	   $q="update team set rank='$i' where name='$nm'";

	   mysqli_query($con,$q);
	   echo "<tr><th>"
	   .floor($i)."</th><th>".
	   $row["name"]."</th><th>".
	   $row["rating"]."</th></tr>";
	   }
   }?>
</table></th></tr></table></div>


<table><tr><th>
<p  style="width: 100%;padding-right: 100px;"><div style="align-content: center;background-color: ">
<form action="update.php" method="POST"  class = 'form'>ENTER TEAM-RATING   <input type="number" name="rating" placeholder="3"> </br>

ENTER TEAMNAME    <input type="text" name="name" placeholder="AUS"><br>
<button class= 'sub-btn'>UPDATE</button></form>
</div></p></th></tr></table>





<div ><table width="100%"><tr><th><p style="align-content: center;"><h1 style="color:">BATSMAN RANKING</table>
<table class = 'table1'>
   <tr>
	   <th>Name</th>
	   <th>Rank</th>
	   <th>Team Name</th>
	   <th>Runs</th>
   </tr>
   <?php
   $con=mysqli_connect("localhost","root","","cricket");
   $query="select * from player  where type='batsman' order by runs desc";
   $result=mysqli_query($con,$query);[$i]=floor(1);
   if(mysqli_num_rows($result)>0)
   {
	   while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
		   $nm = $row["cap_no"];
	   $q="update player set rank='$i' where cap_no='$nm'";
	   mysqli_query($con,$q);
	   echo "<tr><th>".$row["playername"]."</th><th>".
	   floor($i)."</th><th>".
	   $row["name"]."</th><th>".
	   $row["runs"]."</th></tr>";
	   }
   }?></table></th><th>




<div ><table width="100%"><tr><th><p style="align-content: center;"><h1 style="color:">BOWLER RANKING</table>
<table class = 'table1'>
   <tr>
	   <th>Name</th>
	   <th>Rank</th>
	   <th>Team Name</th>
	   <th>Wickets</th>
   </tr>
   <?php
   $con=mysqli_connect("localhost","root","","cricket");
   $query="select * from player  where type='bowler' order by wickets desc";
   $result=mysqli_query($con,$query);[$i]=floor(1);
   if(mysqli_num_rows($result)>0)
   {
	   while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
		   $nm = $row["cap_no"];
	   $q="update player set rank='$i' where cap_no='$nm'";
	   mysqli_query($con,$q);
	   
	   echo "<tr><th>".$row["playername"]."</th><th>".
	   floor($i)."</th><th>".
	   $row["name"]."</th><th>".
	   $row["wickets"]."</th></tr>";
	   }
   }?></table></th><th>
   


   <div ><table width="100%"><tr><th><p style="align-content: center;"><h1 style="color:">ALL ROUNDER RANKING</table>
<table class = 'table1'>
   <tr>
	   <th>Name</th>
	   <th>Rank</th>
	   <th>Team Name</th>
	   <th>Runs</th>
	   <th>Wickets</th>
   </tr>
   <?php
   $con=mysqli_connect("localhost","root","","cricket");

   $query="select * from player  where type='allrounder' order by (runs+wickets*2) desc";
   $result=mysqli_query($con,$query);[$i]=floor(1);
   if(mysqli_num_rows($result)>0)
   {
	   while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
		   $nm = $row["cap_no"];
	   $q="update player set rank='$i' where cap_no='$nm'";
	   mysqli_query($con,$q);
	   
	   echo "<tr><th>".$row["playername"]."</th><th>".	
	   floor($i)."</th><th>".
	   $row["name"]."</th><th>".
	   $row["runs"]."</th><th>".
	   $row["wickets"]."</th></tr>";
	   }
   }

   mysqli_close($con);
   ?>
</table></th></tr></table></div></th></tr></table>


<table style="vertical-align: text-top;"><tr><th>
<p style="width: 100%;padding-right: 100px;"><div style="align-content: center;background-color: ">
<form action="pupdate.php" method="POST" class = 'form'>
ENTER PLAYERNAME    <input type="text" name="name" placeholder="sujon"><br>
ENTER RUNS        <input type="number" name="runs" placeholder="211"><br>
ENTER WICKETS        <input type="number" name="wickets" placeholder="23"><br>
ENTER NUMBER_OF_MATCHES        <input type="number" name="no_of_matches" placeholder="176"><br>

<button class= 'sub-btn'>UPDATE</button></form>
</div></p></th></tr></table></th></tr></table>
</div>
	
</body>
</html>