<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/31/13
 * Time: 4:24 PM
 */
interface iProductRepository
{
    public function createProduct($name, $code, $shortcode, $description, $description_secondary, $category_id,
                                  $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price,
                                  $offer_price, $weight, $sequence, $base_diff_text, $popularity,
                                  $meta_title, $meta_description, $meta_keywords);

    public function getProducts($category_id, $base_product_id, $is_delivered, $is_ltw, $is_cod, $active, $limit, $paginate);

    public function getProduct($id, $name, $code, $shortcode);

    public function getProductBasicInfo($id, $name, $code, $shortcode);

    public function updateProduct($id, $name, $code, $shortcode, $description, $description_secondary, $category_id,
                                  $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price,
                                  $offer_price, $weight, $sequence, $base_diff_text, $popularity,
                                  $meta_title, $meta_description, $meta_keywords);

    public function deleteProduct($id);

    public function activateOrDeactivateProduct($id, $status);

    //Product attribute CRUD starts here

    public function createProductAttributes($product_id, $attribute_id, $value, $notes);

    public function getProductAttributesValue($id);

    public function getProductsAttributes($products_id = array());

    public function updateProductAttribute($product_id, $attribute_id, $value, $notes);

    public function deleteProductAttribute($product_id, $attribute_id = array());

    //Product attribute CRUD ends here

    //Product specific attributes CRUD starts here

    public function createProductSpecificAttribute($product_id, $name, $value, $notes);

    public function getProductSpecificAttributes($product_id);

    public function getProductSpecificAttribute($specific_attribute_id);

    public function updateProductSpecificAttribute($specific_attribute_id, $name, $value, $notes);

    public function deleteProductSpecificAttribute($specific_attribute_id);

    //Product specific attributes CRUD starts here


    public function getProductCategory($id);

    public function getRelatedProducts($id);

    public function getComparableProductAttributes($id = array());


    //Product Image CRUD starts here

    public function createProductImage($path, $name, $title, $caption, $notes, $is_primary, $product_id);

    public function getProductImages($id);

    public function getProductImage($product_id, $image_id);

    public function setProductPrimaryImage($product_id, $image_id);

    public function updateProductImage($product_id, $image_id, $name, $title, $caption, $notes, $is_primary, $path);

    public function deleteProductImage($product_id, $image_id = array());

    //Product Image CRUD ends here


    //Product Document CRUD starts here

    public function createProductDocument($type, $path, $active, $hash, $label, $name, $title, $notes, $product_id);

    public function attachProductDocument($product_id, $document_id, $name, $title, $label, $notes);

    public function getProductDocument($product_id, $document_id);

    public function getProductDocuments($id);

    public function updateProductDocument($product_id, $document_id, $name, $title, $label, $notes, $active, $path, $type);

    public function deleteProductDocument($product_id, $document_id = array());

    //Product Document CRUD ends here

    //Product Video CRUD starts here

    public function createProductVideo($type, $path, $active, $label, $name, $title, $notes, $product_id);

    public function getProductVideos($id);

    public function getProductVideo($product_id, $video_id);

    public function updateProductVideo($product_id, $video_id, $name, $title, $label, $notes, $active, $path, $type);

    public function deleteProductVideo($product_id, $video_id = array());

    //Product Video CRUD ends here

    //Product Tag CRUD starts here

    public function createProductTag($product_id, $tag_id, $offer_price);

    public function getProductTags($id);

    public function getProductsByTag($tag_id, $limit);

    public function getProductTag($product_id, $tag_id);

    public function getUnassignedProductTags($product_id);

    public function updateProductTag($product_id, $tag_id, $name, $code, $description, $offer_price);

    public function deleteProductTag($product_id, $tag_id = array());

    //Product Tag CRUD ends here

    public function createProductCombo($name, $description, $type, $start_date, $end_date, $combo_price, $combo_products = array());

    public function getProductVariants($product_id);

}