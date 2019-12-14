<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
   public $fillable =['ar_name',
                      'en_name',
                      'natural_account',
                      'level',
                      'accounting_code',
                      'account_icon',
                      'parent_id'];


    public function childs() {

        return $this->hasMany('App\Account', 'parent_id' , 'id');
    }             
}
