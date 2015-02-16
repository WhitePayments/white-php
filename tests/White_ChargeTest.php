<?php

class White_ChargeTest extends \PHPUnit_Framework_TestCase
{

  function setUp()
  {
    White::setApiKey('test_sec_k_25dd497d7e657bb761ad6');
  }

  function testList()
  {
    $result = White_Charge::all();
    //No assertion. If there is an error, an exception is thrown. Otherwise it was ok.
  }

  function testCreateSuccess()
  {
    $data = array(
      "amount" => 1050,
      "currency" => "usd",
      "card" => array(
        "number" => "4242424242424242",
        "exp_month" => 11,
        "exp_year" => 2016,
        "cvc" => "123"
      ),
      "email" => "white+php+test@example.com",
      "description" => "Charge for test@example.com"
    );

    $result = White_Charge::create($data);

    $this->assertEquals($result['description'], $data['description']);
    $this->assertNull($result['failure_code']);
  }

  function testRetrieveSuccess() 
  {
    // Create a charge
    $data = array(
      "amount" => 1050,
      "currency" => "usd",
      "card" => array(
        "number" => "4242424242424242",
        "exp_month" => 11,
        "exp_year" => 2016,
        "cvc" => "123"
      ),
      "email" => "white+php+test@example.com",
      "description" => "Charge for test@example.com"
    );
    $result = White_Charge::create($data);
    var_export($result);

    // Retrieve it
    $result_retrieved = White_Charge::retrieve($result->id);

    // Compare
    $this->assertEquals($result->id, $result_retrieved->id);
  }
}