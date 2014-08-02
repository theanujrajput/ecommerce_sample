<?php

class AttributesTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('attributes')->truncate();

        $attribute1 = array(

            'name' => "size",
            "code" => "1230",
            "attribute_category" => "tech specs",
            "description" => "this is the size",
            "category_id" => 1,
            "is_comparable" => true,
            "is_filterable" => true,
            "attribute_value_type" => 'integer',
            "active" => true,
            "sequence" => 1
        );

        $attribute2 = array(

            'name' => "weight",
            "code" => "8795",
            "attribute_category" => "tech specs",
            "description" => "this is the weight",
            "category_id" => 2,
            "is_comparable" => true,
            "is_filterable" => true,
            "attribute_value_type" => 'integer',
            "active" => true,
            "sequence" => 2
        );
        $attribute3 = array(

            'name' => "air_flow",
            "code" => "5469",
            "attribute_category" => "tech specs",
            "description" => "this is the air flow",
            "category_id" => 1,
            "is_comparable" => true,
            "is_filterable" => true,
            "attribute_value_type" => 'integer',
            "active" => true,
            "sequence" => 3
        );


        DB::table('attributes')->insert($attribute1);
        DB::table('attributes')->insert($attribute2);
        DB::table('attributes')->insert($attribute3);
    }

}
