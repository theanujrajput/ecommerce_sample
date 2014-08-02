<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 1:18 PM
 */

class EloquentVideoRepository implements iVideoRepository
{

    /**
     * @param string $type format of video
     * @param string $path path of video
     * @param bool $active
     * @return Video
     * @throws Exception
     */
    public function createVideo($type, $path, $active)
    {

        try {

            $video = new Video();
            $video->type = $type;
            $video->path = $path;
            $video->active = $active;
            $video->save();
            return $video;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getVideos()
    {
        return Video::all();
    }

    public function updateVideo($name, $title, $active)
    {


    }

    public function deleteVideo($id)
    {

    }

} 