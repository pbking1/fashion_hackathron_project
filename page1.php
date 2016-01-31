<!doctype html>



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



<body class="shortcodes">


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
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Recycle</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">sell</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">donate</a></li>
                </ul>
                    
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                                <!-- / Table -->
                        <h3>Recycle material table for tshirt green man</h3>
                        <table class="table">
                          <caption>The information about the material that can be recycled and how they can be recycled.</caption>
                          <thead>
                            <tr>
                              <th>Material</th>
                              <th>How to recycle</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Cotton</th>
                              <td>Natural Cotton is completely biodegradable! When it is not mixed with a man made fiber, the material will break down over time. If you have a compost bin you can cut up the garment; remove buttons, zippers, and other metal elements and throw it in the compost. You can also donate the items if they are wearable or you can throw them away with the knowledge that they will break down and decompose within the landfill -- in some areas there are also companies that will collect old cotton to be made into insulation. Cotton is a renewable resource which is a major element for which it could be considered more sustainable than non-renewable, synthetic materials.</td>

                            </tr>

                          </tbody>
                        </table>
                        <table class="table">
                          <thead>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><img width="150px" height="150px" src="images/pic1.png"></img></td>
                              <td><img width="150px" height="150px" src="images/pic2.png"></img></td>
                              <td><img width="150px" height="150px" src="images/pic3.png"></img></td>
                            </tr>

                          </tbody>
                        </table>
                        <!-- \ Table -->
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                    <?php
                    error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

                    // API request variables
                    $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
                    $version = '1.0.0';  // API version supported by your application
                    $appid = 'iupui4307-9efc-4f99-9ef5-c223db5d4d5';  // Replace with your own AppID
                    $globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
                    $query = 't shirt men green';  // You may want to supply your own query
                    $safequery = urlencode($query);  // Make the query URL-friendly

                    // Construct the findItemsByKeywords HTTP GET call
                    $apicall = "$endpoint?";
                    $apicall .= "OPERATION-NAME=findItemsByKeywords";
                    $apicall .= "&SERVICE-VERSION=$version";
                    $apicall .= "&SECURITY-APPNAME=$appid";
                    $apicall .= "&GLOBAL-ID=$globalid";
                    $apicall .= "&keywords=$safequery";
                    $apicall .= "&paginationInput.entriesPerPage=3";

                    // Load the call and capture the document returned by eBay API
                    $resp = simplexml_load_file($apicall);

                    // Check to see if the request was successful, else print an error
                    if ($resp->ack == "Success") {
                      $results = '';
                      // If the response was loaded, parse it and build links
                      foreach($resp->searchResult->item as $item) {
                        $pic   = $item->galleryURL;
                        $link  = $item->viewItemURL;
                        $title = $item->title;

                        // For each SearchResultItem node, build a link and append it to $results
                        $results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td></tr>";
                      }
                    }
                    // If the response does not indicate 'Success,' print an error
                    else {
                      $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
                      $results .= "AppID for the Production environment.</h3>";
                    }
                    ?>
                    <h3>Sample eBay Search Results for <?php echo $query; ?></h3>

                    <table>
                    <tr>
                      <td>
                        <?php echo $results;?>
                      </td>
                    </tr>
                    </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                    <h2>How to Donate</h2>
                    Being a job creator is easy! Just follow these three steps
                    <h3>Step 1: Gather Your Stuff</h3>
                    Walk around your home and collect items you and your family no longer need — that shirt 
                    that’s been hanging in the back of your closet for three years, 
                    the toy trike your five-year old has outgrown, the holiday gift 
                    from grandma you never quite found a place for, etc.

                    <h3>Step 2: Give Them a Look Over</h3>
                    Donating items that are in working condition, 
                    contain all of their pieces and parts, and are free of stains 
                    and rips is the best way to ensure that your goods do 
                    the most good. While we accept most clothing and 
                    household items, there are a few things we can’t 
                    accept – such as items that have been recalled, 
                    banned or do not meet current safety standards. 
                    In addition, if you’re looking to donate specialty 
                    items such as computers, vehicles or mattresses, 
                    it’s best to give your local Goodwill agency a 
                    call first to find out any rules or restrictions 
                    around these items.

                    <h3>Step 3: Go to Goodwill</h3>
                    Ready to drop off your items? Just use our locator 
                    at the top of the page or on our homepage  and check 
                    the box for “Donation Site” to find your nearest 
                    Goodwill drop-off location. Donating a lot of items? 
                    Some Goodwills offer donation pickup services – 
                    give yours a call to find out what’s available in your area.
                    Each year, we also get together with our partners to 
                    offer unique donation drives, giving you the 
                    chance to drop off your items at retail stores, 
                    college campuses and more. Stay tuned to this 
                    space for information about new opportunities 
                    to donate through our partners.
                    </div>
                </div>
            </div>
            <!-- \ Tabs -->
            
            
            



            
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
