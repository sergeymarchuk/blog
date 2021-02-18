<?php

namespace Infrastructure\Helpers;

use Illuminate\Support\Facades\URL;

/**
 * Class RoutingHelper
 * @package Infrastructure\Helpers
 */
class RoutingHelper {
    /**
     * @return string
     */
    public static function getCurrentPage(): string {
        $data = explode('/', str_replace('http://','', URL::current()));
        return $data[1] ?? 'home';
    }
}
