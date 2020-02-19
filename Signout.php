<!DOCTYPE html>
<html>
<head>
    <title>FoodStanza</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
</head>
<body>
<?php
session_start(); 
unset($_SESSION['uid']); 
session_destroy();
print_r($_SESSION); 
header("Location: index.html");
header("Cache-Control","no-cache,no-store,must-revalidate");
exit();
?>
</body>
<script type="text/javascript">
function noBack(){window.history.forward();}
noBack();
window.onload=noBack;
window.onpageshow=function(evt){if(evt.persisted)noBack();}
window.onunload=function(){void(0);}
</script>
</html>