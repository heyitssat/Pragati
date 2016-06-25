<?php
session_start();
$temp=$_GET['s'];
   $l='';
       $pid='';
       
if(isset($_GET['qid'])){
    $l=$_GET['qid'];
}
if(isset($_GET['t'])){
    $pid=$_GET['t'];
}

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    if($temp==3){
        header('Location: qpost.php');
    }else if ($temp==2){
        
        header("Location: forum.php?x=1&qid=$l");
        
    }else if ($temp==1){

        header("Location: forum.php?x=2&qid=$l&t=$pid");
        
    }
    
}
    else{
    echo"you are not signed in <a href='signin.php?s=$temp&qid=$l&t=$pid'>Click here</a> to login";
    }



?>
