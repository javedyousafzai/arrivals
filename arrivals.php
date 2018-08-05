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
                <p class="h52">&nbsp;</p>
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
	        
		

		<?php
			
			// Set the country, year and months lists in array;
			$country = array('Cyprus','Greece', 'Italy','Spain');
      $year = array(2013,2014,2015,2016,2017,2018);
      $month_value = '';
      $country_flag = '';
      $total_year_arrivals =0;

      $db = mysqli_connect('10.9.143.95','root', '','europe_rm')
      or die('Error connecting to MySQL server.');

       echo "<table border=1 width=100%>
              <tr>
              <td>Country</td>
              <td>Year</td>
              <td class='cellHeader' align='center'><strong>Jan</strong></td>
              <td class='cellHeader' align='center'><strong>Feb</strong></td>
              <td class='cellHeader' align='center'><strong>Mar</strong></td>
              <td class='cellHeader' align='center'><strong>Apr</strong></td>
              <td class='cellHeader' align='center'><strong>May</strong></td>
              <td class='cellHeader' align='center'><strong>Jun</strong></td>
              <td class='cellHeader' align='center'><strong>Jul</strong></td>
              <td class='cellHeader' align='center'><strong>Aug</strong></td>
              <td class='cellHeader' align='center'><strong>Sep</strong></td>
              <td class='cellHeader' align='center'><strong>Oct</strong></td>
              <td class='cellHeader' align='center'><strong>Nov</strong></td>
              <td class='cellHeader' align='center'><strong>Dec</strong></td>
              <td class='cellHeader' align='center'><strong>TOTAL</strong></td>
            </tr>";
            
        /* set color the cells to show arrival data per countr in blocks for easy reading */                 
        $color1 ='#F3F3F3'; 


        for ($i=0; $i<count($country); $i++ )
        {
           
            for($j=0; $j<count($year); $j++ )                        
            {
              echo "<tr>";    
                //echo "<tr>";
                if ($country_flag != $country[$i])
                    echo "<tr><td><strong>$country[$i]</strong></td>
                            <td rowspan=13></td>
                            </tr>";
                          

                else
                    
                    echo "<tr><td class='cellColor'>$year[$j]</td>";
             
                for ($k=1; $k<=12; $k++) 
                {  
                    $query = "SELECT sum(total_nationality) as arrived FROM `arrivals` where month_no=$k and CoA='$country[$i]' and year = $year[$j]";
                    //echo $query."<br/>";
                    mysqli_query($db, $query) or die('Error querying database.');       

                    $result = mysqli_query($db, $query);
                    while ($row = mysqli_fetch_array($result)) 
                    {

                        if ( is_null($row[0]) OR $row[0] == '')
                            $month_value = '-';
                        else
                            {
                            $month_value = $row[0];
                            $total_year_arrivals = $total_year_arrivals + $row[0];
                            }


                        echo '<td>'.$month_value.'</td>';
                        
                    }
                }
                echo "<td class='cellTotal'>$total_year_arrivals</td></tr>";
                $country_flag = $country[$i];
                $total_year_arrivals=0;
            }   
        }
          
           			
      echo '</table>';
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

    </div>

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
