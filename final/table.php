<?php require('includes/config.php');

//redirect to login page if you are not signed in
if(!$user->is_logged_in()){ header('Location: login.php'); }

//define page title
$title = 'Table';

//include header template

require('layout/header.php');
?>

<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

                <h2>Member's Database</h2>
                <!-- top header-->
                <p>
				<a href='#'>Logged as <?php echo $_SESSION['username']; ?></a>
				<a href='memberpage.php'>Home</a>
        <a href='table.php'>Table</a>
				<a href='profile.php'>Profile</a>
				<a href='edit.php'>Edit User Profile</a>
				<a href='logout.php'>Logout</a></p>
                <hr>

        </div>
  <div id="ccontent">
  <p>
  <?php
  $con=mysqli_connect("sql2.njit.edu","sbs43","hurrah37","sbs43");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM members");
echo "<table border='1'>
<tr>
<th>Member ID</th>
<th>UserName</th>
<th>Email</th>
</tr>";


while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['memberID'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);


  ?>
  </p>


  </div>
    </div>


</div>

<?php
//include header template
require('layout/footer.php');
?>
