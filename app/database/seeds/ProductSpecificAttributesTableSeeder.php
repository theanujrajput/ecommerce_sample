<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/8/14
 * Time: 1:33 PM
 */

class ProductSpecificAttributesTableSeeder extends Seeder
{

    public function run()
    {

        $data1 = array(
            "product_id" => 1,
            "name" => "speciality",
            "value" => 100,
            "notes" => "it is made of glass"
        );
        $data2 = array(
            "product_id" => 2,
            "name" => "color",
            "value" => "any colour",
            "notes" => "is can be painted"
        );
        $data3 = array(
            "product_id" => 1,
            "name" => "collapse",
            "value" => "yes",
            "notes" => "it can be collapsed"
        );

        DB::table('product_specific_attributes')->insert($data1);
        DB::table('product_specific_attributes')->insert($data2);
        DB::table('product_specific_attributes')->insert($data3);

    }

} 