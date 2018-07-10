<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'title',
    //     'currency',
    //     'amount_deposited',
    //     'amount_received',
    //     'transaction_id',
    //     'status',
    //     'notes',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';







}
