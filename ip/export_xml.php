<?php
/* Template Name: Custom XML Export */
header('Content-type: text/xml');

// Подключаем файлы WordPress
require_once('wp-load.php');

// Создаем новый объект SimpleXMLElement для формирования XML
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><yml_catalog date="' . date('c') . '"></yml_catalog>');

// Добавляем информацию о магазине и компании
$shop = $xml->addChild('shop');
$shop->addChild('name', 'Альтаир');
$shop->addChild('company', 'ООО Альтаир');
$shop->addChild('url', 'https://altaircom.ru');

// Получаем категории из базы данных
$categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
));

// Добавляем категории в XML
$categoriesElement = $shop->addChild('categories');
foreach ($categories as $category) {
    $categoryElement = $categoriesElement->addChild('category', $category->name);
    $categoryElement->addAttribute('id', $category->term_id);
    // Если у категории есть родительская категория, добавляем parentId
    if ($category->parent) {
        $categoryElement->addAttribute('parentId', $category->parent);
    }
    // Добавьте другие атрибуты URL и т.д. по аналогии
}

// Получаем товары из базы данных
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
);

$query = new WP_Query($args);
$products = $query->get_posts();

// Добавляем товары в XML
$offersElement = $shop->addChild('offers');
foreach ($products as $product) {
    $offerElement = $offersElement->addChild('offer');
    // Добавьте атрибуты и элементы для каждого товара по аналогии
    $offerElement->addChild('name', $product->post_title);
    // Добавьте остальные элементы товара сюда
}

// Выводим XML в браузер или сохраняем в файл
Header('Content-type: text/xml');
print($xml->asXML());
?>
