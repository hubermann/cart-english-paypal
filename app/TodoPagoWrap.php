<?php
namespace App;

use TodoPago\Sdk;

class TodoPagoWrap {
  private $TP;
  const MODE = 'test';

  //credenciales
  const MERCHANTPROD = '2323'; //produccion
  const AUTHKEYPROD = 'TODOPAGO a414b821c9034137a566d6f1ec077578';
  const SECURITYPROD = 'a414b821c9034137a566d6f1ec077578';

  const MERCHANTTEST = '2323'; //test
  const AUTHKEYTEST = 'TODOPAGO a414b821c9034137a566d6f1ec077578';
  const SECURITYTEST = 'a414b821c9034137a566d6f1ec077578';

  const URL_OK  = 'http://localhost:8000/todo_pago/payment_success/?operationid=';
  const URL_KO  = 'http://localhost:8000/todo_pago/payment_error/?operationid=';

  const COUNTRY = 'AR';


  private $merchant;
  private $authKey;
  private $security;

  public $items            = [];
  public $id_order;
  public $url_form_pago ;

  public $billing_country  = 'AR';

  public $client_email;
  public $client_name;
  public $client_surname;
  public $client_user_id;
  public $client_ip;

  public $receiving_name;
  public $receiving_surname;
  public $receiving_email;

  public $billing_address  = ['street_name'=> '', 'street_number' => '', 'dpto' => ''];
  public $client_telephone;
  public $billing_state;
  public $billing_city;
  public $billing_zip_code;

  public $shipment_address = ['street_name'=> '', 'street_number' => '', 'dpto' => ''];
  public $receiving_telephone;
  public $shipment_state;
  public $shipment_city;
  public $shipment_zip_code;

  //Valores posibles(adult_content;coupon;default;electronic_good;electronic_software;gift_certificate;handling_only;service;shipping_and_handling;shipping_only;subscription)
  public $code_products_type = 'electronic_good';

  public $error_message = 'No errors';
  public $error_code    = -1;

  public static $CURRENCYS = [
    'ARS' => [
      'currency'      => 'ARS',
      'currency_code' => 32,
    ],
  ];

  private static $STATE_CODES = [
    'C' => 'Capital Federal',
    'B' => 'Buenos Aires',
    'K' => 'Catamarca',
    'H' => 'Chaco',
    'U' => 'Chubut',
    'X' => 'Córdoba',
    'W' => 'Corrientes',
    'E' => 'Entre Ríos',
    'P' => 'Formosa',
    'Y' => 'Jujuy',
    'L' => 'La Pampa',
    'F' => 'La Rioja',
    'M' => 'Mendoza',
    'N' => 'Misiones',
    'Q' => 'Neuquén',
    'R' => 'Río Negro',
    'A' => 'Salta',
    'J' => 'San Juan',
    'D' => 'San Luis',
    'Z' => 'Santa Cruz',
    'S' => 'Santa Fe',
    'G' => 'Santiago del Estero',
    'V' => 'Tierra del Fuego',
    'T' => 'Tucumán',
  ];

  public $answer_key; //usado en comprobación de success

  private $currency_id = 'ARS'; //representa la modeda por defecto dentro del sistema

  public function __construct()
  {

    if (self::MODE == 'prod')
    {
        $this->merchant = self::MERCHANTPROD;
        $this->authKey  = self::AUTHKEYPROD;
        $this->security = self::SECURITYPROD;
    } else if (self::MODE == 'test')
    {
        $this->merchant = self::MERCHANTTEST;
        $this->authKey  = self::AUTHKEYTEST;
        $this->security = self::SECURITYTEST;
    }

    $http_header = [
        'Authorization' => $this->authKey,
        'user_agent'    => 'PHPSoapClient',
    ];

    $this->TP = new Sdk($http_header, self::MODE);
  }

  public function checkOut()
  {
    $formData            = $this->prepareForm($this->items);

    $optionsSAR_comercio = [
        'Security'       => $this->security,
        'EncodingMethod' => 'XML',
        'Merchant'       => $this->merchant,
        'URL_OK'         => self::URL_OK . $this->id_order,
        'URL_ERROR'      => self::URL_KO . $this->id_order,
    ];

    $optionsSAR_operacion = [
        'MERCHANT'               => $this->merchant,
        'OPERATIONID'            => $this->id_order,
        'CURRENCYCODE'           => self::$CURRENCYS[$this->currency_id]['currency_code'],
        'AMOUNT'                 => $this->formatPrice($formData['total']),

        'CSBTCITY'               => $this->billing_city,  //Ciudad de facturación, MANDATORIO.
        'CSSTCITY'               => $this->shipment_city, //Ciudad de envío de la orden. MANDATORIO.

        'CSBTCOUNTRY'            => self::COUNTRY, //País de facturación. MANDATORIO. Código ISO. (http://apps.cybersource.com/library/documentation/sbc/quickref/countries_alpha_list.pdf)
        'CSSTCOUNTRY'            => $this->billing_country, //País de envío de la orden. MANDATORIO.

        'CSBTEMAIL'              => $this->client_email, //Mail del usuario al que se le emite la factura. MANDATORIO.
        'CSSTEMAIL'              => $this->receiving_email, //Mail del destinatario, MANDATORIO.

        'CSBTFIRSTNAME'          => $this->client_name, //Nombre del usuario al que se le emite la factura. MANDATORIO.
        'CSSTFIRSTNAME'          => $this->receiving_name, //Nombre del destinatario. MANDATORIO.

        'CSBTLASTNAME'           => $this->client_surname, //Apellido del usuario al que se le emite la factura. MANDATORIO.
        'CSSTLASTNAME'           => $this->receiving_surname, //Apellido del destinatario. MANDATOR IO.

        'CSBTPHONENUMBER'        => $this->client_telephone, //Teléfono del usuario al que se le emite la factura. No utilizar guiones, puntos o espacios. Incluir código de país. MANDATORIO.
        'CSSTPHONENUMBER'        => $this->receiving_telephone, //Número de teléfono del destinatario. MANDATORIO.

        'CSBTPOSTALCODE'         => $this->billing_zip_code, //Código Postal de la dirección de facturación. MANDATORIO.
        'CSSTPOSTALCODE'         => $this->shipment_zip_code, //Código postal del domicilio de envío. MANDATORIO.

        'CSBTSTATE'              => $this->billing_state, //Provincia de la dirección de facturación. MANDATORIO. Ver tabla anexa de provincias.
        'CSSTSTATE'              => $this->shipment_state, //Provincia de envío. MANDATORIO. Son de 1 caracter

        'CSBTSTREET1'            => $this->get_full_address($this->billing_address), //Domicilio de facturación (calle y nro). MANDATORIO.
        'CSSTSTREET1'            => $this->get_full_address($this->shipment_address), //Domicilio de envío. MANDATORIO.

        'CSBTCUSTOMERID'         => $this->client_user_id, //Identificador del usuario al que se le emite la factura. MANDATORIO. No puede contener un correo electrónico.
        'CSBTIPADDRESS'          => $this->client_ip, //IP de la PC del comprador. MANDATORIO.
        'CSPTCURRENCY'           => self::$CURRENCYS[$this->currency_id]['currency'], //Moneda. MANDATORIO.
        'CSPTGRANDTOTALAMOUNT'   => $this->formatPrice($formData['total']), //Con decimales opcional usando el punto como separador de decimales. No se permiten comas, ni como separador de miles ni como separador de decimales. MANDATORIO.

        'CSITPRODUCTCODE'        => $formData['code'],           //Código de producto. CONDICIONAL. Valores posibles(adult_content;coupon;default;electronic_good;electronic_software;gift_certificate;handling_only;service;shipping_and_handling;shipping_only;subscription)
        'CSITPRODUCTDESCRIPTION' => $formData['descripcion'],  //Descripción del producto. CONDICIONAL.
        'CSITPRODUCTNAME'        => $formData['nombres'],    //Nombre del producto. CONDICIONAL.
        'CSITPRODUCTSKU'         => $formData['ids'],        //Código identificador del producto. CONDICIONAL.
        'CSITTOTALAMOUNT'        => $formData['subtotales'],  //CSITTOTALAMOUNT=CSITUNITPRICE*CSITQUANTITY "999999[.CC]" Con decimales opcional usando el punto como separador de decimales. No se permiten comas, ni como separador de miles ni como separador de decimales. CONDICIONAL.
        'CSITQUANTITY'           => $formData['cantidades'], //Cantidad del producto. CONDICIONAL.
        'CSITUNITPRICE'          => $formData['unitarios'],  //Formato Idem CSITTOTALAMOUNT. CONDICIONAL.
    ];

    $rta = $this->TP->sendAuthorizeRequest($optionsSAR_comercio, $optionsSAR_operacion);

    session(['todo_pago_request_key' => $rta['RequestKey']]);

    if ($rta['StatusCode'] == -1)
    {
        $this->url_form_pago = $rta['URL_Request'];
        return true;
    } else
    {
        $this->error_message = $rta['StatusMessage'];
        $this->error_code    = $rta['StatusCode'];
        return false;
    }
  }

  public function payment_success()
  {

    $optionsGAA = [
      'Security'   => $this->security,
      'Merchant'   => $this->merchant,
      'RequestKey' => session('todo_pago_request_key'),
      'AnswerKey'  => $this->answer_key,
    ];

    $rta = $this->TP->getAuthorizeAnswer($optionsGAA);

    if ($rta['StatusCode'] == -1)
    {
	     return true;
    }
    else
    {
       $this->error_message = $rta['StatusMessage'];
       $this->error_code    = $rta['StatusCode'];
	     return false;
    }

  }

  private function formatPrice($precio, $decimals = 2)
  {
      return number_format($precio, $decimals, '.', '');
  }

  private function get_full_address($address)
  {
    return $address['street_name'].' '.$address['street_number'];
  }

  private function prepareForm($items)
  {
      $form  = [];
      $total = 0;

      if ($items !== null)
      {
          foreach ($items as $item)
          {
              //hay que tener en cuenta que en todo pago el tiquet admite solo una moneda
              $this->currency_id = $item['currency_id'];

              $form['descripciones'][] = $item['quantity'].' '.$item['title'];
              $form['unitarios'][]     = $this->formatPrice($item['unit_price']);
              $form['cantidades'][]    = $item['quantity'];
              $form['nombres'][]       = $item['title'];
              $form['ids'][]           = $item['id'];
              $form['code'][]          = $this->code_products_type;
              $form['subtotales'][]    = $this->formatPrice($item['unit_price'] * $item['quantity']);
              $total                  += $item['unit_price'] * $item['quantity'];
          }

          $form['unitarios']     = implode('#', $form['unitarios']);
          $form['cantidades']    = implode('#', $form['cantidades']);
          $form['nombres']       = implode('#', $form['nombres']);
          $form['subtotales']    = implode('#', $form['subtotales']);
          $form['ids']           = implode('#', $form['ids']);
          $form['descripcion']   = implode('#', $form['descripciones']);
          $form['code']          = implode('#', $form['code']);
          $form['total']         = $total;
      }

      return $form;
  }

  public static function get_all_state_code(){
    return self::$STATE_CODES;
  }
}
