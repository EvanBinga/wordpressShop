<div class="good__grid">

  <div class="good__col">

    <div class="good__accord">
      <div id="pg-5" class="good__accord__it active">
        <a class="good__accord__it__title" href="#">Характеристики</a>
        <div class="good__accord__it__cnt"><?php woocommerce_product_additional_information_tab(); ?></div>
      </div>
    <div class="good__accord__it">
        <a class="good__accord__it__title" href="#">Описание</a>
        <div class="good__accord__it__cnt">
          <div class="good__accord__desc"><?php the_content(); ?></div>
        </div>
      </div>
    </div>
  </div>

  <div class="good__col">
    <div class="good__links good-links">
      <div class="good-links__item good-links__item_a">
      <a href="/wp-content/uploads/datasheets/<?php the_field('datasheet'); ?>" class="btn-altair" target="_blank"><i class="fa-light fa-file-pdf"></i> Datasheet</a>
      </div>
      <div class="good-links__item good-links__item_b">
        <a href="#f1__wrap" class="btn btn-invert one-click__btn callBack__link" data-name="" data-id="" data-title="Запросить чертеж">CAD чертеж</a>
      </div>
    </div>
    <div class="good__deliv">
      <div class="good__deliv__title">
        <span>Условия поставки</span>
      </div>
      <div class="good__deliv__line">
        <i class="ico ico-del1">
        </i>
        <div class="good__deliv__line__title">
          <span>Стандарт: 6-8 недель</span>
        </div>
        <div class="good__deliv__line__txt">
          <span>Поставка морем с завода. При разовой закупке до 3000 едениц. Бесплатная доставка при счете от 30 000 руб.</span>
        </div>
      </div>
      <div class="good__deliv__line">
        <i class="ico ico-del2">
        </i>
        <div class="good__deliv__line__title">
          <span>Авиа: до 2 недель</span>
        </div>
        <div class="good__deliv__line__txt">
          <span>Оперативная поставка авиа со склада консолидации. +15% к прайсовой стоимости.</span>
        </div>
      </div>
      <div class="good__deliv__line">
        <i class="ico ico-del3">
        </i>
        <div class="good__deliv__line__title">
          <span>Под проект: от 5 недель</span>
        </div>
        <div class="good__deliv__line__txt">
          <span>Комбинированная поставка к конкретной дате. -15% от прайсовой стоимости. От 3000 едениц. Доставка - бесплатно.</span>
        </div>
      </div>
    </div>
  </div>

</div>
