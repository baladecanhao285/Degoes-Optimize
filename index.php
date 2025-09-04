<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#0a0a0a"/>
  <title>De Goes Optimize — Portfólio</title>
  <link rel="preload" href="style.css" as="style">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include 'menu.php'; ?>
  <main>
    <section class="hero">
      <div class="container grid-hero">
        <div>
          <div class="kicker">DE GOES OPTIMIZE</div>
          <h1>Uma marca otimizada para resultados reais.</h1>
          <p class="lead">Na De Goes Optimize, transformamos <strong>estratégia</strong>, <strong>tecnologia</strong> e <strong>criatividade</strong> em crescimento real para empresas. Unimos <em>inteligência artificial</em>, <em>performance digital</em> e <em>branding</em> para entregar resultados mensuráveis.</p>
          <div class="cta-row">
            <a class="btn ghost" href="projects.php">Ver Projetos</a>
            <a class="underline" href="about.php">Ler Sobre</a>
          </div>
          <div class="mt" style="margin-top:28px;">
            <div class="scroll-indicator" aria-hidden="true" title="Descer"></div>
          </div>
        </div>
        <div class="avatar-wrap">
          <img src="https://picsum.photos/800/1000?grayscale"
               alt="Retrato"
               class="avatar"
               width="800" height="1000"
               fetchpriority="high" decoding="async"/>
        </div>
      </div>
    </section>

    <section id="projects">
      <div class="container">
        <h2>Projetos selecionados</h2>
        <div class="projects">
          <article class="card">
            <img src="https://picsum.photos/seed/p1/1200/800" alt="Capa do projeto"
                 loading="lazy" decoding="async" width="1200" height="800"/>
            <div class="meta"><span>2025</span><span>Web App</span></div>
            <h3>Fintech Dashboard</h3>
            <p class="muted">Dashboard de analytics limpo e escalável para fintech.</p>
            <a class="underline" href="projects.php#p1" target="_blank" rel="noopener">Ver estudo</a>
          </article>
          <article class="card">
            <img src="https://picsum.photos/seed/p2/1200/800" alt="Capa do projeto"
                 loading="lazy" decoding="async" width="1200" height="800"/>
            <div class="meta"><span>2024</span><span>E-commerce</span></div>
            <h3>Loja Esportiva</h3>
            <p class="muted">Landing e checkout focados em conversão.</p>
            <a class="underline" href="projects.php#p2" target="_blank" rel="noopener">Ver estudo</a>
          </article>
          <article class="card">
            <img src="https://picsum.photos/seed/p3/1200/800" alt="Capa do projeto"
                 loading="lazy" decoding="async" width="1200" height="800"/>
            <div class="meta"><span>2024</span><span>Brand</span></div>
            <h3>Site de Marca</h3>
            <p class="muted">Presença monocromática guiada por tipografia.</p>
            <a class="underline" href="projects.php#p3" target="_blank" rel="noopener">Ver estudo</a>
          </article>
          <article class="card">
            <img src="https://picsum.photos/seed/p4/1200/800" alt="Capa do projeto"
                 loading="lazy" decoding="async" width="1200" height="800"/>
            <div class="meta"><span>2023</span><span>SaaS</span></div>
            <h3>Plataforma de Automação</h3>
            <p class="muted">Marketing site + onboarding para SaaS.</p>
            <a class="underline" href="projects.php#p4" target="_blank" rel="noopener">Ver estudo</a>
          </article>
        </div>
      </div>
    </section>

    <!-- CTA antes da Newsletter -->
    <?php include 'cta.php'; ?>

    <section id="newsletter">
      <div class="container">
        <h2>Newsletter</h2>
        <p class="muted">Receba novidades sobre estudos de caso e artigos.</p>
        <form method="post" action="newsletter.php" class="flex-inline">
          <label for="email" class="muted sr-only">Seu e-mail</label>
          <input type="email" id="email" name="email" placeholder="voce@email.com" required />
          <button class="btn" type="submit">Inscrever</button>
        </form>
      </div>
    </section>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
