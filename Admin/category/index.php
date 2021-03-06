<!DOCTYPE html>  
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ProFit</title>
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../css/admin.css">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>

<title>Admin Section - Manage Category</title>

<body data-spy="scroll" data-target="#navbarResponsive">
    <?php require_once 'process.php'; ?>
       
    <div class="container">
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'profitphpmyadmin' ) or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM programcategory") or die($mysqli->error);
        
        ?>
    </div>
<!--Start Home Section-->
<div id="home">

	<!--Navigation-->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="../../index.php"><img src="img/logo.png"></a>
        <a class="nav-link" href="../../useraccount/login.php">Logout</a>
	</nav>
	<!--End Navigation-->

    <!--Admin page wrapper-->
    <div class="content my-5 border-0">
        <div class="admin-wrapper">

            <div class="left-sidebar my-4 ">
                <ul>
                    <li><a href="../posts/index.php">Manage Posts</a></li>
                    <li><a href="index.php">Manage Category</a></li>
                    <li><a href = "indexnutrition.php">Manage Nutrition</a></li>
                </ul>

            </div>

            <div class="admin-content">

                <div class="button-group">
                    <a href="create.php" class="btn btn-big">Add Category</a>
                </div>

                <div class="content my-3">

                    <h2 class="page-title">Manage Programs Category</h2>
            
                    <table>
                        <thead>
                            <th>No.</th>
                            <th>Name</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;           
                            while ($row = $result->fetch_assoc()): ?>
           
                            <tr>
                                <td><?php echo $no ; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td>
                                    <a href="create.php?edit=<?php echo $row['ID']; ?>"
                                    class="edit">Edit</a>
                                </td>
                                <td>
                                    <a href="process.php?delete=<?php echo $row['ID']; ?>"
                                    class="delete">Delete</a>
                                </td>
                            </tr>
                            <?php $no++ ; ?>
                            <?php endwhile;  ?>
                 
                        </tbody>
                    </table>
                    <?php
                        pre_r($result->fetch_assoc());

                        function pre_r($array){
                            echo '<pre>';
                            print_r($array);
                            echo '</pre>';
                        } 
                    ?>

                </div>

            </div>

        </div>

    </div>
          
</div>


	         

<!--- Script Source Files -->
<script src="../../jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->


</body>
</html>
