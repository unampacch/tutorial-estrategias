<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Avance extends Model {

    protected $table = 'avance';
    protected $fillable = ['usuarios_id', 'ingresos','bloque_1',
        'b0_00', 'b1_00', 'b1_01', 'b1_02', 'b1_03',
        'b2_00', 'b2_01', 'b2_02', 'b2_03', 'b2_04', 'b2_05', 'b2_06', 'b2_07', 'b2_08', 'b2_09', 'b2_10',
        'b3_00', 'b3_01', 'b3_02', 'b3_03', 'b3_04', 'b3_05',
        'b4_00', 'b4_00', 'b4_01', 'b4_02', 'b4_03',
        'b5_00',
        'bloque_1', 'bloque_2', 'bloque_3', 'bloque_4', 'opinion'];
    protected $guarded = ['id'];
    const CREATED_AT = 'creacion';
    const UPDATED_AT = 'actualizacion';

    public static function findByUsername($username) {
        return static::where('usuario', $username)->first();
    }

    /*public static function inserta_ext($user){

        if( is_array($user) ){
            $user = $user[0];
        }

        $usuario = static::create([
            'usuarios_id' => $user->username,
            'ingresos' => $user->firstname,
            'b0_00' => $user->lastname,
            'b1_00' =>,
            'b1_01' =>,
            'b1_02' =>,
            'b1_03' =>,
            'b2_00' =>,
            'b2_01' =>,
            'b2_02' =>,
            'b2_03' =>,
            'b2_04' =>,
            'b2_05' =>,
            'b2_06' =>,
            'b2_07' =>,
            'b2_08' =>,
            'b2_09' =>,
            'b2_10' =>,
            'b3_00' =>,
            'b3_01' =>,
            'b3_02' =>,
            'b3_04' =>,
            'b3_05' =>,
            'b4_00' =>,
            'b4_00' =>,
            'b4_01' =>,
            'b4_02' =>,
            'b4_03' =>,
            'bloque_1' =>,
            'bloque_2' =>,
            'bloque_3' =>,
            'bloque_4' =>,
            'opinion' =>
        ]);

        $usuario->save();
    }*/

    public static function registra($id, $seccion) {
        $user = static::where('usuarios_id', $id)->first();

        $bloque1 = (($user->b1_01 + $user->b1_02 + $user->b1_03) / 3) * 100;
        $bloque2 = (($user->b2_01 + $user->b2_02 + $user->b2_03 + $user->b2_04 + $user->b2_05 + $user->b2_06 + $user->b2_07 + $user->b2_08 + $user->b2_09 + $user->b2_10)/10)*100;
        $bloque3 = (($user->b3_01 + $user->b3_02 + $user->b3_03 + $user->b3_04 + $user->b3_05)/5)*100;
        $bloque4 = (($user->b4_01 + $user->b4_02 + $user->b4_03)/3)*100;

        if ($user !== null) {
            try{
                $user->update(
                    [$seccion => 1,
                    'bloque_1' => $bloque1,
                    'bloque_2' => $bloque2,
                    'bloque_3' => $bloque3,
                    'bloque_4' => $bloque4

                ]);
            }catch (ModelNotFoundException $e){
                echo "Error".$e;
            }
        } else {
            $user = static::create(['usuarios_id' => $id, $seccion => 1]);
        }

        $user->save();
    }

    public static function registra_opinion($id){
        $user = static::where('usuarios_id', $id)->first();

        $bloque1 = (($user->b1_01 + $user->b1_02 + $user->b1_03) / 3) * 100;
        $bloque2 = (($user->b2_01 + $user->b2_02 + $user->b2_03 + $user->b2_04 + $user->b2_05 + $user->b2_06 + $user->b2_07 + $user->b2_08 + $user->b2_09 + $user->b2_10)/10)*100;
        $bloque3 = (($user->b3_01 + $user->b3_02 + $user->b3_03 + $user->b3_04 + $user->b3_05)/5)*100;
        $bloque4 = (($user->b4_01 + $user->b4_02 + $user->b4_03)/3)*100;

        $user->update(
            ['opinion' => 100,
            'bloque_1' => $bloque1,
            'bloque_2' => $bloque2,
            'bloque_3' => $bloque3,
            'bloque_4' => $bloque4

        ]);
        $user->save();
    }
}
