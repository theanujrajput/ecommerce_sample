<?php

class ProductattributesTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('productattributes')->truncate();

        $productattribute1 = array(

            'attribute_id' => 1,
            'product_id' =>1,
            'notes'=>'the size is 123cm',
            'value'=>"123cm"

		);

        $productattribute2 = array(

            'attribute_id' => 1,
            'product_id' =>2,
            'notes'=>'the size is 200cn',
            'value'=>"200cm"

        );

        $productattribute3 = array(

            'attribute_id' => 2,
            'product_id' =>3,
            'notes'=>'the weight is 50kg',
            'value'=>"50kg"

        );

        $productattribute4 = array(

            'attribute_id' => 1,
            'product_id' =>2,
            'notes'=>'the size is 50kg',
            'value'=>"50kg"

        );


         DB::table('productattributes')->insert($productattribute1);
         DB::table('productattributes')->insert($productattribute2);
         DB::table('productattributes')->insert($productattribute3);
         DB::table('productattributes')->insert($productattribute4);
    }

}
