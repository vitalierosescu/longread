<div class="container home_header-container">
  <header class="home_header">
    <h1 class="home_header-title">Eindeloos leesplezier <br> met humo!</h1>
    <p class="text-body home_header-text">
      Ontvang onze wekelijkse magazine <br> <span class="bold">vanaf €12,76/maand</span>
    </p>
    <a href="index.php?page=abonnementen" class="btn btn-primary">bekijk het aanbod</a>
  </header>
</div>

<section class="home_categories-section">
  <h2 class="hidden">categoriëen</h2>

  <div class="home_categories">

    <div class="home_category-container">
      <article class="home_category">
        <img class="home_category-img" src="./assets/img/home_books.svg" height="80px" alt="humo boeken illustratie">
        <div class="home_category-text_div">
          <h3 class="home_category-title">Boeken</h3>
          <p class="text-body home_category-text">Ontdek ons assortiment aan boeken.</p>
          <a href="index.php?page=abonnementen_detail" class="btn btn-secondary">bekijk het aanbod</a>
        </div>
      </article>
    </div>

    <div class="home_category-container">
      <article class="home_category">
        <img class="home_category-img" src="./assets/img/home_gadgets.svg" height="80px" alt="humo boeken illustratie">
        <div class="home_category-text_div">
          <h3 class="home_category-title">Gadgets</h3>
          <p class="text-body home_category-text">Ontdek ons assortiment aan boeken.</p>
          <a href="" class="btn btn-secondary">bekijk het aanbod</a>
        </div>
      </article>
    </div>

    <div class="home_category-container">
      <article class="home_category">
        <img class="home_category-img" src="./assets/img/home_abbonnementen.svg" height="80px" alt="humo boeken illustratie">
        <div class="home_category-text_div">
          <h3 class="home_category-title">Abonnementen</h3>
          <p class="text-body home_category-text">Ontdek ons assortiment aan boeken.</p>
          <a href="" class="btn btn-secondary">bekijk het aanbod</a>
        </div>
      </article>
    </div>

  </div>

</section>

<section class="home_box-section container">
  <!-- <img
    class="home_box-img"
    sizes="(min-width: 450px) 60vw,
              (min-width: 700px) 45vw, 1px"
    srcset="
            ./assets/img/sci-fi10_100.png 100w,
            ./assets/img/sci-fi10_361.png 361w,
            ./assets/img/sci-fi10_533.png 533w,
            ./assets/img/sci-fi10_658.png 658w,
            ./assets/img/sci-fi10_771.png 771w,
            ./assets/img/sci-fi10_875.png 875w,
            ./assets/img/sci-fi10_969.png 969w,
            ./assets/img/sci-fi10_1048.png 1048w,
            ./assets/img/sci-fi10_1140.png 1140w,
            ./assets/img/sci-fi10_1200.png 1200w"
    src="./assets/img/sci-fi10.png"
    alt="nieuwe sci-fi10 boekenreeks van humo"
  > -->
  <img
    class="home_box-img"
    src="./assets/img/SCI-FI10.png"
    alt="nieuwe sci-fi10 boekenreeks van humo"
  >
  <div class="home_box-text-div">
    <p class="home_box-new">SCI-F10</p>
    <h2 class="home_box-title">SCI-FI10 boekenreeks</h2>
    <p class="home_caption">Enkel de beste Sci-Fi.</p>
    <p class="text-body home_box-text">We hebben voor jou de <span class="bold">10 meest doorslaggevende science-fiction boeken</span> gebundeld in de ‘SCI-FI10’ boekenreeks. In de wekelijkse HUMO magazine vind je een kortingscode terug waardoor jij een <span class="bold">korting van 60%</span> ontvangt op elk van deze boeken.</p>
    <a href="" class="btn btn-primary">ontdek sci-fi10</a>
  </div>
</section>

<div class="home_botw-container">
  <section class="home_botw-section">
    <div class="home_botw-text-div">
    <h2 class="home_box-title">Boek van de week</h2>
    <p class="home_caption">En nog maar net begonnen.</p>
      <p class="home_botw-text">
      De inspiratie voor de briljante film. Een mijlpaal voor de science-fiction. Deze week is '<span class="bold">Ready Player One</span>' aan de beurt. <br><br>
      Een dystopische toekomst in 2044. Na de Grote Recessie leeft een groot deel van de wereldbevolking in totale armoede. De hongerende mensheid vlucht weg in OASIS, een onlinegame dat door miljarden spelers tegelijkertijd gespeeld wordt. Wanneer de ontwerper van het spel, James Halliday, kinderloos sterft, blijkt deze drie sleutels, zogenaamde Easter eggs verstopt te hebben die leiden naar een kluis met zijn erfenis. Degene die de kluis vindt, wordt multimiljardair. Een verbeten virtuele strijd begint om de erfenis van Halliday.
      </p>
      <div class="home_botw-btn_container">
        <a href="index.php?page=producten_detail&id=2" class="btn btn-primary">bekijk het boek</a>
        <a href="" class="btn btn-secondary">lees de longread</a>
      </div>
    </div>
    <img
      class="home_botw-img"
      src="./assets/img/boek_week_ipad.png"
      width="584px" height="450px"
      alt="humo - boek van de week (Do Androids Dream of Electric Sheep?)">
  </section>
</div>

<section class="container bestsellers-section">
  <h2 class="bestellers-title">Bestsellers</h2>
    <div class="bestsellers">

    <?php
    $sliced_producten = array_slice($producten, 0, 3);
    foreach($sliced_producten as $product): ?>
      <article class="bestseller">
        <a class="bestseller-link" href="index.php?page=producten_detail&amp;id=<?php echo $sliced_producten['id']; ?>">
          <img class="bestseller-img" width="320px" height="320px" src="<?php echo $product['img'];?>" alt="<?php echo $item['product']['title'];?>">
        </a>
        <a>
          <p class="bestseller-title">
            <?php echo $product['titel'];?><span class="bestseller-author">
              <?php echo ($product['auteur'] == '' ? $product['categorie'] : $product['auteur']); ?>
            </span>
          </p>
        </a>
        <p class="bestseller-price">€<?php echo $product['prijs'];?></p>
      </article>
      <?php endforeach;?>
      <article class="bestseller">
        <a class="bestseller-link" href="index.php?page=producten_detail&amp;id=<?php echo $producten[13]['id'];?>">
          <img class="bestseller-img" width="320px" height="320px" src="<?php echo $producten[13]['img'];?>" alt="<?php echo $producten[13]['titel'];?>">
        </a>
        <a>
          <p class="bestseller-title">
            <?php echo $producten[13]['titel'];?><span class="bestseller-author">
              <?php echo ($producten[13]['auteur'] == '' ? $producten[13]['categorie'] : $producten[13]['auteur']); ?>
            </span>
          </p>
        </a>
        <p class="bestseller-price">€<?php echo $producten[13]['prijs'];?></p>
      </article>

    </div>
</section>
