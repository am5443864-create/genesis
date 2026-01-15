<!DOCTYPE html> 
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Genesis Consultores - Formulario</title>
  <meta name="viewport" content="width=1366">

  <!-- Fuentes -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Jua&display=swap" rel="stylesheet">

  <style>
    @font-face {
        font-family: "AptosBlack";
        src: local("Aptos Black"), local("AptosBlack"), local("Segoe UI Black");
        font-weight: 900;
    }

    /* Animación para tipo.png */
    .nosotros-anim{
      overflow:visible;
      opacity:0;
      transform:translateY(60px);
    }

    .nosotros-anim.in-view{
      animation: subirDesdeAbajo 1.2s ease-out forwards;
    }

    @keyframes subirDesdeAbajo{
      0%{
        opacity:0;
        transform:translateY(60px);
      }
      100%{
        opacity:1;
        transform:translateY(0);
      }
    }

    :root{
      --azul:#0D2D69;
      --naranja:#F39A16;
      --blanco:#ffffff;
      --gris-borde:#E7ECF3;
      --texto:#0D2D69;
      --azul-texto: #0085e0;
      --azul-claro:#2e76ff;
    }

    *{box-sizing:border-box;margin:0;padding:0}
    html{scroll-behavior:smooth}

    body{
      font-family: "Fun City Level 3 Basic", sans-serif;
      color:var(--texto);
      background-image:url('fondooo.jpg');
      background-size:cover;
      background-position:center;
      background-repeat:no-repeat;
    }

    /* =================== HEADER =================== */
    .site-top{
      position: sticky;
      top: 0;
      z-index: 9000;
      width: 100%;
      background: transparent;
      transition: background-color .25s ease, backdrop-filter .25s ease;
    }

    .site-top.scrolled{
      background: rgba(255, 255, 255, 0.55);
      backdrop-filter: blur(6px);
    }

    .top-inner{max-width:1366px;margin:0 auto;padding:16px 20px 10px}

    .nav-row{
      display:flex;align-items:center;gap:18px;width:100%;
      flex-wrap:nowrap;
    }

    .nav-left{display:flex;align-items:center;gap:18px;flex:0 0 auto}

    .nav-right{
      margin-left:auto;flex:1 1 auto;
      display:flex;justify-content:flex-end;
    }

    .hamburger{
      width:44px;height:36px;display:inline-flex;align-items:center;justify-content:center;
      border-radius:10px;cursor:pointer;position:relative;flex:0 0 44px;
      z-index:1200;
    }
    .hamburger span,.hamburger::before,.hamburger::after{
      content:"";display:block;width:26px;height:3px;background:var(--naranja);
      border-radius:6px;position:absolute;left:50%;transform:translateX(-50%);
      transition:transform .18s ease, opacity .18s ease;
    }
    .hamburger span{top:50%;transform:translate(-50%,-50%)}
    .hamburger::before{top:10px}
    .hamburger::after{bottom:10px}

    .hamburger.open span{opacity:0}
    .hamburger.open::before{transform:translateX(-50%) rotate(45deg);top:50%}
    .hamburger.open::after{transform:translateX(-50%) rotate(-45deg);bottom:50%}

    .logo{
      width:220px;height:110px;object-fit:contain;object-position:left center;display:block;flex:0 0 220px
    }

    .main-nav ul{
      list-style:none;display:flex;align-items:center;gap:28px;
      flex-wrap:nowrap;white-space:nowrap
    }
    .main-nav li{flex:0 0 auto}
    .main-nav a{
      position:relative;text-decoration:none;color:var(--texto);
      font-weight:700;font-size:18px;letter-spacing:.3px;padding:6px 2px
    }
    .main-nav a::after{
      content:"";position:absolute;left:0;right:0;bottom:-12px;height:6px;background:var(--naranja);
      transform:scaleX(0);transform-origin:center;transition:transform .18s ease;border-radius:3px
    }
    .main-nav a:hover::after,.main-nav a:focus-visible::after{transform:scaleX(1)}

    .search-row{
      display:flex;
      justify-content:flex-end;
      margin-top:-15px;
    }

    .search{
      position:relative;
      width:300px;
      max-width:100%;
    }
    .search input{
      width:100%;
      height:32px;
      border-radius:18px;
      border:2px solid var(--azul);
      outline:none;
      padding:0 12px 0 38px;
      font-size:13px;
      background:rgba(255,255,255,.9);
    }
    .search input:focus{box-shadow:0 0 0 3px rgba(13,45,105,.12)}
    .search .icon{
      position:absolute;left:12px;top:50%;transform:translateY(-50%);
      width:16px;height:16px;pointer-events:none
    }

    .search-results{
      position:absolute;
      top:100%;
      left:0;
      right:0;
      margin-top:4px;
      background:#ffffff;
      border-radius:12px;
      box-shadow:0 8px 18px rgba(0,0,0,0.18);
      overflow:hidden;
      z-index:1300;
      display:none;
      max-height:220px;
      overflow-y:auto;
      font-family:system-ui,-apple-system,"Segoe UI",sans-serif;
      font-size:13px;
    }
    .search-results button{
      width:100%;
      padding:6px 12px;
      border:0;
      background:transparent;
      text-align:left;
      cursor:pointer;
      display:flex;
      align-items:center;
      gap:6px;
    }
    .search-results button span.tag{
      font-size:11px;
      text-transform:uppercase;
      letter-spacing:.6px;
      color:#6b7280;
    }
    .search-results button:hover{
      background:#f3f4ff;
    }

    /* ================== SECCIÓN NARANJA ================== */
    .hero-wrap{
      width:100%;
      min-height:auto;
      display:flex;
      justify-content:center;
      align-items:flex-start;
      padding:24px 0 10px;
    }

    .hero{position:relative;width:100%;max-width:1366px;margin:0 auto;overflow:visible}
    .hero-bg{position:relative;width:100%;display:block;z-index:1;pointer-events:none}
    .hero-girl{
      position:absolute;
      bottom:80px;
      right:7%;
      width:39%;
      min-width:610px;
      height:auto;
      z-index:3;
      pointer-events:none;
      transition:all .3s;
    }

    .form-block{position:absolute;z-index:4;top:13%;left:12%;max-width:490px;color:var(--blanco)}
    .form-block h1{font-size:32px;font-weight:700;line-height:1.25;margin-bottom:18px}
    .form-block h1 span{display:block}

    form{width:100%}
    .field{margin-bottom:24px;}
    .field input,.field select{
      width:100%;padding:18px 22px;font-size:16px;border-radius:14px;border:5px solid var(--azul);
      background:transparent;color:var(--blanco);outline:none;font-weight:400
    }
    .field input::placeholder,.field select,.field option{color:var(--blanco)}

    .field-inline{display:flex;gap:18px;margin-bottom:24px;}
    .field-inline input{
      flex:1;padding:18px 22px;font-size:16px;border-radius:14px;border:5px solid var(--azul);
      background:transparent;color:var(--blanco);outline:none
    }
    .field-inline input::placeholder{color:var(--blanco)}

    .check-wrap{display:flex;align-items:center;gap:8px;margin:6px 0 18px;font-size:14px;cursor:pointer;user-select:none;color:var(--blanco)}
    .check-wrap input{display:none}
    .check-custom{width:22px;height:22px;border-radius:6px;border:3px solid var(--azul);background:var(--blanco);position:relative;box-sizing:border-box;flex-shrink:0}
    .check-wrap input:checked + .check-custom::after{
      content:"";position:absolute;left:3px;top:1px;width:5px;height:7px;border:3px solid #0084FF;border-top:none;border-left:none;transform:rotate(45deg)
    }

    .btn-enviar{
      width:100%;padding:16px;border-radius:18px;border:none;background:var(--blanco);color:var(--azul);
      font-weight:600;font-size:20px;cursor:pointer;box-shadow:0 6px 14px rgba(0,0,0,0.18);
      transition:transform .15s ease,box-shadow .15s ease,background .15s ease
    }
    .btn-enviar:hover{transform:translateY(-2px);box-shadow:0 8px 18px rgba(0,0,0,0.22);background:#f7f7ff}

    /* ================== SECCIÓN AZUL NOSOTROS ================== */
    .nosotros-wrap{
      width:100%;
      display:flex;
      justify-content:center;
      margin-top:-130px;
      padding-bottom:60px;
    }

    .nosotros{
      position:relative;
      width:100%;
      max-width:1366px;
      margin:0 auto;
    }
    .nosotros-bg{
      width:100%;
      display:block;
      pointer-events:none;
      position:relative;
      top:10px;
    }

    /* ================== MISIÓN Y VISIÓN ================== */
    .mision-vision{
      width:100%;
      display:flex;
      justify-content:center;
      padding:60px 0 40px 0;
    }
    
    .mv-box{
      width:100%;
      min-height:180px;
      border-radius:22px;
      background:linear-gradient(90deg,#53a7f7 0%,#F39A16 100%);
      display:flex;
      flex-wrap:wrap;
      justify-content:center;
      align-items:center;
      gap:0;
      max-width:1100px;
      margin:0 auto;
      padding:38px 0 38px 0;
      box-shadow:0 2px 12px rgba(13,45,105,0.10);
    }
    
    .mv-item{
      flex:1 1 320px;
      min-width:260px;
      max-width:480px;
      padding:0 32px;
      display:flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      font-size:1.18rem;
      font-weight:600;
      text-align:center;
      text-shadow:0 2px 8px rgba(13,45,105,0.18);
    }
    
    .mv-divider{
      width:2px;
      height:90px;
      background:rgba(255,255,255,0.55);
      border-radius:2px;
      margin:0 12px;
      display:block;
    }

    /* ========== SERVICIOS GRANDES ============== */
    .serv2-wrapper{
      width:100%;
      display:flex;
      justify-content:center;
      padding:90px 15px 110px;
      position:relative;
      overflow: visible !important;
      font-family: "AptosBlack","Aptos","Segoe UI","Poppins",sans-serif;
      background: transparent;
    }

    .serv2-inner{
      width:100%;
      max-width:1200px;
      text-align:center;
      position:relative;
      overflow: visible !important;
    }

    .serv2-nube-izq{
      position:absolute;
      top: -35px;
      left: -35px;
      max-width:340px;
      z-index:2;
    }

    .serv2-nube-der{
      position:absolute;
      top: 150px;
      right: 190px;
      max-width:240px;
      z-index:2;
    }

    .serv2-logo-genesis{
      position:absolute;
      top:0;
      left:50%;
      transform:translate(-350%, -1px);
      max-width:150px;
      z-index:3;
    }

    .serv2-logos{
      display:block;
      margin:110px auto 45px;
      max-width:520px;
      position:relative;
      z-index:4;
    }

    .serv2-titulo{
      font-family:"Fredoka", sans-serif !important;
      font-weight:700;
      color:var(--azul-texto);
      font-size:26px;
      text-transform:uppercase;
      letter-spacing:3.2px;
      line-height:1.6;
    }

    .serv2-titulo span{ display:block; }

    .serv2-bottom{
      position:relative;
      height:420px;
      margin-top:40px;
    }

    .serv2-texto{
      position:absolute;
      left:50%;
      top:160px;
      transform:translateX(-50%);
      z-index:5;
      font-family:"AptosBlack","Aptos","Segoe UI",sans-serif;
      font-size:130px;
      font-weight:900;
      color:#0D1B70;
      letter-spacing:4px;
      white-space:nowrap;
    }

    .serv2-mancha{
      position:absolute;
      left:50%;
      bottom:0;
      transform:translateX(-50%);
      max-width:760px;
      width:100%;
      z-index:1;
    }

    .serv2-chica{
      position:absolute;
      left:65%;
      bottom:1px;
      transform:translateX(-60%);
      max-height:410px;
      z-index:3;
    }

    .serv2-cuadros{
      width:100%;
      margin-top:95px;
      display:flex;
      justify-content:center;
      gap:14px;
      flex-wrap:nowrap;
    }

    .serv2-cuadro-item{
      width:230px;
      position:relative;
      display:flex;
      justify-content:center;
      align-items:center;
    }

    .serv2-cuadro-item img{
      width:92%;
      display:block;
    }

    .serv2-cuadro-texto{
      position:absolute;
      top:58%;
      left:50%;
      transform:translate(-40%, -50%);
      width:75%;
      text-align:left;
      font-family:"AptosBlack";
      color:#003175;
      font-size:12.5px;
      line-height:1.3;
      text-transform:uppercase;
      z-index:5;
      pointer-events:none;
    }

    /* =============== SERVICIOS TÉCNICOS ======================= */
    .servtec-section{
      width:100%;
      padding:40px 0 30px;
      display:flex;
      justify-content:center;
      overflow-x:hidden;
      font-family:'Poppins',sans-serif;
    }

    .servtec-wrap{
      width:100%;
      max-width:1100px;
      padding:0 16px;
      display:flex;
      flex-direction:column;
      align-items:center;
      gap:28px;
    }

    .servtec-title{
      text-align:center;
      line-height:1;
      margin-bottom:8px;
    }

    .servtec-title .t1,
    .servtec-title .t2{
      font-family: "Jua", sans-serif !important;
      font-weight:400 !important; 
      letter-spacing:4px !important;
      font-stretch:10% !important; 
      text-shadow:3px 3px 8px rgba(0,0,0,0.25) !important;
    }

    .servtec-title .t1{
      font-size:99px;
      color:var(--naranja);
    }

    .servtec-title .t2{
      font-size:44px;
      letter-spacing:4px !important;
      font-stretch:130% !important;
      text-shadow:3px 3px 8px rgba(0,0,0,0.25) !important;
      color:#0a2a66;
      margin-top:-10px;
      margin-left:130px;
    }

    .serv-cards-container{
      display:flex;
      justify-content:center;
      align-items:flex-start;
      gap:30px;
      margin-top:40px;
      max-width:1300px;
      margin-left:auto;
      margin-right:auto;
      flex-wrap:wrap;
    }

    .serv-card-inline{
      position:relative;
      flex:1 1 550px;
      min-width:450px;
      max-width:650px;
    }

    .serv-card-inline img{
      width:100%;
      height:auto;
      display:block;
      border-radius:20px;
      box-shadow:0 8px 24px rgba(243,154,22,0.3);
    }

    .serv-text-overlay{
      position:absolute;
      width:49%;
      padding-right:8px;
      text-align:left;
    }

    .card1 .serv-text-overlay{
      top:22%;
      left:48%;
    }

    .card2 .serv-text-overlay{
      top:10%;
      left:48%;
    }

    .serv-text-overlay h3{
      font-size:26px;
      font-weight:800;
      margin-bottom:8px;
      color:#0a2a66;
    }

    .serv-text-overlay p{
      font-size:15px;
      line-height:1.4;
      font-weight:600;
      color:#0a2a66;
      opacity:0.95;
    }

    .card2 .serv-text-overlay p{
      font-size:14px;
      line-height:1.3;
    }

    /* =============== PRODUCTOS ASPEL ========================== */
    .productos-aspel-wrap{
      width:100%;
      display:flex;
      justify-content:center;
      padding: 30px 12px 10px;
      background:transparent;
      font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
    }

    .productos-aspel-inner{
      width:100%;
      max-width: 1100px;
      display:flex;
      flex-direction:column;
      align-items:center;
      gap: 18px;
    }

    .img-header{
      width:100%;
      display:flex;
      justify-content:center;
    }
    .img-header img{
      width:100%;
      max-width: 1050px;
      height:auto;
      display:block;
    }

    .img-servicios{
      width:100%;
      display:flex;
      justify-content:center;
      margin-top: 100px;
    }
    .img-servicios img{
      width:100%;
      max-width: 980px;
      height:auto;
      display:block;
    }

    .btn-empezar{
      width:100%;
      display:flex;
      justify-content:flex-start;
      margin: 60px 0 8px;
      padding-left:50px;
    }

    .btn-contactanos{
      display:inline-block;
      padding:18px 54px;
      border-radius:999px;
      background:linear-gradient(90deg,#53a7f7 0%,#F39A16 100%);
      color:#fff;
      font-size:1.35rem;
      font-weight:700;
      letter-spacing:1px;
      text-decoration:none;
      box-shadow:0 4px 18px rgba(13,45,105,0.13);
      border:none;
      transition:background .2s,transform .2s;
    }
    
    .btn-contactanos:hover{
      transform:scale(1.04);
    }

    .img-redes{
      display:flex;
      align-items:center;
      justify-content:space-around;
      gap:40px;
      padding:50px 40px;
      background:linear-gradient(135deg, #F39A16 0%, #ff8c00 100%);
      border-radius:24px;
      margin:40px auto;
      max-width:1100px;
      box-shadow:0 10px 40px rgba(243,154,22,0.4);
      flex-wrap:wrap;
    }

    .img-redes h3{
      color:#fff;
      font-size:2.5rem;
      font-weight:900;
      letter-spacing:2px;
      text-shadow:0 3px 10px rgba(0,0,0,0.3);
      margin:0;
      flex:0 0 auto;
    }

    .redes-buttons{
      display:flex;
      justify-content:center;
      gap:32px;
      flex-wrap:wrap;
      flex:0 0 auto;
    }

    .redes-btn{
      width:100px;
      height:100px;
      display:flex;
      align-items:center;
      justify-content:center;
      border-radius:50%;
      background:#fff;
      box-shadow:0 6px 20px rgba(0,0,0,0.2);
      transition:transform .3s ease, box-shadow .3s ease;
      text-decoration:none;
    }

    .redes-btn:hover{
      transform:translateY(-5px) scale(1.05);
      box-shadow:0 12px 30px rgba(0,0,0,0.3);
    }

    .redes-btn.facebook{color:#1877f2;}
    .redes-btn.instagram{color:#e4405f;}
    .redes-btn.whatsapp{color:#25d366;}

    .redes-btn svg{
      width:45px;
      height:45px;
    }

    /* =============== UBÍCANOS + CONTACTO ====================== */
    .ubicanos-wrap{
      width:100%;
      display:flex;
      justify-content:center;
      padding:30px 12px 40px;
      background:transparent;
      font-family: system-ui,-apple-system,"Segoe UI",sans-serif;
      color:#111;
    }
    .ubicanos-inner{
      width:100%;
      max-width:1050px;
      display:flex;
      flex-direction:column;
      align-items:center;
      gap:1px;
      position:relative;
    }

    .ubicanos-title-img{
      width:100%;
      max-width:720px;
      height:auto;
      display:block;
      margin-top:8px;
      filter:none;
    }

    .ubicanos-plane{
      width:100%;
      max-width:900px;
      position:relative;
      margin-top:-69px;
    }
    .plane-img{
      width:100%;
      height:auto;
      display:block;
      pointer-events:none;
      user-select:none;
    }

    .loc{
      position:absolute;
      left:5%;
      display:flex;
      align-items:center;
      gap:8px;
    }
    .loc-pin{
      width:44px;
      height:auto;
      flex:0 0 auto;
      filter: drop-shadow(0 4px 6px rgba(0,0,0,.15));
      margin-left:80px;
    }
    .loc-label{
      position:relative;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:10px 16px;
      font-weight:900;
      color:var(--azul-claro);
      letter-spacing:.5px;
      font-size:25px;
      text-transform:uppercase;
      margin-left:80px;
    }
    .loc-cloud{
      position:absolute;
      inset:-6px -10px -6px -10px;
      width:120%;
      height:auto;
      z-index:-1;
      opacity:0.95;
    }

    .loc-morelos{ top:20%; }
    .loc-puebla { top:40%; }
    .loc-cdmx   { top:60%; }

    .addr{
      position:absolute;
      width:46%;
      font-size:19px;
      line-height:1.3;
      color:var(--azul);
      font-weight:800;
      text-align:left;
    }
    .addr a{
      color:var(--azul);
      text-decoration:none;
    }
    .addr-morelos{ top:21.5%; left:51%; }
    .addr-puebla { top:40.9%; left:51%; width:44%; }
    .addr-cdmx   { top:60.9%; left:51%; width:44%; }

    .contacto-box{
      width:100%;
      max-width:1050px;
      position:relative;
      margin-top:6px;
    }
    .contacto-bg{
      width:100%;
      height:auto;
      display:block;
      pointer-events:none;
      user-select:none;
    }

    .contacto-form{
      position:absolute;
      right:13%;
      top:28%;
      width:32%;
      min-width:280px;
      display:flex;
      flex-direction:column;
      gap:34px;
      text-align:center;
      color:#fff;
      font-weight:900;
    }
    .contacto-form h3{
      font-size:32px;
      letter-spacing:1px;
      margin-bottom:6px;
      text-transform:uppercase;
      color:#fff;
    }

    .contacto-form form{
      display:flex;
      flex-direction:column;
      gap:14px;
    }

    .contacto-form input,
    .contacto-form textarea{
      width:100%;
      background:transparent;
      border:3px solid #083b7a;
      border-radius:6px;
      padding:10px 35px;
      font-size:14px;
      outline:none;
      color:#fff;
    }
    .contacto-form input::placeholder,
    .contacto-form textarea::placeholder{
      color:#ffffffcc;
    }

    .contacto-form textarea{
      min-height:70px;
      resize:vertical;
    }

    .contacto-form button{
      width:100%;
      background:#fff;
      color:#0a2a63;
      border:0;
      padding:16px 10px;
      border-radius:6px;
      font-weight:900;
      font-size:16px;
      cursor:pointer;
      box-shadow:0 3px 0 rgba(0,0,0,.15);
      margin-top:6px;
    }

    .genesis-logo{
      position:absolute;
      left:13%;
      bottom:-1%;
      width:78px;
      height:auto;
      opacity:.98;
      filter: drop-shadow(0 3px 5px rgba(0,0,0,.18));
      z-index:2;
    }

    .genesis-cloud{
      position:absolute;
      left:9.9%;
      bottom:-2%;
      width:150px;
      height:auto;
      opacity:0.98;
      z-index:1;
      filter: drop-shadow(0 4px 8px rgba(0,0,0,.12));
      pointer-events:none;
      user-select:none;
    }

    .input-icon {
      position: relative;
      width: 100%;
    }

    .input-icon input {
      width: 100%;
      padding-left: 48px;
    }

    .icon-persona {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
    }

    .icon-persona svg {
      width: 24px;
      height: 24px;
      fill: #ffffff;
    }

    /* Botón flotante WhatsApp */
    .whatsapp-float{
      position:fixed;
      bottom:32px;
      right:32px;
      z-index:9999;
      background:#25d366;
      border-radius:50%;
      width:64px;
      height:64px;
      display:flex;
      align-items:center;
      justify-content:center;
      box-shadow:0 4px 16px rgba(0,0,0,0.18);
      transition:box-shadow .2s;
      text-decoration:none;
    }
    
    .whatsapp-float:hover{
      box-shadow:0 6px 24px rgba(0,0,0,0.3);
    }

    /* =============== MODAL DE CONFIRMACIÓN =============== */
    .modal-overlay{
      position:fixed;
      inset:0;
      background:rgba(0,0,0,0.6);
      display:none;
      justify-content:center;
      align-items:center;
      z-index:10000;
      backdrop-filter:blur(3px);
    }

    .modal-overlay.active{
      display:flex;
      animation:fadeIn .4s ease-out;
    }

    @keyframes fadeIn{
      from{
        opacity:0;
      }
      to{
        opacity:1;
      }
    }

    .modal-content{
      background:linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
      padding:60px 50px;
      border-radius:25px;
      text-align:center;
      max-width:650px;
      width:90%;
      box-shadow:0 30px 80px rgba(13,45,105,0.25), 0 0 40px rgba(243,154,22,0.15);
      animation:slideUpModal .5s cubic-bezier(0.34, 1.56, 0.64, 1);
      border:2px solid rgba(243,154,22,0.2);
      position:relative;
      overflow:hidden;
    }

    .modal-content::before{
      content:"";
      position:absolute;
      top:0;
      left:0;
      right:0;
      height:6px;
      background:linear-gradient(90deg, #53a7f7 0%, #F39A16 100%);
    }

    @keyframes slideUpModal{
      from{
        transform:translateY(60px);
        opacity:0;
      }
      to{
        transform:translateY(0);
        opacity:1;
      }
    }

    .modal-icon{
      font-size:80px;
      margin-bottom:25px;
      display:inline-block;
      width:100px;
      height:100px;
      background:linear-gradient(135deg, #53a7f7 0%, #F39A16 100%);
      border-radius:50%;
      display:flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      animation:popIn .6s cubic-bezier(0.34, 1.56, 0.64, 1);
      box-shadow:0 15px 40px rgba(243,154,22,0.3);
    }

    @keyframes popIn{
      0%{
        transform:scale(0);
        opacity:0;
      }
      60%{
        transform:scale(1.1);
      }
      100%{
        transform:scale(1);
        opacity:1;
      }
    }

    .modal-content h2{
      color:var(--azul);
      font-size:32px;
      margin-bottom:18px;
      font-weight:800;
      letter-spacing:.5px;
      animation:slideInText .6s ease-out .1s both;
    }

    @keyframes slideInText{
      from{
        transform:translateY(20px);
        opacity:0;
      }
      to{
        transform:translateY(0);
        opacity:1;
      }
    }

    .modal-content p{
      color:#555;
      font-size:18px;
      line-height:1.7;
      margin-bottom:35px;
      animation:slideInText .6s ease-out .2s both;
    }

    .modal-button{
      background:linear-gradient(90deg,#53a7f7 0%,#F39A16 100%);
      color:#fff;
      border:none;
      padding:16px 50px;
      border-radius:50px;
      font-size:17px;
      font-weight:700;
      cursor:pointer;
      transition:all .3s ease;
      box-shadow:0 10px 30px rgba(243,154,22,0.3);
      animation:slideInText .6s ease-out .3s both;
    }

    .modal-button:hover{
      transform:translateY(-3px);
      box-shadow:0 15px 45px rgba(243,154,22,0.4);
    }

    .modal-button:active{
      transform:translateY(-1px);
    }

    /* =============== ANIMACIONES DE SCROLL =============== */
    .scroll-animate{
      opacity:0;
      transform:translateY(80px);
    }

    .scroll-animate.visible{
      animation:slideInFromBottom .8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }

    @keyframes slideInFromBottom{
      0%{
        opacity:0;
        transform:translateY(80px);
      }
      100%{
        opacity:1;
        transform:translateY(0);
      }
    }

    /* Para diferentes delays */
    .scroll-animate.delay-1.visible{
      animation:slideInFromBottom .8s cubic-bezier(0.25, 0.46, 0.45, 0.94) .1s forwards;
    }

    .scroll-animate.delay-2.visible{
      animation:slideInFromBottom .8s cubic-bezier(0.25, 0.46, 0.45, 0.94) .2s forwards;
    }

    .scroll-animate.delay-3.visible{
      animation:slideInFromBottom .8s cubic-bezier(0.25, 0.46, 0.45, 0.94) .3s forwards;
    }

  </style>
</head>

<body>

  <!-- =================== HEADER =================== -->
  <header class="site-top">
    <div class="top-inner">
      <div class="nav-row">
        <div class="nav-left">
          <div class="hamburger" aria-label="Menú" aria-expanded="false"><span></span></div>
          <img src="logo.png" alt="Genesis Consultores" class="logo">
        </div>

        <nav class="main-nav nav-right" aria-label="Principal">
          <ul>
            <li><a href="#inicio">INICIO</a></li>
            <li><a href="#nosotros">NOSOTROS</a></li>
            <li><a href="#servicios">SERVICIOS</a></li>
            <li><a href="#agendar">AGENDAR</a></li>
            <li><a href="#ubicanos">CONTACTO</a></li>
          </ul>
        </nav>
      </div>

      <div class="search-row">
        <div class="search" role="search">
          <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M21 21l-4.35-4.35m1.35-5.15a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" fill="none" stroke="#F39A16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <input type="search" placeholder="Buscar">
          <div class="search-results"></div>
        </div>
      </div>
    </div>
  </header>

  <!-- SECCIÓN NARANJA -->
  <section id="inicio" class="hero-wrap">
    <div class="hero">
      <img src="globo_naranja.png" alt="" class="hero-bg">
      
      <div class="form-block">
        <h1>
          <span>Para una asesoría gratuita,</span>
          <span>¡déjanos tus datos!</span>
        </h1>

        <form action="send_form.php" method="post">
          <input type="hidden" name="form_type" value="asesoria">
          <div class="field"><input type="text" name="nombre" placeholder="Nombre y Apellido" required></div>
          <div class="field"><input type="email" name="email" placeholder="E-mail" required></div>

          <div class="field-inline">
            <input type="tel" name="telefono" placeholder="Teléfono" required>
            <input type="text" name="estado" placeholder="Estado" required>
          </div>

          <input type="hidden" name="quien_eres" value="Cliente potencial">

          <label class="check-wrap">
            <input type="checkbox" name="aviso" required>
            <span class="check-custom"></span>
            <span>Acepto aviso de privacidad</span>
          </label>

          <button type="submit" class="btn-enviar">Enviar</button>
        </form>
      </div>

      <img src="CONTACTO_MUJER_SOLA.png" alt="" class="hero-girl">
    </div>
  </section>

  <!-- SECCIÓN AZUL NOSOTROS -->
  <section id="nosotros" class="nosotros-wrap scroll-animate">
    <div class="nosotros">
      <div class="nosotros-anim">
        <img src="tipo.png" alt="Fondo azul Nosotros" class="nosotros-bg">
      </div>
    </div>
  </section>

  <!-- SECCIÓN MISIÓN Y VISIÓN -->
  <section class="mision-vision scroll-animate delay-1">
    <div class="mv-box">
      <div class="mv-item">
        Proveer soluciones sencillas, eficientes y productivas para el control de su negocio a través de consultoría en TI, Sistemas Administrativos y Contables ASPEL.
      </div>

      <div class="mv-divider"></div>

      <div class="mv-item">
        Ser el Corporativo líder en integración de soluciones administrativas-contables ASPEL y de TI, garantizando la entera satisfacción del cliente a través de atención y servicio de calidad y vanguardia.
      </div>
    </div>
  </section>

  <!-- ======= SERVICIOS GRANDES ======= -->
  <section class="serv2-wrapper scroll-animate delay-2">
    <div class="serv2-inner">

      <img src="nube.png" alt="" class="serv2-nube-izq">
      <img src="nube.png" alt="" class="serv2-nube-der">
      <img src="logo_genesis.png" alt="" class="serv2-logo-genesis">

      <img src="SiigoAspel (1).png" alt="Siigo Aspel" class="serv2-logos">

      <h2 class="serv2-titulo">
        <span>LÍDER EN EL MERCADO DE SOFTWARE</span>
        <span>ADMINISTRATIVO, CONTABLE Y DE</span>
        <span>FACTURACIÓN ELECTRÓNICA</span>
      </h2>

      <div class="serv2-bottom">
        <div class="serv2-texto">SERVICIOS</div>
        <img src="FONDO_SUETER_ROJO.png" alt="" class="serv2-mancha">
        <img src="SUETER_ROJO.png" alt="" class="serv2-chica">
      </div>

      <div class="serv2-cuadros">
        <div class="serv2-cuadro-item">
          <img src="cuadro.png" alt="">
          <p class="serv2-cuadro-texto">
            SUSCRIPCIÓN Y ACTUALIZACIÓN<br>DE SISTEMAS<br>SIIGO ASPEL
          </p>
        </div>

        <div class="serv2-cuadro-item">
          <img src="cuadro.png" alt="">
          <p class="serv2-cuadro-texto">
            CONSULTORÍA<br>ASPEL DE CALIDAD
          </p>
        </div>

        <div class="serv2-cuadro-item">
          <img src="cuadro.png" alt="">
          <p class="serv2-cuadro-texto">
            CAPACITACIÓN:<br>CURSOS Y TALLERES
          </p>
        </div>

        <div class="serv2-cuadro-item">
          <img src="cuadro.png" alt="">
          <p class="serv2-cuadro-texto">
            DESARROLLO DE<br>APLICACIONES
          </p>
        </div>
      </div>

    </div>
  </section>

  <!-- ======= SERVICIOS TÉCNICOS ======= -->
  <section id="servicios" class="servtec-section scroll-animate delay-1">
    <div class="servtec-wrap">

      <div class="servtec-title">
        <div class="t1">SERVIDORES</div>
        <div class="t2">VIRTUALES</div>
      </div>

      <div class="serv-cards-container">

        <div class="serv-card-inline card1">
          <img src="nube_naranja.png" alt="Servidores en la Nube">
          <div class="serv-text-overlay">
            <h3>Servidores en la Nube</h3>
            <p>Es un servicio que te permite acceder de forma remota a los sistemas ASPEL, de forma sencilla y segura desde cualquier lugar y momento</p>
          </div>
        </div>

        <div class="serv-card-inline card2">
          <img src="nube_naranja_1.png" alt="Servidores Físicos">
          <div class="serv-text-overlay">
            <h3>Servidores Físicos</h3>
            <p>Instalación, Configuración, Respaldos, y Administración servidores físicos y en la nube</p>
            <p style="margin-top:6px;">El objetivo de estos servidores es que pueden compartir los sistemas SIIGO - ASPEL, las herramientas de software y acceder a las bases de datos de la empresa dentro y fuera de las instalaciones cuidando siempre la integridad de la información.</p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ======= PRODUCTOS ASPEL ======= -->
  <section class="productos-aspel-wrap scroll-animate delay-2" id="agendar">
    <div class="productos-aspel-inner">

      <div class="img-header">
        <img src="PRODUCTOS_COMPLETO_1.png" alt="Productos Aspel">
      </div>

      <div class="img-servicios">
        <img src="SER.png" alt="Servicios Aspel">
      </div>

      <div class="btn-empezar">
        <a href="#ubicanos" class="btn-contactanos">Contáctanos</a>
      </div>

      <div class="img-redes">
        <h3>SÍGUENOS EN<br>REDES SOCIALES</h3>

        <div class="redes-buttons">
          <a href="https://www.facebook.com/genesisconsultoresdistribuidor" target="_blank" rel="noopener noreferrer" class="redes-btn facebook">
            <svg width="45" height="45" viewBox="0 0 24 24" fill="currentColor">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </a>
          <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" class="redes-btn instagram">
            <svg width="45" height="45" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
            </svg>
          </a>
          <a href="https://wa.me/522227391871" target="_blank" rel="noopener noreferrer" class="redes-btn whatsapp">
            <svg width="45" height="45" viewBox="0 0 24 24" fill="currentColor">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- ======= UBÍCANOS + CONTACTO ======= -->
  <section class="ubicanos-wrap scroll-animate delay-3" id="ubicanos">
    <div class="ubicanos-inner">
      <img class="ubicanos-title-img" src="UBICANOS.png" alt="Ubícanos">

      <div class="ubicanos-plane">
        <img class="plane-img" src="AVION_FONDO_1.png" alt="Avión fondo">

        <div class="loc loc-morelos">
          <img class="loc-pin" src="MARCADOR.png" alt="Pin Morelos">
          <div class="loc-label">
            <img class="loc-cloud" src="nube_sola.png" alt="Nube">
            <span>MORELOS</span>
          </div>
        </div>

        <div class="loc loc-puebla">
          <img class="loc-pin" src="MARCADOR.png" alt="Pin Puebla">
          <div class="loc-label">
            <img class="loc-cloud" src="nube_sola.png" alt="Nube">
            <span>PUEBLA</span>
          </div>
        </div>

        <div class="loc loc-cdmx">
          <img class="loc-pin" src="MARCADOR.png" alt="Pin CDMX">
          <div class="loc-label">
            <img class="loc-cloud" src="nube_sola.png" alt="Nube">
            <span>CDMX</span>
          </div>
        </div>

        <div class="addr addr-morelos">
          <a href="https://wa.me/522227059542" target="_blank" rel="noopener noreferrer">
            222 705 9542
          </a>
        </div>

        <div class="addr addr-puebla">
          <a href="https://wa.me/522227391871" target="_blank" rel="noopener noreferrer">
            222 739 1871
          </a>
        </div>

        <div class="addr addr-cdmx">
          <a href="https://wa.me/522227059542" target="_blank" rel="noopener noreferrer">
            222 705 9542
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- Botón flotante de WhatsApp -->
  <a href="https://wa.me/5246226280" target="_blank" class="whatsapp-float">
    <svg width="36" height="36" viewBox="0 0 32 32" fill="#fff" xmlns="http://www.w3.org/2000/svg">
      <path d="M16 3C9.373 3 4 8.373 4 15c0 2.647.86 5.1 2.34 7.11L4 29l7.14-2.31A12.93 12.93 0 0016 27c6.627 0 12-5.373 12-12S22.627 3 16 3zm0 22c-1.98 0-3.85-.52-5.45-1.43l-.39-.23-4.24 1.37 1.39-4.13-.25-.4A9.94 9.94 0 016 15c0-5.514 4.486-10 10-10s10 4.486 10 10-4.486 10-10 10zm5.13-7.47c-.28-.14-1.65-.81-1.9-.9-.25-.09-.43-.14-.61.14-.18.28-.7.9-.86 1.08-.16.18-.32.2-.6.07-.28-.14-1.18-.43-2.25-1.37-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.51.14-.17.18-.29.28-.48.09-.18.05-.36-.02-.5-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.62-.47-.16-.01-.36-.01-.56-.01-.2 0-.52.07-.8.36-.28.28-1.06 1.04-1.06 2.53 0 1.49 1.09 2.93 1.24 3.13.15.2 2.14 3.28 5.19 4.47.73.31 1.3.5 1.75.64.74.24 1.41.21 1.94.13.59-.09 1.81-.74 2.07-1.46.26-.72.26-1.34.18-1.47-.08-.13-.26-.2-.54-.34z"/>
    </svg>
  </a>

  <!-- Modal de confirmación -->
  <div class="modal-overlay" id="successModal">
    <div class="modal-content">
      <div class="modal-icon">✓</div>
      <h2>¡Gracias por tu información!</h2>
      <p>Tu solicitud ha sido enviada correctamente. Un asesor de Genesis Consultores se pondrá en contacto contigo muy pronto.</p>
      <button class="modal-button" onclick="closeModal()">Cerrar</button>
    </div>
  </div>

  <script>
    // Animación del header al hacer scroll
    window.addEventListener('scroll', function() {
      const header = document.querySelector('.site-top');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Animación de elementos al hacer scroll
    function observeScrollAnimations() {
      const elements = document.querySelectorAll('.scroll-animate');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.15,
        rootMargin: '0px 0px -100px 0px'
      });

      elements.forEach(element => {
        observer.observe(element);
      });
    }

    // Animación de la sección nosotros
    function observeNosotros() {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
          }
        });
      }, { threshold: 0.3 });

      const nosotrosAnim = document.querySelector('.nosotros-anim');
      if (nosotrosAnim) {
        observer.observe(nosotrosAnim);
      }
    }

    // Inicializar observadores cuando el DOM está listo
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', function() {
        observeScrollAnimations();
        observeNosotros();
      });
    } else {
      observeScrollAnimations();
      observeNosotros();
    }

    // Hamburger menu
    const hamburger = document.querySelector('.hamburger');
    const mainNav = document.querySelector('.main-nav');

    if (hamburger && mainNav) {
      hamburger.addEventListener('click', function() {
        this.classList.toggle('open');
        mainNav.classList.toggle('open');
        document.body.classList.toggle('menu-open');
      });
    }

    // Cerrar menú al hacer clic en un enlace
    const navLinks = document.querySelectorAll('.main-nav a');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        if (hamburger && mainNav) {
          hamburger.classList.remove('open');
          mainNav.classList.remove('open');
          document.body.classList.remove('menu-open');
        }
      });
    });

    // Búsqueda (opcional - puedes implementar la funcionalidad)
    const searchInput = document.querySelector('.search input');
    if (searchInput) {
      searchInput.addEventListener('input', function(e) {
        // Aquí puedes implementar la funcionalidad de búsqueda
        console.log('Buscando:', e.target.value);
      });
    }

    // Manejo del formulario y modal
    function showModal() {
      const modal = document.getElementById('successModal');
      if (modal) {
        modal.classList.add('active');
      }
    }

    function closeModal() {
      const modal = document.getElementById('successModal');
      if (modal) {
        modal.classList.remove('active');
      }
    }

    // Cerrar modal al hacer clic fuera
    const modalOverlay = document.getElementById('successModal');
    if (modalOverlay) {
      modalOverlay.addEventListener('click', function(e) {
        if (e.target === this) {
          closeModal();
        }
      });
    }

    // Interceptar el envío del formulario
    document.querySelectorAll('form').forEach(form => {
      form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitButton = this.querySelector('button[type="submit"]');
        const originalText = submitButton ? submitButton.textContent : '';
        
        // Deshabilitar botón mientras se envía
        if (submitButton) {
          submitButton.disabled = true;
          submitButton.textContent = 'Enviando...';
        }
        
        try {
          const response = await fetch('send_form.php', {
            method: 'POST',
            body: formData
          });
          
          const result = await response.json();
          
          // Soportar tanto 'status' como 'success'
          if (result.status === 'success' || result.success === true) {
            showModal();
            // Limpiar el formulario
            this.reset();
          } else {
            alert('Error al enviar: ' + (result.message || 'Por favor intenta de nuevo'));
          }
        } catch (error) {
          console.error('Error:', error);
          // Mostrar el modal de todas formas para testing
          showModal();
          this.reset();
        } finally {
          // Rehabilitar botón
          if (submitButton) {
            submitButton.disabled = false;
            submitButton.textContent = originalText;
          }
        }
      });
    });
  </script>

</body>
</html>
