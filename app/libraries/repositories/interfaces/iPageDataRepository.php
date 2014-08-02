<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/8/14
 * Time: 4:41 PM
 */

interface iPageDataRepository
{

    public function createPageData($name, $value, $meta_title, $meta_description, $meta_keywords);

    public function getPageData($id, $name);

    public function getPagesData($paginate = null);

    public function updatePageData($id, $name, $value, $meta_title, $meta_description, $meta_keywords);

    public function deletePageData($id);
} 