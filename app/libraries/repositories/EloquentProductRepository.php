<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/30/13
 * Time: 12:18 PM
 */
class EloquentProductRepository implements iProductRepository
{


    /***
     * @param $name
     * @param $code
     * @param $shortcode
     * @param $description
     * @param $description_secondary
     * @param $category_id
     * @param $base_product_id
     * @param $active
     * @param $is_delivered
     * @param $is_ltw
     * @param $is_cod
     * @param $warranty
     * @param $list_price
     * @param $offer_price
     * @param $weight
     * @param $sequence
     * @param $base_diff_text
     * @param $popularity
     * @param $meta_title
     * @param $meta_description
     * @param $meta_keywords
     * @throws Exception
     * @return Product
     */
    public function createProduct($name, $code, $shortcode, $description, $description_secondary, $category_id,
                                  $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price,
                                  $offer_price, $weight, $sequence, $base_diff_text, $popularity,
                                  $meta_title, $meta_description, $meta_keywords)
    {

        try {

            if (Product::all()->count() == 0) {
                $sequence = 10;
            }

            Product::where('sequence', '>=', $sequence)->increment('sequence', 10); //updates the sequence
            $product = new Product();
            $product->name = $name;
            $product->code = $code;
            $product->shortcode = $shortcode;
            $product->description = $description;
            $product->description_secondary = $description_secondary;
            $product->category_id = $category_id;
            $product->base_product_id = $base_product_id;
            $product->active = $active;
            $product->is_delivered = $is_delivered;
            $product->is_ltw = $is_ltw;
            $product->is_cod = $is_cod;
            $product->warranty = $warranty;
            $product->list_price = $list_price;
            $product->offer_price = $offer_price;
            $product->weight = $weight;
            $product->sequence = $sequence;
            $product->base_diff_text = $base_diff_text;
            $product->popularity = $popularity;
            $product->meta_title = $meta_title;
            $product->meta_description = $meta_description;
            $product->meta_keywords = $meta_keywords;
            $product->save();

            return $product;

        } catch (Exception $ex) {

            Log::error($ex);
            throw $ex;

        }

    }


    /***
     * @param $category_id int
     * @param $base_product_id int
     * @param $is_delivered bool
     * @param $is_ltw bool
     * @param $is_cod bool
     * @param $active bool
     * @param $limit int
     * @param $paginate
     * @throws Exception
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProducts($category_id, $base_product_id, $is_delivered, $is_ltw, $is_cod, $active, $limit, $paginate)
    {
        try {

            $query = Product::with('images', 'tags', 'combos', 'category');

            if (DbUtil::checkDbNotNullValue($category_id)) {
                $query->where('category_id', '=', $category_id);
            } elseif (DbUtil::checkDbNullValue($category_id)) {
                $query->whereNull('category_id');
            }
            if (DbUtil::checkDbNotNullValue($base_product_id)) {
                $query->where('base_product_id', '=', $base_product_id);
            } elseif (DbUtil::checkDbNullValue($base_product_id)) {
                $query->whereNull('base_product_id');
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
            if (DbUtil::checkDbNotNullValue($active)) {
                $query->where('active', '=', $active);
            } elseif (DbUtil::checkDbNullValue($active)) {
                $query->whereNull('active');
            }

            if (!is_null($limit)) {
                return $query->limit($limit)->get();
            }

            if (!is_null($paginate)) {
                return $query->orderBy('sequence')->paginate($paginate);
            }


            return $query->orderBy('sequence')->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /*** return product info along with images and tags
     * @param $id
     * @param $name
     * @param $code
     * @param $shortcode
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getProduct($id, $name, $code, $shortcode)
    {

//        if this functions receive null as argument then that variable will not be included in the query.

        try {

            $query = Product::with(array('images', 'tags'));

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

            if (DbUtil::checkDbNotNullValue($code)) {
                $query->where('code', '=', $code);
            } elseif (DbUtil::checkDbNullValue($code)) {
                $query->whereNull('code');
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
        try {

            $query = Product::query();

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

            if (DbUtil::checkDbNotNullValue($code)) {
                $query->where('code', '=', $code);
            } elseif (DbUtil::checkDbNullValue($code)) {
                $query->whereNull('code');
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


    /***
     * @param $id
     * @param $name
     * @param $code
     * @param $shortcode
     * @param $description
     * @param $description_secondary
     * @param $category_id
     * @param $base_product_id
     * @param $active
     * @param $is_delivered
     * @param $is_ltw
     * @param $is_cod
     * @param $warranty
     * @param $list_price
     * @param $offer_price
     * @param $weight
     * @param $sequence
     * @param $base_diff_text
     * @param $popularity
     * @param $meta_title
     * @param $meta_description
     * @param $meta_keywords
     * @throws Exception
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static
     */
    public function updateProduct($id, $name, $code, $shortcode, $description, $description_secondary, $category_id, $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price, $offer_price, $weight, $sequence, $base_diff_text, $popularity, $meta_title, $meta_description, $meta_keywords)
    {

        try {

            Product::where('sequence', '>=', $sequence)->increment('sequence', 10); //updated the sequence
            $product = Product::find($id);
            $product->name = $name;
            $product->code = $code;
            $product->shortcode = $shortcode;
            $product->description = $description;
            $product->description_secondary = $description_secondary;
            $product->category_id = $category_id;
            $product->base_product_id = $base_product_id;
            $product->active = $active;
            $product->is_delivered = $is_delivered;
            $product->is_ltw = $is_ltw;
            $product->is_cod = $is_cod;
            $product->warranty = $warranty;
            $product->list_price = $list_price;
            $product->offer_price = $offer_price;
            $product->weight = $weight;
            $product->sequence = $sequence;
            $product->base_diff_text = $base_diff_text;
            $product->popularity = $popularity;
            $product->meta_title = $meta_title;
            $product->meta_description = $meta_description;
            $product->meta_keywords = $meta_keywords;
            $product->save();
            return $product;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    /** activate or deactivate the product by id
     * @param int $id
     * @param boolean $status
     */
    public function activateOrDeactivateProduct($id, $status)
    {
        Product::find($id)->update(array('active' => $status));
    }


    /** creates the attributes of product with value
     * @param int $product_id
     * @param int $attribute_id
     * @param int $value
     * @param string $notes
     */
    public function createProductAttributes($product_id, $attribute_id, $value, $notes)
    {
        $product_attribute = new ProductAttribute();
        $product_attribute->product_id = $product_id;
        $product_attribute->attribute_id = $attribute_id;
        $product_attribute->value = $value;
        $product_attribute->notes = $notes;
        $product_attribute->save();

    }

    /**accepts product id and returns the attributes along with the values
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     * @throws Exception
     */
    public function getProductAttributesValue($id)
    {
        try {

            $result = Product::with('attributes', 'productspecificattributes')->where('id', '=', $id)->first();
            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /*** accepts the array of products and returns the attributes of those products
     * @param array $products_ids
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProductsAttributes($products_ids = array())
    {

        $result = Attribute::with(array('products' => function ($query) use ($products_ids) {

                $query->whereIn('productattributes.product_id', $products_ids);

            }))->get();
        return $result;
    }

    /**
     * @param $product_id
     * @param $attribute_id
     * @param $value
     * @param $notes
     * @throws Exception
     * @return bool
     */
    public function updateProductAttribute($product_id, $attribute_id, $value, $notes)
    {
        try {

            ProductAttribute::where("attribute_id", '=', $attribute_id)->where('product_id', '=', $product_id)
                ->update(array('value' => $value, 'notes' => $notes));
            return true;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accepts product id and attribute_ids as array and deletes the product attribute relation
     * @param array $product_id
     * @param array $attribute_id
     * @throws Exception
     * @return bool
     */
    public function deleteProductAttribute($product_id, $attribute_id = array())
    {
        try {

            ProductAttribute::whereIn('attribute_id', $attribute_id)->where('product_id', '=', $product_id)
                ->delete();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** creates a new product specific attribute
     * @param int $product_id
     * @param string $name
     * @param string $value
     * @param string $notes
     * @return ProductSpecificAttribute
     * @throws Exception
     */
    public function createProductSpecificAttribute($product_id, $name, $value, $notes)
    {
        try {

            $specific_attribute = new ProductSpecificAttribute();
            $specific_attribute->product_id = $product_id;
            $specific_attribute->name = $name;
            $specific_attribute->value = $value;
            $specific_attribute->notes = $notes;
            $specific_attribute->save();
            return $specific_attribute;


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** returns product specific attributes info
     * @param $product_id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getProductSpecificAttributes($product_id)
    {
        try {

            $query = ProductSpecificAttribute::query();
            if (DbUtil::checkDbNotNullValue($product_id)) {
                $query->where('product_id', '=', $product_id);
            } elseif (DbUtil::checkDbNullValue($product_id)) {
                $query->whereNull('product_id');
            }

            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** return the product specific attribute info
     * @param $specific_attribute_id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     * @throws Exception
     */
    public function getProductSpecificAttribute($specific_attribute_id)
    {
        try {

            $specific_attribute = ProductSpecificAttribute::find($specific_attribute_id)->first();
            return $specific_attribute;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** updates the product specific attribute by specific_attribute_id
     * @param int $specific_attribute_id
     * @param string $name
     * @param string $value
     * @param string $notes
     * @throws Exception
     */
    public function updateProductSpecificAttribute($specific_attribute_id, $name, $value, $notes)
    {
        try {

            $specific_attribute = ProductSpecificAttribute::first($specific_attribute_id);
            $specific_attribute->name = $name;
            $specific_attribute->value = $value;
            $specific_attribute->notes = $notes;
            $specific_attribute->save();


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accepts $specific_attribute_id and delete product specific attribute
     * @param int $specific_attribute_id
     * @throws Exception
     */
    public function deleteProductSpecificAttribute($specific_attribute_id)
    {
        try {

            ProductSpecificAttribute::find($specific_attribute_id)->delete();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    public function getProductCategory($id)
    {
        $result = Product::with('category')->where('id', '=', $id)->first();
        return $result;
    }

    /**
     * @param int $id product_id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getRelatedProducts($id)
    {
        $product = $this->getProduct($id, null, null, null);
        $category_id = $product->category_id;
        $products = Product::with('images', 'tags')->where('category_id', '=', $category_id)
            ->where('id', '!=', $id)->take(Constants::RELATED_PRODUCTS_LIMIT)->get();
        return $products;

    }

    /***
     * @param array $id
     * @return array
     * @throws Exception
     */
    public function getComparableProductAttributes($id = array())
    {
        try {
            $products = Product::with(array('attributes' => function ($query) {

                    $query->where("is_comparable", '=', true);

                }))->whereIn("id", $id)->get();

            return $products;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

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
        try {

            DB::beginTransaction();

            $image = new Image();
            $image->path = $path;
            $image->save();

            $image->products()->attach($product_id, array('name' => $name, 'title' => $title,
                'caption' => $caption, 'notes' => $notes, 'is_primary' => $is_primary));

            DB::commit();

            return $image;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accepts product_id and returns all the images of the corresponding product
     * @param int $id
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getProductImages($id)
    {
        try {

            return Product::with('images')->where('id', '=', $id)->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** accepts product_id and image_id and returns the corresponding product image
     * @param int $product_id
     * @param int $image_id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     */
    public function getProductImage($product_id, $image_id)
    {
        $result = ProductImage::join('images', function ($join) use ($image_id) {

            $join->on('productimages.image_id', '=', 'images.id')->where('images.id', '=', $image_id);

        })->where('product_id', '=', $product_id)->where('productimages.image_id', '=', $image_id)->first();

        return $result;
    }

    /** set the primary image of the product
     * @param $product_id int
     * @param $image_id int
     */
    public function setProductPrimaryImage($product_id, $image_id)
    {
        DB::transaction(function () use ($product_id, $image_id) {
            ProductImage::where('product_id', '=', $product_id)->update(array('is_primary' => false));
            ProductImage::where('product_id', '=', $product_id)
                ->where('image_id', '=', $image_id)
                ->update(array('is_primary' => true));
        });
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

        $data = array(
            'name' => $notes,
            'title' => $title,
            'caption' => $caption,
            'notes' => $notes
        );

        if (!is_null($is_primary)) {
            $data['is_primary'] = $is_primary;
        }
        ProductImage::where('product_id', '=', $product_id)->where('image_id', '=', $image_id)->update($data);

        if (!is_null($path)) {
            $image = Image::find($image_id);
            $image->path = $path;
            $image->save();
        }

    }

    /** deletes the product image relation
     * @param int $product_id
     * @param array $image_id
     * @return bool
     */
    public function deleteProductImage($product_id, $image_id = array())
    {
        $product = Product::find($product_id);
        $product->images()->detach($image_id);
        return true;
    }


    /** creates a new document and then attach it with the product
     * @param string $type video format
     * @param string $path
     * @param bool $active
     * @param string $hash
     * @param string $label
     * @param string $name name of document
     * @param string $title title of document
     * @param string $notes
     * @param int $product_id
     * @throws Exception
     * @internal param int $document_id
     */
    public function createProductDocument($type, $path, $active, $hash, $label, $name, $title, $notes, $product_id)
    {
        try {

            DB::beginTransaction();
            $document = new Document();
            $document->type = $type;
            $document->path = $path;
            $document->active = $active;
            $document->hash = $hash;
            $document->save();
            $document->products()->attach($product_id, array('name' => $name, 'title' => $title, 'label' => $label, 'notes' => $notes));
            DB::commit();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** attaches the product with the existing document
     * @param int $product_id
     * @param int $document_id
     * @param string $name
     * @param string $title
     * @param string $label
     * @param string $notes
     * @return bool
     */
    public function attachProductDocument($product_id, $document_id, $name, $title, $label, $notes)
    {
        //check whether document is already assigned to product
        $result = ProductDocument::where('product_id', '=', $product_id)->where('document_id', '=', $document_id)->get();
        if ($result->count() == 0) {
            $product_document = new ProductDocument();
            $product_document->product_id = $product_id;
            $product_document->document_id = $document_id;
            $product_document->name = $name;
            $product_document->title = $title;
            $product_document->label = $label;
            $product_document->notes = $notes;
            $product_document->save();
            return true;
        } else {
            return false;
        }
    }


    /** accepts the product_id and document_id and returns the info about the corresponding document
     * @param int $product_id
     * @param int $document_id
     * @return mixed|null|static
     * @throws Exception
     */
    public function getProductDocument($product_id, $document_id)
    {
        try {

            $result = ProductDocument::join('documents', function ($join) use ($document_id) {

                $join->on('productdocuments.document_id', '=', 'documents.id')->where('documents.id', '=', $document_id);

            })->where('product_id', '=', $product_id)->where('productdocuments.document_id', '=', $document_id)->first();

//            $result = ProductDocument::with(array('document' => function ($query) use ($document_id) {
//                    $query->where('id', '=', $document_id);
//                }))->where('product_id', '=', $product_id)->where('document_id', '=', $document_id)->first();

            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getProductDocuments($id)
    {
        try {
            $result = Product::with('documents')->where('id', '=', $id)->first();
            return $result;
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /**
     * @param $product_id
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
    public function updateProductDocument($product_id, $document_id, $name, $title, $label, $notes, $active, $path, $type)
    {
        try {


            $data = array(
                'name' => $name,
                'title' => $title,
                'label' => $label,
                'notes' => $notes
            );

            ProductDocument::where('product_id', '=', $product_id)->where('document_id', '=', $document_id)
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

    /** Deletes the product document relation
     * @param int $product_id
     * @param array $document_id
     */
    public function deleteProductDocument($product_id, $document_id = array())
    {
        $product = Product::find($product_id);
        $product->documents()->detach($document_id);
    }

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
        try {

            DB::beginTransaction();
            $video = new Video();
            $video->type = $type;
            $video->path = $path;
            $video->active = $active;
            $video->save();
            $video->products()->attach($product_id, array('name' => $name, 'title' => $title, 'label' => $label, 'notes' => $notes));
            DB::commit();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accepts product_id and returns all the videos of the corresponding product
     * @param int $id product_id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     * @throws Exception
     */
    public function getProductVideos($id)
    {
        try {
            $result = Product::with('videos')->where('id', '=', $id)->first();
            return $result;
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accepts the product_id and video_id and returns the info of the corresponding video
     * @param int $product_id
     * @param int $video_id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     * @throws Exception
     */
    public function getProductVideo($product_id, $video_id)
    {
        try {

            $result = ProductVideo::join('videos', function ($join) use ($video_id) {

                $join->on('productvideos.video_id', '=', 'videos.id')->where('videos.id', '=', $video_id);

            })->where('product_id', '=', $product_id)->where('productvideos.video_id', '=', $video_id)->first();

            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
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
     * @throws Exception
     * @return bool
     */
    public function updateProductVideo($product_id, $video_id, $name, $title, $label, $notes, $active, $path, $type)
    {
        try {

            DB::beginTransaction();
            $data = array(
                'name' => $name,
                'title' => $title,
                'label' => $label,
                'notes' => $notes
            );

            ProductVideo::where('product_id', '=', $product_id)->where('video_id', '=', $video_id)
                ->update($data);

            $video = Video::find($video_id);
            $video->active = $active;
            if (!is_null($path) && !is_null($type)) {
                $video->path = $path;
                $video->type = $type;
            }
            $video->save();

            DB::commit();

            return true;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** Deletes the product video relation
     * @param int $product_id
     * @param array $video_id
     */
    public function deleteProductVideo($product_id, $video_id = array())
    {
        $product = Product::find($product_id);
        $product->videos()->detach($video_id);
    }


    /**
     * @param int $product_id
     * @param int $tag_id
     * @param int|float $offer_price
     * @return ProductTag
     * @throws Exception
     */
    public function createProductTag($product_id, $tag_id, $offer_price)
    {
        try {

            $product_tag = new ProductTag();
            $product_tag->tag_id = $tag_id;
            $product_tag->product_id = $product_id;
            $product_tag->offer_price = $offer_price;
            $product_tag->save();

            return $product_tag;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accepts product_id and returns the tags associated with the product
     * @param int $id
     * @throws Exception
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     */
    public function getProductTags($id)
    {
        try {
            $result = Product::with(array('tags' => function ($query) {

                    $query->orderBy('created_at', 'desc');

                }))->where('id', '=', $id)->get();

            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getProductsByTag($tag_id, $limit)
    {
        try {

            if (!is_null($limit)) {
                $result = Tag::with(array('products' => function ($query) use ($limit) {
                        $query->limit($limit);
                    }))->where('id', '=', $tag_id)->first();
            } else {
                $result = Tag::with('products')->where('id', '=', $tag_id)->first();
            }

            return $result;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** accepts product_id and tag_id and returns the corresponding product tag
     * @param int $product_id
     * @param  int $tag_id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     * @throws Exception
     */
    public function getProductTag($product_id, $tag_id)
    {
        try {

            $tag = ProductTag::join('tags', 'tags.id', '=', 'producttags.tag_id')
                ->where("product_id", '=', $product_id)->where('tag_id', '=', $tag_id)->first();

            return $tag;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getUnassignedProductTags($product_id)
    {
        $tag_array = array();
        $tag_ids = ProductTag::where('product_id', '=', $product_id)->get(array('tag_id'));
        if (!is_null(AppUtil::returnResults($tag_ids))) {
            foreach ($tag_ids as $row) {
                $tag_array[] = $row->tag_id;
            }
            $tags = Tag::whereNotIn('id', $tag_array)->get();
            return $tags;
        } else {
            return Tag::all();
        }


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

        try {

            DB::beginTransaction();

            $tag = Tag::find($tag_id);
            $tag->name = $name;
            $tag->code = $code;
            $tag->description = $description;
            $tag->save();

            ProductTag::where('product_id', '=', $product_id)
                ->where('tag_id', '=', $tag_id)->update(array('offer_price' => $offer_price));

            DB::commit();

            return true;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** accepts product_id and tag_id array deletes the product tag relation
     * @param array $product_id
     * @param array $tag_id
     * @throws Exception
     */
    public function deleteProductTag($product_id, $tag_id = array())
    {
        try {

            ProductTag::whereIn('tag_id', $tag_id)->where('product_id', '=', $product_id)->delete();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function createProductCombo($name, $description, $type, $start_date, $end_date, $combo_price, $combo_products = array())
    {
        try {

            DB::beginTransaction();

            $combo = new Combo();
            $combo->name = $name;
            $combo->description = $description;
            $combo->type = $type;
            $combo->start_date = $start_date;
            $combo->end_date = $end_date;
            $combo->combo_price = $combo_price;
            $combo->save();

            foreach ($combo_products as $row) {


            }

            DB::commit();


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getProductVariants($product_id)
    {
        try {

            $products = Product::where('base_product_id', '=', $product_id)->get();
            if ($products->count() == 0) {
                return null;
            } else {

                $product = Product::where('id', '=', $product_id)->first();
                $base_product_id = $product->base_product_id;
                if (is_null($base_product_id)) {
                    return Product::where('id', '!=', $product_id)->where('base_product_id', '=', $product_id)->get();
                } else {
                    return Product::where('id', '=', $product)->where('base_product_id', '=', $product_id)->get();
                }
            }
//            $products = Product::where('base_product_id', '=', $product_id)->orderBy('offer_price')->get();
//            if ($products->count() != 0) {
//                return $products;
//            } else {
//                $product = Product::where('id', '=', $product_id)->first();
//                $products = Product::where('base_product_id', '=', $product->base_product_id)
//                    ->orwhere('id', '=', $product->base_product_id)->orderBy('offer_price')->get();
//                return $products;
//
//            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }
}
