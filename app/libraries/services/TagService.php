<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/28/14
 * Time: 10:39 AM
 */
class TagService
{

    function __construct(iTagRepository $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    /** accepts name, code and description and creates a new tag
     * @param string $name
     * @param string $code
     * @param string $description
     * @return mixed
     */
    public function createTag($name, $code, $description)
    {
        $result = $this->tagRepo->createTag($name, $code, $description);
        return $result;
    }

    /** returns all the tags by limit or by paging
     * @param int $limit
     * @param int $paginate
     * @return null
     */
    public function getTags($limit, $paginate)
    {
        $result = $this->tagRepo->getTags($limit, $paginate);
        return \AppUtil::returnResults($result);
    }

    /** return the tag by id or name or code
     * @param int $id
     * @param string $name
     * @param string $code
     * @return null
     */
    public function getTag($id, $name, $code)
    {
        $result = $this->tagRepo->getTag($id, $name, $code);
        return isset($result) ? $result : null;
    }

    /** updates the tag
     * @param int $id
     * @param string $name
     * @param string $code
     * @param string $description
     */
    public function updateTag($id, $name, $code, $description)
    {
        $this->tagRepo->updateTag($id, $name, $code, $description);
    }

    /** deletes the tag bt id
     * @param int $id
     */
    public function deleteTag($id)
    {
        $this->tagRepo->deleteTag($id);
    }
} 