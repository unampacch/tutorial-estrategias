<?php

namespace App\Auth;

use App\Models\Usuarios;
use DI\Container;


class Auth {

    public function user() {
        $session = new \SlimSession\Helper();
		$user = usuarios::find(isset($session->id) ? $session->id : 0);

        return $user;
	}

	public function check() {
		$session = new \SlimSession\Helper();
		return isset($session->id);
	}

    public function is_guest() {
		$session = new \SlimSession\Helper();
		return $session->id == 'guest' ? true: false;
	}

	public function attempt($username, $password) {

		$session = new \SlimSession\Helper();

        $user = usuarios::where('usuario', $username)->first();


		if (! $user) {
			return false;
		}


		if ($this->verifica_contrasena($password, $user->password)) {
			$session->id = $user->id;
			return true;
		}

        return  false;
	}

	public function logout() {
		$session = new \SlimSession\Helper();
		$session->delete('id');
		$session::destroy();
	}

    private function verifica_contrasena($corigen, $cdestino){
        return $corigen == $cdestino ? true : false;
    }
}
