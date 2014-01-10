<?php

class DatabaseTest extends TestCase {

    public function testSeedingThrowsNoException() {
        Artisan::call('db:seed');
    }

    public function testMigrateDownThrowsNoException() {
        Artisan::call('migrate:reset');
    }

}
