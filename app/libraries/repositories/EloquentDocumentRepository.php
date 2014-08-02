<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 11:02 AM
 */

class EloquentDocumentRepository implements iDocumentRepository
{

    public function createDocument($type, $path, $active, $hash)
    {
        try {

            $document = new Document();
            $document->type = $type;
            $document->path = $path;
            $document->active = $active;
            $document->hash = $hash;
            $document->save();
            return $document;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getDocuments()
    {
        return Document::all();
    }

    /**
     * @param $id int
     * @param $name string
     * @param $title string
     * @param $active bool
     * @throws Exception
     */
    public function updateDocument($id, $name, $title, $active)
    {

        try {

            $document = Document::find($id);
            $document->name = $name;
            $document->title = $title;
            $document->active;
            $document->save();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function deleteDocument($id)
    {
        $document = Document::find($id);
        $document->delete();
    }

} 