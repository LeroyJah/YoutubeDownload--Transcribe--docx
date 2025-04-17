<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    private $doc;

    public function __construct()
    {
        $this->doc = new \PhpOffice\PhpWord\PhpWord();
    }

    public function exportData($docText,$docName)
    {
        $pathToFile = storage_path('app/public/transcript'.$docName.'.docx');

        $section = $this->doc->addSection();
        $section->addText($docText);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($this->doc, 'Word2007');
        $objWriter->save($pathToFile);
    }
}
