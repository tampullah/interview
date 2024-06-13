<?php 

$key =  "1234509876abc";
$cipher =  "AES-256-CBC";

$ivlen = openssl_cipher_iv_length($cipher);

if(isset($_POST['submit'])){
   
$data = $_POST['text'];

if(empty($data)){
    echo "<h1>Please input a text</h1>";
   
}else{

    

    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted_data = bin2hex($iv) . bin2hex(openssl_encrypt($data, $cipher, $key, $option=0, $iv));


}
}elseif(isset($_POST['btnsubmit'])){

    $encrypted = $_POST['enctext'];

    if(empty($encrypted)){
        echo "Please input encrypted data";
    }else{
        
        $iv = hex2bin(substr($encrypted, 0, $ivlen*2));
        $encrypted_data = hex2bin(substr($encrypted, $ivlen*2));
        $decrypted_data = openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);
        

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

            
        </form>

        <form  method="post">
            <input type="text" name="enctext" placeholder="Enter Encrypted Data">
            <button type="submit" name="btnsubmit" value="desubmit">Submit</button>

            <h1>Decrypted string: <?php if(isset($_POST['enctext'])&&!empty($_POST['enctext'])){ echo $decrypted_data;}else{ echo " ";} ?></h1>

            
        </form>
    </div>
</body>
</html>