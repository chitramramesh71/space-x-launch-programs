<?php 

    require("root-config/config.php");
    $requestAPi = new Api();
    $fetchData = $requestAPi -> curlRequest();
    $result = json_decode($fetchData,true);    
?>
<div class="wrapper">
    <div class="row">
        <div class="col-md-12 loader text-center">
            <img src="assets/images/loader.gif" alt="" class="img-fluid" width = "150"/> 
        </div>
    </div>
    <div class="row" id="list_SpaceX"> 

        <?php

            if(count($result) > 1 ){
                
                for($k = 0; $k < count($result); $k++){                    
        ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-4"> 
                        <div class="bg-white p-3">
                        <div class="header bg-grey">
                            <img src="<?php echo $result[$k]['links']['mission_patch'];?>" alt="<?php echo $result[$k]['mission_name'];?>" class="img-fluid"/> 
                        </div>
                        <div class="body-container">
                                <h3 class="mt-4"><?php echo $result[$k]['mission_name']." #".$result[$k]['flight_number'];?></h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item pl-0 pb-2"><strong>Mission Ids:</strong> <small> <?php echo $result[$k]['mission_name'];?> </small> </li>
                                    <li class="list-group-item pl-0 pb-2"><strong>Launch Year:</strong> <small> <?php echo $result[$k]['launch_year'];?></small> </li>
                                    <li class="list-group-item pl-0 pb-2"><strong>Successfull Launch:</strong> <small><?php echo $result[$k]['launch_success'] == true ? "TRUE " : "FALSE" ;?></small> </li>
                                    <li class="list-group-item pl-0 pb-2"><strong>Successfull <br/>Landing:</strong><small><?php echo $result[$k]['launch_success'];?></small> </li>
                                </ul>
                        </div>
                        </div>
                    </div>
                    <?php
                }
            }
           
        ?>
    </div>
</div>

<style>
.bg-grey{
    background: #f2f2f2;
}
</style>