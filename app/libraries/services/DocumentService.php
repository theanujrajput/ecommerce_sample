<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 12:35 PM
 */
class DocumentService
{

    function __construct(iDocumentRepository $documentRepo, iCategoryRepository $categoryRepo)
    {
        $this->documentRepo = $documentRepo;
        $this->categoryRepo = $categoryRepo;

    }


}