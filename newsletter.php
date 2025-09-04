<?php
$ok = false; $email = trim($_POST['email'] ?? '');
if($_SERVER['REQUEST_METHOD']==='POST' && filter_var($email, FILTER_VALIDATE_EMAIL)){
  $ok = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#0a0a0a"/>
  <title>Newsletter — Inscrição</title>
  <link rel="preload" href="style.css" as="style">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include 'menu.php'; ?>
  <main>
    <section>
      <div class="container">
        <h2>Newsletter</h2>
        <?php if($ok): ?>
          <p class="notice">Inscrito: <?php echo htmlspecialchars($email); ?> ✅</p>
        <?php else: ?>
          <p class="notice" role="alert">E-mail inválido. Volte e tente novamente.</p>
        <?php endif; ?>
        <p><a class="underline" href="index.php">Voltar para o início</a></p>
      </div>
    </section>
  </main>
  <?php include 'cta.php'; ?>
  <?php include 'footer.php'; ?>
</body>
</html>
