<div class="container">

  <header class="products_header">
    <h1 class="h1-like">alle Producten.</h1>
  </header>

  <div class="filter">

    <div class="filter_categories">
      <form class="filter_category" action="index.php?" class="filter_category">
        <input type="hidden" name="page" value="producten"/>
        <button class="filter_category-input" type="submit" value="">
          <img class="filter_category-img" src="./assets/img/products_icon.png" width="200px" height="200px" alt="">
          alle producten
        </button>
      </form>
      <?php foreach($categories as $categorie):?>
        <form class="filter_category" action="index.php?">
          <input type="hidden" name="page" value="producten"/>
          <input type="hidden" name="action" value="filter" />
          <input type="hidden" name="categorie" value="<?php echo $categorie['categorie'];?>"/>
          <button class="filter_category-input" type="submit" value="">
            <img class="filter_category-img"
                 src="<?php echo ($categorie['categorie'] == 'boek' ? './assets/img/home_books.svg' : './assets/img/home_gadgets.svg'); ?>" width="200px" height="200px" alt="">
            <?php echo ($categorie['categorie'] == 'boek' ? 'boeken' : 'accesoires'); ?>
          </button>
        </form>
      <?php endforeach;?>
    </div>

  </div>

  <section class="products">

  <?php foreach($producten as $product): ?>
    <article class="product">
      <form class="product_add-to-fav add-to-fav" method="post" action="index.php?page=add-to-fav&amp;id=<?php echo $product['id']?>">
        <input class="btn btn-cart_fav" type="submit" name="add" id="add-to-cart" value="">
      </form>
      <a class="product-link" href="index.php?page=producten_detail&amp;id=<?php echo $product['id']; ?>">
        <div class="products-img-div">
          <img class="products-img" src="<?php echo $product['img']; ?>" width="450px" height="450px" alt="<?php echo $product['naam'] . ' - ' . $product['auteur'];?>">
        </div>
        <p class="products-title"><?php echo $product['titel'];?></p>
        <span class="products-author"><?php echo ($product['auteur'] == '' ? $product['categorie'] : $product['auteur']); ?></span>
      </a>
      <p class="products-description"><?php echo $product['beschrijving'];?></p>
      <div class="products-price-div">
        <p class="products-price">€<?php echo $product['prijs'];?></p>
        <!-- add_product = public function-->
        <form method="post" action="index.php?page=add-to-cart&amp;id=<?php echo $product['id']?>">
          <!-- add-to-cart = page name -->
          <input class="btn btn-primary btn-cart_add" type="submit" name="add" id="add-to-cart" value="">
        </form>
      </div>
    </article>
  <?php endforeach; ?>

  </section>



</div>
