<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Utilisateur extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    public $table = "utilisateur";
    public $timestamps = false;

    public function getAuthPassword(){
        return $this->password;
    }

    public function getRememberTokenName(){
        return '';
    }

}
