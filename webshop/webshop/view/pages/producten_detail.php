<div class="container">

  <a class="back-arrow" href="index.php?page=producten">
    terug naar producten
  </a>
  <header class="detail-header">

    <img class="detail-img-main" src="<?php echo $product['img'];?>" width="500px" height="500px" alt="">

    <h1 class="h1-like detail-title"><?php echo $product['titel'];?></h1>

    <div class="detail-points">
      <div class="detail-point">
        <img class="detail-point-img" src="./assets/img/author.png" height="35px" alt="auteur icoon">
        <p class="detail-point-title"><?php echo $product['auteur'];?></p>
      </div>
      <div class="detail-point">
        <img class="detail-point-img" src="./assets/img/author.png" height="35px" alt="auteur icoon">
        <p class="detail-point-title"><?php echo $product['paginas'];?></p>
      </div>
      <div class="detail-point">
        <img class="detail-point-img" src="./assets/img/author.png" height="35px" alt="auteur icoon">
        <p class="detail-point-title">
          <?php echo $product['levertijd_min'] . ' - ' . $product['levertijd_max'] . ' dagen';?>
        </p>
      </div>
    </div>

    <p class="detail-description">
      <?php echo $product['beschrijving'];?>
    </p>

    <form class="detail-form" method="post" action="index.php?page=add-to-cart-detail&amp;id=<?php echo $product['id'];?>">
        <div class="detail-form-options">
        <?php foreach($varianten as $variant): ?>
          <input class="detail-form-input" type="radio" name="variant" value="<?php echo $variant['id'];?>" id="<?php echo $variant['id'];?>">
          <label class="detail-form-label" for="<?php echo $variant['id'];?>"><?php echo $variant['variant'];?> <span>€<?php echo $variant['prijs'];?></span></label>
        <?php endforeach; ?>
        <input class="btn btn-primary form-cart_large" type="submit" name="add" id="add-to-cart-detail" value="+ in winkelmandje">
        </div>
    </form>

    <!-- <form class="detail-form-wishlist" method="post" action="index.php?page=add-to-wishlist&amp;id=<?php echo $product['id'];?>">
      <input class="" type="submit" name="add" id="add-to-wishlist" value="op verlanglijstje zetten">
    </form> -->
  </header>

  <div class="detail-break">
    <div class="detail-break-line"></div>
    <a class="detail-break-circle" href="#detail_extra">+</a>
  </div>

  <div class="detail-extra">
    <section class="detail-set" id="detail_extra">
      <div>
        <h2 class="detail-title-secondary set_title">boekenreeks: SCI-FI10</h2>
        <p class="detail-set-text">
          Dit boek maakt deel uit van een boekenreeks waarvoor er een longread is voor gemaakt. In deze longread kom je op een interactieve manier meer te weten over het verhaal van het boek.
          <br><br>De 10 meest doorslaggevende science-fiction boeken gebundeld in een boekenreeks: SCI-FI10.
          Ontdek of herbeleef klassiekers zoals: I Robot, Ready Player One, Snow Crash en nog veel meer.
        </p>
        <a class="btn btn-primary btn-primary_longread" href="https://thrillstudiobe.webhosting.be/longread">ervaar de longread</a>
        <a class="btn btn-secondary btn-secondary_longread" href="">ontdek de andere boeken</a>
      </div>
      <img class="detail-set-img" src="./assets/img/sci-fi10.png" alt="">
    </section>

    <section class="detail-specifics">
      <h2 class="detail-title-secondary">productspecificaties</h2>
      <table class='detail-table'>
        <tr>
          <td>Taal:</td>
          <td class="detail-table_value">Engels</td>
        </tr>
        <tr>
          <td>Bindwijze:</td>
          <td class="detail-table_value">Paperback</td>
        </tr>
        <tr>
          <td>Druk:</td>
          <td class="detail-table_value">25 g</td>
        </tr>
        <tr>
          <td>Verschijningsdatum:</td>
          <td class="detail-table_value">2010-03-29</td>
        </tr>
        <tr>
          <td><em>Afmetingen:</em></td>
          <td class="detail-table_value">19,7 x 12,9 x 2,7 cm</td>
        </tr>
        <tr>
          <td>Aantal pagina's:</td>
          <td class="detail-table_value">193 paginas</td>
        </tr>
        <tr>
          <td>Illustraties:</td>
          <td class="detail-table_value">nee</td>
        </tr>
      </table>
    </section>

    <section class="detail-author">
      <h2 class="detail-title-secondary"><?php echo $product['auteur']; ?></h2>
      <p class="detail-author_text">
        "Philip Kindred Dick (December 16, 1928 – March 2, 1982) was an American writer known for his work in science fiction.
        His work explored philosophical, social, and political themes, with stories dominated by monopolistic corporations, alternative universes, authoritarian governments, and altered states of consciousness.
      </p>
      <div class="detail-author_books">
        <img class="detail-author_books-img" src="./assets/img/philip_1.png" height="200px" alt="">
        <img class="detail-author_books-img" src="./assets/img/philip_2.png" height="200px" alt="">
        <img class="detail-author_books-img" src="./assets/img/philip_3.png" height="200px" alt="">
        <img class="detail-author_books-img" src="./assets/img/philip_4.png" height="200px" alt="">
      </div>
    </section>
  </div>

  <section class="bought_with">
      <h2 class="detail-title-secondary">vaak samengekocht met</h2>
      <div class="bestsellers">
      <?php
        $pick = rand(2, sizeof($producten));
        print_r(sizeof($producten));
        $random_producten = array_rand($producten, $pick);
        foreach($random_producten as $key): ?>
        <article class="bestseller">
          <a class="bestseller-link" href="index.php?page=producten_detail&amp;id=<?php echo $producten[$key]['id']; ?>"><img class="bestseller-img" src="./assets/img/the_road.jpg" width="320px" height="320px" alt="bestseller boek (The Road)"></a>
          <a>
            <p class="bestseller-title">
              <?php echo $producten[$key]['titel'];?>
              <span class="bestseller-author">
              <?php if($producten[$key]['auteur'] === '') {
                  echo $producten[$key]['categorie'];
                } else
                  { echo $producten[$key]['auteur'];
                }?>
              </span>
            </p>
          </a>
          <p class="bestseller-price">€<?php echo $producten[$key]['prijs'];?></p>
        </article>
        <?php endforeach;?>

      </div>
    </section>

</div>
