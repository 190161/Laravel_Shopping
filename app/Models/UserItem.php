<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class userItem extends Model
{
    //
    protected $table = 'user_items';
    protected $primaryKey = 'id';
    protected static $session_key = 'user_items';
    protected $fillable = [
        'amount',
        'user_id',
        'item_id',
        'price',
        'tax',
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    static public function sessionValues(Request $request)
    {
        $values = [];
        if ($request->session()->has(self::$session_key)) {
            $values = $request->session()->get(self::$session_key);
        }
        return $values;
    }
    static public function sessionValue(Request $request)
    {
        $values = UserItem::sessionValues($request);
        if (isset($values[$request->id])) {
            return $values[$request->id];
        }
    }
    static public function saveSession(Request $request, UserItem $user_item)
    {
        $values = UserItem::sessionValues($request);
        $values[$user_item->item_id] = $user_item; //items.id をキーとする
        $request->session()->put(self::$session_key, $values);
    }
}
