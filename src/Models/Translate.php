<?php

namespace Vinsofts\Translates;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    protected $table = 'translates';
    protected $fillable = [
    	'in_code', 'en', 'vn'
    ];
}
