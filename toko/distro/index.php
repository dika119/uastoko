<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RUANGKAOS — Distro Online (Bootstrap 5)</title>

<!-- Bootstrap 5 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Work+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

<style>
  :root{
    --canvas:#F0EBDF;
    --canvas-alt:#E7DFCC;
    --ink:#1C1C1C;
    --ink-soft:#4a453e;
    --accent:#C6362F;
    --accent-dark:#9c2b25;
    --gold:#E0A83B;
    --muted:#8A8375;
    --white:#FFFDF8;
    --bs-body-font-family: 'Work Sans', sans-serif;
  }
  body{
    background:var(--canvas);
    color:var(--ink);
  }
  .display{ font-family:'Bebas Neue', sans-serif; letter-spacing:.02em; text-transform:uppercase; }
  .mono{ font-family:'JetBrains Mono', monospace; }

  /* ===== NAVBAR ===== */
  .navbar-brand .l1{ font-family:'Bebas Neue'; font-size:26px; letter-spacing:.02em; color:var(--ink); }
  .navbar-brand .l2{ font-family:'Bebas Neue'; font-size:26px; letter-spacing:.02em; color:var(--accent); }
  .navbar{ background:var(--canvas) !important; border-bottom:3px solid var(--ink); }
  .navbar .nav-link{ font-weight:600; font-size:14px; text-transform:uppercase; letter-spacing:.04em; color:var(--ink) !important; }
  .navbar .nav-link:hover{ color:var(--accent) !important; }
  .btn-ink{ background:var(--ink); color:var(--canvas); border:2px solid var(--ink); font-weight:700; text-transform:uppercase; letter-spacing:.05em; font-size:13px; }
  .btn-ink:hover{ background:var(--accent); border-color:var(--accent); color:#fff; }
  .btn-outline-ink{ background:transparent; color:var(--ink); border:2px solid var(--ink); font-weight:700; text-transform:uppercase; letter-spacing:.05em; font-size:13px; }
  .btn-outline-ink:hover{ background:var(--ink); color:var(--canvas); }
  .btn-accent{ background:var(--accent); border:2px solid var(--accent); color:#fff; font-weight:700; text-transform:uppercase; letter-spacing:.05em; }
  .btn-accent:hover{ background:var(--accent-dark); border-color:var(--accent-dark); color:#fff; }

  /* ===== TICKER ===== */
  .ticker-strip{ background:var(--ink); color:var(--gold); overflow:hidden; white-space:nowrap; border-bottom:3px solid var(--ink); }
  .ticker-track{ display:inline-block; padding:8px 0; animation:scroll 22s linear infinite; font-family:'JetBrains Mono'; font-size:12px; letter-spacing:.08em; text-transform:uppercase; }
  .ticker-track span{ margin:0 26px; }
  @keyframes scroll{ 0%{transform:translateX(0);} 100%{transform:translateX(-50%);} }

  /* ===== HERO ===== */
  .hero{ padding:70px 0 50px; }
  .stamp-badge{
    display:inline-block; border:2px solid var(--accent); color:var(--accent);
    font-family:'JetBrains Mono'; font-size:11px; font-weight:600; letter-spacing:.1em;
    padding:5px 12px; border-radius:20px; transform:rotate(-3deg); text-transform:uppercase;
  }
  .hero h1{ font-size:clamp(42px,6vw,74px); line-height:.92; }
  .hero h1 .hi{ color:var(--accent); }
  .hero-art{
    aspect-ratio:1/1; background:var(--canvas-alt); border:3px solid var(--ink); border-radius:10px;
    display:flex; align-items:center; justify-content:center; position:relative; transform:rotate(1deg);
  }
  .badge-corner{
    position:absolute; top:-16px; right:-10px; background:var(--gold); color:var(--ink);
    width:84px; height:84px; border-radius:50%; display:flex; align-items:center; justify-content:center;
    text-align:center; font-family:'Bebas Neue'; font-size:12.5px; line-height:1.05; border:2px solid var(--ink); transform:rotate(8deg);
  }

  /* ===== SECTION LABEL ===== */
  .section-label{ display:flex; align-items:center; gap:14px; margin-bottom:30px; }
  .section-label .tag{ font-family:'JetBrains Mono'; font-size:12px; letter-spacing:.1em; text-transform:uppercase; background:var(--ink); color:var(--canvas); padding:5px 10px; border-radius:2px; }
  .section-label h2{ font-family:'Bebas Neue'; font-size:34px; text-transform:uppercase; margin:0; }
  .section-label .rule{ flex:1; height:2px; background:repeating-linear-gradient(90deg, var(--ink) 0 6px, transparent 6px 12px); }

  /* ===== PRODUCT CARDS ===== */
  .product-card{
    background:var(--white); border:2px solid var(--ink); border-radius:8px; overflow:hidden;
    transition:transform .18s ease, box-shadow .18s ease; position:relative;
  }
  .product-card:hover{ transform:translateY(-4px); box-shadow:6px 6px 0 var(--ink); }
  .product-card .hole{ position:absolute; top:12px; left:12px; width:14px; height:14px; border-radius:50%; background:var(--canvas); border:2px solid var(--ink); z-index:2; }
  .product-thumb{ height:210px; display:flex; align-items:center; justify-content:center; border-bottom:2px dashed rgba(28,28,28,.15); }
  .product-card .kicker{ font-family:'JetBrains Mono'; font-size:10.5px; color:var(--muted); text-transform:uppercase; letter-spacing:.08em; }
  .product-card h3{ font-family:'Bebas Neue'; font-size:21px; text-transform:uppercase; margin:2px 0 10px; }
  .price{ font-family:'JetBrains Mono'; font-weight:600; font-size:15px; }
  .add-btn{
    width:34px; height:34px; border:2px solid var(--ink); border-radius:50%; display:flex; align-items:center; justify-content:center;
    font-size:18px; font-weight:700; background:transparent; transition:all .15s ease;
  }
  .add-btn:hover{ background:var(--accent); border-color:var(--accent); color:#fff; transform:rotate(90deg); }

  .size-group{ display:flex; gap:6px; margin:10px 0 12px; }
  .size-btn{
    width:34px; height:30px; border:1.5px solid var(--ink); border-radius:5px; background:transparent;
    font-family:'JetBrains Mono'; font-size:11.5px; font-weight:600; color:var(--ink-soft);
    display:flex; align-items:center; justify-content:center; transition:all .12s ease;
  }
  .size-btn:hover{ border-color:var(--accent); color:var(--accent); }
  .size-btn.active{ background:var(--ink); border-color:var(--ink); color:var(--canvas); }
  .cart-item-size{
    display:inline-block; font-family:'JetBrains Mono'; font-size:10.5px; font-weight:600;
    border:1.5px solid var(--ink); border-radius:4px; padding:1px 6px; margin-left:6px;
  }

  /* ===== ORDER HISTORY ===== */
  #orderModal .modal-content{ background:var(--white); border:2px solid var(--ink); border-radius:10px; box-shadow:8px 8px 0 var(--ink); }
  #orderModal .modal-header{ border-bottom:2px solid var(--ink); }
  #orderModal .modal-title{ font-family:'Bebas Neue'; font-size:28px; text-transform:uppercase; }
  .order-card{ border:1.5px solid var(--ink); border-radius:8px; padding:16px 18px; margin-bottom:16px; background:var(--canvas); }
  .order-card:last-child{ margin-bottom:0; }
  .order-head{ display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:10px; padding-bottom:10px; border-bottom:1.5px dashed rgba(28,28,28,.15); }
  .order-id{ font-family:'JetBrains Mono'; font-weight:700; font-size:13px; }
  .order-date{ font-family:'JetBrains Mono'; font-size:11px; color:var(--muted); margin-top:2px; }
  .order-status{
    font-family:'JetBrains Mono'; font-size:10.5px; font-weight:700; text-transform:uppercase; letter-spacing:.05em;
    padding:4px 10px; border-radius:20px; background:var(--gold); color:var(--ink); white-space:nowrap;
  }
  .order-item-row{ display:flex; justify-content:space-between; font-size:13px; padding:4px 0; color:var(--ink-soft); }
  .order-item-row .nm{ color:var(--ink); }
  .order-total-row{ display:flex; justify-content:space-between; margin-top:10px; padding-top:10px; border-top:1.5px dashed rgba(28,28,28,.15); font-weight:700; }
  .order-empty{ text-align:center; padding:60px 10px; color:var(--muted); }

  /* ===== TESTIMONI ===== */
  .testi-section{ background:var(--canvas-alt); border-top:2px solid var(--ink); border-bottom:2px solid var(--ink); }
  .testi-card{ background:var(--white); border:1.5px solid rgba(28,28,28,.15); border-left:5px solid var(--accent); border-radius:6px; padding:22px 20px; height:100%; }
  .testi-name{ font-weight:700; font-size:13.5px; text-transform:uppercase; letter-spacing:.03em; }
  .testi-role{ font-family:'JetBrains Mono'; font-size:11.5px; color:var(--muted); }

  /* ===== FOOTER ===== */
  footer{ background:var(--ink); color:var(--canvas); }
  footer h4{ font-family:'JetBrains Mono'; font-size:12px; letter-spacing:.08em; text-transform:uppercase; color:var(--gold); }
  footer a{ color:#d8d3c6; text-decoration:none; }
  footer a:hover{ color:var(--accent); }
  footer .l1{ color:var(--canvas); } footer .l2{ color:var(--gold); }

  /* ===== AUTH MODAL ===== */
  #authModal .modal-content{ background:var(--white); border:2px solid var(--ink); border-radius:10px; box-shadow:8px 8px 0 var(--ink); }
  #authModal .modal-header{ border-bottom:none; padding-bottom:0; }
  #authModal .kicker{ font-family:'JetBrains Mono'; font-size:11px; letter-spacing:.12em; color:var(--muted); text-transform:uppercase; }
  #authModal .modal-title{ font-family:'Bebas Neue'; font-size:30px; text-transform:uppercase; }
  .auth-tabs .nav-link{
    border:2px solid var(--ink) !important; color:var(--ink); font-weight:700; font-size:12.5px; text-transform:uppercase; letter-spacing:.05em; border-radius:6px !important;
  }
  .auth-tabs .nav-link.active{ background:var(--ink) !important; color:var(--canvas) !important; }
  .form-label-tag{ font-family:'JetBrains Mono'; font-size:10.5px; letter-spacing:.08em; text-transform:uppercase; color:var(--ink-soft); }
  .form-control{ border:1.5px solid var(--ink); border-radius:6px; background:var(--canvas); }
  .form-control:focus{ border-color:var(--accent); box-shadow:0 0 0 3px rgba(198,54,47,.12); background:var(--canvas); }
  .input-group .btn-eye{ border:1.5px solid var(--ink); border-left:none; background:var(--canvas); }

  /* ===== CART OFFCANVAS ===== */
  #cartOffcanvas{ background:var(--canvas); border-left:3px solid var(--ink); width:400px; }
  #cartOffcanvas .offcanvas-header{ border-bottom:2px solid var(--ink); }
  #cartOffcanvas .offcanvas-title{ font-family:'Bebas Neue'; font-size:26px; text-transform:uppercase; }
  .cart-item{ display:flex; gap:12px; padding:14px 0; border-bottom:1.5px dashed rgba(28,28,28,.15); }
  .cart-item-img{ width:58px; height:58px; border:2px solid var(--ink); border-radius:6px; flex-shrink:0; display:flex; align-items:center; justify-content:center; background:var(--white); }
  .cart-item h4{ font-family:'Bebas Neue'; font-size:16px; text-transform:uppercase; margin-bottom:2px; }
  .qty-control{ display:flex; align-items:center; border:1.5px solid var(--ink); border-radius:5px; overflow:hidden; }
  .qty-control button{ width:24px; height:24px; font-weight:700; font-size:14px; background:transparent; border:none; }
  .qty-control button:hover{ background:var(--canvas-alt); }
  .qty-control span{ width:26px; text-align:center; font-family:'JetBrains Mono'; font-size:12.5px; }
  .remove-item{ font-family:'JetBrains Mono'; font-size:11px; color:var(--accent); font-weight:600; text-transform:uppercase; letter-spacing:.05em; background:none; border:none; }
  .cart-badge{ font-family:'JetBrains Mono'; }

  .toast-custom{ background:var(--ink); color:var(--canvas); border:none; }

  ::selection{ background:var(--accent); color:#fff; }
</style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg sticky-top py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-baseline gap-1" href="#beranda">
      <span class="l1">RUANG</span><span class="l2">KAOS</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav mx-auto gap-lg-4 mt-3 mt-lg-0">
        <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
        <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
      </ul>
      <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
        <button class="btn btn-outline-ink position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
          <i class="bi bi-bag"></i> Keranjang
          <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge">0</span>
        </button>
        <button class="btn btn-outline-ink" id="loginOpenBtn" data-bs-toggle="modal" data-bs-target="#authModal">Masuk</button>
        <div class="dropdown d-none" id="avatarChip">
          <button class="btn d-flex align-items-center gap-2 border-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:var(--canvas-alt); border-radius:20px;">
            <span class="rounded-circle d-flex align-items-center justify-content-center mono fw-bold"
                  style="width:30px;height:30px;background:var(--accent);color:#fff;font-size:12px;" id="avatarInitial">A</span>
            <span class="fw-semibold" id="avatarName" style="font-size:14px;">Anda</span>
            <i class="bi bi-chevron-down" style="font-size:11px;"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end mt-2 p-2" style="border:2px solid var(--ink); border-radius:8px; box-shadow:4px 4px 0 var(--ink);">
            <li><a class="dropdown-item rounded" href="#" style="font-size:13.5px;"><i class="bi bi-person me-2"></i>Profil Saya</a></li>
            <li><a class="dropdown-item rounded" href="#" id="orderHistoryLink" data-bs-toggle="modal" data-bs-target="#orderModal" style="font-size:13.5px;"><i class="bi bi-bag-check me-2"></i>Riwayat Pesanan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><button class="dropdown-item rounded text-danger fw-semibold" id="logoutBtn" style="font-size:13.5px;"><i class="bi bi-box-arrow-right me-2"></i>Keluar</button></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- ===== TICKER ===== -->
<div class="ticker-strip">
  <div class="ticker-track">
    <span>◆ GRATIS ONGKIR MIN. 2 PCS</span><span>◆ KAIN COTTON COMBED 30S</span><span>◆ SABLON DTF ANTI RETAK</span><span>◆ READY STOCK SEMUA UKURAN</span>
    <span>◆ GRATIS ONGKIR MIN. 2 PCS</span><span>◆ KAIN COTTON COMBED 30S</span><span>◆ SABLON DTF ANTI RETAK</span><span>◆ READY STOCK SEMUA UKURAN</span>
  </div>
</div>

<!-- ===== HERO ===== -->
<section class="hero" id="beranda">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-7">
        <span class="stamp-badge mb-3 d-inline-block">● Distro Lokal Sejak 2019</span>
        <h1 class="display mb-3">Kaos Buat<br>Yang <span class="hi">Punya</span><br>Cerita.</h1>
        <p class="mb-4" style="max-width:440px;color:var(--ink-soft);">Desain orisinal, sablon tahan lama, dan bahan combed 30s yang adem dipakai seharian. Cocok buat kamu yang nggak mau tampil pasaran.</p>
        <div class="d-flex gap-3 flex-wrap">
          <a href="#produk" class="btn btn-ink px-4 py-2">Belanja Sekarang</a>
          <button class="btn btn-outline-ink px-4 py-2" data-bs-toggle="modal" data-bs-target="#authModal">Punya Akun? Masuk</button>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="hero-art">
          <span class="badge-corner">100%<br>COMBED</span>
          <svg width="200" height="200" viewBox="0 0 220 220">
            <path d="M60 40 L90 30 L110 45 L130 30 L160 40 L175 65 L150 78 L150 180 L70 180 L70 78 L45 65 Z" fill="#1C1C1C"/>
            <circle cx="110" cy="100" r="26" fill="#C6362F"/>
            <text x="110" y="106" text-anchor="middle" font-family="Bebas Neue" font-size="20" fill="#FFFDF8">RK</text>
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== PRODUK ===== -->
<section class="py-5" id="produk">
  <div class="container">
    <div class="section-label">
      <span class="tag">Katalog</span>
      <h2>Produk Kami</h2>
      <div class="rule"></div>
    </div>
    <div class="row g-4" id="productGrid"></div>
  </div>
</section>

<!-- ===== TESTIMONI ===== -->
<section class="py-5 testi-section" id="testimoni">
  <div class="container">
    <div class="section-label">
      <span class="tag">Kata Mereka</span>
      <h2>Testimoni</h2>
      <div class="rule"></div>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="testi-card">
          <p class="mb-3" style="font-size:14.5px;color:var(--ink-soft);">"Bahannya adem, sablonnya nggak gampang retak walau udah dicuci puluhan kali. Repeat order terus."</p>
          <div class="testi-name">Dwi Ananda</div>
          <div class="testi-role">Pelanggan sejak 2021</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <p class="mb-3" style="font-size:14.5px;color:var(--ink-soft);">"Desainnya beda dari distro lain, size chart-nya juga akurat jadi nggak takut salah ukuran."</p>
          <div class="testi-name">Reza Firmansyah</div>
          <div class="testi-role">Pelanggan sejak 2022</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <p class="mb-3" style="font-size:14.5px;color:var(--ink-soft);">"Proses checkout dan login-nya gampang banget, pengiriman juga cepat sampai."</p>
          <div class="testi-name">Salsa Putri</div>
          <div class="testi-role">Pelanggan sejak 2023</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="py-5" id="kontak">
  <div class="container">
    <div class="row g-4 mb-4">
      <div class="col-lg-4">
        <div class="d-flex align-items-baseline gap-1 mb-2">
          <span class="l1 display" style="font-size:26px;">RUANG</span><span class="l2 display" style="font-size:26px;">KAOS</span>
        </div>
        <p style="color:#c9c3b5;font-size:13.5px;max-width:280px;">Distro lokal yang bikin kaos buat orang-orang yang nggak mau tampil pasaran. Desain sendiri, sablon sendiri, bangga produk lokal.</p>
      </div>
      <div class="col-6 col-lg-2">
        
        <h4>Kontak</h4>
        <ul class="list-unstyled" style="font-size:13.5px;color:#d8d3c6;">
          <li class="mb-2">WhatsApp: 0812-3456-7890</li>
          <li class="mb-2">Email: hanika@gmail.com</li>
          <li class="mb-2">lombok, Indonesia</li>
        </ul>
      </div>
    </div>
    <div class="pt-3 d-flex justify-content-between flex-wrap gap-2 mono" style="border-top:1px solid rgba(255,255,255,.14);font-size:11.5px;color:#9a9486;">
      <span>© 2026 RUANGKAOS. Semua hak dilindungi.</span>
      <span>Dibangun dengan Bootstrap 5</span>
    </div>
  </div>
</footer>

<!-- ===== ORDER HISTORY MODAL ===== -->
<div class="modal fade" id="orderModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <div class="mono" style="font-size:11px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;">Akun Saya</div>
          <h5 class="modal-title">Riwayat Pesanan</h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="orderList">
        <div class="order-empty">
          <i class="bi bi-receipt" style="font-size:40px;"></i>
          <p class="mt-3" style="font-size:13.5px;">Belum ada pesanan.<br>Yuk checkout produk favoritmu dulu.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ===== AUTH MODAL (Bootstrap Modal) ===== -->
<div class="modal fade" id="authModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-2">
      <div class="modal-header">
        <div class="text-center w-100">
          <div class="kicker">Kartu Akses Member</div>
          <h5 class="modal-title" id="authTitle">Masuk Akun</h5>
        </div>
        <button type="button" class="btn-close position-absolute" style="top:18px;right:18px;" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-2">
        <ul class="nav nav-pills auth-tabs gap-2 mb-4" id="authTabs">
          <li class="nav-item flex-fill"><button class="nav-link active w-100" id="tabLogin" data-bs-toggle="pill" data-bs-target="#paneLogin" type="button">Masuk</button></li>
          <li class="nav-item flex-fill"><button class="nav-link w-100" id="tabRegister" data-bs-toggle="pill" data-bs-target="#paneRegister" type="button">Daftar</button></li>
        </ul>

        <div class="tab-content">
          <!-- LOGIN -->
          <div class="tab-pane fade show active" id="paneLogin">
            <form id="loginForm" novalidate>
              <div class="mb-3">
                <label class="form-label form-label-tag">Email</label>
                <input type="email" class="form-control" id="loginEmail" placeholder="kamu@email.com" required>
                <div class="invalid-feedback">Masukkan email yang valid.</div>
              </div>
              <div class="mb-2">
                <label class="form-label form-label-tag">Kata Sandi</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="loginPass" placeholder="Minimal 6 karakter" required>
                  <button class="btn btn-eye" type="button" data-target="loginPass"><i class="bi bi-eye"></i></button>
                  <div class="invalid-feedback">Kata sandi minimal 6 karakter.</div>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-3" style="font-size:12.5px;">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Ingat saya</label>
                </div>
                <a href="#" id="forgotLink" style="color:var(--accent);font-weight:600;text-decoration:none;">Lupa kata sandi?</a>
              </div>
              <button type="submit" class="btn btn-ink w-100 py-2">Masuk Sekarang</button>
              <div class="text-center my-3 mono" style="font-size:11px;color:var(--muted);text-transform:uppercase;">atau lanjutkan dengan</div>
              <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-ink flex-fill"><i class="bi bi-google"></i> Google</button>
                <button type="button" class="btn btn-outline-ink flex-fill"><i class="bi bi-facebook"></i> Facebook</button>
              </div>
              <div class="text-center mt-3" style="font-size:12.5px;">
                Belum punya akun? <button type="button" class="btn btn-link p-0" style="color:var(--accent);font-weight:700;text-decoration:none;" id="goRegister">Daftar di sini</button>
              </div>
            </form>
          </div>

          <!-- REGISTER -->
          <div class="tab-pane fade" id="paneRegister">
            <form id="registerForm" novalidate>
              <div class="mb-3">
                <label class="form-label form-label-tag">Nama Lengkap</label>
                <input type="text" class="form-control" id="regName" placeholder="Nama kamu" required>
                <div class="invalid-feedback">Nama wajib diisi.</div>
              </div>
              <div class="mb-3">
                <label class="form-label form-label-tag">Email</label>
                <input type="email" class="form-control" id="regEmail" placeholder="kamu@email.com" required>
                <div class="invalid-feedback">Masukkan email yang valid.</div>
              </div>
              <div class="mb-3">
                <label class="form-label form-label-tag">Kata Sandi</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="regPass" placeholder="Minimal 6 karakter" required>
                  <button class="btn btn-eye" type="button" data-target="regPass"><i class="bi bi-eye"></i></button>
                  <div class="invalid-feedback">Kata sandi minimal 6 karakter.</div>
                </div>
              </div>
              <button type="submit" class="btn btn-ink w-100 py-2">Buat Akun</button>
              <div class="text-center mt-3" style="font-size:12.5px;">
                Sudah punya akun? <button type="button" class="btn btn-link p-0" style="color:var(--accent);font-weight:700;text-decoration:none;" id="goLogin">Masuk di sini</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ===== CART OFFCANVAS (Bootstrap Offcanvas) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas">
  <div class="offcanvas-header">
    <div>
      <div class="mono" style="font-size:11px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;">Keranjang Belanja</div>
      <h3 class="offcanvas-title" id="cartHeadCount">0 Item</h3>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column">
    <div id="cartItems" class="flex-grow-1">
      <div class="text-center py-5" style="color:var(--muted);">
        <i class="bi bi-bag" style="font-size:40px;"></i>
        <p class="mt-3" style="font-size:13.5px;">Keranjang kamu masih kosong.<br>Yuk pilih kaos favoritmu.</p>
      </div>
    </div>
    <div class="pt-3" style="border-top:2px solid var(--ink);">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="mono" style="font-size:12px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;">Total Belanja</span>
        <span class="display" style="font-size:26px;" id="cartTotal">Rp0</span>
      </div>
      <button class="btn btn-accent w-100 py-2" id="checkoutBtn" disabled>Checkout Sekarang</button>
    </div>
  </div>
</div>

<!-- ===== TOAST (Bootstrap Toast) ===== -->
<div class="toast-container position-fixed bottom-0 start-50 translate-middle-x mb-4" style="z-index:1200;">
  <div id="liveToast" class="toast toast-custom align-items-center" role="alert">
    <div class="d-flex">
      <div class="toast-body" id="toastMsg">Berhasil</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script>
  // ---------- Toast helper ----------
  const toastEl = document.getElementById('liveToast');
  const bsToast = new bootstrap.Toast(toastEl, { delay: 2600 });
  function showToast(msg){
    document.getElementById('toastMsg').textContent = msg;
    bsToast.show();
  }

  // ---------- Product data ----------
  const products = [
    { name:'Kaos Grid Hitam', price:55000, color:'#1C1C1C', accent:'#E0A83B' },
    { name:'Kaos Sinyal Hijau', price:65000, color:'#2f5c3f', accent:'#F0EBDF' },
    { name:'Kaos Ombak Biru', price:70000, color:'#2a5f8a', accent:'#F0EBDF' },
    { name:'Kaos Panah Krem', price:58000, color:'#8A7F63', accent:'#1C1C1C' },
    { name:'Kaos Kota Abu', price:62000, color:'#5b5b57', accent:'#E0A83B' },
    { name:'Kaos Api Merah', price:68000, color:'#C6362F', accent:'#F0EBDF' },
  ];

  const grid = document.getElementById('productGrid');
  products.forEach((p, i) => {
    const col = document.createElement('div');
    col.className = 'col-sm-6 col-lg-4';
    col.innerHTML = `
      <div class="product-card h-100">
        <div class="hole"></div>
        <div class="product-thumb">
          <svg width="120" height="120" viewBox="0 0 220 220">
            <path d="M60 40 L90 30 L110 45 L130 30 L160 40 L175 65 L150 78 L150 180 L70 180 L70 78 L45 65 Z" fill="${p.color}"/>
            <circle cx="110" cy="100" r="22" fill="${p.accent}" opacity="0.9"/>
          </svg>
        </div>
        <div class="p-3">
          <div class="kicker">Distro Original</div>
          <h3>${p.name}</h3>
          <div class="size-group" data-idx="${i}">
            ${['S','M','L','XL'].map(sz => `<button type="button" class="size-btn${sz==='M' ? ' active' : ''}" data-idx="${i}" data-size="${sz}">${sz}</button>`).join('')}
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <span class="price">Rp${p.price.toLocaleString('id-ID')}</span>
            <button class="add-btn" data-idx="${i}">+</button>
          </div>
        </div>
      </div>`;
    grid.appendChild(col);
  });

  // ---------- Size selection ----------
  const selectedSize = {};
  products.forEach((_, i) => selectedSize[i] = 'M');

  document.querySelectorAll('.size-btn').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const idx = btn.dataset.idx;
      selectedSize[idx] = btn.dataset.size;
      document.querySelectorAll(`.size-btn[data-idx="${idx}"]`).forEach(b=> b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  // ---------- Cart ----------
  const cart = {}; // key: "idx-size" -> { idx, size, qty }
  const cartCountEl = document.getElementById('cartCount');

  document.querySelectorAll('.add-btn').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const idx = btn.dataset.idx;
      const size = selectedSize[idx];
      const key = `${idx}-${size}`;
      if(cart[key]) cart[key].qty++;
      else cart[key] = { idx, size, qty: 1 };
      renderCart();
      showToast(`${products[idx].name} (Ukuran ${size}) ditambahkan ke keranjang`);
    });
  });

  function cartTotalQty(){ return Object.values(cart).reduce((a,item)=>a+item.qty,0); }
  function cartTotalPrice(){ return Object.values(cart).reduce((s,item)=> s + products[item.idx].price*item.qty, 0); }

  function renderCart(){
    const qtySum = cartTotalQty();
    cartCountEl.textContent = qtySum;
    document.getElementById('cartHeadCount').textContent = `${qtySum} Item`;
    const itemsEl = document.getElementById('cartItems');
    const entries = Object.entries(cart).filter(([,item])=> item.qty>0);

    if(entries.length === 0){
      itemsEl.innerHTML = `
        <div class="text-center py-5" style="color:var(--muted);">
          <i class="bi bi-bag" style="font-size:40px;"></i>
          <p class="mt-3" style="font-size:13.5px;">Keranjang kamu masih kosong.<br>Yuk pilih kaos favoritmu.</p>
        </div>`;
    } else {
      itemsEl.innerHTML = entries.map(([key,item])=>{
        const p = products[item.idx];
        return `
        <div class="cart-item">
          <div class="cart-item-img">
            <svg width="32" height="32" viewBox="0 0 220 220">
              <path d="M60 40 L90 30 L110 45 L130 30 L160 40 L175 65 L150 78 L150 180 L70 180 L70 78 L45 65 Z" fill="${p.color}"/>
              <circle cx="110" cy="100" r="22" fill="${p.accent}" opacity="0.9"/>
            </svg>
          </div>
          <div class="flex-grow-1">
            <h4>${p.name}<span class="cart-item-size">${item.size}</span></h4>
            <div class="mono" style="font-size:12.5px;color:var(--ink-soft);">Rp${p.price.toLocaleString('id-ID')}</div>
            <div class="d-flex justify-content-between align-items-center mt-2">
              <div class="qty-control">
                <button class="qty-minus" data-key="${key}">−</button>
                <span>${item.qty}</span>
                <button class="qty-plus" data-key="${key}">+</button>
              </div>
              <button class="remove-item" data-key="${key}">Hapus</button>
            </div>
          </div>
        </div>`;
      }).join('');
    }

    document.getElementById('cartTotal').textContent = `Rp${cartTotalPrice().toLocaleString('id-ID')}`;
    document.getElementById('checkoutBtn').disabled = entries.length === 0;

    itemsEl.querySelectorAll('.qty-plus').forEach(b=> b.addEventListener('click', ()=>{ cart[b.dataset.key].qty++; renderCart(); }));
    itemsEl.querySelectorAll('.qty-minus').forEach(b=> b.addEventListener('click', ()=>{
      cart[b.dataset.key].qty--; if(cart[b.dataset.key].qty <= 0) delete cart[b.dataset.key]; renderCart();
    }));
    itemsEl.querySelectorAll('.remove-item').forEach(b=> b.addEventListener('click', ()=>{
      delete cart[b.dataset.key]; renderCart(); showToast('Item dihapus dari keranjang');
    }));
  }

  document.getElementById('checkoutBtn').addEventListener('click', ()=>{
    const loggedIn = !document.getElementById('avatarChip').classList.contains('d-none');
    const cartOffcanvasEl = document.getElementById('cartOffcanvas');
    const cartInstance = bootstrap.Offcanvas.getOrCreateInstance(cartOffcanvasEl);
    if(!loggedIn){
      cartInstance.hide();
      new bootstrap.Modal(document.getElementById('authModal')).show();
      showToast('Masuk dulu untuk lanjut checkout');
      return;
    }
    const total = cartTotalPrice();
    saveOrder(cart, total);
    showToast(`Checkout berhasil! Total Rp${total.toLocaleString('id-ID')}`);
    for(const k in cart) delete cart[k];
    renderCart();
    cartInstance.hide();
  });

  // ---------- Order history ----------
  const orders = [];
  const statusCycle = ['Diproses', 'Dikemas', 'Dikirim'];

  function saveOrder(cartSnapshot, total){
    const items = Object.values(cartSnapshot).map(item => ({
      name: products[item.idx].name,
      size: item.size,
      qty: item.qty,
      price: products[item.idx].price
    }));
    const orderId = `RK-${new Date().getFullYear()}-${String(orders.length + 1).padStart(4,'0')}`;
    const status = statusCycle[orders.length % statusCycle.length];
    orders.unshift({
      id: orderId,
      date: new Date().toLocaleDateString('id-ID', { day:'numeric', month:'long', year:'numeric', hour:'2-digit', minute:'2-digit' }),
      items, total, status
    });
    renderOrders();
  }

  function renderOrders(){
    const listEl = document.getElementById('orderList');
    if(orders.length === 0){
      listEl.innerHTML = `
        <div class="order-empty">
          <i class="bi bi-receipt" style="font-size:40px;"></i>
          <p class="mt-3" style="font-size:13.5px;">Belum ada pesanan.<br>Yuk checkout produk favoritmu dulu.</p>
        </div>`;
      return;
    }
    listEl.innerHTML = orders.map(o => `
      <div class="order-card">
        <div class="order-head">
          <div>
            <div class="order-id">${o.id}</div>
            <div class="order-date">${o.date}</div>
          </div>
          <span class="order-status">${o.status}</span>
        </div>
        ${o.items.map(it => `
          <div class="order-item-row">
            <span class="nm">${it.qty}× ${it.name} <span class="cart-item-size">${it.size}</span></span>
            <span class="mono">Rp${(it.price * it.qty).toLocaleString('id-ID')}</span>
          </div>`).join('')}
        <div class="order-total-row">
          <span>Total</span>
          <span class="mono">Rp${o.total.toLocaleString('id-ID')}</span>
        </div>
      </div>
    `).join('');
  }

  // ---------- Auth: tab switching helpers ----------
  const authTitle = document.getElementById('authTitle');
  document.getElementById('tabLogin').addEventListener('shown.bs.tab', ()=> authTitle.textContent = 'Masuk Akun');
  document.getElementById('tabRegister').addEventListener('shown.bs.tab', ()=> authTitle.textContent = 'Buat Akun Baru');
  document.getElementById('goRegister').addEventListener('click', ()=> bootstrap.Tab.getOrCreateInstance(document.getElementById('tabRegister')).show());
  document.getElementById('goLogin').addEventListener('click', ()=> bootstrap.Tab.getOrCreateInstance(document.getElementById('tabLogin')).show());

  // password show/hide
  document.querySelectorAll('.btn-eye').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const input = document.getElementById(btn.dataset.target);
      const icon = btn.querySelector('i');
      input.type = input.type === 'password' ? 'text' : 'password';
      icon.className = input.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
    });
  });

  // ---------- Validation ----------
  function validEmail(v){ return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

  document.getElementById('loginForm').addEventListener('submit', (e)=>{
    e.preventDefault();
    const email = document.getElementById('loginEmail');
    const pass = document.getElementById('loginPass');
    let ok = true;
    email.classList.toggle('is-invalid', !validEmail(email.value)); if(!validEmail(email.value)) ok = false;
    pass.classList.toggle('is-invalid', pass.value.length < 6); if(pass.value.length < 6) ok = false;
    if(!ok) return;

    const initial = email.value.trim().charAt(0).toUpperCase() || 'A';
    document.getElementById('avatarInitial').textContent = initial;
    document.getElementById('avatarName').textContent = email.value.split('@')[0];
    document.getElementById('avatarChip').classList.remove('d-none');
    document.getElementById('loginOpenBtn').classList.add('d-none');

    bootstrap.Modal.getInstance(document.getElementById('authModal')).hide();
    showToast('Berhasil masuk, selamat belanja!');
    e.target.reset();
    email.classList.remove('is-invalid'); pass.classList.remove('is-invalid');
  });

  // ---------- Logout ----------
  document.getElementById('logoutBtn').addEventListener('click', ()=>{
    document.getElementById('avatarChip').classList.add('d-none');
    document.getElementById('loginOpenBtn').classList.remove('d-none');
    showToast('Kamu berhasil keluar');
  });

  document.getElementById('registerForm').addEventListener('submit', (e)=>{
    e.preventDefault();
    const name = document.getElementById('regName');
    const email = document.getElementById('regEmail');
    const pass = document.getElementById('regPass');
    let ok = true;
    name.classList.toggle('is-invalid', name.value.trim().length < 2); if(name.value.trim().length < 2) ok = false;
    email.classList.toggle('is-invalid', !validEmail(email.value)); if(!validEmail(email.value)) ok = false;
    pass.classList.toggle('is-invalid', pass.value.length < 6); if(pass.value.length < 6) ok = false;
    if(!ok) return;

    showToast('Akun berhasil dibuat, silakan masuk');
    e.target.reset();
    bootstrap.Tab.getOrCreateInstance(document.getElementById('tabLogin')).show();
  });

  document.getElementById('forgotLink').addEventListener('click', (e)=>{
    e.preventDefault();
    showToast('Tautan reset kata sandi telah dikirim ke email kamu');
  });
</script>
</body>
</html>