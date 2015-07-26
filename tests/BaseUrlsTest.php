<?php

class BaseUrlsTest extends TestCase {
    public function testIndexUrl()
    {
        $response = $this->action('GET', 'WelcomeController@index');
        $this->assertEquals(200, $response->getStatusCode());
    }
    
    public function textRegisterUrl()
    {
        $response = $this->action('GET', 'RegistrationController@create');
        $this->assertEquals(200, $response->getStatusCode());
    }
    
    public function testLoginUrl()
    {
        $response = $this->action('GET', 'SessionsController@create');
        $this->assertEquals(200, $response->getStatusCode());
    }
}
