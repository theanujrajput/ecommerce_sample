<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/30/13
 * Time: 4:05 PM
 */
class AttributeService
{

    function __construct(iAttributeRepository $attributeRepo, iProductRepository $productRepo, iCategoryRepository $categoryRepo)
    {
        $this->attributeRepo = $attributeRepo;
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function createAttribute($name, $code, $attribute_category, $description, $category_id, $is_comparable, $is_filterable,
                                    $attribute_value_type, $options, $active, $sequence)
    {
        $result = $this->attributeRepo->getAttributes($category_id, $name, null, null, null);
        if ($result->count() != 0) {
            return false;
        } else {

            $attribute = new Attribute;
            $attribute->name = $name;
            $attribute->code = $code;
            $attribute->attribute_category = $attribute_category;
            $attribute->description = $description;
            $attribute->category_id = $category_id;
            $attribute->is_comparable = $is_comparable;
            $attribute->is_filterable = $is_filterable;
            $attribute->attribute_value_type = $attribute_value_type;
            $attribute->sequence = $options;
            $attribute->active = $active;
            $attribute->sequence = $sequence;
            $attribute->save();

            return $attribute;
        }

    }

    public function getAttributes()
    {
        $attributes = $this->attributeRepo->getAttributes(null, null, null, null, null);
        return AppUtil::returnResults($attributes);
    }

    public function getAttribute($id, $code)
    {
        $attribute = $this->attributeRepo->getAttribute($id, $code);
        return AppUtil::returnResults($attribute);
    }

    public function updateAttribute($id, $name, $code, $attribute_category, $description, $category_id, $is_comparable
        , $is_filterable, $attribute_value_type, $options, $active, $sequence)
    {
        $this->attributeRepo->updateAttribute($id, $name, $code, $attribute_category, $description, $category_id, $is_comparable
            , $is_filterable, $attribute_value_type, $options, $active, $sequence);
    }

    public function deleteAttribute($id)
    {
        $this->attributeRepo->deleteAttribute($id);
    }
}