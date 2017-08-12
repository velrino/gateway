<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Validator;
use App\Models\Users;
use App\Models\Products;
use App\Models\ValidatorModel;

class Payment extends Eloquent
{
  protected $collection = 'Payments';
  protected static $unguarded = true;

  public function validatePayment( array $inputs )
  {
    $validator = Validator::make(
      $inputs,
    [
      'user_id'         => 'required|string|exists:Users,fake_id',
      'product_id'      => 'array|exists:Products,fake_id',
    ], ValidatorModel::$validatorMessage );
    if ($validator->fails()) throw new \Dingo\Api\Exception\StoreResourceFailedException('Pagamento não pode ser efetuado', array_values(array_filter($validator->errors()->toArray())));

    return false;
  }

  public function makePayment($params)
  {
    $this->validatePayment( $params );

    $user = Users::where('fake_id', $params['user_id'])->first();
    $products = Products::whereIn('fake_id', ["1","2"])->get();

    if( empty($user->methods_payment) )
        $user = $this->makeMethodPayment($user);

    $charge = $this->handlingCharge($user,$products->toArray()); 
    \Iugu_Charge::create($charge);
    $Payment = Payment::create(
        array_merge( $charge, ['user' => $user ])
    );
    return true;
  }

  protected function handlingCharge($user,array $products)
  {
      return [
            "customer_payment_method_id"=> $user->methods_payment,
            "restrict_payment_method" => true,
            "email"=>$user->email,
            "items" => $products
        ];
  }

  public function makeMethodPayment($user)
  {
      $Customer =       \Iugu_Customer::create(
        [
          "name" => $user->name,
          "email" => $user->email,
        ]
      );   
      $PaymentMethod =       \Iugu_PaymentMethod::create(
        [
          "customer_id" => $Customer->id,
          "description" => "credit_card",
          "set_as_default" => true,
          "item_type" => 'credit_card',
          "data" => [
            "number" => "4111111111111111",
            "verification_value" => "433",
            "first_name" => "Denis",
            "last_name" => "Velrino",
            "month" => "12",
            "year" => "2019",
          ]
        ]
      );
    Users::where('fake_id', $user->fake_id)->update(['methods_payment' => $PaymentMethod->id]);
    return Users::find($user->fake_id);
  }
}
