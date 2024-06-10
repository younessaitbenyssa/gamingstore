<?php
session_start();
if (isset($_POST['verify'])) {
    $enteredCode = $_POST['verification_code'];
    if ($enteredCode == $_SESSION['verification_code']) {
        $_SESSION["verify"] = 1;
        echo "
        <script> 
            alert('Verification successful!');
            document.location.href = 'classes/client.php';
        </script>
        ";
    } else {
        echo "
        <script> 
            alert('Invalid verification code.');
            document.location.href = 'verify.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Code</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="flex h-screen">
<div class="back_signin   overflow-hidden" >
    <div class=" m-auto relative z-10 top-[20%] w-[400px] h-[400px] border-white rounded-2xl border-solid border-2 flex justify-center items-center">
        <form method="post" action="verify.php" class="flex flex-col gap-6">
            <label class=" ml-3 text-white text-xl font-semibold" for="verification_code">Enter Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" class="w-[250px] mx-auto rounded-2xl  focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]"  required>
            <button type="submit" name="verify" class="bg-[#EBDD36] w-[140px]   mx-auto rounded-2xl h-[40px] text-white font-medium">Verify</button>
        </form>
    </div>
    </div>
</body>
</html>
