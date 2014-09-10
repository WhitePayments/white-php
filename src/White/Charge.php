<?php
/**
 * Handle White API Charges
 * 
 * @author Sebastian Choren <schoren@rockingsoft.com>
 * @link https://whitepayments.com/docs/
 * @license http://opensource.org/licenses/MIT
 */

class White_Charge
{
  /**
  * Create a new charge for given $data
  * 
  * @param array $data the data for the transaction
  * @return array the result of the transaction
  * @throws White_Error_Card if the card could not be accepted
  * @throws White_Error_Parameters if any of the parameters is invalid
  * @throws White_Error_Authentication if the API Key is invalid
  * @throws White_Error if there is a general error in the API endpoint
  * @throws Exception for any other errors
  */
  public static function create(array $data)
  {
    $url = White::getEndPoint('charge');

    $client = new GuzzleHttp\Client();
    try {
      $response = $client->post($url, array(
        'auth' =>  array(White::getApiKey(), ''),
        'body' => $data,
      ));
      $result = $response->json();
    } catch (\GuzzleHttp\Exception\TransferException $e) { //catch all Guzzle exceptions
      White::handleErrors($e);
    } catch(\Exception $e) { //Rethrow any other errors
      throw $e;
    }

    return $result;
  }

  /**
  * List all created charges
  * 
  * @return array list of transactions
  * @throws White_Error_Parameters if any of the parameters is invalid
  * @throws White_Error_Authentication if the API Key is invalid
  * @throws White_Error if there is a general error in the API endpoint
  * @throws Exception for any other errors
  */
  public static function all()
  {
    $url = White::getEndPoint('charge_list');

    $client = new GuzzleHttp\Client();
    try {
      $response = $client->get($url, array(
        'auth' =>  array(White::getApiKey(), '')
      ));
      $result = $response->json();
    } catch (\GuzzleHttp\Exception\TransferException $e) { //catch all Guzzle exceptions
      White::handleErrors($e);
    } catch(\Exception $e) { //Rethrow any other errors
      throw $e;
    }

    return $result;
  }
}