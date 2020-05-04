<?php


namespace App\Formend;

use GuzzleHttp\Client;

class GoogleCaptcha
{
    /**
     * Use the Guzzle client to call the Google captcha API for the
     * analysis of submission captcha response.
     *
     * @param string $captcha_response captcha response string from client.
     * @return mixed
     */
    public static function check(string $captcha_response)
    {
        $client = new Client();

        $response = $client->post(config('app.recaptcha_url'), [
            'form_params' => [
                'secret' => config('app.recaptcha_secret_key'),
                'response' => $captcha_response
            ]
        ]);
        $captcha_response = json_decode($response->getBody()->getContents());

        return $captcha_response->success;
    }
}
