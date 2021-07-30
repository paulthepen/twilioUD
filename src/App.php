<?php
namespace TwilioDevEd;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;
use Twilio\TwiML\VoiceResponse;
use Twilio\Rest\Client;

class App
{
  /**
   * Stores an instance of the Slim application.
   *
   * @var \Slim\App
   */
    private $app;

    public function __construct() {
        $app = AppFactory::create();
        $app->post(
            '/answer', function (Request $request, Response $response, array $args) {
                $parsedBody = $request->getParsedBody();
                $caller = $parsedBody['From'];
                $twilio_number = "+12086141361";
                $accountSid = getenv('ACCOUNT_SID');
                $authToken = getenv('AUTH_TOKEN');
                $client = new Client($accountSid, $authToken);

                $client->messages->create(
                    $caller,
                    [
                        'from' => $twilio_number,
                        'body' => "https://www.chickensaladchick.com/documents/restaurant-menus/Briston_JC_Menu_2021.pdf",
                    ]
                );

                $twilioResponse = new VoiceResponse();
                $twilioResponse->say('Check your messages for our menu!', ['voice' => 'Polly.Russell']);

                $response->getBody()->write(strval($twilioResponse));

                return $response;
            }
        );

        $app->get(
            '/', function (Request $request, Response $response, array $args) {
              $response->getBody()->write("Please configure your Twilio number to use the /answer endpoint");
              return $response;
            }
        );

        $this->app = $app;
    }

    /**
     * Get an instance of the application.
     *
     * @return \Slim\App
     */
    public function get()
    {
        return $this->app;
    }
}
