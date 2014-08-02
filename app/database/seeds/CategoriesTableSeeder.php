<?php

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('categories')->truncate();

        $category1 = array(

            'name' => 'Chimney',
            'shortcode' => "CHM",
            'description' => 'this is Chimney Category',
            'description_secondary' => 'Chimney secondary desc',
            'sequence' => "1",
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 1
        );

        $category2 = array(

            'name' => 'Island Chimney',
            'shortcode' => "ISL_CHM",
            'description' => 'this is Island Chimney category',
            'description_secondary' => 'this is chimney sub category',
            'sequence' => "2",
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category3 = array(

            'name' => 'Split Chimney',
            'shortcode' => "SPLIT_CHM",
            'description' => 'this is Split Chimney category',
            'description_secondary' => 'this is chimney sub category',
            'sequence' => "3",
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 1
        );

        $category4 = array(

            'name' => 'Built in series',
            'shortcode' => "BUILT_SERIES",
            'description' => 'this is built in series category',
            'description_secondary' => 'built in series secondary desc',
            'sequence' => "4",
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category5 = array(

            'name' => 'Microwave Oven',
            'shortcode' => "MIC_OVEN",
            'description' => 'this is Microwave Oven category',
            'description_secondary' => 'this is built in series sub category',
            'sequence' => "5",
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category6 = array(

            'name' => 'Steam Oven',
            'shortcode' => "STEAM_OVEN",
            'description' => 'this is Steam Oven category',
            'description_secondary' => 'this is built in series sub category',
            'sequence' => 6,
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category7 = array(

            'name' => 'Cooking Appliances',
            'shortcode' => "COOK_APPL",
            'description' => 'this is Cooking Appliance category',
            'description_secondary' => 'this is Cooking Appliance desc',
            'sequence' => 7,
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category8 = array(

            'name' => 'Platinum Cooktop',
            'shortcode' => "PLAT_COOK",
            'description' => 'this is Platinum cooktop  category',
            'description_secondary' => 'this is Cooking Appliance secondary desc',
            'sequence' => 8,
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category9 = array(

            'name' => 'Cooking Range',
            'shortcode' => "COOK_RANGE",
            'description' => 'this is Cooking range  category',
            'description_secondary' => 'this is Cooking Appliance secondary desc',
            'sequence' => 9,
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category10 = array(

            'name' => 'Kitchen Appliances',
            'shortcode' => "KITCHEN_APPL",
            'description' => 'this is Kitchen appliance category',
            'description_secondary' => 'this is Kitchen appliance secondary desc',
            'sequence' => 10,
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category11 = array(

            'name' => 'Food Preparation ',
            'shortcode' => "FOOD_PREP",
            'description' => 'this is food preparation category',
            'description_secondary' => 'this is Kitchen appliance sub category',
            'sequence' => 10,
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category12 = array(

            'name' => 'Food Processor',
            'shortcode' => "FOOD_PROCESSOR",
            'description' => 'this is food preparation sub category',
            'description_secondary' => 'this is Kitchen appliance sub sub category',
            'sequence' => 11,
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        $category13 = array(

            'name' => 'Juicer MIXER',
            'shortcode' => "JUICE_MIXER",
            'description' => 'this is food preparation sub category',
            'description_secondary' => 'this is Kitchen appliance sub sub category',
            'sequence' => 12,
            "active" => true,
            "parent_category_id" => null,
            "is_delivered" => true,
            "is_ltw" => true,
            "is_cod" => true,
            "warranty" => 2
        );

        // Uncomment the below to run the seeder
//        DB::table('categories')->insert($categorie1);
//        DB::table('categories')->insert($categorie2);
    }

}
