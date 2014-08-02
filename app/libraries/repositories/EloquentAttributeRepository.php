<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/30/13
 * Time: 12:59 PM
 */

class EloquentAttributeRepository implements iAttributeRepository
{


    /*** create new attribute of product
     * @param $name string
     * @param $code string
     * @param $attribute_category string
     * @param $description string
     * @param $category_id int
     * @param $is_comparable bool
     * @param $is_filterable bool
     * @param $attribute_value_type string
     * @param $options string
     * @param $active bool
     * @param $sequence int
     * @return Attribute
     * @throws Exception
     */
    public function createAttribute($name, $code, $attribute_category, $description, $category_id, $is_comparable, $is_filterable,
                                    $attribute_value_type, $options, $active, $sequence)
    {
        try {

            $attribute = new Attribute();
            $attribute->name = $name;
            $attribute->code = $code;
            $attribute->attribute_category = $attribute_category;
            $attribute->description = $description;
            $attribute->category_id = $category_id;
            $attribute->is_comparable = $is_comparable;
            $attribute->is_filterable = $is_filterable;
            $attribute->attribute_value_type = $attribute_value_type;
            $attribute->options = $options;
            $attribute->active = $active;
            $attribute->sequence = $sequence;
            $attribute->save();

            return $attribute;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    /**
     * @param $category_id
     * @param null $name
     * @param null $is_comparable
     * @param null $is_filterable
     * @param null $attribute_value_type
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getAttributes($category_id, $name = null, $is_comparable = null, $is_filterable = null, $attribute_value_type = null)
    {
        try {

            $query = Attribute::query();
            if (DbUtil::checkDbNotNullValue($category_id)) {
                $query->where('category_id', '=', $category_id);
            } elseif (DbUtil::checkDbNullValue($category_id)) {
                $query->whereNull('category_id');
            }

            if (DbUtil::checkDbNotNullValue($name)) {
                $query->where('name', '=', $name);
            } elseif (DbUtil::checkDbNullValue($name)) {
                $query->whereNull('name');
            }

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

            if (DbUtil::checkDbNotNullValue($attribute_value_type)) {
                $query->where('attribute_value_type', '=', $attribute_value_type);
            } elseif (DbUtil::checkDbNullValue($attribute_value_type)) {
                $query->whereNull('attribute_value_type');
            }

            if (DbUtil::checkDbNotNullValue($attribute_value_type)) {
                $query->where('attribute_value_type', '=', $attribute_value_type);
            } elseif (DbUtil::checkDbNullValue($attribute_value_type)) {
                $query->whereNull('attribute_value_type');
            }

            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /***
     * @param $id int
     * @param $code string
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getAttribute($id, $code)
    {
        try {

            $query = Attribute::query();
            if (DbUtil::checkDbNotNullValue($id)) {
                $query->where('id', '=', $id);
            } elseif (DbUtil::checkDbNullValue($id)) {
                $query->whereNull('id');
            }

            if (DbUtil::checkDbNotNullValue($code)) {
                $query->where('code', '=', $code);
            } elseif (DbUtil::checkDbNullValue($code)) {
                $query->whereNull('code');
            }

            return $query->first();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    /***
     * @param $id int
     * @param $name string
     * @param $code string
     * @param $attribute_category string
     * @param $description string
     * @param $category_id int
     * @param $is_comparable bool
     * @param $is_filterable bool
     * @param $attribute_value_type enum
     * @param $options bool
     * @param $active bool
     * @param $sequence int
     * @throws Exception
     */
    public function updateAttribute($id, $name, $code, $attribute_category, $description, $category_id, $is_comparable
        , $is_filterable, $attribute_value_type, $options, $active, $sequence)
    {
        try {

            $attribute = Attribute::find($id);
            $attribute->name = $name;
            $attribute->code = $code;
            $attribute->attribute_category = $attribute_category;
            $attribute->description = $description;
            $attribute->category_id = $category_id;
            $attribute->is_comparable = $is_comparable;
            $attribute->is_filterable = $is_filterable;
            $attribute->attribute_value_type = $attribute_value_type;
            $attribute->options = $options;
            $attribute->active = $active;
            $attribute->sequence = $sequence;
            $attribute->save();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function deleteAttribute($id)
    {
        try {
            $attribute = Attribute::find($id);
            $attribute->delete();
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

}