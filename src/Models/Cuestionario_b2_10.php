<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario_b2_10 extends Model {

    protected $table = 'cuestionario_b2_10';

    protected $fillable = ['usuarios_id', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11'];
    protected $guarded = ['id'];

    const CREATED_AT = 'creacion';
    const UPDATED_AT = 'actualizacion';

    public static function guardaRespuestas($id, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11){

        $resp = static::create([
            'usuarios_id' => $id,
            'p1' => $p1,
            'p2' => $p2,
            'p3' => $p3,
            'p4' => $p4,
            'p5' => $p5,
            'p6' => $p6,
            'p7' => $p7,
            'p8' => $p8,
            'p9' => $p9,
            'p10' => $p10,
            'p11' => $p11,
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
