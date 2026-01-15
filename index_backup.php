<!DOCTYPE html> 
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario Genesis Consultores</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fuente -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- TIPOGRAF0ˆ1A TIPO APTOS BLACK (para el bloque nuevo) -->
  <style>
    @font-face {
        font-family: "AptosBlack";
        src: local("Aptos Black"), local("AptosBlack"), local("Segoe UI Black");
        font-weight: 900;
    }

    /* Contenedor para animar tipo.png al hacer scroll */
    .nosotros-anim{
      overflow:visible;
      opacity:0;
      transform:translateY(60px); /* empieza un poco abajo */
    }

    /* Cuando entra en pantalla (scroll) */
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
  </style>
  

  <!-- ”9è3 FUENTES FREDOKA + JUA (Servicios t¨¦cnicos) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Jua&display=swap" rel="stylesheet">

  <style>
    :root{
      --azul:#0D2D69;
      --naranja:#F39A16;
      --blanco:#ffffff;
      --gris-borde:#E7ECF3;
      --texto:#0D2D69;

      /* Para el bloque grande de servicios */
      --azul-texto: #0085e0;

      /* Ub¨ªcanos */
      --azul-claro:#2e76ff;
    }

    *{box-sizing:border-box;margin:0;padding:0}
    html{scroll-behavior:smooth}

    /* Fondo en TODO el sitio (tambi¨¦n header) */
    body{
      font-family: "Fun City Level 3 Basic", sans-serif;
      color:var(--texto);
      background-image:url('fondooo.jpg');
      background-size:cover;
      background-position:center;
      background-repeat:no-repeat;          /* sin fixed para que no se trabe */
    }

    /* FONDO SOLO EN VERSI0ˆ7N M0ˆ7VIL */
    @media (max-width:600px){
      body{
        background-image:url('fondooo.jpg') !important;
        background-size:cover !important;
        background-position:center !important;
        background-repeat:no-repeat !important;
        background-attachment:scroll !important;
      }
    }

    
    #preloader{
      position:fixed;
      inset:0;
      background:#001a3d;
      display:flex;
      justify-content:center;
      align-items:center;
      z-index:99999;
      transition:opacity .6s ease;
    }
    #preloader video{
      width:100%;
      height:100%;
      object-fit:cover;
    }

    /* 7²3 Mostrar uno u otro seg¨²n el dispositivo */
    .video-desktop{
      display:block;
    }
    .video-mobile{
      display:none;
    }

    @media (max-width:600px){
      .video-desktop{
        display:none;
      }
      .video-mobile{
        display:block;
      }
    }

    /* =================== HEADER =================== */
    .site-top{
      position: sticky;   /* hace que se quede fijo al hacer scroll */
      top: 0;
      z-index: 9000;      /* para que quede por encima de todo */
      width: 100%;
      background: transparent; /* lo dejamos igual que lo ten¨ªas */
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

    .btn-registro{
      padding:9px 16px;background:var(--naranja);color:#fff;border:none;border-radius:16px;
      font-weight:700;font-size:13px;text-decoration:none;display:inline-block;box-shadow:0 4px 10px rgba(0,0,0,.08)
    }

    .search-row{
      display:flex;
      justify-content:flex-end;
      margin-top:-15px;
    }

    /* ”9ä3 BUSCADOR M0†9S PEQUE0ˆ5O */
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

    /* RESULTADOS DEL BUSCADOR */
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

    @media (max-width:600px){
      .search{width:230px;}
      .search input{
        height:30px;
        font-size:12px;
      }
    }

    /* ================== SECCI0ˆ7N NARANJA ================== */
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
      right:7%; /* movido un poco a la izquierda */
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

 /* ================== TABLET ================== */
/* ================== TABLET ================== */
@media (max-width:900px){

  .hero{ position:relative; }

  /* Mancha naranja */
  .hero-bg{
    width:115%;
    max-width:none;
    transform:translateX(-7%);
  }

  /* 7¼3 Contenedor ¡°seguro¡± encima de la mancha (para que TODO quede dentro) */
  .hero{
    overflow:hidden; /* por si algo intenta salirse */
  }

  /* 7¼3 A partir de tablet, evita top/left con porcentajes que se rompen */
  .form-block{
    position:absolute;
    top:10%;
    left:8%;
    right:35%;
    max-width:none;
    z-index:4;
  }

  .hero-girl{
    width:32%;
    min-width:0;
    right:3%;
    bottom:0;
    z-index:4;
  }

  .form-block h1{ font-size:26px; }
}


/* ================== M0ˆ7VIL ================== */
@media (max-width:900px){ .hero-bg{width:115%;max-width:none;transform:translateX(-7%)} .hero-girl{width:32%;min-width:0;right:3%;bottom:0} .form-block{top:10%;left:8%;right:35%;max-width:none} .form-block h1{font-size:26px} } 

@media (max-width:600px){ body.menu-open{ overflow:hidden; } .site-top{ position: sticky; top: 0; z-index: 12000; } .main-nav{ display:none; position:fixed; inset:0; background:rgba(13,45,105,0.96); padding:90px 28px 28px; box-shadow:0 12px 30px rgba(0,0,0,0.28); } .main-nav.open{ display:block; } .main-nav ul{ flex-direction:column; align-items:flex-start; gap:16px; } .main-nav a{ color:#ffffff; font-size:18px; } .main-nav .btn-registro{ width:100%; text-align:center; font-size:15px; border-radius:999px; } .hero-wrap{padding:0;align-items:flex-start} .hero{max-width:100%;min-height:430px;padding-bottom:20px;overflow:visible} .hero-bg{ position:absolute;top:85px;left:50%; transform:translateX(-50%) scaleX(1.20) scaleY(1.8); width:85%;max-width:85%;height:auto;transform-origin:center } .form-block{position:absolute;top:55px;left:9%;right:40%;max-width:none} .form-block h1{font-size:18px;
margin-bottom:5px;line-height:1.3} .field{margin-bottom:6px} .field-inline{flex-direction:column;gap:4px;margin-bottom:6px} .field input,.field-inline input{font-size:8px;padding:7px 9px;border-width:3px;border-radius:10px} .check-wrap{font-size:9px;gap:14px;margin:4px 0 8px} .check-custom{width:15px;height:15px;border-width:2px} .btn-enviar{font-size:14px;padding:9px;border-radius:100px;box-shadow:0 4px 10px rgba(0,0,0,0.16)} .hero-girl{position:absolute;width:42%;right:0%;top:55px;z-index:3} }

@media (max-width:400px){ .form-block{left:8%;right:42%;top:40px} .form-block h1{font-size:10px} .btn-enviar{font-size:12px} .search{width:220px} }

/* ================== AJUSTE FINO: menos separaci¨®n entre campos ================== */
@media (max-width:600px){

  .field{
    margin-bottom:3px;   /* antes 6px */
  }

  .field-inline{
    gap:2px;             /* antes 4px */
    margin-bottom:3px;   /* antes 6px */
  }

  .check-wrap{
    margin:2px 0 6px;    /* compacta un poco el bloque del check */
  }
}


    /* ================== SECCI0ˆ7N AZUL NOSOTROS ================== */
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

    @media (max-width:600px){
      .nosotros-bg{
        top:30px;
      }
    }

    @media (max-width:400px){
      .nosotros-bg{
        top:-5px;
      }
    }

    /* ================== MISI0ˆ7N Y VISI0ˆ7N ================== */
    .mision-vision{
      width:100%;
      display:flex;
      justify-content:center;
      padding:60px 0;
    }
    .mv-container{
      width:100%;
      max-width:1366px;
      display:flex;
      justify-content:center;
      gap:60px;
      padding:0 20px;
    }
    .mv-item{
      width:42%;
      text-align:center;
      position:relative;
    }
    .mv-img{
      width:100%;
      max-width:520px;
      display:block;
      margin:0 auto;
      pointer-events:none;
    }
    .mv-text{
      position:absolute;
      left:50%;
      bottom:5%;
      transform:translateX(-50%);
      width:70%;
      margin:0;
      padding:0;
      background:transparent;
      border:none;
      border-radius:0;
      color:#ffffff;
      font-size:18px;
      line-height:1.35;
      text-align:center;
      text-shadow:0 1px 14px rgba(0,0,0,0.4);
    }
    .mv-item:first-child .mv-text{ bottom:11%; }
    .mv-item:last-child  .mv-text{ bottom:5%; }

    @media(max-width:900px){
      .mv-container{
        flex-direction:column;
        align-items:center;
        gap:40px;
      }
      .mv-item{width:90%;}
      .mv-text{
        font-size:15px;
        width:72%;
        bottom:11%;
      }
    }
    @media(max-width:600px){
      .mv-text{
        font-size:10px;
        width:68%;
        bottom:90%;
      }
      .mv-img{ max-width:95%; }
    }

    /* ================================================================= */
    /* ========== SERVICIOS GRANDES (0‰3NICO BLOQUE) serv2-* ============== */
    /* ================================================================= */

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

    @media(max-width:768px){
      .serv2-wrapper{ padding:70px 12px 10px; }

      .serv2-nube-izq{
        max-width:100px;
        transform:translate(30px, -10px);
      }
      .serv2-nube-der{
        max-width:70px;
        transform:translate(160px, -115px);
      }
      .serv2-logo-genesis{
        max-width:30px;
        transform:translate(-505%, -30px);
      }

      .serv2-logos{ margin-top:1px; max-width:250px; }
      .serv2-titulo{
        font-size:12px;
        line-height:28px;
        margin-top:10px;
      }

      .serv2-texto{
        font-size:55px;
        top:82px;
      }

      .serv2-bottom{ height:300px; }

      .serv2-chica{
        position:absolute;
        left:70%;
        top:0px;
        max-height:180px;
        transform:translateX(-50%);
      }
      .serv2-mancha{
        position:absolute;
        left:50%;
        bottom:112px;
        max-width:550px;
        transform:translateX(-50%);
      }

      .serv2-cuadros{
        flex-wrap:wrap;
        gap:28px;
        margin-top:-20px;
      }

      .serv2-cuadro-item{
        width:170px;
      }
      .serv2-cuadro-texto{ font-size:11px; }
    }

    /* ==========================================================
       =============== SERVICIOS T0‡7CNICOS =======================
       ========================================================== */
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

    .serv-card{
      position:relative;
      width:800px;
      max-width:95vw;
    }

    .serv-card img{
      width:100%;
      height:auto;
      display:block;
    }

    .card-text{
      position:absolute;
      top:20%;
      left:48%;
      font-size:29px;
      transform:translateY(-50%);
      width:48%;
      padding-right:8px;
      text-align:left;
    }

    .card1 .card-text{ top:27%; left:47%; }
    .card2 .card-text{ top:41%; left:47%; }

    .card-text h3{
      font-size:29px;
      font-weight:800;
      margin-bottom:6px;
    }

    .card-text p{
      font-size:15.5px;
      line-height:1.35;
      font-weight:600;
      color:#0a2a66;
      opacity:.95;
    }

    .serv-card.card2 .card-text{
      top:43%;
    }

    .serv-card.card2 .card-text h3{
      font-size:30px;
    }

    .serv-card.card2 .card-text p{
      font-size:15px;
      line-height:1.4;
    }

    /* Imagen grande de la mujer (escritorio) */
    .serv-full{
      position: relative;
      width: 100%;
      left: 50%;
      right: 50%;
      margin-left: -108vw;
      margin-right: -50vw;
      display: flex;
      justify-content: flex-end;
      margin-top: 48px;
      overflow: visible;
      pointer-events:none;
    }

    .mujer-full{
      width: 100%;
      max-width: 545px;
      height: auto;
      display:block;
    }

    @media (max-width:768px){

      .servtec-section{ padding:24px 0 40px; }

      .servtec-title .t1{ font-size:42px; }
      .servtec-title .t2{
        font-size:18px;
        margin-left:0;
        margin-top:-4px;
      }

      .serv-card{ width:100%; }

      .card-text{
        top:50%;
        left:43%;
        width:55%;
        font-size:14px;
      }

      .card-text h3{
        font-size:15px;
        margin-bottom:4px;
      }

      .card-text p{
        font-size:9px;
        line-height:1.25;
      }

      .card1 .card-text{
        top:30%;
        left:43%;
      }

      .serv-card.card2 .card-text{
        top:38%;
        left:43%;
        width:52%;
      }

      .serv-card.card2 .card-text h3{
        font-size:14px;
      }

      .serv-card.card2 .card-text p{
        font-size:8px;
        line-height:1.15;
      }

      .serv-full{
        position:relative;
        margin-left:0;
        margin-right:0;
        width:100%;
        justify-content:center;
        margin-top:20px;
        pointer-events:none;
      }

      .mujer-full{
        position:relative; 
        width:90%;
        max-width:70%;
        top: 0px;
        left: -111px;
      }
    }

    @media (max-width:420px){
      .servtec-title .t1{ font-size:36px; }
      .servtec-title .t2{ font-size:16px; margin-left:0; }

      .card-text{ left:42%; width:56%; }

      .serv-card.card2 .card-text p{
        font-size:7px;
      }

      .serv-full{ margin-top:24px; }
    }

    /* ========== RESPONSIVE PARA TARJETAS DE SERVIDORES ========== */
    @media (max-width:1200px){
      .serv-card-inline{
        min-width:400px !important;
        max-width:550px !important;
      }
    }

    @media (max-width:900px){
      .serv-card-inline{
        min-width:350px !important;
        max-width:500px !important;
      }
      .serv-text-overlay{
        top:18% !important;
        left:46% !important;
        width:52% !important;
        padding-right:6px !important;
      }
      .serv-text-overlay h3{
        font-size:20px !important;
        margin-bottom:6px !important;
      }
      .serv-text-overlay p{
        font-size:12px !important;
        line-height:1.25 !important;
      }
    }

    @media (max-width:768px){
      .serv-card-inline{
        min-width:300px !important;
        max-width:90% !important;
      }
    }

    @media (max-width:480px){
      .serv-card-inline{
        min-width:280px !important;
        max-width:100% !important;
      }
      .serv-text-overlay{
        top:15% !important;
        left:45% !important;
        width:53% !important;
      }
      .serv-text-overlay h3{
        font-size:16px !important;
        margin-bottom:6px !important;
      }
      .serv-text-overlay p{
        font-size:11px !important;
        line-height:1.2 !important;
      }
      .serv-text-overlay h3{
        font-size:16px !important;
        margin-bottom:4px !important;
      }
      .serv-text-overlay p{
        font-size:10px !important;
        line-height:1.2 !important;
      }
    }

    /* ========== RESPONSIVE PARA REDES SOCIALES ========== */
    @media (max-width:768px){
      .img-redes{
        flex-direction:column !important;
        padding:40px 20px !important;
        gap:30px !important;
      }
      .img-redes h3{
        font-size:2rem !important;
        text-align:center;
      }
    }

    @media (max-width:480px){
      .img-redes h3{
        font-size:1.6rem !important;
      }
      .img-redes a{
        width:75px !important;
        height:75px !important;
      }
      .img-redes svg{
        width:28px !important;
        height:28px !important;
      }
    }

    /* ==========================================================
       =============== PRODUCTOS ASPEL ==========================
       ========================================================== */
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

    @media (min-width:769px){
      .btn-empezar{
        width:100%;
        display:flex;
        justify-content:flex-start;
        margin: 60px 0 8px;
        padding-left:50px;
      }
    }

    @media (max-width:768px){
      .btn-empezar{
        justify-content:flex-start;
        transform: translateX(-80px);
      }
    }

    .btn-empezar a{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      text-decoration:none;
      transition:.2s ease;
    }
    .btn-empezar a:hover{ transform: translateY(-2px) scale(1.02); }
    .btn-empezar img{
      width: 360px;      
      max-width: 90vw;
      height:auto;
      display:block;
    }

    .img-redes{
      width:100%;
      display:flex;
      justify-content:center;
      margin-top: 40px;
    }
    .img-redes img{
      width:100%;
      max-width: 1100px;
      height:auto;
      display:block;
    }

    @media (max-width: 768px){
      .productos-aspel-wrap{ padding-top: 18px; }
      .productos-aspel-inner{ gap: 14px; }
      .img-header img{ max-width: 100%; }
      .img-servicios img{ max-width: 100%; }
      .btn-empezar img{ width: 100px; }
      .img-redes img{ max-width: 100%; }
    }

    @media (max-width: 420px){
      .btn-empezar img{ width: 180px; }
    }

    /* ==========================================================
       =============== UB0ˆ1CANOS + CONTACTO ======================
       ========================================================== */
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

    @media (min-width: 768px){
      .loc-pin{
        margin-left:80px !important;
      }
      .loc-label{
        margin-left:80px !important;
      }
    }

    @media (max-width: 768px){
      .ubicanos-title-img{ max-width:420px; }
      .ubicanos-plane{ margin-top:-32px; }
      .loc{ left:2%; }
      .loc-pin{ width:36px; }
      .loc-label{ font-size:13px; padding:8px 12px; }

      .addr{
        font-size:12px;
        width:56%;
        left:42%;
      }
      .addr-morelos{ top:21%; }
      .addr-puebla { top:41%; }
      .addr-cdmx   { top:63%; }

      .contacto-form{
        right:6%;
        top:6%;
        width:50%;
        min-width:0;
      }
      .contacto-form h3{ font-size:18px; }

      .genesis-logo{ width:60px; left:6%; bottom:9%; }
      .genesis-cloud{ width:120px; left:2%; bottom:2%; }
    }

    @media (max-width: 480px){ 
      .ubicanos-title-img{ max-width:340px; }

      .loc-morelos{ top:18%; }
      .loc-puebla { top:38%; }
      .loc-cdmx   { top:58%; }

      .addr{
        font-size:11px;
        width:60%;
        left:39%;
      }
      
      .loc{
        flex-direction:row;
        gap:4px;
        align-items:center;
      }
      
      .loc-pin{
        width:28px !important;
        margin-left:0 !important;
        flex-shrink:0;
      }
      
      .loc-label{
        font-size:12px !important;
        padding:0 !important;
        background:none !important;
      }
      
      .loc-cloud{
        display:none !important;
      }
      
      .contacto-form input,
      .contacto-form textarea{
        padding:2px 14px;
        font-size:12px;
      }

      .genesis-logo{ width:44px; left:14%; bottom:1%; }
      .genesis-cloud{ width:80px; left:10%; bottom:1%; }
      
      /* Recuadros de Proveer Soluciones */
      .soluciones-container{
        display:flex;
        gap:12px;
        margin-top:20px;
        width:100%;
      }
      
      .soluciones-card{
        flex:1;
        padding:16px;
        border-radius:12px;
        color:white;
        font-weight:700;
        font-size:13px;
        text-align:center;
        line-height:1.4;
      }
      
      .soluciones-azul{
        background:linear-gradient(135deg, #0D2D69 0%, #1a4a99 100%);
      }
      
      .soluciones-naranja{
        background:linear-gradient(135deg, #F39A16 0%, #ff6b35 100%);
      }
      
      /* Recuadro Corporativo */
      .corporativo-card{
        margin-top:16px;
        padding:14px;
        border-radius:12px;
        background:linear-gradient(90deg, #0D2D69 0%, #F39A16 100%);
        color:white;
        font-weight:700;
        font-size:12px;
        text-align:center;
        line-height:1.5;
      }
    }

    /* Icono en campo nombre del formulario de contacto */
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

    /* ==========================================================
       8¬2 EFECTO "APARECER DE ABAJO" AL PASAR EL MOUSE
       para im¨¢genes espec¨ªficas (hover)
       ========================================================== */
    img[src="tipo.png"],
    img[src="nube_naranja.png"],
    img[src="nube_naranja_1.png"],
    img[src="PRODUCTOS_COMPLETO_1.png"],
    img[src="serviciosmujer.png"],
    img[src="UBICANOS.png"],
    img[src="SERVICIOS.png"]{
      position: relative;
    }

    .hover-appear-up{
      animation: hoverFromBottom .45s ease-out;
    }

    @keyframes hoverFromBottom {
      0%{
        transform: translateY(22px);
        opacity: 0;
      }
      100%{
        transform: translateY(0);
        opacity: 1;
      }
    }

  </style>
   <link rel="stylesheet" href="assets/css/genesis-responsive.css">
</head>

<body>

  <!-- =================== HEADER =================== -->
  <header class="site-top">
    <div class="top-inner">
      <div class="nav-row">
        <div class="nav-left">
          <div class="hamburger" aria-label="Men¨²" aria-expanded="false"><span></span></div>
          <img src="logo.png" alt="Genesis Consultores" class="logo">
        </div>

        <nav class="main-nav nav-right" aria-label="Principal">
          <ul>
            <li><a href="#">INICIO</a></li>
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
<div class="hero-wrap">

  <!-- Fondo (no cuenta como columna) -->
  <img src="globo_naranja.png" alt="" class="hero-bg">

  <div class="hero wrap">
    <div class="grid grid-2 center hero-grid">

      <!-- COLUMNA IZQUIERDA: Formulario -->
      <div class="form-block">
        <h1>
          <span>Para una asesor&iacute;a gratuita,</span>
          <span>&iexcl;d&eacute;janos tus datos!</span>
        </h1>

        <!-- FORM 1 (asesoria) -->
        <form action="send_form.php" method="post">
          <input type="hidden" name="form_type" value="asesoria">
          <div class="field"><input type="text" name="nombre" placeholder="Nombre y Apellido" required></div>
          <div class="field"><input type="email" name="email" placeholder="E-mail" required></div>

          <div class="field-inline">
            <input type="tel" name="telefono" placeholder="Tel&eacute;fono" required>
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

      <!-- COLUMNA DERECHA: Imagen chica -->
      <div class="hero-right">
        <img src="CONTACTO_MUJER_SOLA.png" alt="" class="hero-girl">
      </div>

    </div>
  </div>
</div>

  <!-- SECCI0ˆ7N AZUL NOSOTROS -->
  <section id="nosotros" class="nosotros-wrap">
    <div class="nosotros">
      <div class="nosotros-anim">
        <img src="tipo.png" alt="Fondo azul Nosotros" class="nosotros-bg">
      </div>
    </div>
  </section>

  <!-- SECCI0ˆ7N MISI0ˆ7N Y VISI0ˆ7N -->
  <section class="mision-vision" style="padding: 60px 0 40px 0;">
    <div style="width:100%; min-height:180px; border-radius:22px; background:linear-gradient(90deg,#53a7f7 0%,#F39A16 100%); display:flex; flex-wrap:wrap; justify-content:center; align-items:center; gap:0; max-width:1100px; margin:0 auto; padding:38px 0 38px 0; box-shadow:0 2px 12px rgba(13,45,105,0.10);">
      <div style="flex:1 1 320px; min-width:260px; max-width:480px; padding:0 32px; display:flex; align-items:center; justify-content:center;">
        <div style="color:#fff; font-size:1.18rem; font-weight:600; text-align:center; text-shadow:0 2px 8px rgba(13,45,105,0.18);">
          Proveer soluciones sencillas, eficientes y productivas para el control de su negocio a través de consultoría en TI, Sistemas Administrativos y Contables ASPEL. 
        </div> 
      </div>

      <div style="width:2px; height:90px; background:rgba(255,255,255,0.55); border-radius:2px; margin:0 12px; display:block;"></div>
      <div style="flex:1 1 320px; min-width:260px; max-width:480px; padding:0 32px; display:flex; align-items:center; justify-content:center;">
        <div style="color:#fff; font-size:1.18rem; font-weight:600; text-align:center; text-shadow:0 2px 8px rgba(13,45,105,0.18);">
          Ser el Corporativo líder en integración de soluciones administrativas-contables ASPEL y de TI, garantizando la entera satisfacción del cliente a través de atención y servicio de calidad y vanguardia.
        </div>
      </div>
    </div>
  </section>

  <!-- ======= SERVICIOS GRANDES ======= -->
<section class="serv2-wrapper">
  <div class="serv2-inner">

    <img src="nube.png" class="serv2-nube-izq">
    <img src="nube.png" class="serv2-nube-der">
    <img src="logo_genesis.png" class="serv2-logo-genesis">

    <img src="SiigoAspel (1).png" class="serv2-logos">

    <h2 class="serv2-titulo">
      <span>L&Iacute;DER EN EL MERCADO DE SOFTWARE</span>
      <span>ADMINISTRATIVO, CONTABLE Y DE</span>
      <span>FACTURACI&Oacute;N ELECTR&Oacute;NICA</span>
    </h2>

    <div class="serv2-bottom">
      <div class="serv2-texto">SERVICIOS</div>
      <img src="FONDO_SUETER_ROJO.png" class="serv2-mancha">
      <img src="SUETER_ROJO.png" class="serv2-chica">
    </div>

    <div class="serv2-cuadros">
      <div class="serv2-cuadro-item">
        <img src="cuadro.png" alt="">
        <p class="serv2-cuadro-texto">
          SUSCRIPCI&Oacute;N Y ACTUALIZACI&Oacute;N<br>DE SISTEMAS<br>SIIGO ASPEL
        </p>
      </div>

      <div class="serv2-cuadro-item">
        <img src="cuadro.png" alt="">
        <p class="serv2-cuadro-texto">
          CONSULTOR&Iacute;A<br>ASPEL DE CALIDAD
        </p>
      </div>

      <div class="serv2-cuadro-item">
        <img src="cuadro.png" alt="">
        <p class="serv2-cuadro-texto">
          CAPACITACI&Oacute;N:<br>CURSOS Y TALLERES
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
<section id="servicios" class="servtec-section">
  <div class="servtec-wrap">

    <div class="servtec-title">
      <div class="t1">SERVIDORES</div>
      <div class="t2">VIRTUALES</div>
    </div>

    <div style="display:flex; justify-content:center; align-items:flex-start; gap:30px; margin-top:40px; max-width:1300px; margin-left:auto; margin-right:auto; flex-wrap:wrap;">

      <div class="serv-card-inline card1" style="position:relative; flex:1 1 550px; min-width:450px; max-width:650px;">
        <img src="nube_naranja.png" alt="Servidores en la Nube" style="width:100%; height:auto; display:block; border-radius:20px; box-shadow:0 8px 24px rgba(243,154,22,0.3);">
        <div class="serv-text-overlay" style="position:absolute; top:22%; left:48%; width:49%; padding-right:8px; text-align:left;">
          <h3 style="font-size:26px; font-weight:800; margin-bottom:8px; color:#0a2a66;">Servidores en la Nube</h3>
          <p style="font-size:15px; line-height:1.4; font-weight:600; color:#0a2a66; opacity:0.95;">Es un servicio que te permite acceder de forma remota a los sistemas ASPEL, de forma sencilla y segura desde cualquier lugar y momento</p>
        </div>
      </div>

      <div class="serv-card-inline card2" style="position:relative; flex:1 1 550px; min-width:450px; max-width:650px;">
        <img src="nube_naranja_1.png" alt="Servidores Físicos" style="width:100%; height:auto; display:block; border-radius:20px; box-shadow:0 8px 24px rgba(243,154,22,0.3);">
        <div class="serv-text-overlay" style="position:absolute; top:10%; left:48%; width:49%; padding-right:8px; text-align:left;">
          <h3 style="font-size:26px; font-weight:800; margin-bottom:8px; color:#0a2a66;">Servidores Físicos</h3>
          <p style="font-size:14px; line-height:1.3; font-weight:600; color:#0a2a66; opacity:0.95;">Instalación, Configuración, Respaldos, y Administración servidores físicos y en la nube</p>
          <p style="font-size:14px; line-height:1.3; font-weight:600; color:#0a2a66; opacity:0.95; margin-top:6px;">El objetivo de estos servidores es que pueden compartir los sistemas SIIGO - ASPEL, las herramientas de software y acceder a las bases de datos de la empresa dentro y fuera de las instalaciones cuidando siempre la integridad de la información.</p>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ======= PRODUCTOS ASPEL ======= -->
<section class="productos-aspel-wrap" id="agendar">
  <div class="productos-aspel-inner">

    <div class="img-header">
      <img src="PRODUCTOS_COMPLETO_1.png" alt="Productos Aspel">
    </div>

    <div class="img-servicios">
      <img src="SER.png" alt="Servicios Aspel">
    </div>

    <div class="btn-empezar">
      <a href="#ubicanos" style="
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
      " onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
        Contáctanos
      </a>
    </div>

    <div class="img-redes" style="display:flex; align-items:center; justify-content:space-around; gap:40px; padding:50px 40px; background:linear-gradient(135deg, #F39A16 0%, #ff8c00 100%); border-radius:24px; margin:40px auto; max-width:1100px; box-shadow:0 10px 40px rgba(243,154,22,0.4); flex-wrap:wrap;">
      <h3 style="color:#fff; font-size:2.5rem; font-weight:900; letter-spacing:2px; text-shadow:0 3px 10px rgba(0,0,0,0.3); margin:0; flex:0 0 auto;">SÍGUENOS EN<br>REDES SOCIALES</h3>

      <div style="display:flex; justify-content:center; gap:32px; flex-wrap:wrap; flex:0 0 auto;">
        <!-- tus 3 botones redes (no los cambio) -->
        ...
      </div>
    </div>

  </div>
</section>

<!-- ======= UBÍCANOS + CONTACTO ======= -->
<section class="ubicanos-wrap" id="ubicanos">
  <div class="ubicanos-inner">
    ...
  </div>
</section>

<!-- ... Tus scripts aquí ... -->

<!-- Botón flotante de WhatsApp (DENTRO DEL BODY) -->
<a href="https://wa.me/5246226280" target="_blank" style="position:fixed;bottom:32px;right:32px;z-index:9999;background:#25d366;border-radius:50%;width:64px;height:64px;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(0,0,0,0.18);transition:box-shadow .2s;">
  <svg width="36" height="36" viewBox="0 0 32 32" fill="#fff" xmlns="http://www.w3.org/2000/svg">
    <path d="M16 3C9.373 3 4 8.373 4 15c0 2.647.86 5.1 2.34 7.11L4 29l7.14-2.31A12.93 12.93 0 0016 27c6.627 0 12-5.373 12-12S22.627 3 16 3zm0 22c-1.98 0-3.85-.52-5.45-1.43l-.39-.23-4.24 1.37 1.39-4.13-.25-.4A9.94 9.94 0 016 15c0-5.514 4.486-10 10-10s10 4.486 10 10-4.486 10-10 10zm5.13-7.47c-.28-.14-1.65-.81-1.9-.9-.25-.09-.43-.14-.61.14-.18.28-.7.9-.86 1.08-.16.18-.32.2-.6.07-.28-.14-1.18-.43-2.25-1.37-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.51.14-.17.18-.29.28-.48.09-.18.05-.36-.02-.5-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.62-.47-.16-.01-.36-.01-.56-.01-.2 0-.52.07-.8.36-.28.28-1.06 1.04-1.06 2.53 0 1.49 1.09 2.93 1.24 3.13.15.2 2.14 3.28 5.19 4.47.73.31 1.3.5 1.75.64.74.24 1.41.21 1.94.13.59-.09 1.81-.74 2.07-1.46.26-.72.26-1.34.18-1.47-.08-.13-.26-.2-.54-.34z"/>
  </svg>
</a>

</body>
</html>
