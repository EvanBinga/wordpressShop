<?php


//Подключаем ядро WordPress
require_once( dirname(__FILE__) . '/../../../wp-load.php');

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

  /*
   * Задача проверить телефон
   */

  //Получаем телефон
  if ( isset($_POST['phone']) && $_POST['phone'] != '' )  {
    $phone = $_POST['phone'];
  } else {
    echo json_encode( array('success' => 0, 'text' => 'Не заполнено поле телефон') );
    exit;
  }

  //Обрезаем возможные пробелы
  $phone = trim($phone);

  //Удаляем из телефона лишние символы +7 (444) 444-4_-__
  $phone = str_replace( array('-','_',' ', '(', ')' ), '', $phone);

  //Проверяем длину телефона
  if ( strlen($phone) < 11 ) {
    echo json_encode( array('success' => 0, 'text' => 'Ошибка: вы указали не полный номер телефона') );
    exit;
  }

  //Задаём получателя
  //Email администратора
  $to = get_option('admin_email');

  //Моя почта для тестов
  /* $to = 'ishutin-pavel@mail.ru'; */

  //Получатель сообщения из моих настроек
  //$to = get_option('email_primary');
  
  //Получаем название сайта - из настроек WordPress
  $blogname = get_option('blogname');

  //Создаём переменную для сообщения почты
  $message = '';

  //Имя
  if ( isset($_POST['name']) && $_POST['name'] != '' )  {
    $message .= 'Имя: ' . $_POST['name'].PHP_EOL;
  }

  //Телефон
  $message .= 'Телефон: ' . $phone.PHP_EOL;

  //Почта
  if ( isset($_POST['email']) && $_POST['email'] != '' )  {
    $message .= 'Почта: ' . $_POST['email'].PHP_EOL;
  }

  //Название организации: 
  if ( isset($_POST['company']) && $_POST['company'] != '' )  {
    $message .= 'Название организации: ' . $_POST['company'].PHP_EOL;
  }

  //Объём потребления компонентов
  if ( isset($_POST['kolichestvo']) && $_POST['kolichestvo'] != '' )  {
    $message .= 'Объём потребления компонентов: ' . $_POST['kolichestvo'].PHP_EOL;
  }

  //Текстовое поле
  if ( isset($_POST['text']) && $_POST['text'] != '' )  {
    $message .= 'Сообщение: ' . $_POST['text'].PHP_EOL;
  }

  //Страница отправки
  if ( isset($_POST['url']) && $_POST['url'] != '' )  {
    $message .= 'Страница отправки: ' . $_POST['url'];
  }

  //Формируем тему письма
  $subject = "Новая заявка с сайта - $blogname";

  $data = [
    'comment_post_ID'      => 2,
    'comment_author'       => 'yoursite',
    'comment_author_email' => 'info@yoursite.ru',
    'comment_author_url'   => 'http://yoursite.ru',
    'comment_content'      => $message,
    'comment_type'         => 'comment',
    'comment_parent'       => 0,
    'user_id'              => 1,
    'comment_author_IP'    => '127.0.0.1',
    'comment_agent'        => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.10) Gecko/2009042316 Firefox/3.0.10 (.NET CLR 3.5.30729)',
    'comment_date'         => null,
    'comment_approved'     => 1,
  ];

  wp_insert_comment( wp_slash($data) );

  //Telegram Bot - Ishutin Pavel's Bot
  //Найти бота в телеграмме по имени
  //Написать любое сообщение
  //В ответе придёт id чата. Вставить ниже chat_id=
  /*
  define('BOT_TOKEN', '644330857:AAHl7UNt-hPNujoUU7KBWNL7elDd3pwP82g');
  $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/";
  if( $message != "" ) :
    $message = urlencode($message);
    file_get_contents($url . "sendMessage?text=$message&chat_id=216096430");
    sleep(1);
  endif;
  */

  /*
   * Загрузка файлов
   * https://www.php.net/manual/ru/features.file-upload.post-method.php
   * https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/
   * !!! вручную создать папку: /uploads/userfiles/
   */
  if ( ! $_FILES['userfile']['size'] == 0 ) {
    // $r = '<pre>' . print_r($_FILES) . '</pre>';
    // echo json_encode( array('success' => 1, 'text' => $r) );
    // exit;

    //Путь к папке
    $path = WP_CONTENT_DIR . '/uploads/userfiles/';

    //Проверяем существование папки и создаём её
    if( ! is_dir( $path ) ) {
      mkdir( $path, 0777, true );
      /* echo 'Папку создали!'; */
    } else {
      /* echo 'Папка существует!'; */
    }

    //Название файла
    $userfile = $_FILES['userfile']['name'];

    //Разрешенные расширения
    $valid_extensions = array( 'docx', 'xlsx', 'jpeg', 'jpg', 'png', 'pdf' ); // valid extensions

    //Получаем расширение файла (после точки)
    $ext = strtolower( pathinfo( $userfile, PATHINFO_EXTENSION ) );

    //Проверка расширения
    if( ! in_array( $ext, $valid_extensions ) ) {
      echo json_encode( array('success' => 0, 'text' => 'Недопустимый тип файла. Можно: pdf, xlsx, docs, jpeg, png') );
      exit;
    }

    //Изменяем имя файла, чтобы можно выло несколько раз отправлять один и тотже файл
    $userfile = rand(1000,1000000) . '.' . $ext;

    $message .= 'Прикреплённый файл: https://' . $_SERVER['SERVER_NAME'] . '/wp-content/uploads/userfiles/' . $userfile;

    //Полный путь к файлу
    $path = $path.strtolower($userfile);

    $tmp = $_FILES['userfile']['tmp_name'];

    if( move_uploaded_file( $tmp, $path ) ) {
      $attachments = array( WP_CONTENT_DIR . '/uploads/userfiles/' . $userfile );
      /* echo json_encode( array('success' => 1, 'text' => 'Файл перемещен в uploads/userfiles') ); */
      /* echo json_encode( array('success' => 1, 'text' => $att) ); */
      /* exit; */
    } else {
      echo json_encode( array('success' => 1, 'text' => 'Файл не был загружен') );
    }
  }//файл


  //Отправляем
  if(
    wp_mail( $to, $subject, $message, $headers = '', $attachments )
  ) {
    require get_template_directory() . '/' . 'b24/b24.php';
    echo json_encode( array('success' => 1, 'text' => 'Сообщение успешно отправлено!') );
    exit;
  } else {
    echo json_encode( array('success' => 0, 'text' => 'Данные формы небыли получены!') );
  }

}//POST
