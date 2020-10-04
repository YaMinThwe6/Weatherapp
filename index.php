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
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Weatherapp</title>

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="weather.css">
	
        <script type="text/javascript" src="jquery.min.js"></script>
	<link href="jquery-ui/jquery-ui.css" rel="stylesheet">
       <script>
		
		$( function() {
    			var src = ["Chennai","Bangalore","Delhi","Mumbai","Hyderabad","New Delhi","Kolkata","Agra","London","New York","Paris","Moscow","Tokyo","Dubai","Singapore","Los Angeles","Seoul","Beijing","Las Vegas","Bangkok","Yangon","Mandalay","Ahmedabad","Pune","Amravati","Visakhapatnam","Surat","Jaipur","Nagpur","Barcelona","Madrid","Rome","Chicago","Toronto","San Francisco","Abu Dhabi","St.Petersburg","Amsterdam","Berlin","Prague","Washington","Istanbul","Doha","Sydney","Miami","Munich","Milan","San Diego","Vienna","Dublin","Vancouver","Boston","Zurich","Melbourne","Budapest","Houstan","Seattle","Montreal","Frankfurt","Sao Paulo","Tel Aviv","Copenhagen","Calgary","Orlando","Atlanta","Dallas","Hamburg","Osaka","Lisbon","Austin","Phoenix","Naples","Oslo","Denver","Stockholm","Philadelphia","Riyadh","Buenos Aires","San Jose","Brussels","Portland","Ottawa","Helsinki","Valencia","Brisbane","Warsaw","Minneapolis","Shangai","Lyon","Adelaide","Edmonton","Marseille","Muscat","Athens","Stuttgart","Rio De Janeiro","Baltimore","Auckland","Cologne","New Orleans","Kuwait","Kiev","Hanover","Perth","Minsk","Bucharest","Nashville","Dusseldorf","Manchester","Sacramento","Glasgow","Mexico","Salt Lake","Raleigh","Kracow","Coimbatore","Madurai","Udhagamandalam","Ooty","Tiruchirappalli","Tirunelveli","Salem","Pondicherry","Ambur","Cuddalore","Dindigul","Erode","Gudiyatham","Hosur","Kancheepuram","Karaikkudi","Karur","Kumarapalayam","Kumbakonam","Nagapattinam","Nagercoil","Neyveli","Pollachi","Pudukkottai","Rajapalayam","Ranipet","Sivakasi","Thanjavur","Thoothukkudi","Tiruvannamalai","Tiruppur","Vaniyambadi","Vellore","Agartala","Aizawl","Allahabad","Amritsar","Atal Nagar","Aurangabad","Bhopal","Bhubaneswar","Chandigarh","Dehradun","Dispur","Gandhinagar","Gangtok","Gurgaon","Imphal","Indore","Itanagar","Jalandhar","Jamshedpur","Jodhpur","Kanpur","Kochi","Kohima","Lucknow","Mangalore","Mysore","Nashik","Navi Mumbai","Naya Raipur","Noida","Panaji","Patna","Port Blair","Ranchi","Shillong","Shimla","Srinagar","Thane","Thiruvananthapuram","Udaipur","Varanasi","Vijayawada","Aligarh","Bareilly","Dhanbad","Faridabad","Ghaziabad","Gwalior","Guwahati","Howrah","Hubli–Dharwad","Jabalpur","Kalyan-Dombivli","Ludhiana","Meerut","Moradabad","Nashik","Pimpri-Chinchwad","Rajkot","Solaipur","Vadodara","Vasai-Virar","Warangal","A Coruña","Aachen","Aalborg","Aarhus","Aba","Abadan","Abaetetuba","Abakan","Abbotabad","Abbotsford","Abengourou","Abeokuta","Aberdeen","Abha","Abidjan","Abiko","Abilene","Abohar","Abu Al-Khaseeb","Abu Ghraib","Abuja","Açailândia","Acapulco","Acarigua","Accra","Achalpur","Acheng","Achinsk","Adama","Adana","Adapazarı","Addis Ababa","Aden","Adhamiyah","Adilabad","Adityapur","Adıyaman","Ado-Ekiti","Adoni","Cairo","Cali",
      
    			];
    			$( "#fInput" ).autocomplete({
      				source: function(request, response) {
        				var results = $.ui.autocomplete.filter(src, request.term);
        				response(results.slice(0, 5));
				}
    			});
  		} );

	</script>
        
    </head>
    
    <body>
        
        <div class="container" id="middle">
            
            <p id="heading" class="display-3">What's the Weather?</p>
            
            <p id="label">Enter the name of the city:</p>
            
            <form>
                
                <div class="ui-widget">
    
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

        

  
        <script src="jquery-ui/jquery-ui.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
            
            //var input = $("#fInput");

            $("#fInput").keyup(function(e) {

                if (e.keyCode === 13 || e.which === 13) {

                    e.preventDefault();

                    $("#myBtn").click();
                    
                }
                
            });

            
        </script>
        
    </body>
    
</html>
