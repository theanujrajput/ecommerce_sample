<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 11:01 AM
 */

interface iDocumentRepository
{

    public function createDocument($type, $path, $active, $hash);

    public function getDocuments();

    public function updateDocument($id, $name, $title, $active);

    public function deleteDocument($id);

} 