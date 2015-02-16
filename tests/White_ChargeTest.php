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
      "email" => "ahmed@example.com",
      "card" => array(
        "number" => "4242424242424242",
        "exp_month" => 11,
        "exp_year" => 2016,
        "cvc" => "123"
      ),
      "description" => "Charge for test@example.com"
    );

    $result = White_Charge::create($data);

    $expected = array(
      "id" => "ch_3c513b0dfdc110b11b4091e2cbf6dc23",
      "amount" => "1050",
      "currency" => "usd",
      "description" => "Charge for test@example.com",
      "state" => "captured",
      "email" => "ahmed@example.com",
      "ip" => "",
      "statement_descriptor" => "",
      "account_id" => "acc_xxx",
      "captured_amount" => 1050,
      "refunded_amount" => 0,
      "failure_reason" => "",
      "failure_code" => "",
      "created_at" => "2014-08-14T16:20:53.451+03:00",
      "updated_at" => "2014-08-14T16:20:53.451+03:00",
      "object" => "charge",
      "card" => array()
    );

    $this->assertEquals(sort(array_keys($expected)), sort(array_keys($result)));
    $this->assertNull($result['failure_code']);
  }
}
