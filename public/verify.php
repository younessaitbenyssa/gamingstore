<?php
// session_start();

// if (isset($_POST['verify'])) {
//     $enteredCode = $_POST['verification_code'];

//     if ($enteredCode == $_SESSION['verification_code']) {
//         echo "
//         <script> 
//             alert('Verification successful!');
//             document.location.href = 'index.php';
//         </script>
//         ";
//     } else {
//         echo "
//         <script> 
//             alert('Invalid verification code.');
//             document.location.href = 'verify.php';
//         </script>
//         ";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Code</title>
</head>
<body>
    <form method="post" action="verify.php">
        <label for="verification_code">Enter Verification Code:</label>
        <input type="text" id="verification_code" name="verification_code" required>
        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
