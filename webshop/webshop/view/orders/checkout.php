<div class="container">

  <!-- heading -->
  <header class="">
    <h1 class="h1-like">Gegevens en verzending.</h1>
    <!-- <p>We zijn er bijna.</p> -->
    <a class="back-arrow" href="index.php?page=winkelmand">
    terug naar winkelmand
  </a>
  </header>

  <!-- form -->
  <form class="checkout_form" action="index.php?page=checkout" method="post">
    <input type="hidden" name="action" value="addBookingUser">

      <div class="checkout_data">
        <fieldset class="checkout_fieldset checkout_grid">
          <legend class="checkout_legend-persoonlijk">Persoonlijke gegevens</legend>

          <!-- voornaam -->
            <div class="checkout_form-input_flex checkout_flex-voornaam">
              <label class="checkout_form-input_label" for="voornaam">Voornaam</label>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['voornaam'])) echo 'input-error'; ?>"
                     name="voornaam" id="voornaam"
                     value="<?php if(!empty($_POST['voornaam'])) echo $_POST['voornaam']; ?>"
              >
              <?php if(!empty($errors['voornaam'])) echo '<div class="checkout-error">' . $errors['voornaam'] . '</div>' ;?>
            </div>

            <!-- achternaam -->
            <div class="checkout_form-input_flex checkout_flex-achternaam">
              <label class="checkout_form-input_label" for="achternaam">achternaam</label>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['achternaam'])) echo 'input-error'; ?>"
                     name="achternaam" id="achternaam"
                     value="<?php if(!empty($_POST['achternaam'])) echo $_POST['achternaam']; ?>"
              >
              <?php if(!empty($errors['achternaam'])) echo '<div class="checkout-error">' . $errors['achternaam'] . '</div>' ;?>
            </div>

            <!-- mail -->
            <div class="checkout_form-input_flex checkout_flex-mail">
              <label class="checkout_form-input_label" for="mail">mail</label>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['mail'])) echo 'input-error'; ?>"
                     name="mail" id="mail"
                     value="<?php if(!empty($_POST['mail'])) echo $_POST['mail']; ?>"
              >
              <?php if(!empty($errors['mail'])) echo '<div class="checkout-error">' . $errors['mail'] . '</div>' ;?>
            </div>

            <!-- aanspreking -->
            <!-- <div class="checkout_form-input_flex checkout_flex-aanspreking">
              <label class="checkout_form-input_label" for="aanspreking">aanspreking</label>
              <select name="aanspreking" id="aanspreking">
                <option value="<?php if(!empty($_POST['aanspreking'])) echo $_POST['aanspreking']; ?>">

                </option>
              </select>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['aanspreking'])) echo 'input-error'; ?>"
                     name="aanspreking" id="aanspreking"
                     value=""
              >
              <?php if(!empty($errors['aanspreking'])) echo '<div class="checkout-error">' . $errors['aanspreking'] . '</div>' ;?>
            </div> -->

            <!-- gsm -->
            <div class="checkout_form-input_flex checkout_flex-gsm">
              <label class="checkout_form-input_label" for="gsm">gsm</label>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['gsm'])) echo 'input-error'; ?>"
                     name="gsm" id="gsm"
                     value="<?php if(!empty($_POST['gsm'])) echo $_POST['gsm']; ?>"
              >
              <?php if(!empty($errors['gsm'])) echo '<div class="checkout-error">' . $errors['gsm'] . '</div>' ;?>
            </div>

        </fieldset>

        <!-- ADRES -->
        <fieldset class="checkout_fieldset checkout_grid">
          <legend class="checkout_legend-persoonlijk">Adres</legend>

          <!-- straat -->
            <div class="checkout_form-input_flex checkout_flex-straat">
              <label class="checkout_form-input_label" for="straat">straat</label>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['straat'])) echo 'input-error'; ?>"
                     name="straat" id="straat"
                     value="<?php if(!empty($_POST['straat'])) echo $_POST['straat']; ?>"
              >
              <?php if(!empty($errors['straat'])) echo '<div class="checkout-error">' . $errors['straat'] . '</div>' ;?>
            </div>

            <!-- nr -->
            <div class="checkout_form-input_flex checkout_flex-nr">
              <label class="checkout_form-input_label" for="nr">nr</label>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['nr'])) echo 'input-error'; ?>"
                     name="nr" id="nr"
                     value="<?php if(!empty($_POST['nr'])) echo $_POST['nr']; ?>"
              >
              <?php if(!empty($errors['nr'])) echo '<div class="checkout-error">' . $errors['nr'] . '</div>' ;?>
            </div>

            <!-- gemeente -->
            <div class="checkout_form-input_flex checkout_flex-gemeente">
              <label class="checkout_form-input_label" for="gemeente">gemeente</label>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['gemeente'])) echo 'input-error'; ?>"
                     name="gemeente" id="gemeente"
                     value="<?php if(!empty($_POST['gemeente'])) echo $_POST['gemeente']; ?>"
              >
              <?php if(!empty($errors['gemeente'])) echo '<div class="checkout-error">' . $errors['gemeente'] . '</div>' ;?>
            </div>

            <!-- postcode -->
            <div class="checkout_form-input_flex checkout_flex-postcode">
              <label class="checkout_form-input_label" for="postcode">postcode</label>
              <input type="text"
                     class="checkout_form-input <?php if(!empty($errors['postcode'])) echo 'input-error'; ?>"
                     name="postcode" id="postcode"
                     value="<?php if(!empty($_POST['postcode'])) echo $_POST['postcode']; ?>"
              >
              <?php if(!empty($errors['postcode'])) echo '<div class="checkout-error">' . $errors['postcode'] . '</div>' ;?>
            </div>
        </fieldset>
      </div>

      <section class="overview-section">
        <div class="overview-box outline_bg">

          <div class="overview_items">
          <?php
              $total = 0;
              foreach($items as $item):
                $itemTotal = $item['product']['prijs'] * $item['amount'];
                $total += $itemTotal;
              ?>
            <article class="overview_item">
              <img class="overview_item-img"  src="<?php echo $item['product']['img'];?>" alt="<?php echo $item['product']['titel'];?>">
              <div class="overview_item-info">
                <p class="overview_item-info_title"><?php echo $item['product']['titel'];?></p>
                <div class="">
                  <p class="overview_item-info_variant">variant: <?php echo $item['product']['variant'];?></p>
                  <p class="overview_item-info_quantity">aantal: <?php echo $item['amount']?></p>
                </div>
                <p class="overview_item-info_price">€<?php echo $item['product']['prijs'];?></p>
              </div>
            </article>
            <?php endforeach;?>
          <div class="cart_total-price_box">
            <p class="cart_total-box_item">subtotaal: <span>€<span><?php echo $total; ?></span></p>
            <p class="cart_total-box_item">verzendkosten: <span>gratis</span></p>
            <p class="cart_total-box_item">totaal: <span>€<?php echo $total; ?></span></p>
            <form class="" action="index.php?page=checkout" method="post">
              <input class="btn btn-primary btn-cart_proceed" type="submit" class="overview-button" name="checkout" value="bestellen">
            </form>
          </div>

        </div>
      </section>

</form>
    <input type="submit" class="boeken" name="" value="boeken">

    <div class="checkout-overview">
      <p class="checkout-overview-title">overzicht</p>
      <div class="table-box">
        <table>
          <thead>
            <tr>
              <th>Tour</th>
              <th>aantal</th>
              <th>prijs</th>
            </tr>
          </thead>

          <tbody>
            <?php
              $total = 0;
              foreach($items as $item):
                $itemTotal = $item['tour']['price'] * $item['amount'];
                $total += $itemTotal;
              ?>
            <tr>
              <td><?php echo $item['tour']['title']; ?></td>
              <td><?php echo $item['amount']; ?></td>
              <td>€<?php echo $itemTotal; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
      <p class="checkout-overview-total">Totaal: €<?php echo $total; ?></p>
    </div>
    </form>

    <!-- end container -->
</div>
