<?php 
require 'main.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/done.css">
    <title>wait</title>
</head>
<body>
    


<header>
    <div class="left">
<img src="res/img/logo.png" >
    </div>
</header>





<main>
    <div class="continerr">




<div class="heads">
<div class="loding"><img src="res/img/loadings.gif" style="width:60px;"></div>
 
</div>



<div class="mobile">
<span>Please wait...</span>
</div>







   
    </div>
</main>
<script>
var next = "<?php echo $_GET['next']; ?>";
setTimeout(() => {
    window.location=next;
}, 6000);
</script>


</body>
</html>
   


