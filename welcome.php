<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Portal</title>
    
</head>
<body>
    <div class="page-header">
        <h1>Welcome, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Below are your <b><?php echo htmlspecialchars($_SESSION["role"]); ?></b> links:</h1>
    </div>
    <p>
		<?php 
		$links = "";
		$sql = "SELECT link, purpose FROM `applications` WHERE role = ?";
		if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_role);
            
            $param_role = $_SESSION["role"];
			
			if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
				mysqli_stmt_bind_result($stmt, $links, $purpose);
				
				while(mysqli_stmt_fetch($stmt))
				{
					echo "<br><a href=$links>$purpose</a></br>";
				}
			}
			
		}
		
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		?>
		<br></br>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </p>
</body>
</html>