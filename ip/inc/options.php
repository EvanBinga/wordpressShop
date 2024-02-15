<?php
/*
 * Phone Primary
 * Настройки -> Общие - Телефон первый
 * <?php echo get_option('phone_primary'); ?>
*/
function add_phone_primary() {
  add_settings_field( 'phone_primary', 'Телефон первый', 'admin_phone_primary', 'general' );//добавление поля
  register_setting( 'general', 'phone_primary' );//сохранение в БД
}

function admin_phone_primary() {
   echo "<input type='tel' class='regular-text' name='phone_primary' value='" . esc_attr( get_option( 'phone_primary' ) ) ."'>";
}
add_action('admin_menu', 'add_phone_primary');

/*
 * Phone secondary
 * Настройки -> Общие - Телефон второй
 * <?php echo get_option('phone_secondary'); ?>
*/
function add_phone_secondary() {
  add_settings_field( 'phone_secondary', 'Телефон второй', 'admin_phone_secondary', 'general' );//добавление поля
  register_setting( 'general', 'phone_secondary' );//сохранение в БД
}

function admin_phone_secondary() {
   echo "<input type='tel' class='regular-text' name='phone_secondary' value='" . esc_attr( get_option( 'phone_secondary' ) ) ."'>";
}
add_action('admin_menu', 'add_phone_secondary');

/**
 * Настройки -> Общие -> Режим работы
 * <?php echo get_option('work_time'); ?>
*/
function add_work_time() {
  add_settings_field( 'work_time', 'Режим работы', 'admin_work_time', 'general' );//добавление поля
  register_setting( 'general', 'work_time' );//сохранение в БД
}

//Вывод в админке
function admin_work_time() {
   echo "<input type='text' class='regular-text' name='work_time' value='" . esc_attr( get_option( 'work_time' ) ) ."'>";
}
add_action('admin_menu', 'add_work_time');


/**
 * Настройки -> Общие -> Адрес
 * <?php echo get_option('company_address'); ?>
*/
function add_company_address() {
  add_settings_field( 'company_address', 'Адрес компании 1', 'admin_company_address', 'general' );//добавление поля
  register_setting( 'general', 'company_address' );//сохранение в БД
}

//Вывод в админке
function admin_company_address() {
   echo "<input type='text' class='regular-text' name='company_address' value='" . esc_attr( get_option( 'company_address' ) ) ."'>";
}
add_action('admin_menu', 'add_company_address');



/**
 * Настройки -> Общие -> Адрес
 * <?php echo get_option('company_address_2'); ?>
*/
function add_company_address_2() {
  add_settings_field( 'company_address_2', 'Адрес компании 2', 'admin_company_address_2', 'general' );//добавление поля
  register_setting( 'general', 'company_address_2' );//сохранение в БД
}

//Вывод в админке
function admin_company_address_2() {
   echo "<input type='text' class='regular-text' name='company_address_2' value='" . esc_attr( get_option( 'company_address_2' ) ) ."'>";
}
add_action('admin_menu', 'add_company_address_2');


/**
 * Координаты 1-го адреса
 * Настройки -> Общие -> Координаты
 * <?php echo get_option('coordinates'); ?>
*/
function add_coordinates() {
  add_settings_field( 'coordinates', 'Координаты 1-го адреса', 'admin_coordinates', 'general' );//добавление поля
  register_setting( 'general', 'coordinates' );//сохранение в БД
}

//Вывод в админке
function admin_coordinates() {
   echo "<input type='text' class='regular-text' name='coordinates' value='" . esc_attr( get_option( 'coordinates' ) ) ."'>";
}
add_action('admin_menu', 'add_coordinates');


/**
 * Координаты 2-го адреса
 * Настройки -> Общие -> Координаты
 * <?php echo get_option('coordinates_2'); ?>
*/
function add_coordinates_2() {
  add_settings_field( 'coordinates_2', 'Координаты 2-го адреса', 'admin_coordinates_2', 'general' );//добавление поля
  register_setting( 'general', 'coordinates_2' );//сохранение в БД
}

//Вывод в админке
function admin_coordinates_2() {
   echo "<input type='text' class='regular-text' name='coordinates_2' value='" . esc_attr( get_option( 'coordinates_2' ) ) ."'>";
}
add_action('admin_menu', 'add_coordinates_2');


/**
 * Настройки -> Общие -> Координаты центра
 * <?php echo get_option('coordinates_center'); ?>
*/
function add_coordinates_center() {
  add_settings_field( 'coordinates_center', 'Координаты центра карты', 'admin_coordinates_center', 'general' );//добавление поля
  register_setting( 'general', 'coordinates_center' );//сохранение в БД
}

//Вывод в админке
function admin_coordinates_center() {
   echo "<input type='text' class='regular-text' name='coordinates_center' value='" . esc_attr( get_option( 'coordinates_center' ) ) ."'>";
}
add_action('admin_menu', 'add_coordinates_center');


/**
 * Настройки -> Общие -> Иконка карты
 * <?php echo get_option('work_time'); ?>
*/
function add_preset() {
  add_settings_field( 'preset', 'Иконка карты', 'admin_preset', 'general' );//добавление поля
  register_setting( 'general', 'preset' );//сохранение в БД
}
//Вывод в админке
function admin_preset() {
   echo "<input type='text' class='regular-text' name='preset' value='" . esc_attr( get_option( 'preset' ) ) ."'>";
}
add_action('admin_menu', 'add_preset');

/**
 * Настройки -> Общие -> Инстаграм
 * <?php echo get_option('instagram'); ?>
*/
function add_primaria_instagram() {
  add_settings_field( 'instagram', 'Инстаграм', 'admin_instagram', 'general' );//добавление поля
  register_setting( 'general', 'instagram' );//сохранение в БД
}
//Вывод в админке
function admin_instagram() {
   echo "<input type='text' class='regular-text' name='instagram' value='" . esc_attr( get_option( 'instagram' ) ) ."'>";
}
add_action('admin_menu', 'add_primaria_instagram');


/**
 * Настройки -> Общие -> YouTube
 * <?php echo get_option('youtube'); ?>
*/
function add_primaria_youtube() {
  add_settings_field( 'youtube', 'YouTube', 'admin_youtube', 'general' );//добавление поля
  register_setting( 'general', 'youtube' );//сохранение в БД
}
//Вывод в админке
function admin_youtube() {
   echo "<input type='text' class='regular-text' name='youtube' value='" . esc_attr( get_option( 'youtube' ) ) ."'>";
}
add_action('admin_menu', 'add_primaria_youtube');



/**
 * Настройки -> Общие -> Одноклассники
 * <?php echo get_option('ok'); ?>
*/
function add_primaria_ok() {
  add_settings_field( 'ok', 'Одноклассники', 'admin_ok', 'general' );//добавление поля
  register_setting( 'general', 'ok' );//сохранение в БД
}
//Вывод в админке
function admin_ok() {
   echo "<input type='text' class='regular-text' name='ok' value='" . esc_attr( get_option( 'ok' ) ) ."'>";
}
add_action('admin_menu', 'add_primaria_ok');


/**
 * Настройки -> Общие -> Одноклассники
 * <?php echo get_option('vk'); ?>
*/
function add_primaria_vk() {
  add_settings_field( 'vk', 'Вконтакте', 'admin_vk', 'general' );//добавление поля
  register_setting( 'general', 'vk' );//сохранение в БД
}
//Вывод в админке
function admin_vk() {
   echo "<input type='text' class='regular-text' name='vk' value='" . esc_attr( get_option( 'vk' ) ) ."'>";
}
add_action('admin_menu', 'add_primaria_vk');


/*
 * Viber
 * Настройки -> Общие - Viber
 * <?php echo get_option('viber'); ?>
*/
function add_viber() {
  add_settings_field( 'viber', 'Viber', 'admin_viber', 'general' );//добавление поля
  register_setting( 'general', 'viber' );//сохранение в БД
}

function admin_viber() {
   echo "<input type='tel' class='regular-text' name='viber' value='" . esc_attr( get_option( 'viber' ) ) ."'>";
}
add_action('admin_menu', 'add_viber');


/*
 * whatsapp
 * Настройки -> Общие - whatsapp
 * <?php echo get_option('whatsapp'); ?>
*/
function add_whatsapp() {
  add_settings_field( 'whatsapp', 'Whatsapp', 'admin_whatsapp', 'general' );//добавление поля
  register_setting( 'general', 'whatsapp' );//сохранение в БД
}

function admin_whatsapp() {
   echo "<input type='tel' class='regular-text' name='whatsapp' value='" . esc_attr( get_option( 'whatsapp' ) ) ."'>";
}
add_action('admin_menu', 'add_whatsapp');

/*
 * telegram
 * Настройки -> Общие - telegram
 * <?php echo get_option('telegram'); ?>
*/
function add_telegram() {
  add_settings_field( 'telegram', 'Telegram', 'admin_telegram', 'general' );//добавление поля
  register_setting( 'general', 'telegram' );//сохранение в БД
}

function admin_telegram() {
   echo "<input type='tel' class='regular-text' name='telegram' value='" . esc_attr( get_option( 'telegram' ) ) ."'>";
}
add_action('admin_menu', 'add_telegram');

