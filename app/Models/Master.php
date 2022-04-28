<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql';
    protected $table = 'masters';

    public function endereco() {

        return $this->belongsTo('App\Models\EnderecoMaster', 'endereco_id', 'id');

    }

    public function local_prateleira() {

        return $this->belongsTo('App\Models\Iten', 'secundario', 'secundario');

    }



}
