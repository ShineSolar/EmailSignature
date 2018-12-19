<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// Remember, requires are from the root in tests
require 'src/model/model.php';

final class HandleDataTest extends TestCase {
	public function testCanBeCreatedFromValidData(): void {
        $this->assertInstanceOf(
            HandleData::class,
            new HandleData('TestPasses')
        );
    }
}