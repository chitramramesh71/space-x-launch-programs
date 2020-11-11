<?php

class Api{

    
    public function curlRequest(){

        $limit = 12;
        $url = "https://api.spacexdata.com/v3/launches?limit=$limit";
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST=> 0,
            CURLOPT_SSL_VERIFYPEER=> 0,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "cache-control: no-cache"
            ),
          ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}

// $requestAPi = new Api();
// $fetchData = $requestAPi -> curlRequest();
// echo "<pre>";
// $x = json_decode($fetchData); 
// //print_r($x);
// echo $x[0]->mission_name;
?>