<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HUMO - <?php echo $title; ?></title>
    <?php echo $css; ?>
    <script>
      WebFontConfig = {
        custom: {
          families: ["swis cn", "helvetica neue"],
          urls: ["assets/fonts/fonts.css"]
        }
      };

      (function(d) {
        var wf = d.createElement("script"),
          s = d.scripts[0];
        wf.src = "js/webfont.js";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
      })(document);

      function myFunction(x) {
        x.classList.toggle("change");
      }
    </script>
  </head>

  <body>

  <div class="container">
    <nav class="nav">
      <div class="nav_main">
        <ul class="nav_main-left">
          <li class="nav_main-item"><a>home</a></li>
          <li class="nav_main-item"><a>actua</a></li>
          <li class="nav_main-item"><a>humor</a></li>
          <li class="nav_main-item nav_main-item-left-active nav_main-left_webshop"><a>webshop</a></li>
        </ul>

        <a class="nav_logo-link" href="index.php">
          <img src="./assets/img/humo_logo.png" width="100px" alt="">
        </a>

        <ul class="nav_main-right">
          <li class="nav_main-item"><a>tv/film</a></li>
          <li class="nav_main-item"><a>muziek</a></li>
          <li class="nav_main-item nav_main-item-active nav_main-right_webshop"><a>webshop</a></li>
          <li class="nav_main-item menu"><a>menu</a></li>
        </ul>
      </div>
      <div class="nav_secondary-container">
        <ul class="nav_secondary">
          <div class="nav_secondary-left">
            <li class="nav_secondary-item"><a class="nav_secondary-link <?php if($title == 'home') echo 'nav_secondary-link-active' ?>" href="index.php?page=home">home</a></li>
            <li class="nav_secondary-item"><a class="nav_secondary-link <?php if($title == 'producten') echo 'nav_secondary-link-active' ?>" href="index.php?page=producten">producten</a></li>
            <li class="nav_secondary-item"><a class="nav_secondary-link<?php if($title == 'abonnementen') echo 'nav_secondary-link-active' ?>" href="index.php?page=abonnementen">abonnementen</a></li>
          </div>
          <div class="nav_secondary-right">
            <li class="nav_secondary-item"><a href="" class="nav-favorites"></a></li>
            <li class="nav_secondary-item"><a href="index.php?page=winkelmand" class="nav-cart"></a></li>
            <li class="nav_secondary-item"><a href="" class="nav-profile"></a></li>
          </div>
        </ul>
      </div>
    </nav>
    <?php
        if(!empty($_SESSION['info'])) {
          echo '<div class="cart_info"><p class="cart_added-info">' . $_SESSION['info'] . '</p></div>';
        }
        if(!empty($_SESSION['error'])) {
          echo '<div class="cart_info"><p class="cart_added-info">' . $_SESSION['error'] . '</p></div>';
        }
      ?>
  </div>


    <main>
      <?php echo $content;?>
    </main>

<div class="footer_bg">
      <footer class="footer">

          <div class="footer_subscribe">
            <p class="">Abonneren? Dat kan vanaf slechts 4.99€!</p>
            <a class="btn-footer" href="index.php?page=abonnementen">abonneer nu</a>
          </div>

          <div class="footer_newsletter">
            <p class="footer_newsletter-title">wees er als eerste bij.</p>
            <p>Schrijf je in op onze nieuwsbrief en ontvang de nieuwste en beste kortingen voor jou.</p>
            <form class="footer_form" action="">
              <input class="footer_form-input" type="text" placeholder="micheal.braeckman@hotmail.be"></input>
              <input class="footer_form-submit" type="submit" value="">
            </form>
          </div>

          <div class="footer_info">
            <p class="footer_info-title">Eindeloos lezen met humo!</p>

            <ul class="footer_info-nav">
              <li class="footer_info-item">
                <a class="footer_info-item_link" href="">home</a>
              </li>
              <li class="footer_info-item">
                <a class="footer_info-item_link" href="">actua</a>
              </li>
              <li class="footer_info-item">
                <a class="footer_info-item_link" href="">humor</a>
              </li>
              <li class="footer_info-item">
                <a class="footer_info-item_link" href="">tv/film</a>
              </li>
              <li class="footer_info-item">
                <a class="footer_info-item_link" href="">muziek</a>
              </li>
            </ul>

            <ul class="footer_info-sm">
              <li class="footer_info-sm_item">
                <a class="footer_info-sm_link" href="index.php?page=producten">
                  <img src="./assets/img/twitter.svg" height="24px" alt="humo twitter">
                </a>
              </li>
              <li class="footer_info-sm_item">
                <a class="footer_info-sm_link" href="index.php?page=producten">
                <img src="./assets/img/facebook.svg" height="24px" alt="humo facebook">
                </a>
              </li>
              <li class="footer_info-sm_item">
                <a class="footer_info-sm_link" href="index.php?page=abonnementen">
                <img src="./assets/img/instagram.svg" height="24px" alt="humo instagram">
                </a>
              </li>
            </ul>

          </div>
  </div>
</footer>


    <?php echo $js; ?>
  </body>
</html>
