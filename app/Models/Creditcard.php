<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Creditcard extends Model
{
    use HasFactory;


    public function scopeVerifyIfUserUsingExistingCard($query, $request){
        return (object) $query->where([['card_number', $request->card_number], ['user_id', Auth::user()->id]]);
    }

    public static function newCardFill($request)
    {

        $newCreditCard = new Creditcard();
        $newCreditCard->name = $request->name;
        $newCreditCard->card_number = $request->card_number;
        $newCreditCard->cvc = $request->cvc;
        $newCreditCard->month = $request->month;
        $newCreditCard->year = $request->year;
        $newCreditCard->user_id = Auth::user()->id;

        $newCreditCard->save();
    }
}
