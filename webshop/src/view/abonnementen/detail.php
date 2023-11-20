<div class="container">
  <header class="heading">
    <h1 class="h1-like">abonnementen.</h1>
    <p class="header_nav"><a>home</a> > <a>abonnementen</a> > op papier</p>
  </header>

  <section class="abo_detail">

    <div class="abo_detail-flex">
      <img class="abo_detail-img"
        src="./assets/img/abo_digital.png"
        width="500px"
        alt="humo boeken illustratie">
      <div class="">
        <h3>Digitaal</h3>
        <ul class="abo_list">
          <li class="abo_list-item abo_list-item_active">Elke dinsdag bij jou thuis geleverd</li>
          <li class="abo_list-item">Humo waar en wanneer u wilt</li>
          <li class="abo_list-item">Altijd toegang tot digitale versie</li>
          <li class="abo_list-item">Onbeperkte toegang tot onze straffe onderzoeksjournalistiek</li>
          <li class="abo_list-item">Exclusieve voordelen</li>
        </ul>
      </div>
    </div>

    <div class="abo_detail-choose" method="post" action="index.php?page=add-to-cart&amp;id=<?php?>">
      <p class="abo_detail-form_title">Hoelang wil je abonneren?</p>
      <div class="detail-form-options abo_detail-form_options">
        <input class="detail-form-input abo_detail-form_input" type="radio" name="abo" id="12">
        <label class="detail-form-label abo_detail-form_label" for="12">12 maanden <span class="abo_detail-form_amount">€16,50/maand</span></label>
        <input class="detail-form-input abo_detail-form_input" type="radio" name="abo" id="24">
        <label class="detail-form-label abo_detail-form_label" for="24">24 maanden <span class="abo_detail-form_amount">€14,50/maand</span></label>
        <input class="detail-form-input abo_detail-form_input" type="radio" name="abo" id="36">
        <label class="detail-form-label abo_detail-form_label" for="36">36 maanden <span class="abo_detail-form_amount">€11,50/maand</span></label>
      </div>

      <div class="abo_detail-forms">
        <!-- add-to-cart -->
        <form class="abo_detail-form_cart" method="post" action="index.php?page=add-to-cart&amp;id=<?php?>">
          <input class="btn btn-primary add-to-cart" type="submit" name="add" id="add-to-cart" value="toevoegen in winkelmandje">
        </form>
        <!-- add-to-fav -->
        <form class="abo_detail-form_cart" method="post" action="index.php?page=add-to-cart&amp;id=<?php?>">
          <input class="btn btn-secondary add-to-fav" type="submit" name="add" id="add-to-cart" value="toevoegen in winkelmandje">
        </form>
      </div>

    </div>

  </section>
</div>
