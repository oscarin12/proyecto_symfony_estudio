<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testHomepageLoads(): void
    {
        $client = static::createClient();
        $client->request('GET', '/bienvenidos'); // rutas que asginas par ahacer pruebas


        // el tipo de pruebas que quieres que haga o el resultado esperado que tengas
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', '¡bienvenidos a mi app!');
        $this->assertSelectorTextNotContains('body', '¡felipe!');
        $this->assertSelectorTextNotContains('body', '¡bienvenidos algo mas!');
        
    }
}
