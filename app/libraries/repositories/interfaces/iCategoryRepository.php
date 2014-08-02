<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/31/13
 * Time: 4:19 PM
 */
interface iCategoryRepository
{

    public function createCategory($name, $shortcode, $description, $description_secondary, $sequence, $parent_category_id,
                                   $active, $is_delivered, $is_ltw, $is_cod, $warranty,
                                   $meta_title, $meta_description, $meta_keywords);

    public function getCategories($active, $is_delivered, $is_ltw, $is_cod, $paginate);

    public function getCategory($id, $name, $shortcode);

    public function updateCategory($id, $name, $shortcode, $description, $description_secondary, $sequence, $parent_category_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $meta_title, $meta_description, $meta_keywords);

    public function deleteCategory($id);

    public function activateOrDeactivateCategory($id, $status);

    //category documents CRUD starts here

    public function createCategoryDocument($type, $path, $active, $hash, $label, $name, $title, $notes, $category_id);

    public function attachCategoryDocument($category_id, $document_id, $name, $title, $label, $notes);

    public function getCategoryDocuments($id, $active);

    public function getCategoryDocument($category_id, $document_id);

    public function updateCategoryDocument($category_id, $document_id, $name, $title, $label, $notes, $active, $path, $type);

    public function deleteCategoryDocument($category_id, $document_id);

    public function activateOrDeactivateDocument($document_id, $status);

    //category documents CRUD ends here


    //category video CRUD starts here
    public function createCategoryVideo($type, $path, $active, $label, $name, $title, $notes, $category_id);

    public function attachCategoryVideo($category_id, $video_id, $name, $title, $label, $notes);

    public function getCategoryVideos($id, $active);

    public function getCategoryVideo($category_id, $video_id);

    public function updateCategoryVideo($category_id, $video_id, $name, $title, $label, $notes, $active, $path, $type);

    public function deleteCategoryVideo($category_id, $video_id = array());

    public function activateOrDeactivateVideo($video_id, $status);

    //category video CRUD ends here

    //category attributes CRUD starts here

    public function createCategoryAttributes($name, $code, $attribute_category, $description, $category_id,
                                             $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence);


    public function getCategoryAttributes($category_id, $is_comparable, $is_filterable, $active);

    public function getCategoryAttribute($category_id, $attribute_id);

    public function getCategoryAttributesWithValues($category_id, $is_comparable, $is_filterable, $active);

    public function updateCategoryAttribute($attribute_id, $name, $code, $attribute_category, $description, $category_id,
                                            $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence);

    public function deleteCategoryAttributes($attribute_id = array(), $category_id);

    public function activateOrDeactivateCategoryAttribute($attribute_id, $status);

    //category attributes CRUD ends here
}