<?php

    session_start();

    $con = mysqli_connect("localhost", "root", "", "cricket") or die(mysqli_error($con));

    $capno=$_POST['cap_no'];
    $jno=$_POST['j_no'];
    $playername=$_POST['playername'];
    $name=$_POST['name'];
    
    $age=$_POST['age'];
    $dob=$_POST['dob'];
    $runs=$_POST['runs'];
    $wickets=$_POST['wickets'];
    $type=$_POST['type'];
    $num=$_POST['no_of_matches'];
    $rank=$_POST['rank'];
    $batting=$_POST['batting_best'];
    $bowling=$_POST['bowling_best'];
    $image=$_POST['image'];

    $query="insert into player(cap_no,j_no,playername,name,age,dob,runs,wickets,type,no_of_matches,rank,batting_best,bowling_best,image) values('$capno','$jno','$playername','$name','$age','$dob','$runs','$wickets','$type','$num','$rank','$batting','$bowling','$image')";
    if(mysqli_query($con,$query))
    {
        echo "<script type='text/javascript'>alert('NEW RECORD CREATED SUCCESSFULLY!!');</script>";
      header("refresh: 0.01; url=addplayer.html");
    }
    else
    {
    	echo "<script type='text/javascript'>alert('ERROR');</script>";
        header("refresh: 0.01; url=addplayer.html");
    	mysqli_error($con);
    }
    ?>

    