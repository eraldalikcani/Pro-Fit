<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProFit</title>
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fixed.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'profitphpmyadmin';

$mysqli = new mysqli($host, $user, $pass, $db);

$id_perdoruesi=55;
$result = $mysqli->query("SELECT DISTINCT program.ID, program.Title, program.Description, program.img, program.ProgramCategory 
FROM savedprogram INNER JOIN (program,user) ON (savedprogram.ProgramID=program.ID AND savedprogram.UserID = user.ID)
WHERE savedprogram.UserID=$id_perdoruesi LIMIT 2") or die($mysqli->error);

$result2 = $mysqli->query("SELECT DISTINCT nutrition.ID, nutrition.Title, nutrition.Description, nutrition.img, nutrition.NutritionCategory
FROM savednutrition INNER JOIN (nutrition,user) ON (savednutrition.NutritionID=nutrition.ID AND savednutrition.UserID = user.ID)
WHERE savednutrition.UserID=$id_perdoruesi LIMIT 2") or die($mysqli->error);


?>

    <!--Start Home Section-->
    <div id="home">

        <!--Navigation-->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php"><img src="img/logo.PNG"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programs.php">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nutrition.php">Nutrition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active saved" id="saved" href="saved-items.php">Saved Items</a>
                        <div class="dropdown-settings">
                            <a href="settings.html">Settings</a>
                            <a href="index.php">Log out</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact-area">Contact</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="search.php" method="POST">
                        <input type="text" placeholder=" Search... " name="search">
                        <button name="submit-search">
                            <i class="fa fa-search" style="font-size: 18px;">
                            </i>
                        </button>
                    </form>
                </div>
                <div class="settings"><i class="fa fa-cog"></i>
                    <div class="dropdown-settings">
                        <a href="settings.html">Settings</a>
                        <a href="index.php">Log out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!--End Navigation-->

        <!-- HEADER IMAGE -->

        <div class="header-img">
            <img src="img/hdr.jpg" class="responsive">
        </div>

        <!--HEADER IMAGE-->
    </div>
    <!--End Home Section-->


    <div class="row" id="all-programs">
        <div class="column left">
            <div class="row programs-title">
                <h3>My Saved Articles</h3>
            </div>
            <div class="row programs-container">
            
                <div class="row programs-content">
                <?php while ($saved = $result->fetch_assoc()): ?>
                    <div class="card mb-3 program-card" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                
                                <?php echo '<img src="data:img/jpg;base64,'.base64_encode($saved['img']).'" height="200" width="200"  class="card-img" alt="..." >' ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $saved['Title'] ?></h5>
                                </div>
                                <div class="card-body">
                                    <a class="card-text font-italic">Category:<?= $saved['ProgramCategory'] ?></a>
                                </div>
                                <div class="card-body program-action">
                                    <a href="single-item.php?ID=<?php echo $saved['ID']; ?>">See full article</a>
                                    <button type="button" id="" value="<?php echo $saved['ID'];?>"class="btn btn-outline-warning unsave-btn">Unsave</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
            
                <div class="row programs-content">
                <?php while ($saved = $result2->fetch_assoc()): ?>
                    <div class="card mb-3 program-card" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                
                                <?php echo '<img src="data:img/jpg;base64,'.base64_encode($saved['img']).'" height="200" width="200"  class="card-img" alt="..." >' ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $saved['Title'] ?></h5>
                                </div>
                                <div class="card-body">
                                    <a class="card-text font-italic">Category:<?= $saved['NutritionCategory'] ?></a>
                                </div>
                                <div class="card-body program-action">
                                    <a href="single-item.php?ID=<?php echo $saved['ID']; ?>">See full article</a>
                                    <button type="button" id="" value="<?php echo $saved['ID'];?>"class="btn btn-outline-warning unsave-btn">Unsave</button>
                                </div>
                                
                            </div>                      
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>           
            </div>
            <div class="column right">
                <div class="row categories-title">
                    <h4>Categories</h4>
                </div>
                <div class="border-bottom"></div>
                <div class="row categories-container">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="">Programs Articles</a></li>
                        <li class="list-group-item"><a href="">Nutrition Articles</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        
    </div>


    <!--Start Footer Section-->
    <div id="footer" class="offset">

        <footer>
            <div class="row justify-content-center">

                <div class="col-md-5 text-center">
                    <img src="img/logo.png">
                    <p>Gjithmone prane jush per t'ju sjelle programet e fitnesit dhe dietat me te mira qe jane cerifikuar deri me tani.</p>

                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter-square"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>

                </div>

                <hr class="socket">
                &copy; ProFIT.


            </div>
            <!--End of Row-->
        </footer>

    </div>
    <!--End footer Section-->



    <!--- Script Source Files -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <!--- End of Script Source Files -->

    <script>
        $(document).ready(function(){
            //UnsaveItemsBtn esht klasa e butonit qe do bej unsave
            $('.unsave-btn').on('click',function () {
            var statusVal = $(this).val();
            console.log(statusVal);
                    $.ajax({
                        type: "POST",
                        url: "unsaveStatus.php",
                        data: {statusType : statusVal },
                        success: function(msg) {
                        console.log(msg);
                        //ne momentin qe behet fshirja nga databaza do behet reload faqja
                        location.reload(true);
                        }
                    })
            });
        });
</script>
</body>

</html>
