<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
  <img src="file:///C:/Users/S4M37/Desktop/logo.png" style="max-width:600px;" id="headerImage campaign-icon" />

    <p>Bienvenue  {{ $nom }}.</p>
    Nous vous envoyons cet e-mail pour vous demander de confirmer votre inscription à La faculté de medecine.

    <p>Pour confirmer veuillez activer votre compte avec ce lien : </p>
    <a href="{{$link}}">Confirmer Votre e-mail</a>
    <br/>
    Votre mot de pass est: {{$password}}
    <br/>
    merci.
  </body>
</html>