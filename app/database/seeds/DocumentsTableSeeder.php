<?php

class DocumentsTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('documents')->truncate();

        $documents = array(
            'type' => "doc",
            'path' => '/test_document.docx',
            'active' => true,
            'hash' => '78965'
        );

        // Uncomment the below to run the seeder
        DB::table('documents')->insert($documents);
    }

}
