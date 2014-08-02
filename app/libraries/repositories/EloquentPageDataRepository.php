<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/8/14
 * Time: 4:44 PM
 */

class EloquentPageDataRepository implements iPageDataRepository
{

    /*** creates page data
     * @param $name string
     * @param $value string
     * @param $meta_title string
     * @param $meta_description string
     * @param $meta_keywords string
     * @return PageData string
     * @throws Exception
     */
    public function createPageData($name, $value, $meta_title, $meta_description, $meta_keywords)
    {

        try {
            $page_data = new PageData();
            $page_data->name = $name;
            $page_data->value = $value;
            $page_data->meta_title = $meta_title;
            $page_data->meta_description = $meta_description;
            $page_data->meta_keywords = $meta_keywords;

            $page_data->save();

            return $page_data;
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** returns the page data by id or name
     * @param $id int
     * @param $name string
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getPageData($id, $name)
    {

        try {

            $query = PageData::query();
            if (DbUtil::checkDbNullValue($id)) {
                $query->where("id", '=', Constants::NULL_VALUE);
            } elseif (DbUtil::checkDbNotNullValue($id)) {
                $query->whereNull('id');
            }

            if (DbUtil::checkDbNullValue($name)) {
                $query->where('name', '=', Constants::NULL_VALUE);
            } elseif (DbUtil::checkDbNotNullValue($name)) {
                $query->whereNull('name');
            }

            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** retrieves all the pages
     * @param null $paginate
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator|static[]
     * @throws Exception
     */
    public function getPagesData($paginate = null)
    {
        try {

            $query = PageData::query();
            if (!is_null($paginate)) {
                return $query->paginate(Constants::PAGE_DATA_PAGE_COUNT);
            }

            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /***
     * @param $id int
     * @param $name string
     * @param $value string
     * @param $meta_title string
     * @param $meta_description string
     * @param $meta_keywords string
     * @throws Exception
     */
    public function updatePageData($id, $name, $value, $meta_title, $meta_description, $meta_keywords)
    {

        try {

            $page_data = PageData::find($id);
            $page_data->name = $name;
            $page_data->value = $value;
            $page_data->meta_title = $meta_title;
            $page_data->meta_description = $meta_description;
            $page_data->meta_keywords = $meta_keywords;

            $page_data->save();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function deletePageData($id = array())
    {
        try {

            PageData::whereIn('id', $id)->delete();


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

} 