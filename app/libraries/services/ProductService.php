<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/30/13
 * Time: 4:00 PM
 */
class ProductService
{

    function __construct(iProductRepository $productsRepo, iCategoryRepository $categoryRepo,
                         iComboRepository $comboRepo, iTagRepository $tagRepo)
    {
        $this->productsRepo = $productsRepo;
        $this->categoryRepo = $categoryRepo;
        $this->comboRepo = $comboRepo;
        $this->tagRepo = $tagRepo;
    }


    /**
     * @param $name string
     * @param $code string
     * @param $shortcode string
     * @param $description string
     * @param $description_secondary string
     * @param $category_id int
     * @param $base_product_id int
     * @param $active bool
     * @param $is_delivered bool
     * @param $is_ltw bool
     * @param $is_cod bool
     * @param $warranty int
     * @param $list_price int
     * @param $offer_price int
     * @param $weight int
     * @param $sequence int
     * @param string $base_diff_text difference from the base product
     * @param int $popularity
     * @param $meta_title
     * @param $meta_description
     * @param $meta_keywords
     * @return bool|Product
     */
    public function createProduct($name, $code, $shortcode, $description, $description_secondary, $category_id,
                                  $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price,
                                  $offer_price, $weight, $sequence, $base_diff_text, $popularity,
                                  $meta_title = null, $meta_description = null, $meta_keywords = null)
    {


        $product = $this->productsRepo->createProduct($name, $code, $shortcode, $description, $description_secondary,
            $category_id, $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price,
            $offer_price, $weight, $sequence, $base_diff_text, $popularity,
            $meta_title, $meta_description, $meta_keywords);

        return $product;


    }

    /**
     * @param int $id
     * @param string $name
     * @param string $code
     * @param string $shortcode
     * @param string $description
     * @param string $description_secondary
     * @param int $category_id
     * @param int $base_product_id
     * @param bool $active
     * @param bool $is_delivered
     * @param bool $is_ltw
     * @param bool $is_cod
     * @param int $warranty
     * @param int|float $list_price
     * @param int|float $offer_price
     * @param int|float $weight
     * @param int $sequence
     * @param string $base_diff_text
     * @param int $popularity
     * @param $meta_title
     * @param $meta_description
     * @param $meta_keywords
     */
    public function updateProduct($id, $name, $code, $shortcode, $description, $description_secondary, $category_id,
                                  $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price,
                                  $offer_price, $weight, $sequence, $base_diff_text, $popularity,
                                  $meta_title = null, $meta_description = null, $meta_keywords = null)
    {
        $this->productsRepo->updateProduct($id, $name, $code, $shortcode, $description, $description_secondary,
            $category_id, $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price, $offer_price,
            $weight, $sequence, $base_diff_text, $popularity, $meta_title, $meta_description, $meta_keywords);
    }

    /**
     * @param $category_id
     * @param $base_product_id
     * @param $is_delivered
     * @param $is_ltw
     * @param $is_cod
     * @param $active
     * @param $limit
     * @param $paginate
     * @return null
     */
    public function getProducts($category_id, $base_product_id, $is_delivered, $is_ltw, $is_cod, $active, $limit, $paginate)
    {
        $products = $this->productsRepo->getProducts($category_id, $base_product_id, $is_delivered, $is_ltw, $is_cod, $active, $limit, $paginate);
        return AppUtil::returnResults($products);
    }

    /*** return product basic info
     * @param $id
     * @param $name
     * @param $code
     * @param $shortcode
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getProductBasicInfo($id, $name, $code, $shortcode)
    {
        $product = $this->productsRepo->getProductBasicInfo($id, $name, $code, $shortcode);
        return isset($product) ? $product : null;
    }


    /** return product along with images and tags by id, name, code or by shortcode
     * @param int $id
     * @param string $name
     * @param string $code
     * @param string $shortcode
     * @return mixed
     */
    function getProduct($id, $name, $code, $shortcode)
    {
        $product = $this->productsRepo->getProduct($id, $name, $code, $shortcode);
        return isset($product) ? $product : null;
    }

    /** helper function that returns the id of the product by product code
     * @param string $code unique code
     * @return null
     */
    function getProductId($code)
    {
        $product = $this->productsRepo->getProduct(null, null, $code, null);
        if (isset($product)) {
            return $product->id;
        } else {
            return null;
        }
    }


    /** activates or deactivates the product by id
     * @param int $id product_id
     * @param boolean $status
     */
    public function activateOrDeactivateProduct($id, $status)
    {
        $this->productsRepo->activateOrDeactivateProduct($id, $status);
    }


    /*** return the immediate parent category to which the product belongs
     * @param int $id product id
     * @return mixed
     */
    public function getProductImmediateCategory($id)
    {
        $product_category = $this->productsRepo->getProductCategory($id);
        return isset($product_category) ? $product_category : null;
    }

    /*** return the topmost category to which the product belongs
     * @param $id int
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getProductTopCategory($id)
    {
        $product = $this->productsRepo->getProductCategory($id);
        $parent_category_id = $product->category->parent_category_id;

        if (is_null($parent_category_id)) {
            $category_id = $product->category->id;
            return $this->categoryRepo->getCategory($category_id, null, null);
        }

        while ($parent_category_id != null) {

            $category = $this->categoryRepo->getCategory($parent_category_id, null, null);
            $parent_category_id = $category->parent_category_id;
            $category_id = $category->id;
        }

        return $this->categoryRepo->getCategory($category_id, null, null);
    }


    /** accepts the product id and returns all the ancestors of the product
     * @param int $id product_id
     * @return array
     */
    public function getProductAncestors($id)
    {
        $ancestors = array();
        $product = $this->productsRepo->getProductCategory($id);
        $parent_category_id = $product->category->parent_category_id;

        if (is_null($parent_category_id)) {
            $category_id = $product->category->id;
            return $this->categoryRepo->getCategory($category_id, null, null);
        }

        while ($parent_category_id != null) {

            $category = $this->categoryRepo->getCategory($parent_category_id, null, null);
            $parent_category_id = $category->parent_category_id;
            $name = $category->name;
            $category_id = $category->id;
            $ancestors[] = array(
                'name' => $name,
                'id' => $category_id,
            );

        }

        $immediate_category = $this->getProductImmediateCategory($id);
        $id = $immediate_category->category->id;
        $name = $immediate_category->category->name;
        $ancestors[] = array(
            'name' => $name,
            'id' => $id
        );

        return $ancestors;
    }

    /** creates a new product attribute and updates if existing
     * @param $product_id
     * @param array $attribute_id
     * @param array $data data array contains value and notes
     */
    public function createOrUpdateAttributes($product_id, $attribute_id = array(), $data = array())
    {
        $product_attribute = new ProductAttribute();

        foreach ($attribute_id as $i => $attribute) {

            $value = $data[$i]['value'];
            $notes = $data[$i]['notes'];
            $result = $product_attribute->where('product_id', '=', $product_id)
                ->where('attribute_id', '=', $attribute)->first();

            if (isset($result)) {
                $this->updateProductAttribute($product_id, $attribute, $value, $notes);
            } else {
                $this->createProductAttributes($product_id, $attribute, $value, $notes);
            }
        }
    }

    /** accepts attribute_id,product_id,value and notes and creates the attribute of the product
     * @param int $product_id
     * @param int $attribute_id
     * @param int $value
     * @param string $notes
     */
    public function createProductAttributes($product_id, $attribute_id, $value, $notes)
    {
        $this->productsRepo->createProductAttributes($product_id, $attribute_id, $value, $notes);
    }

    /*** accepts product_id and returns the product attribute values along with product specific attributes
     * @param $id int
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getProductAttributesValue($id)
    {
        $product_details = array();
        $product = $this->productsRepo->getProductAttributesValue($id);

        //grab product attributes
        $attributes = $product->attributes;
        if ($attributes->count() != 0) {
            foreach ($attributes as $attribute) {

                $attribute_data = array(
                    "id" => $attribute->pivot->attribute_id,
                    "value" => $attribute->pivot->value,
                    "notes" => $attribute->pivot->notes,
                    "code" => $attribute->code,
                    "attribute_category" => $attribute->attribute_category,
                    "description" => $attribute->description
                );

                $product_details['attribute_info'][$attribute->name] = $attribute_data;
            }
        } else {
            $product_details['attribute_info'] = null;
        }

        //grab product specific attributes
        $product_specific_attributes = $product->productspecificattributes;
        if ($product_specific_attributes->count() != 0) {
            foreach ($product_specific_attributes as $row) {

                $data = array(
                    'id' => $row->id,
                    'values' => $row->value,
                    'notes' => $row->notes
                );
                $product_details["product_specific_attribute_info"][$row->name] = $data;

            }
        } else {
            $product_details["product_specific_attribute_info"] = null;
        }

//        $product_data = array(
//            'name' => $product->name,
//            'code' => $product->code,
//            'shortcode' => $product->shortcode,
//            'description' => $product->description,
//            'description_secondary' => $product->description_secondary,
//            'is_delivered' => $product->is_delivered,
//            'is_ltw' => $product->is_ltw,
//            'is_cod' => $product->is_cod,
//            'warranty' => $product->warranty,
//            'list_price' => $product->list_price,
//            'offer_price' => $product->offer_price,
//            'weight' => $product->weight,
//            'base_diff_text' => $product->base_diff_text,
//        );
//        $product_details['product_info'] = $product_data;

        return $product_details;
    }

    /**
     * @param int $product_id
     * @param int $attribute_id
     * @param int $value
     * @param string $notes
     */
    public function updateProductAttribute($product_id, $attribute_id, $value, $notes)
    {
        $this->productsRepo->updateProductAttribute($product_id, $attribute_id, $value, $notes);
    }

    /** accepts product_id and attribute id array and deletes the product attribute relation
     * @param int $product_id
     * @param array|mixed $attribute_id
     */
    public function deleteProductAttribute($product_id, $attribute_id = array())
    {
        $this->productsRepo->deleteProductAttribute($product_id, $attribute_id);
    }


    //region Product Specific Attribute CRUD starts here
    /** creates a new product specific attribute
     * @param int $product_id
     * @param string $name
     * @param string $value
     * @param string $notes
     * @return mixed
     */
    public function createProductSpecificAttribute($product_id, $name, $value, $notes)
    {
        $specific_attribute = $this->productsRepo->createProductSpecificAttribute($product_id, $name, $value, $notes);
        return $specific_attribute;
    }

    /** returns product specific attributes info
     * @param int $product_id
     * @return null
     */
    public function getProductSpecificAttributes($product_id)
    {
        $product_specific_attributes = $this->productsRepo->getProductSpecificAttributes($product_id);
        return AppUtil::returnResults($product_specific_attributes);
    }

    /** return the product specific attribute info
     * @param int $specific_attribute_id
     * @return null
     */
    public function getProductSpecificAttribute($specific_attribute_id)
    {
        $specific_attribute = $this->productsRepo->getProductSpecificAttribute($specific_attribute_id);
        return isset($specific_attribute) ? $specific_attribute : null;
    }

    /** updates the product specific attribute by specific_attribute_id
     * @param int $specific_attribute_id
     * @param string $name
     * @param string $value
     * @param string $notes
     */
    public function updateProductSpecificAttribute($specific_attribute_id, $name, $value, $notes)
    {
        $this->productsRepo->updateProductSpecificAttribute($specific_attribute_id, $name, $value, $notes);
    }

    /** accepts $specific_attribute_id and delete product specific attribute
     * @param int $specific_attribute_id
     */
    public function deleteProductSpecificAttribute($specific_attribute_id)
    {
        $this->productsRepo->deleteProductSpecificAttribute($specific_attribute_id);
    }
    //endregion Product Specific attributes CRUD ends here


    /** accepts product_id and returns related product
     * @param int $id
     * @return null
     */
    public function getRelatedProducts($id)
    {
        $result = $this->productsRepo->getRelatedProducts($id);
        return ($result->count() != 0) ? $result : null;
    }


    /** compare the array of products and return the product attributes
     * @param array $id product ids array
     * @return mixed
     */
    public function compare($id = array())
    {
        $product_attributes = array();
        $products = $this->productsRepo->getComparableProductAttributes($id);
        foreach ($products as $i => $product) {

            $attributes = $product->attributes; //grab all the attributes of products

            foreach ($attributes as $j => $attribute) {

                $attribute_data = array(
                    'value' => $attribute->pivot->value,
                    "notes" => $attribute->pivot->value,
                    "code" => $attribute->code,
                    "category" => $attribute->attribute_category,
                    "description" => $attribute->description,
                );
                $product_attributes["attribute_info"][$attribute->name][$i] = $attribute_data;
            }

            $product_attributes['product_info'][$i]["id"] = $product->id;
            $product_attributes['product_info'][$i]["name"] = $product->name;
            $product_attributes['product_info'][$i]['code'] = $product->code;
            $product_attributes['product_info'][$i]['shortcode'] = $product->shortcode;
            $product_attributes['product_info'][$i]['description'] = $product->description;
            $product_attributes['product_info'][$i]['description_secondary'] = $product->description_secondary;
            $product_attributes['product_info'][$i]['list_price'] = $product->list_price;
            $product_attributes['product_info'][$i]['offer_price'] = $product->offer_price;
            $product_attributes['product_info'][$i]['weight'] = $product->weight;
            $product_attributes['product_info'][$i]['image'] = $product->images;

        }
        return $product_attributes;
    }


    //region Product Image CRUD stars here

    /**creates a new image and attaches it with the product
     * @param string $path
     * @param string $name
     * @param string $title
     * @param string $caption text beneath image
     * @param string $notes
     * @param bool $is_primary
     * @param int $product_id
     * @return bool
     * @throws Exception
     */
    public function createProductImage($path, $name, $title, $caption, $notes, $is_primary, $product_id)
    {
        $image = $this->productsRepo->createProductImage($path, $name, $title, $caption, $notes, $is_primary, $product_id);
        return $image;
    }

    /** accepts product_id and returns all the images of the corresponding product
     * @param int $id
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getProductImages($id)
    {
        $images = $this->productsRepo->getProductImages($id);
        if ($images->count() != 0) {
            return $images;
        } else {
            return null;
        }
    }

    /** accepts the product_id and image_id and returns the corresponding product image
     * @param int $product_id
     * @param int $image_id
     * @return null
     */
    public function getProductImage($product_id, $image_id)
    {
        $image = $this->productsRepo->getProductImage($product_id, $image_id);
        return isset($image) ? $image : null;
    }


    /** set the primary image of the product
     * @param $product_id int
     * @param $image_id int
     */
    public function setProductPrimaryImage($product_id, $image_id)
    {
        $this->productsRepo->setProductPrimaryImage($product_id, $image_id);
    }

    /**
     * @param int $product_id
     * @param int $image_id
     * @param string $name
     * @param string $title
     * @param string $caption
     * @param string $notes
     * @param $is_primary
     * @param $path
     */
    public function updateProductImage($product_id, $image_id, $name, $title, $caption, $notes, $is_primary, $path)
    {
        $this->productsRepo->updateProductImage($product_id, $image_id, $name, $title, $caption, $notes, $is_primary, $path);
    }

    /** accepts product_id and image_id array and deletes the product image relation
     * @param int $product_id
     * @param array $image_id
     * @return bool
     */
    public function deleteProductImage($product_id, $image_id = array())
    {
        $this->productsRepo->deleteProductImage($product_id, $image_id);
    }
    //endregion Product Image CRUD ends here

    //region Product Document CRUD starts here

    /** creates a new document and then attach it with the product
     * @param string $type
     * @param string $path
     * @param bool $active
     * @param string $hash
     * @param string $label
     * @param string $name
     * @param string $title
     * @param string $notes
     * @param int $product_id
     */
    public function createProductDocument($type, $path, $active, $hash, $label, $name, $title, $notes, $product_id)
    {
        $this->productsRepo->createProductDocument($type, $path, $active, $hash, $label, $name, $title, $notes, $product_id);
    }

    /** attaches the document with the existing product
     * @param int $product_id
     * @param int $document_id
     * @param string $name
     * @param string $title
     * @param string $label
     * @param string $notes
     */
    public function attachProductDocument($product_id, $document_id, $name, $title, $label, $notes)
    {
        $this->attachProductDocument($product_id, $document_id, $name, $title, $label, $notes);
    }


    /** accepts the product_id and document_id and returns the info about the corresponding document
     * @param int $product_id
     * @param int $document_id
     * @return null
     */
    public function getProductDocument($product_id, $document_id)
    {
        $result = $this->productsRepo->getProductDocument($product_id, $document_id);
        return isset($result) ? $result : null;
    }

    /** returns the documents of the product by product_id
     * @param int $id product_id
     */
    public function getProductDocuments($id)
    {
        return $this->productsRepo->getProductDocuments($id);
    }

    /** updates the document of the product
     * @param int $product_id
     * @param int $document_id
     * @param string $name
     * @param string $title
     * @param string $label
     * @param string $notes
     * @param bool $active
     * @param $path
     * @param $type
     */
    public function updateProductDocument($product_id, $document_id, $name, $title, $label, $notes, $active, $path, $type)
    {
        $this->productsRepo->updateProductDocument($product_id, $document_id, $name, $title, $label, $notes, $active, $path, $type);
    }

    /** deletes the existing product document relation
     * @param int $product_id
     * @param array $document_id
     */
    public function deleteProductDocument($product_id, $document_id = array())
    {
        $this->productsRepo->deleteProductDocument($product_id, $document_id);
    }
    //endregion Product Document CRUD ends here

    //region Product Video CRUD starts here

    /** creates a new video and then attaches it with the product
     * @param string $type format of video
     * @param string $path
     * @param bool $active
     * @param $label
     * @param $name
     * @param $title
     * @param $notes
     * @param $product_id
     * @throws Exception
     */
    public function createProductVideo($type, $path, $active, $label, $name, $title, $notes, $product_id)
    {
        $this->productsRepo->createProductVideo($type, $path, $active, $label, $name, $title, $notes, $product_id);
    }

    /** accepts product_id and returns all the videos of the corresponding product
     * @param int $id product_id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     * @throws Exception
     */
    public function getProductVideos($id)
    {
        $videos = $this->productsRepo->getProductVideos($id);
        if ($videos->count() != 0) {
            return $videos;
        } else {
            return null;
        }
    }

    /** accepts the product_id and video_id and returns the info of the corresponding product video
     * @param int $product_id
     * @param int $video_id
     * @return null
     */
    public function getProductVideo($product_id, $video_id)
    {
        $video = $this->productsRepo->getProductVideo($product_id, $video_id);
        return isset($video) ? $video : null;
    }

    /**
     * @param int $product_id
     * @param int $video_id
     * @param $name
     * @param $title
     * @param $label
     * @param $notes
     * @param $active
     * @param $path
     * @param $type
     * @return bool
     */
    public function updateProductVideo($product_id, $video_id, $name, $title, $label, $notes, $active, $path, $type)
    {
        $this->productsRepo->updateProductVideo($product_id, $video_id, $name, $title, $label, $notes, $active, $path, $type);
    }

    /** Deletes the product video relation
     * @param int $product_id
     * @param array $video_id
     */
    public function deleteProductVideo($product_id, $video_id = array())
    {
        $this->productsRepo->deleteProductVideo($product_id, $video_id);
    }

    //endregion Product Video CRUD ends here

    //region Product Tag CRUD starts here

    /** attaches the existing tag with the product
     * @param int $product_id
     * @param int $tag_id
     * @param int|float $offer_price
     * @return mixed
     */
    public function createProductTag($product_id, $tag_id, $offer_price)
    {
        $product_tag = $this->productsRepo->createProductTag($product_id, $tag_id, $offer_price);
        return $product_tag;
    }

    /** accepts product_id and returns the tags associated with the product
     * @param int $id
     * @throws Exception
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     */
    public function getProductTags($id)
    {
        $tags = $this->productsRepo->getProductTags($id);
        if ($tags->count() != 0) {
            return $tags;
        } else {
            return null;
        }
    }

    public function getProductsByTag($tag_name, $limit)
    {
        $tag = $this->tagRepo->getTag(null, $tag_name, null);
        if (isset($tag)) {
            $tag_id = $tag->id;
            $product_tags = $this->productsRepo->getProductsByTag($tag_id, $limit);
            if ($product_tags->count() != 0) {
                $products = $product_tags->products;
                return AppUtil::returnResults($products);
            } else {
                return null;
            }
        } else {
            return null;
        }

    }

    /**accepts product_id and tag_id and returns the corresponding product tag
     * @param int $product_id
     * @param int $tag_id
     * @return null
     */
    public function getProductTag($product_id, $tag_id)
    {
        $tag = $this->productsRepo->getProductTag($product_id, $tag_id);
        return isset($tag) ? $tag : null;
    }

    public function getUnassignedProductTags($product_id)
    {
        $tags = $this->productsRepo->getUnassignedProductTags($product_id);
        return AppUtil::returnResults($tags);
    }

    /***
     * @param int $product_id
     * @param int $tag_id
     * @param string $name
     * @param string $code
     * @param string $description
     * @param int|float $offer_price
     * @return bool
     * @throws Exception
     */
    public function updateProductTag($product_id, $tag_id, $name, $code, $description, $offer_price)
    {
        $this->productsRepo->updateProductTag($product_id, $tag_id, $name, $code, $description, $offer_price);
    }

    public function attachProductTag($tag_id, $product_id, $offer_price)
    {
        $this->productsRepo->attachProductTag($tag_id, $product_id, $offer_price);
    }

    /** accepts product_id and tag_id array deletes the product tag relation
     * @param array $product_id
     * @param array $tag_id
     * @throws Exception
     */
    public function deleteProductTag($product_id, $tag_id = array())
    {
        $this->productsRepo->deleteProductTag($product_id, $tag_id);
    }
    //endregion Product Tag CRUD ends here


    /** accepts product_id and returns all the combos in which the corresponding product is present with primary image
     * @param int $id product_id
     * @return array|null
     * @throws Exception
     */
    public function getProductCombos($id)
    {
        try {

            $combo_products_array = array();
            $combo_ids = array();
            $combos = $this->comboRepo->getCombosIdByProductId($id); //contains the combos in which the corresponding product is present

            if ($combos->count() != 0) {

                foreach ($combos as $row) {
                    $combo_ids[] = $row->combo_id; //combo ids array
                }
                foreach ($combo_ids as $i => $combo) {

                    $result = Combo::with('products')->where('id', '=', $combo)->first();
                    $combo_info = array(
                        'id' => $result->id,
                        'name' => $result->name,
                        'description' => $result->description,
                        'type' => $result->type,
                        'combo_price' => $result->combo_price
                    );
                    $combo_products_array[$i]['combo_info'] = $combo_info;


                    if ($result->products->count() != 0) {
                        foreach ($result->products as $single_product) {

                            $product_id = $single_product->id;
                            $primary_image = AppUtil::getProductPrimaryImage($product_id);

                            $product_info = array(
                                'id' => $single_product->id,
                                'name' => $single_product->name,
                                'category' => $single_product->category->name,
                                'code' => $single_product->code,
                                'shortcode' => $single_product->shortcode,
                                'description' => $single_product->description,
                                'list_price' => $single_product->list_price,
                                'offer_price' => $single_product->offer_price,
                                'images' => $single_product->images
//                                'image_name' => isset($primary_image['image_name']) ? $primary_image['image_name'] : null,
//                                'image_path' => isset($primary_image['image_path']) ? $primary_image['image_path'] : null,
//                                'image_title' => isset($primary_image['image_title']) ? $primary_image['image_title'] : null,
//                                'image_caption' => isset($primary_image['image_caption']) ? $primary_image['image_caption'] : null
                            );
                            $combo_products_array[$i]['product'][] = $product_info;

                        }
                    } else {
                        $combo_products_array[$i]['product'][] = null;

                    }
                }
            } else {
                $combo_products_array = null;
            }

            return $combo_products_array;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    /** return the filtered products
     * @param array $filters
     * @param array $price
     * @param int $category_id
     * @param string $sort_by accepts highest|lowest|popularity
     * @param $paginate
     * @return null
     */
    public function getFilteredProducts($filters = array(), $price, $category_id, $sort_by, $paginate)
    {
        $filter_size = sizeof($filters);

        if ($filter_size != 0) {
            $result = ProductAttribute::join("products", 'productattributes.product_id', '=', 'products.id', 'left')
                ->join("attributes", 'productattributes.attribute_id', '=', 'attributes.id', 'left')
                ->where(function ($query) use ($filters) {

                    if (isset($filters)) {
                        foreach ($filters as $key => $value) {

                            $value = explode(',', $value);
                            $query->orwhere(function ($inner) use ($key, $value) {
                                $inner->where("attributes.name", '=', $key)->whereIn("productattributes.value", $value);
                            });
                        }
                    }
                })
                ->groupBy("product_id")->havingRaw("COUNT(product_id)=$filter_size")
                ->where(function ($query) use ($price) {

                    if (isset($price)) {
                        $price = explode('-', $price);
                        $min = $price[0];
                        $max = $price[1];
                        $query->where('list_price', '>=', $min)->where('list_price', '<=', $max);
                    }

                })->where('products.category_id', '=', $category_id)->whereNull('base_product_id')->get(array('product_id'));
        }

//        this condition is applicable only when filtering is done using price only
        if ($filter_size == 0 && isset($price)) {
            $price = explode('-', $price);
            $min = $price[0];
            $max = $price[1];
            $result = Product::where('category_id', '=', $category_id)
                ->where('list_price', '>=', $min)->where('list_price', '<=', $max)->whereNull('base_product_id')
                ->get(array('id as product_id'));
        }

//        this condition is applicable only when no filter is applied just sorting is done
        if ($filter_size == 0 && !isset($price)) {
            $result = Product::where('category_id', '=', $category_id)->whereNull('base_product_id')
                ->get(array('id as product_id'));
        }

        //$result contains the product_id of all the products that satisfies the filters condition
        $product_ids = array();
        if ($result->count() != 0) {
            foreach ($result as $row) {
                $product_ids[] = $row->product_id;
            }
            $query = Product::with(array('combos', 'images' => function ($inner_query) {

                    $inner_query->where('is_primary', '=', true); //get primary image

                }))->whereIn('id', $product_ids);

            if (!is_null($sort_by)) {
                if ($sort_by == 'lowest') {
                    $query->orderBy('list_price', 'asc');
                } else if ($sort_by == "highest") {
                    $query->orderBy('list_price', 'desc');
                } else if ($sort_by == 'popularity') {
                    $query->orderBy('popularity', 'desc');
                }
            }

            if (!is_null($paginate)) {
                return $query->paginate($paginate);
            }
            return $query->get();

        } else {
            return null;
        }

    }

    /** accepts product_id and returns the position of the corresponding product
     * @param $id
     * @return mixed|null|string
     */
    public function getProductPosition($id)
    {
        $product = $this->getProduct($id, null, null, null);
        $sequence = $product->sequence;
        if (isset($sequence)) {
            $max_sequence = Product::max('sequence');
            $min_sequence = Product::min('sequence');

            $after = Product::where('sequence', '<', $sequence)->orderBy('sequence', 'desc')->first();
            $after_id = isset($after) ? $after->id : null;

            if ($sequence == $min_sequence) {
                return 'top';
            } elseif ($sequence == $max_sequence) {
                return 'bottom';
            } else {
                return $after_id;
            }
        } else {
            return null;
        }

    }


//    public function getProductsFilterHtml($products_id = array(), $filter = null, $filter_param = null)
//    {
//
//        $filters = $this->getProductsFilter($products_id);
//        $html = "";
//        $child = "";
//        $i = 0;
//        if (!is_null($filters)) {
//
//            foreach ($filters as $key => $value) {
//
//                // check which filter is active and accordingly expands that list that list
//                if (isset($filter[$key])) {
//                    $key_exist = array_key_exists($key, $filters);
//                    if (isset($key_exist)) {
//                        $display = "";
//                        $closed = "";
//                    } else {
//                        $display = "display:none";
//                        $closed = "closed";
//                    }
//                } else {
//                    $display = "display:none";
//                    $closed = "closed";
//                }
//
//                $html = $html . "<div>
//                    <span class=layered_subtitle>" . $key . "</span>" .
//                    "<span class=\"layered_close $closed\"><a href=# rel=ul_layered_category_$i>&lt;</a></span>
//                    <div class=clear></div>";
//
//
//                $child = $child . "<ul id=ul_layered_category_$i style=" . $display . " >";
//                $id = $value['id'];
//
//                //  if id is 0 the add price range slider
//                if ($id == 0) {
//
//                    $min = floor($value['values'][0]);
//                    $max = ceil($value['values'][1]);
//
//                    if (isset($filter_param['price'])) {
//                        $price_filter = explode('-', $filter_param['price']);
//                        $min_selected_range = $price_filter[0];
//                        $max_selected_range = $price_filter[1];
//                    } else {
//                        $min_selected_range = $min;
//                        $max_selected_range = $max;
//                    }
//
//                    $child = $child . "<li class=\"nomargin hiddable price_li\">
//                     <p>
//                        <label for=amount>Range:</label>
//                        <span id=amount style=\"border:0; color:#f6931f; font-weight:bold;\"></span>
//                     </p>
//                     <div id=\"price_slider\" class=\"filter_price\"
//                     data-min-selected=" . $min_selected_range . " data-max-selected=" . $max_selected_range . "
//                     data-min=" . ($min) . " data-max=" . ($max) . "></div>";
//
//                } else {
//                    foreach ($value['values'] as $row) {
//
//                        $row = isset($row) ? trim($row) : null;
//                        $input_name = $key;
//
//                        if ((isset($filter[$key]) && $filter[$key] == $row) || isset($filter_param[$key]) && $filter_param[$key] == $row) {
//                            $checked = 'checked';
//                        } else {
//                            $checked = "";
//                        }
//
//                        $child = $child . "<li class=nomargin hiddable>
//                            <input type=checkbox class=\"checkbox filter_value \" name=$input_name id=layered_category_11 value=$row $checked>
//                            $row </li>";
//                    }
//                }
//
//                $child = $child . '</ul></div>';
//                $html = $html . $child;
//                $child = "";
//
//                $i++;
//            }
//            return $html;
//        } else {
//            return "";
//        }
//    }

    public function getProductsFilterHtml($products_id = array(), $selected_filters = null, $filter_param = null)
    {

        $predefined_filters = $this->getProductsFilter($products_id);
        $tab_links = '';
        $tab_content = '';
        $inner_tab_content = '';
        $filter_div_content = '';

        if (!is_null($predefined_filters)) {

//          tabs link creation starts here

            $tab_links = $tab_links . '<ul class="nav nav-tabs margin-bottom0">';
            $link = '';

            $i = 1;
            foreach ($predefined_filters as $key => $value) {
                $active = ($i == 1) ? "active" : "";
                $link = $link . "<li class=$active ><a href=" . '#' . str_replace(' ', '_', $key) . " data-toggle=tab>$key</a></li>";
                $i++;
            }
            $tab_links = $tab_links . $link . '</ul>';

//          tabs link creation ends here

            $tab_content = $tab_content . "<div id=myTabContent class=\"tab-content tab-bg\">";

            $j = 1;
            foreach ($predefined_filters as $key => $value) {

                $active = ($j == 1) ? "active" : "";
                $inner_tab_content = $inner_tab_content . "<div class=\" tab-pane fade in $active\"  id= " . str_replace(' ', '_', $key) . " >
                <div class=row-fluid>";

                $id = $value['id'];

                //  if id is 0 the add price range slider
                if ($id == 0) {

                    $min = floor($value['values'][0]);
                    $max = ceil($value['values'][1]);

                    if (isset($filter_param['price'])) {
                        $price_filter = explode('-', $filter_param['price']);
                        $min_selected_range = $price_filter[0];
                        $max_selected_range = $price_filter[1];
                    } else {
                        $min_selected_range = $min;
                        $max_selected_range = $max;
                    }

                    $filter_div_content = $filter_div_content . "<div class= span6 padding-top-5px >
                     <p>
                        <label for=amount>Range:</label>
                        <span id=amount style=\"border:0; color:#f6931f; font-weight:bold;\"></span>
                     </p>
                     <div id=\"price_slider\" class=\"filter_price\"
                     data-min-selected=" . $min_selected_range . " data-max-selected=" . $max_selected_range . "
                     data-min=" . ($min) . " data-max=" . ($max) . "></div>";

                } else {
                    foreach ($value['values'] as $row) {

                        $row = isset($row) ? trim($row) : null;
                        $input_name = $key;

                        if ((isset($selected_filters[$key]) && str_contains($selected_filters[$key], $row)) || isset($filter_param[$key]) && $filter_param[$key] == $row) {
                            $checked = 'checked';
                        } else {
                            $checked = "";
                        }

                        //creation of filter input starts here
                        $filter_div_content = $filter_div_content . "<div class= span4 padding-top-5px >

                            <input type= checkbox name=\"$input_name\"  id= inlineCheckbox1  value= $row $checked
                                   class= \"checkbox checkbox-top-margin filter_value margin-right10 \" >
                           $row

                        </div>";
                        // creation of filter input ends here

                    }
                }

                $inner_tab_content = $inner_tab_content . $filter_div_content . '</div></div>';
                $filter_div_content = "";
                $j++;
            }
            $tab_content = $tab_content . $inner_tab_content . "</div>";

            return $tab_links . $tab_content;

        } else {
            return "";
        }
    }

    /** accepts the product ids and returns the filters according to that
     * @param array $products_id
     * @return array
     */
    public function getProductsFilter($products_id = array())
    {
        $filter_array = array();
        $attribute_value = array();
        $price = array();

        $attributes = $this->productsRepo->getProductsAttributes($products_id);
        $min_price_product = Product::min('list_price');
        $max_price_product = Product::max('list_price');

        $price_range = $this->getPriceRange($min_price_product, $max_price_product);

        if (!is_null($attributes)) {
            foreach ($attributes as $attribute) {
                if ($attribute->products->count() != 0) {

                    $products = $attribute->products;
                    $attribute_id = $attribute->id;
                    $attribute_name = $attribute->name;
                    foreach ($products as $product) {
                        $attribute_value[] = trim($product->pivot->value);
                        $price[] = $product->list_price;
                    }
                    $data = array('id' => $attribute_id, 'values' => array_unique($attribute_value));
                    $filter_array[$attribute_name] = $data;
                    $attribute_value = array();
                }
            }
        } else {
            $filter_array = null;
        }

        return array_merge($filter_array, $price_range);
    }

    private function getPriceRange($min_price_product, $max_price_product)
    {

        $price_range['price']['id'] = 0;
        $price_range['price']['values'] = array($min_price_product, $max_price_product);
        return $price_range;

//        $price_range = array();
//        $remainder = floor($min_price_product) % 10;
//        $min_price_product = $min_price_product - $remainder;
//
//        $range = Constants::PRICE_RANGE;
//
//        for ($i = $min_price_product; $i < $max_price_product; $i = $i + $range) {
//
//            $max = $min_price_product + $range;
//            $price_range['price']['id'] = 0;
//            $price_range['price']['values'][] = (int)$min_price_product . '-' . ((int)$max);
//            $min_price_product = $max;
//        }
//        return $price_range;
    }

    /** return the html of the compare bar if their are comparable products in session
     * @return string
     */
    public function getCompareBarHtml()
    {
//        Session::flush();
        $comparable_ids = Session::get('id', null);
        $total_comparable_products = sizeof($comparable_ids);
        $compare_limit = 3;


        $html = "<div class=\"line compare-cart-wrapper\"><div class=compare-items data-items-size=" . $total_comparable_products . ">";


        if ($comparable_ids) {
            foreach ($comparable_ids as $row) {
                $product = $this->getProductBasicInfo($row, null, null, null);
                $images = $product->images;
                $image = HtmlUtil::getPrimaryImage($images);
                $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;
                $product_name = $product->name;
                $category_name = $product->category->name;

                $url = URL::to("$category_name/$product_name-$row");

                $html = $html . "<div class= compare-item data-id=" . $row . " >
                    <div class= thumb_holder ><img class=compare_img src= " . URL::to($path) . " /></div>
                    <a class= description target=_blank  href= \"$url\" >" . $product->name . "</a>
                    <span class= delete  title= remove >
                        <a onclick = deleteItem(" . $row . ");return false;  href = '#'
                        class= delete_link>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></span></div>";

            }

            $left_products = $compare_limit - $total_comparable_products;
            for ($i = 0; $i < $left_products; $i++) {

                $html = $html . '<div class="compare-item empty_item">
                        <div class="thumb_holder"></div>
                        <p class="description">Add Another Item</p>
                        </div>';
            }

            $disabled = $total_comparable_products < 2 ? "disabled" : "";
            $comparable_ids_string = implode(',', $comparable_ids);

            $html = $html . '</div><div class="compare-controls">
            <a class="compare_btn exclusive ' . $disabled . '" href = "' . URL::to('product/compare?id=' . $comparable_ids_string) . '">
                Compare</a>
            <span class="close" title="Close" onclick="deleteAllItems(); return false;"></span>
                      </div><div class="clear"></div>';

        } else {
            $html = '';
        }
        return $html;
    }


    /** accept product_id and return all its variants
     * @param int $product_id
     * @return null
     */
    public function getProductVariants($product_id)
    {
        $variants = $this->productsRepo->getProductVariants($product_id);
        return AppUtil::returnResults($variants);
    }

}