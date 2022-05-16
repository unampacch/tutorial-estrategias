<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario_b2_06_1 extends Model {

    protected $table = 'cuestionario_b2_06_1';

    protected $fillable = ['usuarios_id', 'p1', 'p2', 'p3'];
    protected $guarded = ['id'];

    const CREATED_AT = 'creacion';
    const UPDATED_AT = 'actualizacion';

    public static function guardaRespuestas($id, $p1, $p2, $p3){

        $resp = static::create([
            'usuarios_id' => $id,
            'p1' => $p1,
            'p2' => $p2,
            'p3' => trim($p3)
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

    public static function retro($id){
        $user = static::where('usuarios_id', $id)->first();

        $rp = 0;
        $plantel = '';
        $titulo = '';

        switch (trim($user->p3)) {
            case 'PQ7297.P21B37':
                if ($user->p2 == 1){
                    $rp = 1;
                }
                break;
            case 'PQ7297.F85A813':
                if ($user->p2 == 2){
                    $rp = 1;
                }
                break;
            case 'PQ8180.17A73A55':
                if ($user->p2 == 3){
                    $rp = 1;
                }
                break;
        }

        switch ($user->p1) {
            case 31:
                $plantel = 'Azcapotzalco';
                break;
            case 32:
                $plantel = 'Naucalpan';
                break;
            case 33:
                $plantel = 'Vallejo';
                break;
            case 34:
                $plantel = 'Oriente ';
                break;
            case 35:
                $plantel = 'Sur';
                break;
        }

        switch ($user->p2) {
            case 1:
                $titulo = 'Las Batallas en el Desierto ';
                break;
            case 2:
                $titulo = 'Aura';
                break;
            case 3:
                $titulo = 'El Amor en los Tiempos del Cólera ';
                break;
        }

        $respuestas = ['p1' => $plantel, 'p2' => $titulo, 'p3'=>$user->p3, 'retro' => $rp];
        return $respuestas;
    }
}
