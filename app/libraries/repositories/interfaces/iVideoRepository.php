<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 1:15 PM
 */

interface iVideoRepository
{

    public function createVideo($type, $path, $active);

    public function getVideos();

    public function deleteVideo($id);
} 