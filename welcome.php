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
    <style>
        .border {
            font-family: montserrat;
            padding: 5px 10px;
            background: #31b0ff;
            color: white;
        }

        p {
            padding-left: 50px;
        }
    </style>
</head>
<body>
    <div class="border" align="center">
        <p> Admin Portal </p>
    </div>

    <div class="page-header" align="center">
        <h1>Welcome, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Below are your <b><?php echo htmlspecialchars($_SESSION["role"]); ?></b> links:</h1>
    </div>

    <p>
        <?php
            if($_SESSION["role"] === "FINANCE")
                echo "<img src='https://business.ecu.edu/wp-content/pv-uploads/sites/152/2017/11/finance-banner-1_1600x560_acf_cropped.jpg' width='250' height='125'>";
            else if($_SESSION["role"] === "HR")
                echo "<img src='https://russellconsultinginc.com/wp-content/uploads/2011/05/bigstock-HR-human-resources-concept-i-43815841.jpg' width='250' height='250'>";
            else if($_SESSION["role"] === "TECH")
                echo "<img src='https://images.propertycasualty360.com/contrib/content/uploads/sites/414/2018/10/3-steps-tech-modernization-Feature-1.jpeg' width='250' height='150'>";
            else if($_SESSION["role"] === "SALES")
                echo "<img src='https://www.x5management.com/wp-content/uploads/2017/03/sales.jpg' width='250' height='150'>";
            else if($_SESSION["role"] === "SUPPORT")
                echo "<img src='https://beta.valentin-software.com/wp-content/uploads/2020/03/Support.jpg' width='250' height='125'>";
        ?>
    </p>

    <p>
        <?php 
	    $links = "";
	    $sql = "SELECT link, purpose FROM `applications` WHERE role = ?";
	    
            if($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_role);
            
                $param_role = $_SESSION["role"];
			
		if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
		    mysqli_stmt_bind_result($stmt, $links, $purpose);
				
		    while(mysqli_stmt_fetch($stmt)) {
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

    <div class="border" align="center">
        <p> Created By: Terrence Pocklington, Syed Rizvi, Roneil Vyas - Spring 2020 </p> 
    </div>  
</body>
</html>