<?php
	session_start();
	if(!isset($_SESSION['id_usuario'])){
		header('Location: index.php?erro=1');
	}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan</title>
    <script type="text/javascript" src="assets/js/html5-qrcode.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/styles/styles.css">
</head>
    <body>
        <style>
        .result{
            background-color: green;
            color:#fff;
            padding:20px;
        }
        .row{
            display:flex;
        }
        </style>


        <div class="row col-md-12">
        <div class="col">
            <div style="width:500px;" id="reader"></div>
        </div>
        <div class="col" style="padding:30px;">
            <div id="result"></div>
        </div>
        </div>


        <script type="text/javascript">
        function onScanSuccess(qrCodeMessage) {
            document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
            window.location.href = "home.php?codigo="+qrCodeMessage;
            exit();
        }

        function onScanError(errorMessage) {
        //handle scan error
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);

        </script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>