<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Code de vérification - MUDESA</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      color: #333;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background-color: #fff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    h1 {
      color: #0055a5;
    }
    .code {
      font-size: 24px;
      font-weight: bold;
      color: #d6336c;
      background-color: #f1f1f1;
      padding: 10px 20px;
      border-radius: 6px;
      display: inline-block;
      margin: 20px 0;
    }
    .footer {
      margin-top: 30px;
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Votre code de vérification</h1>
    <p>Bonjour,</p>
    <p>Voici votre code de vérification pour accéder à votre compte administrateur :</p>
    <div class="code">{{ $code }}</div>
    <p>Ce code est valable pendant 10 minutes.</p>
    <p>Si vous n'avez pas demandé ce code, vous pouvez ignorer cet e-mail en toute sécurité.</p>
    <div class="footer">
      <p>Cordialement,<br>L'équipe MUDESA</p>
    </div>
  </div>
</body>
</html>
