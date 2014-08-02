<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/30/13
 * Time: 4:05 PM
 */
class CategoryService
{

    function __construct(iCategoryRepository $categoryRepo, iAttributeRepository $attributeRepo, iProductRepository $productRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->attributeRepo = $attributeRepo;
        $this->productRepo = $productRepo;
    }

    /**
     * @param $name
     * @param $shortcode
     * @param $description
     * @param $description_secondary
     * @param $sequence
     * @param $parent_category_id
     * @param $active
     * @param $is_delivered
     * @param $is_ltw
     * @param $is_cod
     * @param $warranty
     * @param $meta_title
     * @param $meta_description
     * @param $meta_keywords
     * @return mixed
     */
    public function createCategory($name, $shortcode, $description, $description_secondary, $sequence, $parent_category_id,
                                   $active, $is_delivered, $is_ltw, $is_cod, $warranty,
                                   $meta_title = null, $meta_description = null, $meta_keywords = null)
    {

        $category = $this->categoryRepo->createCategory($name, $shortcode, $description, $description_secondary,
            $sequence, $parent_category_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty,
            $meta_title, $meta_description, $meta_keywords);

        return $category;
    }

    /**
     * @param $id
     * @param $name
     * @param $shortcode
     * @param $description
     * @param $description_secondary
     * @param $sequence
     * @param $parent_category_id
     * @param $active
     * @param $is_delivered
     * @param $is_ltw
     * @param $is_cod
     * @param $warranty
     * @param $meta_title
     * @param $meta_description
     * @param $meta_keywords
     * @return mixed
     */
    public function updateCategory($id, $name, $shortcode, $description, $description_secondary, $sequence,
                                   $parent_category_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty,
                                   $meta_title, $meta_description, $meta_keywords)
    {
        return $this->categoryRepo->updateCategory($id, $name, $shortcode, $description, $description_secondary, $sequence,
            $parent_category_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty,
            $meta_title, $meta_description, $meta_keywords);
    }

    /** returns all the categories
     * @param $active
     * @param $is_delivered
     * @param $is_ltw
     * @param $is_cod
     * @param $paginate
     * @return null
     */
    public function getCategories($active, $is_delivered, $is_ltw, $is_cod, $paginate)
    {
        $categories = $this->categoryRepo->getCategories($active, $is_delivered, $is_ltw, $is_cod, $paginate);
        return AppUtil::returnResults($categories);
    }

    public function getCategory($id, $name, $shortcode)
    {
        $category = $this->categoryRepo->getCategory($id, $name, $shortcode);
        return isset($category) ? $category : null;
    }

    /** accepts the category id returns the parent category id
     * @param int $id category_id
     * @return mixed
     */
    public function getCategoryParent($id)
    {
        $category = $this->categoryRepo->getCategory($id, null, null, null);
        $parent_category_id = $category->parent_category_id;
        if (is_null($parent_category_id)) {
            return null;
        }

        while ($parent_category_id != null) {
            $category = $this->categoryRepo->getCategory($parent_category_id, null, null);
            $parent_category_id = $category->parent_category_id;
        }

        $result = $this->categoryRepo->getCategory($parent_category_id, null, null);
        return $result->id;

    }

    /**
     * @param $id
     * @param $is_comparable
     * @param $is_filterable
     * @param $active
     * @return string
     */
    public function getCategoryFiltersHtml($id, $is_comparable, $is_filterable, $active)
    {
        $filters = $this->getCategoryFilters($id, $is_comparable, $is_filterable, $active);
        $html = "";
        $child = "";

        $i = 0;
        if (!is_null($filters)) {
            foreach ($filters as $key => $value) {

                $html = $html . "<div>
            <span class=layered_subtitle>" . $key . "</span>" .
                    "<span class=\"layered_close closed\"><a href=# rel=ul_layered_category_$i>&lt;</a></span>
            <div class=clear></div>";

                $child = $child . "<ul id=ul_layered_category_$i style=display:none >";

                foreach ($value as $row) {

                    if ($value == "price_range" || $value == "price range" || $value == "Price Range") {
                        $min = $row['min'];
                        $max = $row['max'];
                        $row = $min . "-" . $max;
                    }

                    $row = isset($row) ? $row : null;
                    $child = $child . '<li class="nomargin hiddable">
                            <input type="checkbox" class="checkbox" name="layered_category_11" id="layered_category_11">
                            <label for="layered_category_11"> <a href="#" rel="">' . $row . '</a> </label>
                        </li>';

                }
                $child = $child . '</ul></div>';
                $html = $html . $child;
                $child = "";

                $i++;
            }
            return $html;
        } else {
            return "";
        }


    }

    /**
     * @param int $id category_id
     * @param int $is_comparable 0 or 1
     * @param int $is_filterable 0 or 1
     * @param int $active
     * @return array
     */
    public function getCategoryFilters($id, $is_comparable, $is_filterable, $active)
    {

        $price_range = array();
        $min_price_product = Product::where('category_id', '=', $id)->min('list_price');
        $max_price_product = Product::where('category_id', '=', $id)->max('list_price');

        if (isset($min_price_product) && $max_price_product) {

            $remainder = floor($min_price_product) % 10;
            $min_price_product = $min_price_product - $remainder;

            $range = Constants::PRICE_RANGE;

            for ($i = $min_price_product; $i < $max_price_product; $i = $i + $range) {

                $max = $min_price_product + $range;
                $price_range['price_range'][] = array('min' => (int)$min_price_product, 'max' => (int)$max);
                $min_price_product = $max;
            }
        } else {
            $price_range['price_range'] = null;
        }

        $attributes = $this->getCategoryAttributesWithValues($id, $is_comparable, $is_filterable, $active);
        if (!is_null($attributes)) {
            return array_merge($attributes, $price_range);
        } else {
            return $price_range;
        }
    }

    /** accepts category id and deletes the category
     * @param $id
     */
    public function deleteCategory($id)
    {
        $this->categoryRepo->deleteCategory($id);
    }

    /** activates or deactivate the category by id
     * @param  int $id category_id
     * @param boolean $status
     */
    public function activateOrDeactivateCategory($id, $status)
    {
        $this->categoryRepo->activateOrDeactivateCategory($id, $status);
    }

    public function getCategoryPosition($id)
    {
        $category = $this->getCategory($id, null, null);
        $sequence = $category->sequence;
        if (!isset($sequence)) {
            return null;
        }
        $max_sequence = Category::max('sequence');
        $min_sequence = Category::min('sequence');

        $after = Category::where('sequence', '<', $sequence)->orderBy('sequence', 'desc')->first();
        $after_id = isset($after) ? $after->id : null;

        if ($sequence == $min_sequence) {
            return 'top';
        } elseif ($sequence == $max_sequence) {
            return 'bottom';
        } else {
            return $after_id;
        }


    }

    //region Category Documents CRUD
    /** creates a new document and then attach it with the category
     * @param string $type format of document
     * @param string $path path of the document
     * @param bool $active
     * @param string $hash
     * @param string $label
     * @param string $name
     * @param string $title
     * @param string $notes
     * @param int $category_id
     */
    public function createCategoryDocuments($type, $path, $active, $hash, $label, $name, $title, $notes, $category_id)
    {
        $this->categoryRepo->createCategoryDocument($type, $path, $active, $hash, $label, $name, $title, $notes, $category_id);
    }

    /** attaches a document with the existing category
     * @param int $category_id
     * @param int $document_id
     * @param string $name
     * @param string $title
     * @param string $label
     * @param string $notes
     */
    public function attachCategoryDocument($category_id, $document_id, $name, $title, $label, $notes)
    {
        $this->categoryRepo->attachCategoryDocument($category_id, $document_id, $name, $title, $label, $notes);
    }

    /** returns the documents of the category by category_id
     * @param $id
     * @param $active
     * @return mixed
     */
    public function getCategoryDocuments($id, $active)
    {
        return $this->categoryRepo->getCategoryDocuments($id, $active);
    }

    /** accepts category_id and document_id and returns the document of corresponding category
     * @param int $category_id
     * @param int $document_id
     * @return null
     */
    public function getCategoryDocument($category_id, $document_id)
    {
        $document = $this->categoryRepo->getCategoryDocument($category_id, $document_id);
        return isset($document) ? $document : null;
    }

    /** updates the document of the category
     * @param int $category_id
     * @param int $document_id
     * @param string $name
     * @param string $title
     * @param string $label
     * @param string $notes
     * @param $active
     * @param $path
     * @param $type
     */
    public function updateCategoryDocument($category_id, $document_id, $name, $title, $label, $notes, $active, $path, $type)
    {
        $this->categoryRepo->updateCategoryDocument($category_id, $document_id, $name, $title, $label, $notes, $active, $path, $type);
    }

    /** deletes the existing category document relation
     * @param $category_id
     * @param $document_id
     */
    public function deleteCategoryDocument($category_id, $document_id)
    {
        $this->categoryRepo->deleteCategoryDocument($category_id, $document_id);
    }

    public function activateOrDeactivateDocument($document_id, $status)
    {
        $this->categoryRepo->activateOrDeactivateDocument($document_id, $status);
    }


    //endregion Category Document CRUD

    //region Category Videos CRUD
    /** creates a video and attaches it with the category
     * @param string $type format of video
     * @param string $path storage path of video
     * @param bool $active
     * @param $label
     * @param $name
     * @param $title
     * @param $notes
     * @param $category_id
     */
    public function createCategoryVideo($type, $path, $active, $label, $name, $title, $notes, $category_id)
    {
        $this->categoryRepo->createCategoryVideo($type, $path, $active, $label, $name, $title, $notes, $category_id);
    }

    /** attaches the existing video with the category
     * @param $category_id
     * @param $video_id
     * @param $name
     * @param $title
     * @param $label
     * @param $notes
     */
    public function attachCategoryVideo($category_id, $video_id, $name, $title, $label, $notes)
    {
        $this->categoryRepo->attachCategoryVideo($category_id, $video_id, $name, $title, $label, $notes);
    }

    /** returns the videos of the category by category_id
     * @param $id
     * @param $active
     * @return null $videos
     */
    public function getCategoryVideos($id, $active)
    {
        $videos = $this->categoryRepo->getCategoryVideos($id, $active);
        return AppUtil::returnResults($videos);
    }


    /** accepts category_id and video_id and returns the corresponding video of the category
     * @param int $category_id
     * @param int $video_id
     * @return null
     */
    public function getCategoryVideo($category_id, $video_id)
    {
        $video = $this->categoryRepo->getCategoryVideo($category_id, $video_id);
        return isset($video) ? $video : null;
    }

    /** updates the video of the product by category_id and video_id
     * @param $category_id
     * @param $video_id
     * @param $name
     * @param $title
     * @param $label
     * @param $notes
     * @param bool $active
     * @param $path
     * @param $type
     */
    public function updateCategoryVideo($category_id, $video_id, $name, $title, $label, $notes, $active, $path, $type)
    {
        $this->categoryRepo->updateCategoryVideo($category_id, $video_id, $name, $title, $label, $notes, $active, $path, $type);
    }

    /** deletes the existing category video relation
     * @param int $category_id
     * @param array $video_id
     */
    public function deleteCategoryVideo($category_id, $video_id = array())
    {
        $this->categoryRepo->deleteCategoryVideo($category_id, $video_id);
    }

    /** activates or deactivates the video by video_id
     * @param int $video_id
     * @param int 0|1 $status
     */
    public function activateOrDeactivateVideo($video_id, $status)
    {
        $this->categoryRepo->activateOrDeactivateVideo($video_id, $status);
    }


    //endregion Category Video CRUD

    //region Category Attributes CRUD
    /** creates a new attribute and attaches it with the category by category_id
     * @param string $name
     * @param string $code
     * @param string $attribute_category
     * @param string $description
     * @param int $category_id
     * @param bool $is_comparable
     * @param bool $is_filterable
     * @param string $attribute_value_type
     * @param string $options
     * @param bool $active
     * @param int $sequence
     * @return Attribute
     * @throws Exception
     */
    public function createCategoryAttributes($name, $code, $attribute_category, $description, $category_id,
                                             $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence)
    {
        $attribute = $this->categoryRepo->createCategoryAttributes($name, $code, $attribute_category, $description, $category_id,
            $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence);
        return $attribute;
    }

    /** accepts category_id and return only the attributes of the corresponding category and parent category
     * @param $id
     * @param $is_comparable
     * @param $is_filterable
     * @param $active
     * @return array
     * @throws Exception
     */
    public function getCategoryAttributes($id, $is_comparable, $is_filterable, $active)
    {
        try {

            $attributes_array = array();
            $attributes = $this->categoryRepo->getCategoryAttributes($id, $is_comparable, $is_filterable, $active);


            if ($attributes->count() != 0) {
                foreach ($attributes as $attribute) {

                    $attributes_array[] = array(
                        'id' => $attribute->id,
                        'name' => $attribute->name,
                        'code' => $attribute->code,
                        'attribute_category' => $attribute->attribute_category,
                        'description' => $attribute->description,
                        'attribute_value_type' => $attribute->attribute_value_type,
                        'active' => $attribute->active,
                        'sequence' => $attribute->sequence
                    );
                }
            }

//            $parent_category_id = $this->getCategoryParent($id);
            $parent_category = $this->categoryRepo->getCategory($id, null, null);
            $parent_category_id = $parent_category->parent_category_id;

            while (!is_null($parent_category_id)) {

                $parent_category_attributes = $this->categoryRepo->getCategoryAttributes($parent_category_id, $is_comparable, $is_filterable, $active);
                if ($parent_category_attributes->count() != 0) {

                    foreach ($parent_category_attributes as $row) {

                        $attributes_array[] = array(
                            'id' => $row->id,
                            'name' => $row->name,
                            'code' => $row->code,
                            'attribute_category' => $row->attribute_category,
                            'description' => $row->description,
                            'attribute_value_type' => $row->attribute_value_type,
                            'active' => $row->active,
                            'sequence' => $row->sequence
                        );
                    }
                }
                $category = $this->categoryRepo->getCategory($parent_category_id, null, null);
                $parent_category_id = $category->parent_category_id;

            }


            return $attributes_array;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    /** accepts the category_id and attribute_id and returns the corresponding product_attribute
     * @param int $category_id
     * @param int $attribute_id
     * @return null
     */
    public function getCategoryAttribute($category_id, $attribute_id)
    {
        $attribute = $this->categoryRepo->getCategoryAttribute($category_id, $attribute_id);
        return isset($attribute) ? $attribute : null;
    }


    /** returns the attributes of the category along with their values
     * @param int $category_id
     * @param bool $is_comparable
     * @param bool $is_filterable
     * @param bool $active
     * @return array|null
     */
    public function getCategoryAttributesWithValues($category_id, $is_comparable, $is_filterable, $active)
    {
        $attributes_array = array();
        $attributes = $this->categoryRepo->getCategoryAttributesWithValues($category_id, $is_comparable, $is_filterable, $active);

        if ($attributes->count() != 0) {
            foreach ($attributes as $row) {
                $attributes_array[$row->name][] = $row->value;
            }
            return $attributes_array;

        } else {
            return null;
        }
    }

    /** updates the attribute by category_id and attribute_id
     * @param int $attribute_id
     * @param string $name
     * @param string $code
     * @param string $attribute_category
     * @param string $description
     * @param int $category_id
     * @param bool $is_comparable
     * @param bool $is_filterable
     * @param bool $attribute_value_type
     * @param string $options
     * @param bool $active
     * @param int $sequence
     */
    public function updateCategoryAttribute($attribute_id, $name, $code, $attribute_category, $description, $category_id,
                                            $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence)
    {
        $this->categoryRepo->updateCategoryAttribute($attribute_id, $name, $code, $attribute_category, $description, $category_id,
            $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence);
    }

    /** accepts attribute_id array and category_id and deletes the category attributes
     * @param array|int $attribute_id
     * @param int $category_id
     */
    public function deleteCategoryAttributes($attribute_id = array(), $category_id)
    {
        $this->categoryRepo->deleteCategoryAttributes($attribute_id, $category_id);
    }


    /** activates or deactivates category attribute
     * @param int $attribute_id
     * @param int 0|1 $status
     */
    public function activateOrDeactivateCategoryAttribute($attribute_id, $status)
    {
        $this->categoryRepo->activateOrDeactivateCategoryAttribute($attribute_id, $status);
    }

    public function getCategoryAttributePosition($attribute_id)
    {
        $attribute = $this->attributeRepo->getAttribute($attribute_id, null);
        $sequence = $attribute->sequence;
        if (!isset($sequence)) {
            return null;
        }
        $max_sequence = Attribute::max('sequence');
        $min_sequence = Attribute::min('sequence');

        $after = Attribute::where('sequence', '<', $sequence)->orderBy('sequence', 'desc')->first();
        $after_id = isset($after) ? $after->id : null;

        if ($sequence == $min_sequence) {
            return 'top';
        } elseif ($sequence == $max_sequence) {
            return 'bottom';
        } else {
            return $after_id;
        }
    }

    //endregion Category Attributes CRUD


    /** creates a category tree
     * @return array
     */
    public function getCategoryTree()
    {

        $category = $this->categoryRepo->getCategories(1, null, null, null, null);
        $tree = array();

        foreach ($category as $tkey => $tval) {

            $data = array();
            // Skip element, if it is a child element or if the item is not active
            if ($category[$tkey]->parent_category_id != null && $category[$tkey]->active == true) {
                // Skip to next element
                continue;
            }

            // add the element in data if not child element
            $data['id'] = $category[$tkey]->id;
            $data['name'] = $category[$tkey]->name;

            //build child if element is parent
            $children = $this->buildChild($category, $category[$tkey]->id);

            if (!empty($children)) {

                $data['children'] = $children;

            }
            $tree[] = $data;
        }

        return $tree;
    }

    private function buildChild($category, $parent)
    {

        $branch = array();

        foreach ($category as $tkey => $tval) {

            //check whether category is active
            if ($category[$tkey]->parent_category_id == $parent && $category[$tkey]->active == true) {

                $data = array();

                $data['id'] = $category[$tkey]->id;
                $data['name'] = $category[$tkey]->name;

                $children = $this->buildChild($category, $category[$tkey]->id);

                if (!empty($children)) {
                    $data['children'] = $children;
                }
                $branch[] = $data;
            }

        }
        return $branch;
    }

    /** returns the formatted html of the category tree
     * @return string
     */
    public function getCategoryTreeHtml()
    {
        $tree = "";
        $icon = '<i class="fa-li fa fa-arrow-circle-o-right"> </i>';
        $array = $this->getCategoryTree();
        foreach ($array as $row) {

            $tree = $tree . "<li> $icon" . $row['name'];
            if (isset($row['children'])) {
                $tree = $this->buildChildHtml($row['children'], $tree);
            }
            $tree = $tree . '</li>';

        }

        return $tree;
    }

    private function buildChildHtml($category, $tree)
    {
        $tree = $tree . '<ul class=fa-ul>';
        $icon = '<i class=""> </i>';
        foreach ($category as $row) {
            $tree = $tree . "<li class=hide> $icon" . $row['name'];
            if (isset($row['children'])) {
                $tree = $this->buildChildHtml($row['children'], $tree);
            }
            $tree = $tree . '</li>';
        }
        $tree = $tree . '</ul>';
        return $tree;
    }

}