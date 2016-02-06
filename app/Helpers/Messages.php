<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class Messages {

    public static function display() {
        if (Session::has('message')) {
        	list($type, $message) = explode('|', Session::get('message'));         

         	return sprintf('<div class="alert alert-%s">%s</div>', $type, $message);
      	}
      	return '';
    }
}