<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/8/14
 * Time: 5:04 PM
 */

class PageDataService
{

    function __construct(iPageDataRepository $pageDataRepo)
    {
        $this->pageDataRepo = $pageDataRepo;
    }

    public function createPageData($name, $value, $meta_title, $meta_description, $meta_keywords)
    {

        return $this->pageDataRepo->createPageData($name, $value, $meta_title, $meta_description, $meta_keywords);

    }

    /** retrieves page data by id or name
     * @param $id int
     * @param $name string
     * @return mixed
     */
    public function getPageData($id, $name)
    {
        return $this->pageDataRepo->getPageData($id, $name);
    }


    public function getPagesData($paginate = null)
    {
        return $this->pageDataRepo->getPagesData($paginate);
    }

    public function updatePageData($id, $name, $value, $meta_title, $meta_description, $meta_keywords)
    {
        return $this->pageDataRepo->updatePageData($id, $name, $value, $meta_title, $meta_description, $meta_keywords);
    }

    public function deletePageData($id = array())
    {
        return $this->pageDataRepo->deletePageData($id);
    }

} 