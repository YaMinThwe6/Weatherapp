<?php

    if($_GET){
        
        $e = $_GET["input"];
        
        $content=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$e."&appid=2688e1f8e790143e5099e286fc481424");
        
        $arrayweather=json_decode($content, true);
        
        //print_r($arrayweather);
        
        $temp = $arrayweather[main][temp]- 273.15;
        
        $report="The weather for the city ".$e." is ". $arrayweather[weather][0][description]." and the temperature is ".$temp."&degC. The wind speed is ".$arrayweather[wind][speed]." m/s. ";
        
    }

?>

<!doctype html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
        <title>Weatherapp</title>
        
        <style type="text/css">
            
            body{
                
                padding:0;
                margin:0;
                font-family:Arial, Helvetica, sans-serif;
                background-image:url("Unsplash1.jpg");
                background-size:cover;
                
            }
            
            #heading{
                
                color:#f6d113;
                text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
                text-align:center;
                
            }
            
            #middle{
                
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                
            }
            
            #label{
                
                font-size:20px;
                text-align:center;
                font-weight:bold;
                
            }
            
            input{
                
                margin:30px 0px;
                
            }
            
            #myBtn{
                
                display:none;
                
            }
            
            .container{
                
                width:700px;
                
            }
            
        </style>
        
    </head>
    
    <body>
        
        <div class="container" id="middle">
            
            <p id="heading" class="display-3">What's the Weather?</p>
            
            <p id="label">Enter the name of the city:</p>
            
            <form>
                
                <div class="form-group ui-widget">
    
                    <input type="text" name="input" class="form-control" id="fInput" placeholder="E.g: London, Chennai, Tokyo">
                    <input type="submit" id="myBtn">
      
                </div>
                
            </form>  
            
            <div id="message"><?php
            
                if ($_GET){
                    
                    if($content){
                    
                        echo '<div class="alert alert-info" role="alert"><p><b>'.$_GET["input"].'</b></p>'.$report.'</div>';
                        
                    } else {
                        
                        echo '<div class="alert alert-warning" role="alert">Sorry! We\'re still improving. We\'ll update the weather report for '.$_GET["input"].' soon.</div>';
                        
                    }
                    
                }    
            
            ?></div>
            
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
            
            var input = $("#myInput");

            input.addEventListener("keyup", function(e) {

                if (e.keyCode === 13 || e.which === 13) {

                    e.preventDefault();

                    $("#myBtn").click();
                    
                }
                
            });

		$(function() {
    			var availableTags = [
				"Chennai",
				"Cairo",
				"Cali"
			];
    			$("#fInput").autocomplete({
      				source: availableTags
    			});
  		} );
            
        </script>
        
    </body>
    
</html>
