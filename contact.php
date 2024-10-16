<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de formulier gegevens op
    $naam = htmlspecialchars(trim($_POST['naam']));
    $email = htmlspecialchars(trim($_POST['email']));
    $onderwerp = htmlspecialchars(trim($_POST['onderwerp']));
    $vraag = htmlspecialchars(trim($_POST['vraag']));

    // Stel het e-mailadres in waar het bericht naartoe moet worden gestuurd
    $to = 'contact@mathiasborgers.be'; // Vervang dit met je eigen Combell e-mailadres

    // Stel het onderwerp van de e-mail in
    $subject = "Nieuw contactformulier bericht: $onderwerp";

    // Maak de inhoud van het bericht
    $message = "
    Naam: $naam\n
    E-mailadres: $email\n
    Onderwerp: $onderwerp\n
    Bericht:\n $vraag
    ";

    // Stel de headers in
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Verzend de e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.";
    } else {
        echo "Er is iets misgegaan met het versturen van je bericht. Probeer het later opnieuw.";
    }
}
?>