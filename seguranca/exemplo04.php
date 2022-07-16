<?php

echo "Você é um robo? Ablublue";

?>

<form action="cadastrar.php" method="POST">

    <input type="email" name="inputEmail"></input>
    <button type="submit">Enviar</button>
    <button class="g-recaptcha" 
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>


</form>