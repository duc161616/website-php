<?php
include("../include/url_users.php");

if(!isset($_SESSION['username'])){
	header('Location:../index.php');
}
else if($_SESSION['usertype']!='admin') {
    $user=$_SESSION['username'];
}

	

/* fetch user detail */
$query="SELECT * FROM transfer_star WHERE sender='$user' OR receiver='$user'";

$result=mysqli_query($conn , $query );

echo "
<table class='table'>
    <tr>
      <th>Sender</th>
      <th>Receiver</th>
      <th>Amount</th>
      <th>Time</th>
    </tr>

<tbody>
";

if($result) {

	if(mysqli_num_rows($result)>0) {
		while($row=mysqli_fetch_assoc($result)) {
			
      echo "<tr>";
        echo "<td>".$row['sender']."</td>";
        echo "<td>".$row['receiver']."</td>";
        echo "<td>".$row['amount']."</td>";
        echo "<td>".$row['datetime']."</td>";

      echo "</tr>";

    }
    echo "
    </tbody>
  </table>
   ";

  }
} else {
	echo "failed";
}

?>
