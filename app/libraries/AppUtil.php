<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 11:09 AM
 */
class AppUtil
{

    public static function returnResults($data)
    {
        if (isset($data)) {
            if ($data->count() != 0) {
                return $data;
            } else {
                return null;
            }
        } else {
            return null;
        }

    }

    /** accepts the document and generates the hash of the document
     * @param $file
     * @return string
     */
    public static function generateDocumentHash($file)
    {
        $hash_file = hash_file(Constants::FILE_HASH_ALGO, $file);
        return $hash_file;
    }

    /**
     * @return bool
     */
    public static function isUserLoggedIn()
    {
        $user = Auth::user();
        return isset($user) ? true : false;
    }

    /** returns the logged in user email
     * @return null
     */
    public static function getUserEmail()
    {
        if (self::isUserLoggedIn()) {
            $email = Auth::user()->email;
            return $email;
        } else {
            return null;
        }
    }

    /** returns the logged in user id
     * @return null
     */
    public static function getCurrentUserId()
    {
        if (self::isUserLoggedIn()) {
            $id = Auth::user()->id;
            return $id;
        } else {
            return null;
        }
    }

    /** returns the logged in username
     * @return null
     */
    public static function getUserName()
    {
        if (self::isUserLoggedIn()) {
            $name = Auth::user()->first_name;
            return $name;
        } else {
            return null;
        }
    }

    /**
     * @return bool|null
     */
    public static function isUserAdmin()
    {
        if (self::isUserLoggedIn()) {
            $id = Auth::user()->id;
            $user = UserRole::where('user_id', '=', $id)->first();
            $role_id = $user->role_id;
            return $role_id == 1 ? true : false;
        } else {
            return null;
        }

    }

    public static function resizeImage($path, $name)
    {

        $img_300 = \Intervention\Image\Image::make($path)->resize(300, null, true);
        $img_300_path = public_path() . "/uploads/product/img/300/$name";
        $img_300->save($img_300_path, 100);

//        $img_600 = \Intervention\Image\Image::make($path)->resize(600, null, true);
//        $img_600_path = public_path() . "/uploads/products/img/test/$name";
//        $img_600->save($img_600_path, 100);

    }

    /** return the sequence of the product
     * @param int|string|mixed $position
     * @return int|mixed
     */
    public static function getSequence($position)
    {
        if ($position == "top") {
            $sequence = 10;
            return $sequence;
        } else if ($position == "bottom") {
            $max = Product::max('sequence');
            $sequence = $max + 10;
            return $sequence;
        } else {
            $sequence = $position + 10;
            return $sequence;
        }
    }

    /** accepts product_id and returns the primary image of the product
     * @param $product_id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     */
    public static function getProductPrimaryImage($product_id)
    {
        $image_data = array();
        $product_image = Product::with(array('images' => function ($query) {

                $query->where('is_primary', '=', true);

            }))->where('id', '=', $product_id)->first();

        if ($product_image->count() != 0) {

            $image = $product_image->images;
            foreach ($image as $row) {
                $image_data = array(
                    'image_path' => $row->path,
                    'image_name' => $row->pivot->name,
                    'image_title' => $row->pivot->title,
                    'image_caption' => $row->pivot->caption,
                    'image_notes' => $row->pivot->notes
                );
            }

            return $image_data;

        } else {
            return null;
        }

    }

    /** returns the by default image of the product
     * @param int $size accepts size 300|600
     * @return string
     */
    public static function getDefaultImage($size)
    {

        if ($size == 300) {

            $path = public_path() . '/uploads/products/img/300/default.png';
            return $path;

        } else {

            $path = public_path() . '/uploads/products/img/600/default.png';
            return $path;

        }
    }

    public static function getRoleId()
    {
        return 2;
    }

    /** upload and moves a file to the corresponding location and returns the type and path of the uploaded file
     * @param $file
     * @param $file_type
     * @return array
     */
    public static function moveFile($file, $file_type)
    {

        $file_info = array();
        $file_Extension = $file->getClientOriginalExtension();
        $file_name = $file->getClientOriginalName();


        $random_string = str_random(6);
        $file_name = str_replace("." . $file_Extension, $random_string, $file_name) . "." . $file_Extension;

        if ($file_type = 'product_document') {
            $path = Constants::PRODUCT_DOCUMENTS_UPLOAD_PATH;
        } elseif ($file_type = 'product_video') {
            $path = Constants::PRODUCT_VIDEOS_UPLOAD_PATH;
        } elseif ($file_type = 'category_document') {
            $path = Constants::CATEGORY_DOCUMENTS_UPLOAD_PATH;
        } elseif ($file_type = 'category_video') {
            $path = Constants::CATEGORY_VIDEOS_UPLOAD_PATH;
        }

        $full_path = public_path() . "/$path";

        $file->move($full_path, $file_name);

        $file_info['path'] = $path . "/" . $file_name . '/';
        $file_info['type'] = $file_Extension;

        return $file_info;

    }

    public static function resizeAndMoveImage($img)
    {
        $img_extension = $img->getClientOriginalExtension();
        $img_name = $img->getClientOriginalName();


        $random_string = str_random(6);

        $img_name = str_replace("." . $img_extension, $random_string, $img_name) . "." . $img_extension;

        $img_org_path = public_path() . "/" . Constants::PRODUCT_IMAGE_ORG_UPLOAD_PATH;

        $img->move($img_org_path, $img_name);

        $img_300 = \Intervention\Image\Image::make($img_org_path . "/" . $img_name)->resize(300, null, true);
        $img_300_path = Constants::PRODUCT_IMAGE_300_UPLOAD_PATH . $img_name;
        $img_300->save($img_300_path);

        $img_600 = \Intervention\Image\Image::make($img_org_path . "/" . $img_name)->resize(600, null, true);
        $img_600_path = Constants::PRODUCT_IMAGE_600_UPLOAD_PATH . $img_name;
        $img_600->save($img_600_path);

        $img_info['path'] = Constants::PRODUCT_IMAGE_ORG_UPLOAD_PATH . $img_name;
        $img_info['type'] = $img_extension;

        return $img_info;
    }

    /** accepts the date and returns the parsed date
     * @param $date
     * @return bool|string
     */
    public static function getParsedDate($date)
    {
        return date("d M Y", strtotime($date));
    }


}

