<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dependente extends Model
{
    protected $fillable = ['name','datanacimento','id_funcionario'];
}
