<?php
require 'db.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function showDuplicateMessage() {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Already Subscribed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body{
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg,#ffe3e3,#fff5f5);
        height:100vh;
        margin:0;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .error-card{
        background:white;
        padding:40px;
        border-radius:16px;
        width:90%;
        max-width:400px;
        text-align:center;
        box-shadow:0 6px 16px rgba(0,0,0,0.12);
    }
    .crossmark{
        font-size:60px;
        color:#dc2626;
    }
    .btn{
        margin-top:20px;
        display:inline-block;
        padding:10px 18px;
        background:#dc2626;
        color:white;
        border-radius:10px;
        text-decoration:none;
    }
    </style>
    </head>
    <body>

    <div class="error-card">
        <div class="crossmark">✕</div>
        <h2>Already Subscribed</h2>
        <p>This email is already in our list.</p>
        <a href="index.php" class="btn">Go Home</a>
    </div>

    </body>
    </html>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo 'Invalid email';
    exit;
}

// CHECK FOR DUPLICATES
$check = $conn->prepare("SELECT id FROM newsletter WHERE email=?");
$check->bind_param("s", $email);
$check->execute();
$res = $check->get_result();

if ($res->num_rows > 0) {
    showDuplicateMessage();
    exit;
}

// Insert into DB
$stmt = $conn->prepare("INSERT INTO newsletter (email) VALUES (?)");
$stmt->bind_param("s", $email);
$stmt->execute();

// SEND EMAIL
$mail = new PHPMailer(true);

try {
    // SMTP SETTINGS
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;
    $mail->Username = 'lavankumar183@gmail.com'; // change
    $mail->Password = 'gncwapvfedboaipm';   // 16-digit Gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Email content
    $mail->setFrom('lavankumar183@gmail.com', 'Othisis');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Thanks for subscribing!";
    $mail->Body = "
    <div style='padding:20px;font-family:Arial;background:#f1fef5;border-radius:10px'>
        <img src='https://othisisstatweb.z30.web.core.windows.net/images/othisis_header_logo.png'>
        <h2 style='color:#0c713d'>Welcome to Othisis 🌿</h2>
        <p>Thank you for subscribing to our newsletter.</p>
        <p>You will now receive updates about new blog posts, tips, tutorials, and more.</p>
        <br>
        <div style='padding:15px;background:#fff;border-radius:8px;border:1px solid #d9eddc'>
            Stay tuned for fresh content!
        </div>
        <br>
        <p style='font-size:12px;color:#555'>If you didn't subscribe, please ignore this email.</p>
    </div>
    ";

    $mail->send();
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Subscribed</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="3;url=index.php" />

<style>
body{
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#d1ffe4,#eafff1);
    height:100vh;
    margin:0;
    display:flex;
    justify-content:center;
    align-items:center;
}
.success-card{
    background:white;
    padding:40px;
    border-radius:16px;
    width:90%;
    max-width:400px;
    text-align:center;
    box-shadow:0 6px 16px rgba(0,0,0,0.12);
    animation:fadeIn 0.5s ease-out;
}
@keyframes fadeIn{
    from{opacity:0; transform:translateY(10px);}
    to{opacity:1; transform:translateY(0);}
}
.checkmark{
    font-size:60px;
    color:#16a34a;
}
.btn{
    margin-top:20px;
    display:inline-block;
    padding:10px 18px;
    background:#16a34a;
    color:white;
    border-radius:10px;
    text-decoration:none;
}
</style>
</head>
<body>

<div class="success-card">
    <div class="checkmark">✓</div>
    <h2>Subscribed Successfully!</h2>
    <p>Thank you for joining our newsletter.  
    A confirmation email has been sent to your inbox.</p>

    <a href="index.php" class="btn">Go Home</a>
</div>

</body>
</html>
<?php
exit;

} catch (Exception $e) {
    echo "Subscribed, but email failed: {$mail->ErrorInfo}";
}
?>
