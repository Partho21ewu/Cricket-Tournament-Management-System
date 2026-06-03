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
	margin-top: 0;
	width: 100%;
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
h1{
	text-align:center;
}
</style>
<body>
	<div class="container">
	<button class='back-btn'><a href="schedule.php" style="color:">Back</a></button><div style="margin-top:10px; style : center" >

<table width="100%"><tr><th>
	<?php
	$con=mysqli_connect("localhost","root","","cricket");
		 $match_no=$_POST['match_no'];
		 $que="select team1 from schedules where match_no='$match_no'";
				
		echo "Squad for match number $match_no ";
	
		?></th></tr></table>



<table width="100%"><tr><th>
 	<table >
		
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query1="SELECT p.playername FROM schedules s,player p WHERE s.team1=p.name AND s.match_no='$match_no'";
		$result1=mysqli_query($con,$query1);

		$query="select sc.team1 from schedules sc where  sc.match_no='$match_no' limit 0,1";
	    $res=mysqli_query($con,$query);
	    if(mysqli_num_rows($res)>0){
        while ($row=mysqli_fetch_assoc($res)) {
            echo "<tr><th><b>".$row["team1"]."</b></th></tr>";
                    }
    	}


		if(mysqli_num_rows($result1)>0)
		{
			while ($row=mysqli_fetch_assoc($result1)) {
			echo "<tr><th>".$row["playername"]."</th></tr>";
			
			}
		}
		mysqli_close($con);
		?></table></th><th>


		<table>
		

 		<?php
 		$match_no=$_POST['match_no'];
 		$con=mysqli_connect("localhost","root","","cricket");
		$query1="SELECT p.playername FROM schedules s,player p WHERE s.team2=p.name AND s.match_no='$match_no'";
		$result1=mysqli_query($con,$query1);
		

		$query="select sc.team2 from schedules sc where  sc.match_no='$match_no' limit 0,1";
	    $res=mysqli_query($con,$query);
	    if(mysqli_num_rows($res)>0){
        while ($row=mysqli_fetch_assoc($res)) {
            echo "<tr><th><b>".$row["team2"]."</b></th></tr>";
                    }
    	}

		if(mysqli_num_rows($result1)>0)
		{
			while ($row=mysqli_fetch_assoc($result1)) {
			echo "<tr><th>".$row["playername"]."</th></tr>";
			
			}
		}
		mysqli_close($con);
		?></table></th></tr></table>
		<br><br>


<table width="100%"; >
</table>
<table width="100%"; >
	<div>
	<h1 class= 'h1'>Players selected are</h1>
	</div>
</table>

<table width="100%"><tr><th>
 	<table >
		<tr>
			<th>Playernames</th>
			<th>Team</th>
			<th>Position</th>
		</tr>
		<?php
		$con = mysqli_connect("localhost", "root", "", "cricket") or die(mysqli_error($con));
	    $match_no=$_POST['match_no'];
	    $query="select p.playername,p.name,s.position from selected_for s,schedules sc,player p where  s.name=sc.team1 and s.date=sc.date  and s.cap_no=p.cap_no  and s.name=p.name and sc.match_no='$match_no' order by p.name";
	    $res=mysqli_query($con,$query);
	    if(mysqli_num_rows($res)>0){

        while ($row=mysqli_fetch_assoc($res)) {

            echo "<tr><th>".$row["playername"]."</th><th>".$row["name"]."</th><th>".$row["position"]."</th></tr>";
                    }
    	}

		else
		{
		 echo "NOT ANNOUNCED!! for team1";
	     
	    
		}
			
		$query="select p.playername,p.name,s.position from selected_for s,schedules sc,player p where  s.name=sc.team2 and s.date=sc.date  and s.cap_no=p.cap_no  and s.name=p.name and sc.match_no='$match_no' order by p.name";
	    $res=mysqli_query($con,$query);
	    if(mysqli_num_rows($res)>0){

	        while ($row=mysqli_fetch_assoc($res)) {

	            echo "<tr><th>".$row["playername"]."</th><th>".$row["name"]."</th><th>".$row["position"]."</th></tr>";
	                    }
	    }
	    
		else
		{
		 echo "NOT ANNOUNCED!! for team2";
	    
	    
		}
		mysqli_close($con);
		?>

	</div>
	

</body>
</html>