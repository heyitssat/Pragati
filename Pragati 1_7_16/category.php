<?php
include 'head.php';
?>
<div class="container">
  <h2>By your wish</h2>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="width:20%">Topics
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
  <?php    if(isset($_SESSION['signed_in'])){
echo'<li role="presentation"><a role="menuitem" tabindex="-1" href="stream.php">Favourites</a></li>
';
} ?>      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">All</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
    </ul>
  </div>
</div>

<?php

  $servername = "localhost";
  $username = "root";
  $database = "questions";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

$rown=0;
$sql = "SELECT * FROM `categories`";
$result = mysqli_query($conn,$sql);


            echo " <div class='container' style='background-color:none'>
                      <div class='row'>
    <div class='col-sm-4' style='background-color:lavender;'>
 <table class='table table-sm' style='border:none;width:20%;float:left' align='center'>";
echo '<form method="post" action="">';
while($row = $result->fetch_assoc()){

   echo "<tr><td>$row[cat_name]</td>";
   ?>
  <td><input type="checkbox" name="select_tag[]" class="delete_customer" value="<?php echo $row["cat_id"]; ?>" /></td>  <!--i used php inside html, not inside echo-->
<?php
    $rown++;
}
echo '</table><div style="clear:both">  
                <input type="submit" name="post"></input></form></div></div>  ';
/*
$temp =$rown;
while($temp>0){
    $sql = "SELECT * FROM `categories` WHERE cat_id=$temp";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();

            echo " <div class='container' style='background-color:none'>
                     <table class='table table-sm' style='border:none' align='center'>
                        <th style='background-image:url(table.jpg); color:white;' colspan='4'>$row[cat_name]</th>";
    $sql = "SELECT * FROM `master` WHERE cat_id=$temp";
    $result = mysqli_query($conn,$sql);        
    $no=1;
    
            while($row = $result->fetch_assoc()){
                    $i=$row['qid'];
                    echo "<tr id='a' style='font-family:verdana'><td style='column-width: 5em'>$no</td><td style='column-width: 70em'><a href ='forum.php?qid=$i' >$row[question] </a></td><td style='column-width: 10em'><b>$row[qname]</b></td>";
                    echo "<td style='column-width: 15em'>$row[reg_date]</td></tr>";
                    $no++;
                }
echo "</table></div><br>";
$temp--;
} 

*/
?>
 <div class="col-sm-8" style="background-color:lavenderblush;">
<table border="" class="table table-striped" align="center" style="background-color:none; border:none; border-width:3px; border-radius:4px">
        <thead border="" style="background-image:url(table.jpg)">
        <tr>
        <th style='color:white'>S.No.</th>
        <th style='color:white'>Creator</th>
        <th style='color:white'>Questions</th>
        <th style='color:white'>Creation Date</th>
        </tr>
        </thead>


      <?php


if(!empty($_POST["select_tag"])){  

    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($conn,$sql);
    while($row = $result->fetch_assoc()){
        foreach($_POST["select_tag"] as $topic_id)  
        {  

          if($row['cat_id']==$topic_id){
            echo "<b>$row[cat_name]   </b> ";
          }
        } 
    }              
}

    $query = "SELECT * from `master` ORDER BY qid DESC";
    $result = $conn->query($query);

      $no=0;
while($row = $result->fetch_assoc()){

 if(!empty($_POST["select_tag"])){  

      $count=0;
           foreach($_POST["select_tag"] as $topic_id)  
           {    
                
    if( $count==0){
      if (strpos($row['cat_id'], $topic_id) !== false){
            $count++;
            $no++;

        echo   "<tr id = '$no'>
        <td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $no  </td>
        <td style='color:#2F4F4F; font-family:verdana; font-size:15px'><b> $row[qname]</b> </td>
        <td style='color:#2F4F4F; font-family:verdana; font-size:15px'> <a href ='forum.php?qid=$row[qid]' >$row[question] </a></td>";
        echo"<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $row[reg_date] </td>";

          echo "<td style='color:#2F4F4F; font-family:verdana; font-size:15px'>";
      
           $id=$row['cat_id'];
           $arr=explode(",",$id);
           $l=count($arr);
           $i=0;
        while($l--){
          $temp= $arr[$i];
            $i++;
            $sq = "SELECT cat_name FROM `categories` WHERE cat_id=$temp";
          $res = mysqli_query($conn,$sq);
          $ro = $res->fetch_assoc();
          echo "<p>$ro[cat_name]</p>";
          }

          echo "</td></tr>";
        }}
      }

    }else{
        $no++;
        echo   "<tr id = '$no'>
        <td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $no  </td>
        <td style='color:#2F4F4F; font-family:verdana; font-size:15px'><b> $row[qname]</b> </td>
        <td style='color:#2F4F4F; font-family:verdana; font-size:15px'> <a href ='forum.php?qid=$row[qid]' >$row[question] </a></td>";
        echo"<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $row[reg_date] </td>";

          echo "<td style='color:#2F4F4F; font-family:verdana; font-size:15px'>";
      
           $id=$row['cat_id'];
           $arr=explode(",",$id);
           $l=count($arr);
           $i=0;
        while($l--){
          $temp= $arr[$i];
            $i++;
            $sq = "SELECT cat_name FROM `categories` WHERE cat_id=$temp";
          $res = mysqli_query($conn,$sq);
          $ro = $res->fetch_assoc();
          echo "<p>$ro[cat_name]</p>";
          }

          echo "</td></tr>";
  }
}
      ?>
    </table>
</div>
  </div>

<?php
include 'foot.php';
?>
<script>  
 $(document).ready(function(){  
      $('btn_delete').click(function(){  
            
                var id = [];  
                $(':checkbox:checked').each(function(i){  
                     id[i] = $(this).val();  
                });  
                if(id.length === 0) //tell you if the array is empty  
                {  
                     alert("Please Select atleast one checkbox");  
                }  
                else  
                {  
                     $.ajax({  
                          url:'delete.php',  
                          method:'POST',  
                          data:{id:id},  
                          success:function()  
                          {  /*
                               for(var i=0; i<id.length; i++)  
                               {  
                                    $('tr#'+id[i]+'').css('background-color', '#ccc');  
                                    $('tr#'+id[i]+'').fadeOut('slow');  
                               }
                               */  
                          }  
                     });  
                }  
           
           else  
           {  
                return false;  
           }  
      });  
 });  
 </script>  