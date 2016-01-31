<!doctype html>
<?php
	include "db_connect.php";
?>


<head>

	<title>Finec - Responsive Portfolio Theme for Designers & Photographers</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    
    <!-- Favicon --> 
	<link rel="shortcut icon" href="images/favicon.ico">
    
    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="style.css">
    
</head>



<body class="blog blog-single">


<!-- / Site Header -->
<div class="site-header">

	
    <!-- / Site Logo -->
	<div class="site-logo">
    	<img src="images/site-logo.png" />
    </div>
	<!-- \ Site Logo -->
    
	
    <!-- / Site Menu -->
    <div class="site-menu">
    	<div class="icon"></div>
        <div class="menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About us</a></li>
                <li><a href="page1.php">Disposal</a></li>
                <li><a href="page2.php">Retail rating</a></li>
                <li><a href="page3.php">Tag check</a></li>
                <li><a href="page4.html">Connect</a></li>
                <li><a href="page5.html">Audience</a></li>
            </ul>
        </div>
    </div>
	<!-- \ Site Menu -->
    
	
    <!-- / Site Description -->
    <h1>
    Our site gives shoppers the knowledge they need in order to make sustainable fashion choices. 
    </h1>
	<!-- \ Site Description -->
    
    
    <!-- / Site Footer -->
    <div class="site-footer">
        <div class="site-social">
            <ul>
                <li><i class="pe-so-dribbble pe-lg pe-va"></i></li>
                <li><i class="pe-so-facebook pe-lg pe-va"></i></li>
                <li><i class="pe-so-twitter pe-lg pe-va"></i></li>
            </ul>
        </div>
    
        <p>2016 Fashion hackathron</p>
        <p>created by <a href="http://pbking1.github.io">bin peng</a></p>
    </div>
    <!-- \ Site Footer -->
    
</div>
<!-- \ Site Header -->


<!-- \ Site Main -->
<div class="site-main">
    <div class="inner clearfix">
         <!-- / Comments -->
        <div class="comments clearfix">
            <h4 class="comments-title">Tag check</h4>
            <div class="comments-fields clearfix">
                <form role="form" action="page3.php" method="post">
                    <p>tag_id</p><input name="tag_id" type="text" placeholder="tag id" required>
					<button class="btn btn-default" typr="submit">Search</button>
				</form>
            </div>
            
        </div>
        <!-- \ Comments -->    
    	<div class="post gallery-post">
            <h2><a href="">Result</a></h2>
            <?php
				if(isset($_POST['tag_id']) ){
                    $sql = "select * from material_info where id = '" . $_POST['tag_id'] . "';";
					$event = $conn -> query($sql);
					if($event -> num_rows > 0){
						while($row = $event -> fetch_assoc()){
					        $sql_1 = "select b_rank from brand_rank where brand = '" . $row['brand'] . "';";
                            $event_1 = $conn -> query($sql_1);
                            $row_1 = $event_1 -> fetch_assoc();
                            $brank_rank = $row_1['b_rank'];    

                            $sql_1 = "select b_rank from material_rank where material_name = '" . $row['material_name'] . "';";
                            $event_1 = $conn -> query($sql_1);
                            $row_1 = $event_1 -> fetch_assoc();
                            $material_rank = $row_1['b_rank']; 

                            $sql_1 = "select f_rank from fully_fashion_rank where fully_fashioned = '" . $row['fully_fashioned'] . "';";
                            $event_1 = $conn -> query($sql_1);
                            $row_1 = $event_1 -> fetch_assoc();
                            $fully_fashioned_rank = $row_1['f_rank']; 

                            $average_rank = round(($brank_rank + $material_rank + $fully_fashioned_rank)/3);

                            if($average_rank >= 0 && $average_rank <= 3){
                                echo "<h3>Not Sustainable</h3>This garment is not created with a sustainable thought. Recommend looking at alternative items, especially those made with biodegradable or reusable fabrics such as Cotton, Wool, or 100% Polyester. Additionally, sustainable brands such as Brand A, place responsible manufacturing methods at the forefront of their processes.";
                            }elseif($average_rank >= 4 && $average_rank <= 7){
                                echo "<h3>Okay</h3>This garment is in the middle range of sustainability. Of course, a large part of sustainability is not overproducing one fiber so the industry must find a balance between many types of materials. While there are certainly more sustainable garments, by having a wardrobe with various fibers within this category, you are helping to not overly saturate the market with one moderately harmful resource.";
                            }elseif($average_rank >= 8 && $average_rank <= 10){
                                echo "<h3>Sustainable</h3>This garment is sourced sustainably. This means that the company that produced this garment considered the amount of waste they created with excess fabric, the potential end uses of the garment by making it either recyclable or biodegradable, and they chose to work within fair labor laws and hold their factories accountable to these laws. These are three easy factors that can play into wonderfully beautiful and sustainable garments! Great find!";
                            }else{
                                echo $average_rank;
                            }
						}
					}
                    //calculate the average

				}else{
					echo "<p class='desc'>no result</p>";
				}
            ?>
        </div>
        
        
           
        
                
     </div>
</div>
<!-- / Site Main -->



<!-- / JS Files  -->

    <!-- jQuery -->
    <script src="js/jQuery/jquery-2.1.1.js"></script>
    
    <!-- Theme Functions -->
    <script src="js/functions.js"></script>
    
    <!-- Bootstrap -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
    
<!-- \ JS Files  -->



</body>
</html>
