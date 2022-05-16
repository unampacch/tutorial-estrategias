<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario_b1_03 extends Model {

    protected $table = 'cuestionario_b1_03';
    //public $timestamps = false;

    protected $fillable = ['usuarios_id', 'p1', 'p2', 'p3'];
    protected $guarded = ['id'];

    const CREATED_AT = 'creacion';
    const UPDATED_AT = 'actualizacion';

    public static function findByUsername($username) {
        return static::where('Usuario', $username)->first();
    }

    public static function guardaRespuestas($id, $p1, $p2, $p3){

        $resp = static::create([
            'usuarios_id' => $id,
            'p1' => $p1,
            'p2' => $p2,
            'p3' => $p3
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
