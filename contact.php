<?php
$config = require __DIR__ . '/recaptcha.php';
$siteKey = $config['site_key'];
$secretKey = $config['secret_key'];
$mode = $config['mode'];
$v3Action = $config['v3_action'] ?? 'contact';
$v3MinScore = $config['v3_min_score'] ?? 0.5;

$sent = false; $error = '';

function verify_recaptcha($mode, $secretKey, $v3Action, $v3MinScore){
  if($mode === 'v2'){
    $token = $_POST['g-recaptcha-response'] ?? '';
  } else {
    $token = $_POST['recaptcha_token'] ?? '';
  }
  if(!$token) return [false, 'Recaptcha ausente.'];
  $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
  $postData = http_build_query([
    'secret' => $secretKey,
    'response' => $token,
    'remoteip' => $_SERVER['REMOTE_ADDR'] ?? null
  ]);
  $opts = ['http' => ['method' => 'POST','header' => "Content-type: application/x-www-form-urlencoded\r\n",'content' => $postData, 'timeout' => 6]];
  $context = stream_context_create($opts);
  $result = @file_get_contents($verifyUrl, false, $context);
  if($result === false) return [false, 'Falha ao validar o reCAPTCHA.'];
  $json = json_decode($result, true);
  if(!$json || empty($json['success'])){
    return [false, 'Verificação do reCAPTCHA falhou.'];
  }
  if($mode === 'v3'){
    $score = $json['score'] ?? 0;
    $action = $json['action'] ?? '';
    if($action !== $v3Action || $score < $v3MinScore){
      return [false, 'Baixa pontuação do reCAPTCHA.'];
    }
  }
  return [true, null];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $service = trim($_POST['service'] ?? '');
  $budget = trim($_POST['budget'] ?? '');
  $message = trim($_POST['message'] ?? '');

  list($okCaptcha, $capError) = verify_recaptcha($mode, $secretKey, $v3Action, $v3MinScore);

  if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message && $okCaptcha){
    $sent = true;
  } else {
    $error = $capError ?: 'Por favor, preencha os campos corretamente.';
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#0a0a0a"/>
  <title>Contato — Vamos trabalhar juntos</title>
  <link rel="preload" href="style.css" as="style">
  <link rel="stylesheet" href="style.css" />
  <?php if($mode === 'v2'): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <?php else: ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo htmlspecialchars($siteKey); ?>" async defer></script>
    <script>
      document.addEventListener('DOMContentLoaded', function(){
        var form = document.getElementById('contact-form');
        if(!form) return;
        grecaptcha.ready(function() {
          form.addEventListener('submit', function(e){
            e.preventDefault();
            grecaptcha.execute('<?php echo htmlspecialchars($siteKey); ?>', {action: '<?php echo htmlspecialchars($v3Action); ?>'}).then(function(token) {
              var input = document.getElementById('recaptcha_token');
              if(!input){
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'recaptcha_token';
                input.id = 'recaptcha_token';
                form.appendChild(input);
              }
              input.value = token;
              form.submit();
            });
          });
        });
      });
    </script>
  <?php endif; ?>
</head>
<body>
  <?php include 'menu.php'; ?>
  <main>
    <section class="contact-hero">
      <div class="container contact-grid">
        <div class="contact-left">
          <h1>Entre em contato —<br/>vamos trabalhar<br/>juntos.</h1>
          <div class="address-block">
            <span class="kicker">ENDEREÇO</span>
            <p><strong>De Goes Optimize</strong><br/>
            Curitiba, PR<br/>
            Brasil</p>
          </div>
        </div>
        <div class="contact-right">
          <p class="lead muted">Tem um projeto? Fale comigo se quiser trabalharmos juntos em algo empolgante. Grande ou pequeno. Móvel ou web.</p>

          <?php if($sent): ?>
            <p class="notice">Obrigado, <?php echo htmlspecialchars($name); ?> — recebi sua mensagem e retornarei em breve.</p>
          <?php elseif($error): ?>
            <p class="notice" role="alert"><?php echo htmlspecialchars($error); ?></p>
          <?php endif; ?>

          <form method="post" class="contact-form" id="contact-form">
            <div class="grid-2">
              <div>
                <label class="muted" for="name">Seu nome</label>
                <input type="text" id="name" name="name" placeholder="Qual o seu nome?" required />
              </div>
              <div>
                <label class="muted" for="email">Seu e-mail</label>
                <input type="email" id="email" name="email" placeholder="Qual é o seu e-mail?" required />
              </div>
            </div>

            <div class="grid-2">
              <div>
                <label class="muted" for="service">Serviço</label>
                <select id="service" name="service" class="select">
                  <option value="" disabled selected>No que você está interessado?</option>
                  <option>Branding</option>
                  <option>Criação de Site/Landing</option>
                  <option>Tráfego Pago (Google/Meta)</option>
                  <option>Gestão de Redes Sociais</option>
                  <option>Automação (n8n/IA)</option>
                  <option>Apresentação Comercial</option>
                  <option>Consultoria</option>
                </select>
              </div>
              <div>
                <label class="muted" for="budget">Orçamento</label>
                <select id="budget" name="budget" class="select">
                  <option value="" disabled selected>Qual é seu orçamento?</option>
                  <option>Até R$ 2.000</option>
                  <option>R$ 2.000 – R$ 5.000</option>
                  <option>R$ 5.000 – R$ 10.000</option>
                  <option>Acima de R$ 10.000</option>
                </select>
              </div>
            </div>

            <div>
              <label class="muted" for="message">Mensagem</label>
              <textarea id="message" name="message" placeholder="Qual é a sua mensagem?" required></textarea>
            </div>

            <div class="recaptcha-wrapper">
              <div class="g-recaptcha" data-sitekey="<?php echo htmlspecialchars($siteKey); ?>"></div>
            </div>

            <button class="btn" type="submit">Enviar mensagem</button>
          </form>
        </div>
      </div>
    </section>
  </main>
  <?php include 'cta.php'; ?>
  <?php include 'footer.php'; ?>
</body>
</html>
