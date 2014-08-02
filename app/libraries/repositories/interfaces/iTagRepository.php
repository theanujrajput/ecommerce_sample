<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 10:38 AM
 */

interface iTagRepository
{

    public function createTag($name, $code, $description);

    public function getTags($limit, $paginate);

    public function getTag($id, $name, $code);

    public function updateTag($id, $name, $code, $description);

    public function deleteTag($id);
} 