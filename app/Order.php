<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  const PENDING  = 0;
  const ACCEPTED = 1;
  const REJECTED = 2;

  public function users()
  {
  	return $this->belongsTo('User');
  }

  public function payment_success(){
    $this->payment_status = self::ACCEPTED;
    $this->save();
  }

  public function payment_rejected(){
    if ($this->payment_status != self::ACCEPTED)
    {
      $this->payment_status = self::REJECTED;
      $this->save();
    }
  }


// "id" => "1"
//     "title" => "Algun producto de prueba"
//     "quantity" => 1
//     "currency_id" => "ARS"
//     "unit_price" => 120.0
  //<p>'.$order['description'].'</p> <p> '.$order['price'].'



  public function unserialize_detail($id)
  { 
    $orders = Order::find($id);
    return unserialize($orders->order_description);
  }
}
