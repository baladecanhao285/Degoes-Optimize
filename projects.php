<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Projetos — De Goes Optimize</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include 'menu.php'; ?>
  <main>
    <section class="projects-section">
      <div class="container">
        <header class="projects-header">
          <h2>Projetos selecionados</h2>
          <p class="muted">Cards menores, animação suave e navegação mais leve.</p>
          <div class="project-filters" role="tablist" aria-label="Filtros de projeto">
            <button class="chip is-active" data-filter="all" aria-selected="true">Todos</button>
            <button class="chip" data-filter="webapp">Web App</button>
            <button class="chip" data-filter="ecommerce">E-commerce</button>
            <button class="chip" data-filter="brand">Brand</button>
            <button class="chip" data-filter="saas">SaaS</button>
          </div>
        </header>

        <div class="project-grid">
          <!-- Os cards abaixo são exemplos. Pode duplicar/remover sem alterar a grade -->
          <article class="project-card reveal" data-type="webapp">
            <figure class="project-media">
              <img src="https://picsum.photos/seed/p1/800/533" alt="Capa do projeto Fintech Dashboard" loading="lazy" width="800" height="533">
            </figure>
            <div class="project-body">
              <div class="project-meta"><span>2025</span><span class="tag">Web App</span></div>
              <h3 class="project-title">Fintech Dashboard</h3>
              <p class="muted">Dashboard de analytics limpo e escalável para fintech.</p>
              <div class="project-actions">
                <a class="btn-sm" href="#p1">Ver estudo</a>
                <a class="link-sm underline" href="#" target="_blank" rel="noopener">Live demo</a>
              </div>
            </div>
          </article>

          <article class="project-card reveal" data-type="ecommerce">
            <figure class="project-media">
              <img src="https://picsum.photos/seed/p2/800/533" alt="Capa do projeto Loja Esportiva" loading="lazy" width="800" height="533">
            </figure>
            <div class="project-body">
              <div class="project-meta"><span>2024</span><span class="tag">E-commerce</span></div>
              <h3 class="project-title">Loja Esportiva</h3>
              <p class="muted">Landing e checkout focados em conversão.</p>
              <div class="project-actions">
                <a class="btn-sm" href="#p2">Ver estudo</a>
                <a class="link-sm underline" href="#" target="_blank" rel="noopener">Live demo</a>
              </div>
            </div>
          </article>

          <article class="project-card reveal" data-type="brand">
            <figure class="project-media">
              <img src="https://picsum.photos/seed/p3/800/533" alt="Capa do projeto Site de Marca" loading="lazy" width="800" height="533">
            </figure>
            <div class="project-body">
              <div class="project-meta"><span>2024</span><span class="tag">Brand</span></div>
              <h3 class="project-title">Site de Marca</h3>
              <p class="muted">Presença monocromática guiada por tipografia.</p>
              <div class="project-actions">
                <a class="btn-sm" href="#p3">Ver estudo</a>
                <a class="link-sm underline" href="#" target="_blank" rel="noopener">Styleguide</a>
              </div>
            </div>
          </article>

          <article class="project-card reveal" data-type="saas">
            <figure class="project-media">
              <img src="https://picsum.photos/seed/p4/800/533" alt="Capa do projeto Plataforma SaaS" loading="lazy" width="800" height="533">
            </figure>
            <div class="project-body">
              <div class="project-meta"><span>2023</span><span class="tag">SaaS</span></div>
              <h3 class="project-title">Plataforma de Automação</h3>
              <p class="muted">Marketing site + onboarding para SaaS.</p>
              <div class="project-actions">
                <a class="btn-sm" href="#p4">Ver estudo</a>
                <a class="link-sm underline" href="#" target="_blank" rel="noopener">Documentação</a>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
  </main>
  <?php include 'footer.php'; ?>

  <script>
    // Filtros
    document.addEventListener('DOMContentLoaded', function(){
      const buttons = document.querySelectorAll('.project-filters .chip');
      const cards = document.querySelectorAll('.project-card');
      buttons.forEach(btn => {
        btn.addEventListener('click', () => {
          buttons.forEach(b => b.classList.remove('is-active'));
          btn.classList.add('is-active');
          const type = btn.getAttribute('data-filter');
          cards.forEach(card => {
            const ctype = card.getAttribute('data-type');
            card.style.display = (type === 'all' || type === ctype) ? '' : 'none';
          });
        });
      });

      // Animação de entrada (reveal)
      const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if(entry.isIntersecting){
            entry.target.classList.add('in');
            io.unobserve(entry.target);
          }
        });
      }, {threshold: .12});
      document.querySelectorAll('.reveal').forEach(el => io.observe(el));
    });
  </script>
</body>
</html>
