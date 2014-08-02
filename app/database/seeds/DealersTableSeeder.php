<?php

class DealersTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('dealers')->truncate();

        $dealer1 = array(

            "name" => "Lal And Sons",
            "address1" => "3784, Netaji Subash Marg, ",
            "address2" => "Main Road, Daryaganj",
            "city" => "new delhi",
            "state" => "delhi",
            "pincode" => "110018",
            "mobile" => "9856748521",

        );
        $dealer2 = array(

            "name" => "Glen Gallery",
            "address1" => "Scf 23, Sector 17e",
            "address2" => "Chandigarh",
            "city" => "Chandigarh",
            "state" => "Chandigarh",
            "pincode" => "110085",
            "mobile" => "9856478526",

        );
        $dealer3 = array(

            "name" => "Ganpati Electronics",
            "address1" => "Navyug Market",
            "address2" => "Ghaziabad",
            "city" => "Ghaziabad",
            "state" => "UttarPradesh",
            "pincode" => "112585",
            "mobile" => " 9871012876",
        );
        $dealer4 = array(

            "name" => "Mittal Gallery",
            "address1" => "1A/205 South Delhi ",
            "address2" => "Main Road, Souht Ex",
            "city" => "new delhi",
            "state" => "delhi",
            "pincode" => "110089",
            "mobile" => "9856748558",

        );


        // Uncomment the below to run the seeder
        DB::table('dealers')->insert($dealer1);
        DB::table('dealers')->insert($dealer2);
        DB::table('dealers')->insert($dealer3);
        DB::table('dealers')->insert($dealer4);

    }

}
