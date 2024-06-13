<?php 
if(isset($_POST['submit'])){
   
$data = $_POST['text'];

if(empty($data)){
    echo "<h1>Please input a text</h1>";
   
}else{

    $key =  "1234509876abc";
    $cipher =  "AES-256-CBC";

$ivlen = openssl_cipher_iv_length($cipher);
$iv = openssl_random_pseudo_bytes($ivlen);

$encrypted_data = bin2hex(openssl_encrypt($data, $cipher, $key,$option= 0, $iv ));



$decrypted_data = openssl_decrypt(hex2bin($encrypted_data),$cipher,$key,0,$iv);

}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open SSL</title>
</head>
<body style="background-color:antiquewhite;">
   <div align="center">
        <h4>Enter the text you want to Encrypt</h4>
        <form  method="post">
            <input type="text" name="text" placeholder="Enter Text">
            <button type="submit" name="submit" value="submit">Submit</button>

            <h1>Encrypted string: <?php if(isset($_POST['text'])&&!empty($_POST['text'])){ echo $encrypted_data;}else{ echo " ";} ?></h1>

            <h2>Decrypted String : <?php if(isset($_POST['text'])&&!empty($_POST['text'])){ echo $decrypted_data;}else{ echo " ";} ?></h2>
        </form>
    </div>
</body>
</html>