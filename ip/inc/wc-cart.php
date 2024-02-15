<?php


/*
 * Необязательные поля
 */
add_filter( 'woocommerce_billing_fields', 'custom_override_checkout_fields', 10, 1 );

function custom_override_checkout_fields( $fields ) {
	/* $fields['billing_email']['required'] = false; //Email не обязательно */
	/* unset($fields['billing_email']); */

	//$fields['billing_last_name']['required'] = false; //Фамилия не обязательно

  //print_r($fields);

	return $fields;
}


/*
 * Удаляем поля
 */
add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );

function custom_override_default_address_fields( $address_fields ) {
  $address_fields['address_1']['placeholder'] = 'Полный адрес для отдела доставки';
  unset($address_fields['country']);
  unset($address_fields['company']);
  unset($address_fields['city']);
  unset($address_fields['state']);
  unset($address_fields['postcode']);
  unset($address_fields['address_2']);

  //print_r($address_fields);

  return $address_fields;
}

