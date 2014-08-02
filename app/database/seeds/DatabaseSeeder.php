<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('AttributesTableSeeder');
		$this->call('ProductattributesTableSeeder');
		$this->call('ImagesTableSeeder');
		$this->call('ProductimagesTableSeeder');
		$this->call('DocumentsTableSeeder');
		$this->call('ProductdocumentsTableSeeder');
		$this->call('CategorydocumentsTableSeeder');
		$this->call('VideosTableSeeder');
		$this->call('CategoryvideosTableSeeder');
		$this->call('ProductvideosTableSeeder');
		$this->call('DealersTableSeeder');
		$this->call('OffersTableSeeder');
		$this->call('OfferproductsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('ProducttagsTableSeeder');
	}

}