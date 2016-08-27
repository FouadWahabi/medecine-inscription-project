<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Validation de Votre Inscrption dans ECOS</h2>
    <p>Vous étes :</p>
    <ul>
      <li><strong>Nom</strong> : {{ $nom }}</li>
      <li><strong>Prenom</strong> : {{ $prenom }}</li>
      <li><strong>CIN</strong> : {{ $CIN }}</li>
    </ul>
    <p>Pour confirmer veuillez activer votre compte avec ce lien : </p>
    <p><u>{{$link}}</u></p>
  </body>
</html>