<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User as User;
use Illuminate\Support\Facades\Auth;

class OAuthController extends BaseController
{
    protected $baseURL = 'https://login.eveonline.com';

    protected $clientID;
    protected $secretKey;

    /**
     * APIOauth constructor.
     * @param string $clientID
     * @param string $secretKey
     */
    public function __construct()
    {

        $this->clientID = config('eveonline.eve_client_id');
        $this->secretKey = config('eveonline.eve_client_secret');

    }

    public function callback(Request $request)
    {

        $response = Http::withHeaders([
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic '.base64_encode($this->clientID.':'.$this->secretKey),
        ])
        ->post('https://login.eveonline.com/v2/oauth/token', [
              'grant_type' => 'authorization_code',
              'code' => $request->query('code'),
        ]);
        $this->exChangeUserInfo($response);
        if(Auth::check(Auth::user())){
          return redirect()->route('dashboard');
        } else {
          return redirect()->route('error');
        }
    }

    protected function exChangeUserInfo($response) {

      $tokenCollection = collect(json_decode($response->body(),true));
      $tokens = $tokenCollection->only(['access_token','refresh_token'])->all();
      $character = Http::withHeaders(['Authorization' => 'Bearer '.$tokens['access_token']])->get('https://login.eveonline.com/oauth/verify');
      $characterInfo = collect(json_decode($character->body()));
      $this->createUser($characterInfo, $tokens['access_token']);

    }

    protected function createUser($characterInfo, $token) {

      if(!$this->characterExists($characterInfo)) {
        $user = new User;
        $user->eve_id = $characterInfo['CharacterID'];
        $user->name = $characterInfo['CharacterName'];
        $user->expires = $characterInfo['ExpiresOn'];
        $user->password = $token;
        $user->save();
      } else {
        $user = User::where('eve_id', $characterInfo['CharacterID'])->first();
      }
      $this->loginUser($user);
    }

    protected function loginUser(User $user) {
      Auth::login($user);
    }

    protected function characterExists($character) {
      if(User::where('eve_id', $character['CharacterID'])->first() !== null) {
        return true;
      } else {
        return false;
      }
    }
    /**
     * Refreshes the Access Token, using the refresh_token.
     * EVE Docs: http://eveonline-third-party-documentation.readthedocs.io/en/latest/sso/refreshtokens.html#refresh-tokens
     *
     * @param TokenEnvelope $tokenEnvelope
     * @return TokenEnvelope
     * @internal param TokenEnvelope $envelope
     */
    // public function refreshAccessToken(TokenEnvelope $tokenEnvelope)
    // {
    //     $response = $this->client->post($this->baseURL . '/oauth/token', [
    //         'auth' => [
    //             $this->clientID,
    //             $this->secretKey
    //         ],
    //         'form_params' => [
    //             'grant_type' => 'refresh_token',
    //             'refresh_token' => $tokenEnvelope->getRefreshToken()
    //         ]
    //     ]);
    //
    //     $responseJSON = \GuzzleHttp\json_decode($response->getBody()->getContents());
    //
    //     return $tokenEnvelope
    //         ->setAccessToken($responseJSON->access_token)
    //         ->setExpiresAt(new \DateTime('+ ' . $responseJSON->expires_in . ' seconds'))
    //         ->setRefreshToken($responseJSON->refresh_token)
    //         ->setTokenType($responseJSON->token_type);
    // }
    //
    // /**
    //  * Gets the CharacterID (and details) using the access_token from tokenEnvelope
    //  * EVE Docs: http://eveonline-third-party-documentation.readthedocs.io/en/latest/sso/obtaincharacterid.html#obtaining-character-id
    //  *
    //  * @param TokenEnvelope $tokenEnvelope
    //  * @return mixed
    //  */
    // public function obtainCharacterEnvelope(TokenEnvelope $tokenEnvelope)
    // {
    //     $response = $this->client->get($this->baseURL.'/oauth/verify', [
    //         'headers' => [
    //             'Authorization' => [
    //                 'Bearer ' . $tokenEnvelope->getAccessToken()
    //             ]
    //         ]
    //     ]);
    //
    //     return \GuzzleHttp\json_decode($response->getBody()->getContents());
    // }
}
