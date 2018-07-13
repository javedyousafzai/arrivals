<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Europe- Border Monitoring project</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Medilab
    Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
            </div>

        </div>
      </nav>

  </section>
  <!--/ banner-->
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
				<p class="h52">Arrival Overview</p>
			
        </div>


        <div class="col-md-4 col-sm-4">


<!--need to   add some more blocks for the tables-->
          <div class="service-info">
            <div class="icon">
				<p class="h52">Top countries</p>
            </div>
            <div class="icon-info">


            </div>
          </div>
          <div class="service-info">
            <div class="icon">

            </div>
            <div class="icon-info">



            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">

				<p class="h52">Comparison</p>


            </div>
            <div class="icon-info">


            </div>
          </div>
          <div class="service-info">
            <div class="icon">

            </div>
            <div class="icon-info">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
	    <div class="row">
	        <div class="col-md-4 col-sm-4">
				<hr class="botm-line">
			</div>
		</div>

		<?php
			
			// Get the country names in country array
			$country = array();


			/*	CONNECT TO DATABASE*/
      /*
			 $db = mysqli_connect('127.0.0.1','root', '','europe_rm')
			 or die('Error connecting to MySQL server.');

			//Get the list of countruies of Arrivals
			$query = "SELECT distinct coA FROM `arrivals`";
			mysqli_query($db, $query) or die('Error querying database.');

			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);

			
			while ($row = mysqli_fetch_array($result)) {
			//echo $row['CoA']."</br>";
			$country[]=$row[0];
			*/
			
      $month= array ('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
      
       $db = mysqli_connect('127.0.0.1','root', '','europe_rm')
       or die('Error connecting to MySQL server.');

              
        for ($i=0; $i <=count($month); $i++) 
          {

             
              //Get arrival data for all the countries for all years - group by month
            $query = "SELECT year, CoA, sum(total_nationality) FROM `arrivals` where month = '".$month[$i]."' group by year, coa order by year, coa";

            mysqli_query($db, $sql) or die('Error querying database.');       

            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result);
            echo '<table><tr>';
            while ($row = mysqli_fetch_array($result)) 
                {
                    echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td></tr>';
                }
           }
           			
      echo '</table>';
      print_r($year);
			/* get the difference of the tow numbers*/



			$val = round(getDifference (30000, 10000),1).'%';


			/* Function to calculate the difference between the two figures*/	
			function getDifference($oldValue, $newValue)
			{
			$diff = $newValue - $oldValue;
			$percentageDiff = ($diff/$oldValue)*100;
			return $percentageDiff;    
			}

		?>



		<div class="icon-info">
      <p> end of results</p>
		</div>

	</div>
	
  </section>






   <footer id="footer">
      <div class="top-footer">
        <div class="container">
          <div class="row">
            
        </div>
      </div>
      <div class="footer-line">
        <div class="container">
          
            Regional Burea
          	           
          
        </div>
      </div>
    </footer>













  <!--/ footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
