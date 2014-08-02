<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 10:40 AM
 */
class EloquentTagRepository implements iTagRepository
{

    public function createTag($name, $code, $description)
    {
        try {

            $tag = new Tag();
            $tag->name = $name;
            $tag->code = $code;
            $tag->description = $description;
            $tag->save();
            return $tag;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getTags($limit, $paginate)
    {
        try {

            $query = Tag::query();

            if (!is_null($limit)) {
                return $query->limit($limit)->get();
            }
            if (!is_null($paginate)) {
                return $query->paginate($paginate);
            }
            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** returns the tag by id,or name or code
     * @param int $id
     * @param string $name
     * @param string $code
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @throws Exception
     */
    public function getTag($id, $name, $code)
    {

        try {

            $query = Tag::query();
            if (DbUtil::checkDbNotNullValue($id)) {
                $query->where("id", '=', $id);
            } elseif (DbUtil::checkDbNullValue($id)) {
                $query->whereNull("id");
            }

            if (DbUtil::checkDbNotNullValue($name)) {
                $query->where("name", '=', $name);
            } elseif (DbUtil::checkDbNullValue($name)) {
                $query->whereNull("name");
            }


            if (DbUtil::checkDbNotNullValue($code)) {
                $query->where("code", '=', $code);
            } elseif (DbUtil::checkDbNullValue($code)) {
                $query->whereNull("code");
            }

            return $query->first();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function updateTag($id, $name, $code, $description)
    {

        try {

            $tag = Tag::find($id);
            $tag->name = $name;
            $tag->code = $code;
            $tag->description = $description;
            $tag->save();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
    }



} 