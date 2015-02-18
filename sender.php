<?php

	//New GPG object
	$gpg = new gnupg();
	
	/*$pub_key = "-----BEGIN PGP PUBLIC KEY BLOCK-----
Version: GnuPG/MacGPG2 v2.0.22 (Darwin)
Comment: GPGTools - https://gpgtools.org

mQENBFQxdU0BCACwWYlnDsGuFAC0cfqyavP0YMIrqjj29En6HIxoCODWfWFzL3l4
FjJCrpOTjGiIHfHDrOOMxZh8XeGI3...

...oHr5ggwrTeLNjjaAmnr14wB5YNSG+hF+qFB
TdkqfkKIfvumFr/Sr7zyU4yyfR+qo8I9S7kgdB051kWshduZyZv5n/JDfPXRVvt1
WLWEdDLSw3zm/8MnJYVWYDiRLzx3tPzpb7F4HRjeggjjKWej1L6XE7k/zoutVWud
0YdPcFWaLKYcKMjsjcq/aqkTsR8pndeKJUNUkbPyMHNICK5Xag==
=m5oC
-----END PGP PUBLIC KEY BLOCK-----
";
	
	$info = $gpg->import($pub_key);
	
	die(print_r($info));

	*/
	
	
	//fingerprint of the key we shall be using
	$pub_key_fingerprint = "FINGER PRINT"; 
	
	//adding/setting the key to the GPG resource object
	$gpg->addencryptkey($pub_key_fingerprint);
	
	
	
	//standard error correction for the contact form
    $error = false;
    $error_messages = array();

    $reciver_email = "you@example.com";
    $reciver_name = "FIRST LAST";
    
    if(!isset($_POST['name']) || empty($_POST['name'])){
        $error = true;
        $error_messages[] = "No Name Entered";
    }
    
    if(!isset($_POST['email']) || empty($_POST['email'])){
        $error = true;
        $error_messages[] = "No Email Address Entered";
    }
    
    if(!isset($_POST['subject']) || empty($_POST['subject'])){
        $error = true;
        $error_messages[] = "No Subject Entered";
    }
    
    
    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $error_messages[] = "Email Address Not Valid";
    }
    
    
    if(!isset($_POST['message']) || empty($_POST['message'])){
        $error = true;
        $error_messages[] = "No Message Entered";
    }
    
    
    if($error){
    	$string_responce = "";
    	$total = sizeof($error_messages);
    	$i = 1; 
    	
    	foreach($error_messages as $e):
    		$string_responce .= $e ;
    		if($i != $total) $string_responce .= '<br />';
    		$i++;
    	endforeach;

        $reply = array(
            'error' => true,
            'error_messages' => $string_responce
            );
        echo json_encode($reply);
        die();
    } else {


    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        $body = "";
		$body .= "Name: " . $name .  "\r\n";
		$body .= "Email: " . $email .  "\r\n";
		$body .= "Subject: " . $subject .  "\r\n";
		$body .= "Message:  ";
		$body .= $_POST['message'];



		//Encrypting the message
		$body = $gpg->encrypt($body);
		

		
		$headers .= "From: {$name} <{$email}>" . "\r\n";
		$headers .= "To: {$reciver_name} <{$reciver_email}>" . "\r\n";

		// 		to, 	sub, 	body, 	headers, 	param
		mail($reciver_email, $subject, $body, $headers);
		
		$reply = array(
        	'error' => false
        );
        echo json_encode($reply);

        die();
    }
?>