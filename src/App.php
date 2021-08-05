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
                $db = mysqli_connect('localhost', 'twilio_app', '5H!afoNHxD${LJ9#', 'twilio_ud');

                $parsedBody = $request->getParsedBody();
                $caller = $parsedBody['From'];
                $twilio_number = $parsedBody['To'];
                $accountSid = getenv('ACCOUNT_SID');
                $authToken = getenv('AUTH_TOKEN');
                $client = new Client($accountSid, $authToken);

                $query = mysqli_query($db, 'SELECT * FROM call_sms WHERE twilio_number="' . $twilio_number . '"');
                $results = $query->fetch_array(MYSQLI_ASSOC);

                $client->messages->create(
                    $caller,
                    [
                        'from' => $twilio_number,
                        'body' => $results['message_text'],
                    ]
                );

                $twilioResponse = new VoiceResponse();
                $twilioResponse->say('Thank you for calling. Check your messages for our menu!', ['voice' => 'Polly.Russell']);
                $twilioResponse->play($results['audio_link']);

                $response->getBody()->write(strval($twilioResponse));

                return $response;
            }
        );

        $app->get(
            '/', function (Request $request, Response $response, array $args) {

                $response->getBody()->write('The number is: ' . $results['twilio_number'] . ' and the message is: ' . $results['message_text']);
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
