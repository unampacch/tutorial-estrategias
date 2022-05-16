<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario_b2_04 extends Model {

    protected $table = 'cuestionario_b2_04';
    //public $timestamps = false;

    protected $fillable = ['usuarios_id', 'p1', 'p2'];
    protected $guarded = ['id'];

    const CREATED_AT = 'creacion';
    const UPDATED_AT = 'actualizacion';

    public static function guardaRespuestas($id, $p1, $p2){

        $resp = static::create([
            'usuarios_id' => $id,
            'p1' => $p1,
            'p2' => $p2,
        ]);

        $resp->save();
    }

    public static function revisa($id){
        $user = static::where('usuarios_id', $id)->first();

        if ($user !== null) {
            return 1;
        }else{
            return 0;
        }
    }
}
