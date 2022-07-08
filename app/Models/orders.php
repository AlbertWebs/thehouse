<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\orders;

use App\Models\Notifications;

use illuminate\support\Facades\Auth;

class orders extends Model
{
    protected $fillable=['total', 'status'];
    public function orderFields(){

        return $this->belongsToMany(products::class)->withPivot('qty', 'total');

    }

    public static function createOrder(){

        $user = Auth::user();
        $order = $user->orders()->create(['total'=>\Cart::getTotal(),'status'=>'pending']);

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

