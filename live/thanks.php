<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/zerogrid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen"> 
	<script src="js/css3-mediaqueries.js"></script>
    <script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/NewsGoth_400.font.js" type="text/javascript"></script>
	<script src="js/NewsGoth_700.font.js" type="text/javascript"></script>
    <script src="js/NewsGoth_Lt_BT_italic_400.font.js" type="text/javascript"></script>
    <script src="js/Vegur_400.font.js" type="text/javascript"></script> 
    <script src="js/FF-cash.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]-->

<?php

function emailMe($arr,$head) {

    $bad = array("content-type","bcc:","to:","cc:","href","CONTENT-TYPE","BCC:","TO:","CC:","HREF");

    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $todayis = date("l, F j, Y, g:i a") ;

    $subject = 'BeniciaPets Contact Form: '.$todayis;

    $message = "$head\n\n\n".
        "Date: $todayis\n\n".
        "Ip: $ip\n\n".
        "Browser: $browser\n\n";

    foreach($arr as $item) {
        $name = $item[0];
        $val = $item[1];
        if($item[2]) {
            $val = stripcslashes($val);
            $val = str_replace($bad,"{badstring}",$val);
        }
        $message .= "$name: $val\n\n";
    }

    $headers = 'From: mia@beniciapets.com'."\r\n".
        'Reply-To: mia@beniciapets.com'."\r\n";

    return mail('mia@beniciapets.com', $subject, $message, $headers);

}


$success = false;
if(!empty($_POST["email"]) || !empty($_POST["message"])) {
    $arr = array(
        array('Email',$_POST["email"],true),
        array('Subject',$_POST["subject"],true),
        array('Message',$_POST["message"],true)
    );
    $success = emailMe($arr,"BeniciaPets.com contact");
}


?>


</head>
<body id="page4">
	<div class="extra">
    	<!--==============================header=================================-->
        <header>
        	<div class="row-top">
            	<div class="main">
                	<div class="wrapper">
                    	<h1><a href="index2.html">BeniciaPets.com: Au Pair for Pets</a></h1>
                    </div>
                </div>
            </div>
            <div class="menu-row">
            	<div class="menu-bg">
                    <div class="main">
                        <nav class="indent-left">
                            <ul class="menu wrapper">
                                <li><a href="index2.html">Home</a></li>
                                <li><a href="about.html">About Me</a></li>
								<li><a href="services.html">Services</a></li>
                                <li><a href="rates.html">Rates</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row-bot">
            	<div class="center-shadow">
                </div>
            </div>
        </header>
        
        <!--==============================content================================-->
        <section id="content">
            <div class="content-bg">
                <div class="main">
                    <div class="zerogrid">
                        <div class="wrapper">
                            <article class="col-full">
								<div class="text-1">Thank you for your message. I'll respond as soon as possible.</div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="block"></div>
            </div>
        </section>
    </div>
	
	<!--==============================footer=================================-->
    <footer>
        <div class="padding">
            <div class="main">
                <div class="zerogrid">
                    <div class="wrapper">
                        <article class="col-1-3">
							<div class="wrap-col">
                            <ul class="list-services border-bot img-indent-bot">
                            	<li><a href="https://www.facebook.com/beniciapets1">Facebook</a></li>
                            </ul>
                            <p class="p1">Copyright &copy; 2014 </p>
							</div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
