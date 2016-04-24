<?php
    
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    
    
 //   ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
    
    
    $python_file = "scripts/".generateRandomString().".js";
    
    if(file_put_contents($python_file, $_REQUEST['Body'])){
    	$response = shell_exec("nodejs ".$python_file);
    	
    	if($response != ""){
    		//unlink($python_file);
    	} else {
    		$response = "Response is null.";
    	}
    } else {
    	$response = "Error creating javascript file.";
    }
    
    
    function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
    
    
?>
<Response>
    <Message>Console Output: <?php echo $response ?></Message>
</Response>