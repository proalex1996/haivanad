<?php


namespace App\Utilili;
require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Request;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;


class PptxFomat
{
 public function CreatePpt(Request $request){
     $objPHPPowerPoint = new PhpPresentation();
     // Create slide
     $currentSlide = $objPHPPowerPoint->getActiveSlide();
     // Create a start shape (drawing)
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setDescription('PHPPresentation logo')
         ->setPath('./image/start.png')
         ->setHeight(720)
         ->setWidth(959.04)
         ->setOffsetX(0)
         ->setOffsetY(0);
     $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
     $oWriterPPTX->save(__DIR__ . "/sample.pptx");
     $oWriterODP = IOFactory::createWriter($objPHPPowerPoint, 'ODPresentation');
     $oWriterODP->save(__DIR__ . "/sample.odp");
     // Create a content shape (text)
     $shape = $currentSlide->createRichTextShape()
         ->setHeight(170.88)
         ->setWidth(535.68)
         ->setOffsetX(7.68)
         ->setOffsetY(285.12);
     $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
     $textRun = $shape->createTextRun('THÀNH PHỐ CẦN THƠ');
     $textRun->getFont()->setName('Times New Roman')
         ->setBold(true)
         ->setSize(50)
         ->setColor( new Color( '#000' ) );
 }
}
