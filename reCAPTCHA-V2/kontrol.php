<?php 
if (isset($_POST['ad'])) {
    $ad = $_POST['ad'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['mesaj'])) {
    $mesaj = $_POST['mesaj'];
}
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
}
if (!$captcha) {
    echo '<h2>Lütfen robot olmadığınızı doğrulayın.</h2>';
    exit;
}
$kontrol = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=SECRET KEY BURAYA&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
if ($kontrol.success == true) {
    echo '<h2>Mesajınız tarafımıza iletilmiştir.</h2>';
}
else {
    echo 'Spam gönderi!';
}
?>