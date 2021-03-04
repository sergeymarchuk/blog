<?php

namespace Tests\Unit\Infrastructure\Helpers;

use Illuminate\Support\Facades\URL;
use Infrastructure\Helpers\RoutingHelper;
use PHPUnit\Framework\TestCase;

class RoutingHelperTest extends TestCase {
    /**
     * testing getCurrentPage method
     *
     * @return void
     */
    public function testGetCurrentPageMethod(): void {
        $data = [
            'home' => 'http://sm.test',
            'about' => 'http://sm.test/about',
            'admin' => 'http://sm.test/admin',
            'blog' => 'http://sm.test/blog/opiafapsdifu-isdfun',
        ];

        foreach ($data as $key => $value) {
            URL::shouldReceive('current')->once()->andReturn($value);
            $this->assertTrue($key === RoutingHelper::getCurrentPage());
        }
    }
}
