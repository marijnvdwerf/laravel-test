<?php

class PortfolioItemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('portfolio_items')->delete();

        PortfolioItem::create([
            'user_id' => 1,
            'filename' => 'jantje.png'
        ]);
	}

}