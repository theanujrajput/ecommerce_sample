<?php

class ProductsTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('products')->truncate();

//        $products1 = array(
//
//            'name' => 'chimney',
//            'code' => 'asdf',
//            'shortcode' => 'CHM123',
//            'description' => 'this is test chimeny 1',
//            'description_secondary' => 'this is secondary description',
//            'category_id' => 1,
//            'base_product_id' => null,
//            'active' => true,
//            'list_price' => 100,
//            'offer_price' => 10,
//            'weight' => 11,
//            'sequence' => 1,
//            'base_diff_text' => "none"
//        );
//
//        $products2 = array(
//
//            'name' => 'chimney_beauty',
//            'code' => 'qwerty',
//            'shortcode' => 'CHM987',
//            'description' => 'this is test chimeny 2',
//            'description_secondary' => 'this is secondary description',
//            'category_id' => 2,
//            'base_product_id' => 2,
//            'active' => true,
//            'list_price' => 300,
//            'offer_price' => 200,
//            'weight' => 11,
//            'sequence' => 1,
//            'base_diff_text' => "this chimney is beautiful"
//        );
//        $products3 = array(
//
//            'name' => 'chimney_natural',
//            'code' => 'zxcvb',
//            'shortcode' => 'CHM456',
//            'description' => 'this is test chimeny 3',
//            'description_secondary' => 'this is secondary description',
//            'category_id' => 1,
//            'base_product_id' => 2,
//            'active' => true,
//            'list_price' => 250,
//            'offer_price' => 200,
//            'weight' => 11,
//            'sequence' => 1,
//            'base_diff_text' => "this chimney is natural"
//        );
//
//        // Uncomment the below to run the seeder
//        DB::table('products')->insert($products1);
//        DB::table('products')->insert($products2);
//        DB::table('products')->insert($products3);


        $products4 = array(

            'name' => 'toaster',
            'code' => 'TOAST56',
            'shortcode' => 'xzczd',
            'description' => 'this is toaster',
            'description_secondary' => 'this is secondary description',
            'category_id' => 5,
            'base_product_id' => null,
            'active' => true,
            'list_price' => 650,
            'offer_price' => 500,
            'weight' => 11,
            'sequence' => 21,
            'base_diff_text' => ""
        );

        $products5 = array(

            'name' => 'OFR heater',
            'code' => 'GL7011',
            'shortcode' => 'dsff',
            'description' => 'this is ofr heater',
            'description_secondary' => 'this is secondary description',
            'category_id' => 7,
            'base_product_id' => null,
            'active' => true,
            'list_price' => 1000,
            'offer_price' => 900,
            'weight' => 500,
            'sequence' => 22,
            'base_diff_text' => ""
        );

        DB::table('products')->insert($products4);
        DB::table('products')->insert($products5);

    }

}
