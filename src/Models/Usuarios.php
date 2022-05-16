<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model {

    protected $table = 'usuarios';
    protected $fillable = ['usuario', 'password', 'nombre', 'apellidos', 'correo', 'genero', 'plantel', 'turno', 'grupo', 'generacion', 'tipo'];
    protected $guarded = ['id'];
    const CREATED_AT = 'creacion';
    const UPDATED_AT = 'actualizacion';

    public static function findByUsername($username) {
        return static::where('usuario', $username)->first();
    }

    public static function findById($id) {
        return static::where('id', $id)->first();
    }

    public static function inserta_ext($user){

        if( is_array($user) ){
            $user = $user[0];
        }

        $usuario = static::create([
            'usuario' => $user->username,
            'nombre' => $user->firstname,
            'apellidos' => $user->lastname,
            'password' => $user->password,
            'correo' => $user->email,
            'genero' => $user->genero,
            'plantel' => $user->plantel,
            'grupo' => $user->grupo,
            'tipo' => $user->tipo,
            'generacion' => $user->generacion,
            'turno' => $user->turno
        ]);

        $usuario->save();
    }
}
