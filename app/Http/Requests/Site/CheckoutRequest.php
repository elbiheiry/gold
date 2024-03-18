<?php

namespace App\Http\Requests\Site;

use App\Checkout;
use App\Order;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
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
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => $validator->errors()->all()];

        throw new HttpResponseException(response()->json($result , 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required',
            'country_id' => 'not_in:0',
            'city_id' => 'not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'You must insert your phone number',
            'country_id.not_in' => 'You should select your country',
            'city_id.not_in' => 'You must select your city'
        ];
    }

    public function store()
    {
        $checkout = new Checkout();

        $checkout->member_id = auth()->guard('site')->user()->id;
        $checkout->last_name = $this->last_name;
        $checkout->phone = $this->phone;
        $checkout->address = $this->address;
        $checkout->country_id = $this->country_id;
        $checkout->city_id = $this->city_id;
        $checkout->total = Cart::total();

        if ($checkout->save()){
            $products = Cart::content();
            foreach ($products as $product) {
                $order = new Order();

                $order->name = $product->name;
                $order->qty = $product->qty;
                $order->price = $product->price;
                $order->total = $product->subtotal();
                $order->checkout_id = $checkout->id;

                $order->save();
            }
        }
    }
}
