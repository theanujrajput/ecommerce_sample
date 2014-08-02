<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 4/2/14
 * Time: 2:06 PM
 */
class InsertController extends BaseController
{

    /**
     * inserts categories in categories table from csv
     */
    public function getCategories()
    {
        $path = public_path('backoffice/categories.csv');
        $contents = file_get_contents($path);
        $categories = array_map("str_getcsv", preg_split('/\r*\n+|\r+/', $contents));

        DB::beginTransaction();
        foreach ($categories as $row) {
            if (!is_null($row[0])) {
                $parent_category_id = ($row[3] == "NULL") ? null : $row[3];
                $category = new Category();
                $category->name = $row[1];
                $category->description = $row[2];
                $category->parent_category_id = $parent_category_id;
                $category->save();

            }
        }
        DB::commit();
    }

    /**
     * this function retrieves all the images from path:"uploads/product/img/org"
     * and resizes them and moves them to 300 img folder
     */
    public function getSaveImages()
    {
        $results = scandir(public_path('uploads/product/img/org'));
        foreach ($results as $key => $file) {
            $path = public_path("uploads/product/img/org/$file");
            if (File::extension($path) == "png" || File::extension($path) == "jpeg" || File::extension($path) == "jpg") {
                AppUtil::resizeImage($path, $file);
            }
        }
    }

    /**
     * this function inserts all the products in products table
     */
    public function getProducts()
    {
        // Create a DOM object
        $html = new \Yangqi\Htmldom\Htmldom();

        $app_products = Approducts::all();
        $no_data[] = array();

        $final_desc = "";
        foreach ($app_products as $row) {

            $price = $row->price;
            $full_description = $row->description;

            // Load HTML from a string
            $html->load($full_description);
            $complete_html = $html->find("ul", 0);


            if (isset($complete_html)) {
                foreach ($complete_html->children as $desc) {
                    $final_desc = $final_desc . $desc->outertext;
                }
            } else {
                $no_data[] = $row->id;
            }

            $product = new Product();
            $product->id = $row->id;
            $product->name = $row->title;
            $product->description = "<ul>" . $final_desc . "</ul>";
            $product->list_price = ($price == -1) ? 0 : $price;
            $product->category_id = $row->category_id;
            $product->active = 1;
            $product->is_delivered = 1;
            $product->save();
            $final_desc = "";

        }
        var_dump($no_data); //product ids where no data is entered
    }

    /**
     * inserts all the images in image table
     */
    public function getImages()
    {
        $app_images = AppImages::all();
        DB::beginTransaction();
        foreach ($app_images as $row) {
            $url = $row->url;
            $ext = File::extension($url);
            $code = $row->code;
            $path = "uploads/product/img/org/$code.$ext";
            $image = new Image;
            $image->id = $row->id;
            $image->path = $path;
            $image->save();
        }
        DB::commit();
    }

    /**
     * inserts the relevant image and product data in product_images pivot table
     */
    public function getProductImages()
    {


        $products = Approducts::get();
        $not_set[] = array();

        foreach ($products as $row) {

            $product_id = $row->id;
            $image_id = $row->bannerImageId;

            $app_image = AppImages::where('id', '=', $image_id)->first();
            $name = $app_image->title;
            $notes = $app_image->description;

            $product_image = new ProductImage();
            $product_image->product_id = $product_id;
            $product_image->image_id = $image_id;
            $product_image->name = $name;
            $product_image->is_primary = 1;
            $product_image->notes = $notes;
            $product_image->save();


        }
        DB::commit();
        dd($not_set);
    }

    /**
     * creates admin in users table
     */
    public function getAdmin()
    {
        $user = new User();
        $user->email = "admin@admin.com";
        $user->mobile = "1234567890";
        $user->password = Hash::make("password");
        $user->save();
    }

    /**
     * creates the roles
     */
    public function getRole()
    {
        $role = new Role();
        $role->name = "admin";
        $role->description = "administrator";
        $role->save();

    }

    /**
     * assign role to admin
     */
    public function getUserRole()
    {
        $user_role = new UserRole();
        $user_role->user_id = 1;
        $user_role->role_id = 1;
        $user_role->save();
    }


}