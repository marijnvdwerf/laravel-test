<?php

class PupilTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCreation() {
        // Table should contain no users
        $this->assertEquals(0, User::all()->count());


        $this->client->request('POST', '/pupils', [
            'first_name' => 'Richard',
            'last_name' => 'Köster'
        ]);

        $response = $this->client->getResponse();
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
        $expected = [
            'id' => 1,
            'first_name' => 'Richard',
            'last_name' => 'Köster'
        ];
        $this->assertEquals($expected, json_decode($response->getContent(), true));

        // Database should contain one pupil
        $users = User::all();
        $this->assertEquals(1, $users->count());

        $this->assertEquals('Richard', $users->first()->first_name);
        $this->assertEquals('Köster', $users->first()->last_name);
    }

    public function testCreationMissingFirstName() {
        $this->client->request('POST', '/pupils', [
            'last_name' => 'Köster'
        ]);

        $this->assertEquals(0, User::all()->count());

        $response = $this->client->getResponse();
        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
    }

    public function testCreationMissingLastName() {
        $this->client->request('POST', '/pupils', [
            'first_name' => 'Richard',
        ]);

        $this->assertEquals(0, User::all()->count());

        $response = $this->client->getResponse();
        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
    }

}
