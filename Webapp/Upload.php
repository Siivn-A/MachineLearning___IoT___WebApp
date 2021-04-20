<?php
    $temp=$_GET['temp'];
    $humidity=$_GET['humidity'];
    

      header("Location: https://api.thingspeak.com/update?api_key=SNIU0CFBD92SVT4P&field1=$temp&field2=$humidity");
      exit;
?>