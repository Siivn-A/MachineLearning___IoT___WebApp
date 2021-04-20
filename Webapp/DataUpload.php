<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Upload Reading</title>
    <style>
    .error {color: #FF0001;}  
    </style>
  </head>
  <body style="background-color:whitesmoke;">


    <?php
        $tempErr = $humdityErr = "";  
        $temp = $humidity = "";

        $flag=0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $ID = test_input($_POST["studentid"]);
        $temp = test_input($_POST["temp"]);
        $humidity = test_input($_POST["humidity"]);
        }
        
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        if (!$temp) {  
            $tempErr = "Temperature is Empty"; 
            $flag=1;
       }

        if (!$humidity) {  
            $humdityErr = "Humidity is Empty";
            $flag=1;  
       } 

      //  window.location.replace("https://api.thingspeak.com/update?api_key=SNIU0CFBD92SVT4P&field1=".$temp."&field2=".$humidity;."");
        // $url= 'Upload.php?temp='.$temp.'&humidity='.$humidity;
        // echo $url;
    ?>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Cloud Integration of IoT Data</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="DataUpload.php">Upload Readings</a>
                </li>
                <li class="nav-item">
                <a class="nav-link"  href="https://thingspeak.com/channels/1363335" target="_blank">Show Readings </a>
                </li> 
            </ul>
            </div>
        </div>
    </nav>

    <div style="text-align: center; margin-top: 150px;">

    <form method="post" name="upload" target="_blank" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" > 
    Enter Temperature:   
    <input type="text" name="temp">  
    <span class="error">* <?php echo $tempErr; ?> </span>  
    <br><br>   
    Enter Humidity:   
    <input type="text" name="humidity">  
    <span class="error">* <?php echo $humdityErr; ?> </span>  
    <br><br>   
        
    <input type="submit" name="Upload" value="Upload" onclick="return SubmitForm();">   
    <br><br>                             
    </form>
    </div>
    
    <?php
      // header("Location: https://api.thingspeak.com/update?api_key=SNIU0CFBD92SVT4P&field1=$temp&field2=$humidity");
      // exit;
    ?>
     
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script>
    function SubmitForm() {
      <?php $url= 'Upload.php?temp='.$temp.'&humidity='.$humidity; ?>
      document.upload.action='<?php echo $url?>';
      document.upload.target='_blank';
      document.upload.submit();
      // document.write (temp);

      document.upload.action='';
      document.upload.target='';
      document.upload.submit();
        // window.location.replace("https://api.thingspeak.com/update?api_key=SNIU0CFBD92SVT4P&field1=".<?php echo $temp; ?>."&field2=".<?php echo $humidity; ?>."");
      return true;
    }
    </script>
  </body>
</html>