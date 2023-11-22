<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\orders;

use App\Models\Notifications;

use illuminate\support\Facades\Auth;

class orders extends Model
{
    protected $fillable=['total', 'status','order_number'];
    public function orderFields(){

        return $this->belongsToMany(Menu::class)->withPivot('qty', 'total');

    }

    public static function createOrder($order_number){

        $user = Auth::user();
        $order = $user->orders()->create(['total'=>\Cart::getTotal(),'status'=>'pending', 'order_number'=>$order_number]);

        $cartItems = \Cart::getContent();
        foreach($cartItems as $cartItem)

            $order->orderFields()->attach($cartItem->id,['qty'=>$cartItem->qty, 'tax' =>0, 'total'=>\Cart::getTotal()]);
            //Insert Notification
            $Notifications = new Notifications;
            $Notifications->type = 'Order';
            $Notifications->content = 'You have a new Order';
            $Notifications->save();

       }


    }

