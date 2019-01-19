<?php

namespace App\Http\Requests;

use App\OrderProduct;
use Illuminate\Foundation\Http\FormRequest;
use Stripe\{Charge, Customer};
use Cart;
class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->canCheckout();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'stripeToken' => 'required|string'
        ];
    }


    /**
     * First the customer will checkout by the payment gateway
     * then we will create a record in orders table for the customer
     * after this we will create a new record in order_product table
     * when the 3 points done > Just we will clear the coupon session if it exists and user cart
     * will be cleared
     * @return string
     */
    public function persist(){

        $user = $this->user();
        // user cart total
        $cartTotal = $user->cartTotal($toDollar = false, $dollarSign = false);

        // check for a coupon and a get the discount
        if($coupon = session('coupon')){
            // discount must be 100% if it was bigger than the cart grand total
            $discount = $coupon['discount'] >= $cartTotal ? $cartTotal : $coupon['discount'];
        }else{
            $discount = 0;
        }

        $grandTotal = $cartTotal - $discount;

            if($this->customerCheckout($user, $grandTotal, $coupon, $discount)){
                $this->recordInOrdersTables($user, $grandTotal, $coupon, $discount);
            }

            $this->forgetSession($user);
    }

    private function recordInOrdersTables($user, $grandTotal, $coupon, $discount){
        $orderData = [
            'user_id' => $this->user()->id,
            'discount' => $discount,
            'coupon_code' => $coupon['code'] ?: null,
            'total' => $grandTotal
        ];

        $order = $user->newOrder($orderData);

        foreach($user->cartItems() as $item){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['attributes']['product']['id'],
                'quantity' => $item['quantity']
            ]);
        }
    }
    /**
     * Stripe Checkout
     * @param $user
     * @param $grandTotal
     * @param $coupon
     * @param $discount
     * @return bool
     */
    private function customerCheckout($user, $grandTotal, $coupon, $discount){
        $customer = Customer::create([
            'email' => $user->email,
            'source' => $this->stripeToken
        ]);

        Charge::create([
            'customer' => $customer->id,
            'amount' => $grandTotal,
            'currency' => 'usd',
            'metadata' => [
                'content' => $this->getMetaData($user),
                'quantity' => $user->cartItemsCount(),
                'coupon' => $coupon['code'] ?: "no coupon",
                'discount' => $discount
            ],
        ]);

        session()->flash('payment_succeeded', 'success');

        return true;
    }
    /**
     * Get the meta data that will send to the payment gateway
     * @param $user
     * @return mixed
     */
    private function getMetaData($user){
        return $user->cartItems()->map(function($item){
            return "product:" . $item['attributes']['product']['slug'] . " | qnt: ". $item['quantity'] . "<br>";
        })->values()->toJson();
    }

    /**
     * Clear authenticated user cart - coupon session
     * @param $user
     */
    private function forgetSession($user){
        Cart::session($user->id)->clear();

        if(session()->has('coupon')){
            session()->forget('coupon');
        }
    }
}
