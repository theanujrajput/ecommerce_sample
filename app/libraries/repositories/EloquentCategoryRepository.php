<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/30/13
 * Time: 1:23 PM
 */
class EloquentCategoryRepository implements iCategoryRepository
{


    /***
     * @param $name string
     * @param $shortcode string
     * @param $description string
     * @param $description_secondary string
     * @param $sequence int
     * @param $parent_category_id int
     * @param $active bool
     * @param $is_delivered bool
     * @param $is_ltw bool
     * @param $is_cod bool
     * @param $warranty bool
     * @param $meta_title
     * @param $meta_description
     * @param $meta_keywords
     * @throws Exception
     * @return Category
     */
    public function createCategory($name, $shortcode, $description, $description_secondary, $sequence, $parent_category_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $meta_title, $meta_description, $meta_keywords)
    {

        try {

            if (Category::all()->count() == 0) {
                $sequence = 10;
            }

            Category::where('sequence', '>=', $sequence)->increment('sequence', 10); //updates the sequence

            $category = new Category();
            $category->name = $name;
            $category->shortcode = $shortcode;
            $category->description = $description;
            $category->description_secondary = $description_secondary;
            $category->sequence = $sequence;
            $category->parent_category_id = $parent_category_id;
            $category->active = $active;
            $category->is_delivered = $is_delivered;
            $category->is_ltw = $is_ltw;
            $category->is_cod = $is_cod;
            $category->warranty = $warranty;
            $category->meta_title = $meta_title;
            $category->meta_description = $meta_description;
            $category->meta_keywords = $meta_keywords;
            $category->save();

            return $category;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    /** returns the categories
     * @param int $active 0 or 1
     * @param int $is_delivered 0 or 1
     * @param int $is_ltw 0 or 1
     * @param int $is_cod 0 or 1
     * @param int $paginate
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator|static[]
     */
    public function getCategories($active, $is_delivered, $is_ltw, $is_cod, $paginate)
    {
        $query = Category::query();

        if (DbUtil::checkDbNotNullValue($active)) {
            $query->where('active', '=', $active);
        } elseif (DbUtil::checkDbNullValue($active)) {
            $query->whereNull('active');
        }

        if (DbUtil::checkDbNotNullValue($is_delivered)) {
            $query->where('is_delivered', '=', $is_delivered);
        } elseif (DbUtil::checkDbNullValue($is_delivered)) {
            $query->whereNull('is_delivered');
        }

        if (DbUtil::checkDbNotNullValue($is_ltw)) {
            $query->where('is_ltw', '=', $is_ltw);
        } elseif (DbUtil::checkDbNullValue($is_ltw)) {
            $query->whereNull('is_ltw');
        }

        if (DbUtil::checkDbNotNullValue($is_cod)) {
            $query->where('is_cod', '=', $is_cod);
        } elseif (DbUtil::checkDbNullValue($is_cod)) {
            $query->whereNull('is_cod');
        }

        if ($paginate == true) {
            return $query->orderBy('sequence')->paginate($paginate);

        }
        return $query->orderBy('sequence')->get();


    }

    /***
     * @param $id int
     * @param $name string
     * @param $shortcode string
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @throws Exception
     *
     */
    public function getCategory($id, $name, $shortcode)
    {
        try {

            $query = Category::query();
            if (DbUtil::checkDbNotNullValue($id)) {
                $query->where('id', '=', $id);
            } elseif (DbUtil::checkDbNullValue($id)) {
                $query->whereNull('id');
            }
            if (DbUtil::checkDbNotNullValue($name)) {
                $query->where('name', '=', $name);
            } elseif (DbUtil::checkDbNullValue($name)) {
                $query->whereNull('name');
            }
            if (DbUtil::checkDbNotNullValue($shortcode)) {
                $query->where('shortcode', '=', $shortcode);
            } elseif (DbUtil::checkDbNullValue($shortcode)) {
                $query->whereNull('shortcode');
            }

            return $query->first();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /**
     * @param $id
     * @param $name
     * @param $shortcode
     * @param $description
     * @param $description_secondary
     * @param $sequence
     * @param null $parent_category_id
     * @param $active
     * @param $is_delivered
     * @param $is_ltw
     * @param $is_cod
     * @param $warranty
     * @param $meta_title
     * @param $meta_description
     * @param $meta_keywords
     * @throws Exception
     * @return bool
     */
    public function updateCategory($id, $name, $shortcode, $description, $description_secondary, $sequence, $parent_category_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $meta_title, $meta_description, $meta_keywords)
    {

        try {

            Category::where('sequence', '>=', $sequence)->increment('sequence', 10); //updated the sequence
            $category = Category::find($id);
            $category->name = $name;
            $category->shortcode = $shortcode;
            $category->description = $description;
            $category->description_secondary = $description_secondary;
            $category->sequence = $sequence;
            $category->parent_category_id = $parent_category_id;
            $category->active = $active;
            $category->is_delivered = $is_delivered;
            $category->is_ltw = $is_ltw;
            $category->is_cod = $is_cod;
            $category->warranty = $warranty;
            $category->meta_title = $meta_title;
            $category->meta_description = $meta_description;
            $category->meta_keywords = $meta_keywords;
            $category->save();
            return true;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    /** activates or deactivate the category by id
     * @param int $id category_id
     * @param boolean $status
     */
    public function activateOrDeactivateCategory($id, $status)
    {
        Category::find($id)->update(array('active' => $status));
    }


    /** creates a new document and attach it with the category
     * @param string $type type of document
     * @param string $path path of document
     * @param bool $active
     * @param string $hash
     * @param string $label
     * @param string $name
     * @param string $title
     * @param string $notes
     * @param int $category_id
     * @throws Exception
     */
    public function createCategoryDocument($type, $path, $active, $hash, $label, $name, $title, $notes, $category_id)
    {
        try {

            DB::beginTransaction();
            $document = new Document();
            $document->type = $type;
            $document->path = $path;
            $document->active = $active;
            $document->hash = $hash;
            $document->save();
            $document->categories()->attach($category_id, array('name' => $name, 'title' => $title, 'label' => $label, 'notes' => $notes));
            DB::commit();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** attaches the document with the existing category
     * @param int $category_id
     * @param int $document_id
     * @param string $name
     * @param string $title
     * @param string $label
     * @param string $notes
     * @return bool
     * @throws Exception
     */
    public function attachCategoryDocument($category_id, $document_id, $name, $title, $label, $notes)
    {
        try {
            //check whether document is already assigned to category
            $result = CategoryDocument::where('category_id', '=', $category_id)->where('document_id', '=', $document_id)->get();
            if ($result->count() == 0) {
                $category_document = new CategoryDocument();
                $category_document->category_id = $category_id;
                $category_document->document_id = $document_id;
                $category_document->name = $name;
                $category_document->title = $title;
                $category_document->label = $label;
                $category_document->notes = $notes;
                $category_document->save();
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** return the documents by category_id
     * @param int $id category_id
     * @param int $active 0|1
     * @throws Exception
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     */
    public function getCategoryDocuments($id, $active)
    {
        try {

            $result = Category::with(array('documents' => function ($query) use ($active) {

                    if (DbUtil::checkDbNotNullValue($active)) {
                        $query->where('active', '=', $active);
                    } elseif (DbUtil::checkDbNotNullValue($active)) {
                        $query->whereNull('active');
                    }

                }))->where('id', '=', $id)->first();
            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getCategoryDocument($category_id, $document_id)
    {
        try {

            $result = CategoryDocument::join('documents', function ($join) use ($document_id) {

                $join->on('categorydocuments.document_id', '=', 'documents.id')->where('documents.id', '=', $document_id);

            })->where('category_id', '=', $category_id)->where('categorydocuments.document_id', '=', $document_id)->first();

            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** updates the document of the category
     * @param $category_id
     * @param $document_id
     * @param $name
     * @param $title
     * @param $label
     * @param $notes
     * @param $active
     * @param $path
     * @param $type
     * @throws Exception
     * @return bool
     */
    public function updateCategoryDocument($category_id, $document_id, $name, $title, $label, $notes, $active, $path, $type)
    {
        try {

            $data = array(
                'name' => $name,
                'title' => $title,
                'label' => $label,
                'notes' => $notes
            );

            CategoryDocument::where('category_id', '=', $category_id)->where('document_id', '=', $document_id)
                ->update($data);

            $document = Document::find($document_id);
            $document->active = $active;
            if (!is_null($path) && !is_null($type)) {
                $document->path = $path;
                $document->type = $type;
            }
            $document->save();

            return true;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** deletes the existing category document relation
     * @param int $category_id
     * @param int $document_id
     */
    public function deleteCategoryDocument($category_id, $document_id)
    {
        CategoryDocument::where('category_id', '=', $category_id)
            ->where('document_id', '=', $document_id)->delete();
    }

    /** activate or deactivate the document by id
     * @param int $document_id
     * @param boolean $status
     */
    public function activateOrDeactivateDocument($document_id, $status)
    {
        Document::find($document_id)->update(array('active' => $status));
    }

    /** creates a video and attaches it with the category
     * @param string $type format of video
     * @param $path
     * @param bool $active
     * @param $label
     * @param $name
     * @param $title
     * @param $notes
     * @param $category_id
     * @throws Exception
     */
    public function createCategoryVideo($type, $path, $active, $label, $name, $title, $notes, $category_id)
    {
        try {

            DB::beginTransaction();
            $video = new Video();
            $video->type = $type;
            $video->path = $path;
            $video->active = $active;
            $video->save();
            $video->categories()->attach($category_id, array('name' => $name, 'title' => $title, 'label' => $label, 'notes' => $notes));
            DB::commit();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** attaches the existing video with the category
     * @param $category_id
     * @param $video_id
     * @param $name
     * @param $title
     * @param $label
     * @param $notes
     * @return bool
     * @throws Exception
     */
    public function attachCategoryVideo($category_id, $video_id, $name, $title, $label, $notes)
    {
        try {
            //check whether video is already assigned to category
            $result = CategoryVideo::where('category_id', '=', $category_id)->where('video_id', '=', $video_id)->get();
            if ($result->count() == 0) {
                $category_video = new CategoryVideo();
                $category_video->category_id = $category_id;
                $category_video->document_id = $video_id;
                $category_video->name = $name;
                $category_video->title = $title;
                $category_video->label = $label;
                $category_video->notes = $notes;
                $category_video->save();
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** accepts the category_id and document state and returns corresponding category videos
     * @param int $id category_id
     * @param int 0|1 $active
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @throws Exception
     */
    public function getCategoryVideos($id, $active)
    {
        try {

            $result = Category::with(array('videos' => function ($query) use ($active) {

                    if (DbUtil::checkDbNotNullValue($active)) {
                        $query->where('active', '=', $active);
                    } elseif (DbUtil::checkDbNullValue($active)) {
                        $query->whereNull('active');
                    }

                }))->where('id', '=', $id)->first();
            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /** accepts category_id and video_id and returns the corresponding video of the category
     * @param  int $category_id
     * @param int $video_id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     * @throws Exception
     */
    public function getCategoryVideo($category_id, $video_id)
    {
        try {

            $result = CategoryVideo::join('videos', function ($join) use ($video_id) {

                $join->on('categoryvideos.video_id', '=', 'videos.id')->where('videos.id', '=', $video_id);

            })->where('category_id', '=', $category_id)->where('categoryvideos.video_id', '=', $video_id)->first();

            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /** updates the video of the product
     * @param $category_id
     * @param $video_id
     * @param $name
     * @param $title
     * @param $label
     * @param $notes
     * @param bool $active
     * @param $path
     * @param $type
     * @throws Exception
     * @return bool
     */
    public function updateCategoryVideo($category_id, $video_id, $name, $title, $label, $notes, $active, $path, $type)
    {
        try {

            $data = array(
                'name' => $name,
                'title' => $title,
                'label' => $label,
                'notes' => $notes
            );

            CategoryVideo::where('category_id', '=', $category_id)->where('video_id', '=', $video_id)
                ->update($data);

            $video = Video::find($video_id);
            $video->active = $active;
            if (!is_null($path) && !is_null($type)) {
                $video->path = $path;
                $video->type = $type;
            }
            $video->save();

            return true;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** deletes the existing category video relation
     * @param int $category_id
     * @param array $video_id
     */
    public function deleteCategoryVideo($category_id, $video_id = array())
    {
        $category = Category::find($category_id);
        $category->videos()->detach($video_id);
    }

    /** activates or deactivates video by video_id
     * @param int $video_id
     * @param int 0|1 $status
     */
    public function activateOrDeactivateVideo($video_id, $status)
    {
        Video::where('id', '=', $video_id)->update(array('active' => $status));
    }

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

        try {

            if (Attribute::all()->count() == 0) {
                $sequence = 10;
            }

            Attribute::where('sequence', '>=', $sequence)->increment('sequence', 10); //updates the sequence

            $attributes = new Attribute();
            $attributes->name = $name;
            $attributes->code = $code;
            $attributes->attribute_category = $attribute_category;
            $attributes->description = $description;
            $attributes->category_id = $category_id;
            $attributes->is_comparable = $is_comparable;
            $attributes->is_filterable = $is_filterable;
            $attributes->attribute_value_type = $attribute_value_type;
            $attributes->options = $options;
            $attributes->active = $active;
            $attributes->sequence = $sequence;
            $attributes->save();
            return $attributes;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /** return the attributes of category by category_id,is_comparable,is_filterable,active
     * @param int $category_id
     * @param bool $is_comparable
     * @param bool $is_filterable
     * @param bool $active
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getCategoryAttributes($category_id, $is_comparable, $is_filterable, $active)
    {
        try {

            $query = Attribute::with("category");
            if (DbUtil::checkDbNotNullValue($category_id)) {
                $query->where("category_id", '=', $category_id);
            } elseif (DbUtil::checkDbNullValue($category_id)) {
                $query->whereNull("category_id");
            }

            if (DbUtil::checkDbNotNullValue($is_comparable)) {
                $query->where("is_comparable", '=', $is_comparable);
            } elseif (DbUtil::checkDbNullValue($is_comparable)) {
                $query->whereNull("is_comparable");
            }

            if (DbUtil::checkDbNotNullValue($is_filterable)) {
                $query->where("is_filterable", '=', $is_filterable);
            } elseif (DbUtil::checkDbNullValue($is_filterable)) {
                $query->whereNull("is_filterable");
            }

            if (DbUtil::checkDbNotNullValue($active)) {
                $query->where("active", '=', $active);
            } elseif (DbUtil::checkDbNullValue($active)) {
                $query->whereNull("active");
            }

            return $query->orderBy('sequence', 'asc')->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /** accepts the category_id and attribute_id and returns the corresponding product_attribute
     * @param int $category_id
     * @param int $attribute_id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @throws Exception
     */
    public function getCategoryAttribute($category_id, $attribute_id)
    {
        try {

            $attribute = Attribute::where('id', '=', $attribute_id)->where("category_id", '=', $category_id)->first();
            return $attribute;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accepts category id and returns the attributes of that category_id
     * @param int $category_id
     * @param bool $is_comparable
     * @param bool $is_filterable
     * @param bool $active
     * @throws Exception
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCategoryAttributesWithValues($category_id, $is_comparable, $is_filterable, $active)
    {
        try {
            $query = Attribute::join('productattributes', 'attributes.id', '=', 'productattributes.attribute_id')
                ->where('category_id', '=', $category_id);

            if (DbUtil::checkDbNotNullValue($is_comparable)) {
                $query->where('is_comparable', '=', $is_comparable);
            } elseif (DbUtil::checkDbNullValue($is_comparable)) {
                $query->whereNull('is_comparable');
            }
            if (DbUtil::checkDbNotNullValue($is_filterable)) {
                $query->where('is_filterable', '=', $is_filterable);
            } elseif (DbUtil::checkDbNullValue($is_filterable)) {
                $query->whereNull('is_filterable');
            }

            if (DbUtil::checkDbNotNullValue($active)) {
                $query->where('active', '=', $active);
            } elseif (DbUtil::checkDbNullValue($active)) {
                $query->whereNull('active');
            }


            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** updates the attribute by category_id and attribute_id
     * @param int $attribute_id
     * @param string $name
     * @param string $code
     * @param int $attribute_category
     * @param string $description
     * @param int $category_id
     * @param bool $is_comparable
     * @param bool $is_filterable
     * @param string $attribute_value_type
     * @param string $options
     * @param bool $active
     * @param int $sequence
     * @throws Exception
     */
    public function updateCategoryAttribute($attribute_id, $name, $code, $attribute_category, $description, $category_id,
                                            $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence)
    {

        try {

            Attribute::where('sequence', '>=', $sequence)->increment('sequence', 10); //updated the sequence
            $data = array(
                'name' => $name,
                'code' => $code,
                'attribute_category' => $attribute_category,
                'description' => $description,
                'is_comparable' => $is_comparable,
                'is_filterable' => $is_filterable,
                'attribute_value_type' => $attribute_value_type,
                'options' => $options,
                'active' => $active,
                'sequence' => $sequence,
            );
            Attribute::where("id", '=', $attribute_id)->where('category_id', '=', $category_id)->update($data);


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** accepts attribute_id array and category_id and deletes the category attributes
     * @param array $attribute_id
     * @param int $category_id
     */
    public function deleteCategoryAttributes($attribute_id = array(), $category_id)
    {
        Attribute::whereIn("id", '=', $attribute_id)->where('category_id', '=', $category_id)->delete();
    }

    /** accepts attribute_id and status, perform activation or deactivation of attribute accordingly
     * @param $attribute_id
     * @param $status
     */
    public function activateOrDeactivateCategoryAttribute($attribute_id, $status)
    {
        $attribute = Attribute::find($attribute_id);
        $attribute->active = $status;
        $attribute->save();

    }
}