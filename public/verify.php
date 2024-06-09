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
    <div class="m-auto w-[500px] h-[300px] border-black border-solid border-2">
        <form method="post" action="verify.php" class="flex flex-col gap-6">
            <label for="verification_code">Enter Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" class="w-[250px] mx-auto" required>
            <button type="submit" name="verify" class="bg-[#EBDD36] w-[100px] mx-auto rounded-xl h-[30px]">Verify</button>
        </form>
    </div>
</body>
</html>
