<?php
    if($getusers-> num_rows() > 0){
        echo json_encode($getusers);
    }else{
        echo "No data found";
    }
   
?>
