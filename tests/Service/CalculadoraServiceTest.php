<?php
namespace App\Tests\Service;

use App\Service\CalculadoraService;
use Mockery;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CalculadoraServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testSumaCorrectaConLog()
    {
        $mockLogger = Mockery::mock(LoggerInterface::class);
        $mockLogger->shouldReceive('info')
                   ->once()
                   ->with('Suma: 2 + 3 = 5');

        $calculadora = new CalculadoraService($mockLogger);
        $this->assertEquals(5, $calculadora->sumar(2, 3));
    }
}
