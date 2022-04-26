<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;


    public function endereco() {

        return $this->belongsTo('App\EnderecoMaster', 'endereco_id', 'id');

    }


}
