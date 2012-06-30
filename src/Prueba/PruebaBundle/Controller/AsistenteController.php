namespace Prueba\PruebaBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class AsistenteController
{
	public function indexAction()
    {
        return new Response('<html><body>Hello name!</body></html>');
    }
}
