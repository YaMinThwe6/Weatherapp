    if($_GET){
        
        $e = $_GET["input"];
        
        $content=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$e."&appid=2688e1f8e790143e5099e286fc481424");
        
        $arrayweather=json_decode($content, true);
        
        //print_r($arrayweather);
        
        $temp = $arrayweather[main][temp]- 273.15;
        
        $report="The weather for the city ".$e." is ". $arrayweather[weather][0][description]." and the temperature is ".$temp."&degC. The wind speed is ".$arrayweather[wind][speed]." m/s. ";
        
    }
