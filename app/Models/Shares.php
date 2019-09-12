<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Shares extends Model
{
    protected $table = 'sa_shares';

    protected $primaryKey = 'shares_id';

    protected $guarded = [];
}