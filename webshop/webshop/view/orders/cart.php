
<div class="container">
  <header class="">
    <h1 class="h1-like">Winkelmand.</h1>
  </header>

<form method="post" action="index.php?page=winkelmand">
    <div class="cart_container">
      <div class="cart_grid">
        <div class="cart_d">
          <p class="cart_d-item">product</p>
          <p class="cart_d-item">omschrijving</p>
          <p class="cart_d-item cart_d-item_price">stukprijs</p>
          <p class="cart_d-item">aantal</p>
          <p class="cart_d-item">totaal</p>
        </div>
        <ul class="cart_products">
        <?php
          $total = 0;
          foreach($items as $item):
            $itemTotal = $item['product']['prijs'] * $item['amount'];
            $total += $itemTotal;
          ?>
          <li class="cart_product">
            <img class="cart_product-img" src="<?php echo $item['product']['img'];?>" alt="<?php echo $item['product']['title'];?>">
            <div class="cart_product-description">
              <p class="cart_product-description_title"><?php echo $item['product']['titel'];?></p>
              <p class="cart_product-description_author">
                <?php if($item['product']['auteur'] === '') {
                    echo $item['product']['categorie'];
                  } else
                    { echo $item['product']['auteur'];
                  }?>
              </p>
              <form class="cart_product-version" action="">
                <select class="select cart_product-version_select" name="book" id="version">
                  <option value="paperback"><?php echo $item['product']['variant'];?></option>
                  <!-- <option selected value="e-book">e-book</option> -->
                  <!-- <option value="hardcover">hardcover</option> -->
                </select>
              </form>
            </div>

            <!-- <select class="select cart_product-quantity_select cart_product-quantity" name="amount[<?php echo $item['product']['id'];?>]" id="">
              <option selected value="amount[<?php echo $item['product']['id'];?>]"><?php echo $item['amount'];?></option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select> -->

            <!-- QUANTITY item -->
            <input class="cart_product-quantity" type="number" size="2" name="amount[<?php echo $item['product']['id'];?>]" value="<?php echo $item['amount'];?>" />
            <p class="cart_product-price">€<?php echo $item['product']['prijs'];?></p>
            <span class="cart_product-total">€<?php echo $itemTotal; ?></span>

            <!-- DELETE item -->
            <a class="cart_delete" href="index.php?page=winkelmand&amp;action=change&amp;id=<?php echo $item['product']['id'];?>&amp;amount=0">
              <img src="./assets/img/thrash.svg" height="20" alt="">
            </a>

          </li>
          <!-- end of cart item -->
          <?php endforeach; ?>
        </ul>

          <!-- UPDATE item function -->
        <div class="cart-update-box">
          <input type="submit" id="update-cart" class="btn btn-secondary" name="update" value="update winkelmand" />
        </div>
      </div>

      <section class="cart_total-grid">
        <div class="cart_total-box outline_bg">
          <div class="cart_total-discount_box">
            <form class="cart_discount" action="">
              <div class="cart_discount-box">
                <label class="cart_discount-label" for="">Kortingscode <span class="cart_discount-span">(optioneel)</span></label>
                <input class="cart_discount-input" placeholder="4SANR01D3" type="text"></input>
              </div>
            </form>
            <aside class="cart_teacher">
              <p class="text-body-20 bold">Leraar of student?</p>
              <span>Leraren- of studentenkaartnummer kan ingevuld worden in de de volgende stap.</span>
            </aside>
          </div>
          <div class="cart_total-price_box">
            <p class="cart_total-box_item">subtotaal: <span><?php echo $total; ?>€</span></p>
            <p class="cart_total-box_item">verzendkosten: <span>gratis</span></p>
            <p class="cart_total-box_item">totaal: <span><?php echo $total; ?>€</span></p>
            <form class="" action="index.php?page=checkout" method="post">
              <input class="btn btn-primary btn-cart_proceed" type="submit" class="overview-button" name="checkout" value="ga verder">
            </form>
          </div>
        </div>
      </section>
    </div>

  </form>
  <!-- container end -->
</div>
