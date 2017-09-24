<?php
session_start();
 
if( isset($_POST['submit'])) {
if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {

echo 'Teşekkürler "'.$_POST['name'].'", Mesajınız "'.$_POST['message'].'"';
unset($_SESSION['security_code']);
} else {

echo 'Geçersiz güvenlik kodu girdiniz, lütfen tekrar deneyin!';
}
} else {
?>

<form action="form.php" method="post">
<label for="name">Ad Soyad: </label><input type="text" name="name" id="name" /><br>
<label for="email">E-mail: </label><input type="email" name="email" id="email" /><br />
<label for="message">Mesaj: </label><textarea rows="5" cols="30" name="message" id="message"></textarea><br />
<img src="kontrol.php?width=200&height=80&characters=5" /><br />
<label for="security_code">Güvenlik Kodu: </label><input id="security_code" name="security_code" type="text" /><br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
}
?>