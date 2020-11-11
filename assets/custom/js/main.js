$(document).ready(function(){
    $(".loader").fadeIn('slow');

    setTimeout(function(){
        $(".loader").fadeOut('slow');
        $("#list_SpaceX").css("display","flex");
     }, 4000);

    $("#filter").children(".components").find("li").on("click",function(){
        var landing_status,launch_status;

         if( $(this).children("input[type='radio']").attr('name') == "launch_status" ){
           launch_status = $(this).children("input[type='radio']").val();
           localStorage.setItem('launch_status', launch_status);
         }
         
         if( $(this).children("input[type='radio']").attr('name') == "landing_status" ){
            landing_status = $(this).children("input[type='radio']").val();
            localStorage.setItem('landing_status', landing_status);
         }
         
         if($(this).children("input[type='radio']").attr('name') == "launch_year" ){
            launchYear = $(this).children("input[type='radio']").val();
            localStorage.setItem('launchYear', launchYear);
         }

         if( $(this).children("input[type='radio']").prop('checked') == false){
            $(this).children("input[type='radio']").prop('checked',true);
            $(this).addClass("active");
            $(this).prevAll().removeClass("active");
            $(this).nextAll().removeClass("active");
         }

         var year = localStorage.getItem("launchYear");
         var launching_status = localStorage.getItem("launch_status");
         var status_of_landing = localStorage.getItem("landing_status");

         fetchData(year, launching_status, status_of_landing);  
    });    


    function fetchData(year, statusLanunch, status_of_landing){
       
        var link = '';
        var limit = 12
        
        if( statusLanunch != null ){
            link = "https://api.spaceXdata.com/v3/launches?limit="+limit+"&launch_success="+statusLanunch;
        }
        if( status_of_landing != null ){
            link = "https://api.spacexdata.com/v3/launches?limit="+limit+"&land_success="+status_of_landing;
        }
        if( year != null ){
            link = "https://api.spaceXdata.com/v3/launches?limit"+limit+"&launch_year="+year;
        }

        if( statusLanunch != null && status_of_landing != null && year != null){
            link = "https://api.spaceXdata.com/v3/launches?limit="+limit+"&launch_success="+statusLanunch+"&land_success="+status_of_landing+"&launch_year="+year;
        }

        console.log(link);
        
        $.ajax({
            type: 'GET',
            url: link,         
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {               
                dynamicGenratedDom(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function dynamicGenratedDom(data){
        var output="";
        if( data.length > 0 ){
            for (const item of data) {
              //  console.log(item.mission_name);
                output += ' <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-4 mb-4"> ';
                output += '   <div class="bg-white p-3"> ';
                output += '     <div class="header bg-grey"> ';
                output += '       <img src="';output +=item.links.mission_patch+'" alt="'+item.mission_name+'" class="img-fluid"/>  ';
                output += '      </div> ';
                output += '      <div class="body-container"> ';
                output += '         <h3  class="mt-4">'+item.mission_name+' #'+item.flight_number+'</h3> ';
                output += '         <ul class="list-group list-group-flush"> ';
                output += '            <li class="list-group-item pl-0 pb-2"><strong>Mission Ids:</strong> <small> '+item.mission_name+'</small> </li> ';
                output += '            <li class="list-group-item pl-0 pb-2"><strong>Launch Year:</strong> <small> '+item.launch_year+'</small> </li> ';
                output += '            <li class="list-group-item pl-0 pb-2"><strong>Successfull Launch:</strong> <small>'; output +=item.launch_success == true ? "TRUE" : "FALSE"; output +='</small> </li> ';
                output += '            <li class="list-group-item pl-0 pb-2"><strong>Successfull <br/>Landing:</strong><small>'; output +=item.launch_success == true ? "TRUE" : "FALSE"; output +='</small> </li> ';
                output += '          </ul> ';
                output += '     </div> ';
                output += '   </div> ';
                output += ' </div> ';
            }
        }else{
            output += '<h4 class=" text-center bg-white p-5 w-auto"> oops... We did not found list of programs </h4>';
        }
        $("#list_SpaceX").hide();
        $(".loader").fadeIn('slow');
        setTimeout(function(){
            $(".loader").fadeOut();
            $("#list_SpaceX").html(output);
            $("#list_SpaceX").css("display","flex");
        },2000);
       
    }
    
});//document ready function ends here