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
 public function CreatePpt($image1,$image2,$image3,$image4,$view1,$view2,$view3,$view4,$location,$map,$size,$dac_diem,$system,$id_banner,$light,$gia){
     $objPHPPowerPoint = new PhpPresentation();
     // Create slide
     $currentSlide = $objPHPPowerPoint->getActiveSlide();
     // Create a start shape (drawing)
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setDescription('PHPPresentation logo')
         ->setPath(public_path('storage/imagePptx/start.png'))
         ->setHeight(720)
         ->setWidth(959.04)
         ->setOffsetX(0)
         ->setOffsetY(0);
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
     //side 1
     $currentSlide = $objPHPPowerPoint->createSlide();
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/imagePptx/body.png'))
         ->setHeight(720)
         ->setWidth(959.04)
         ->setOffsetX(0)
         ->setOffsetY(0);
     $shape = $currentSlide->createRichTextShape()
         ->setHeight(174.72)
         ->setWidth(592.32)
         ->setOffsetX(208.32)
         ->setOffsetY(272.64);
     $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
     $textRun = $shape->createTextRun($location);
     $textRun->getFont()->setName('Times New Roman')
         ->setBold(true)
         ->setSize(31)
         ->setColor( new Color( '#FF0' ));
     // Slide 2
     $currentSlide = $objPHPPowerPoint->createSlide();
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/imagePptx/body.png'))
         ->setHeight(720)
         ->setWidth(959.04)
         ->setOffsetX(0)
         ->setOffsetY(0);
     $shape = $currentSlide->createRichTextShape()
         ->setHeight(35.52)
         ->setWidth(616.32)
         ->setOffsetX(304.32)
         ->setOffsetY(16.32);
     $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_LEFT );
     $textRun = $shape->createTextRun($location);
     $textRun->getFont()->setName('Times New Roman')
         ->setSize(16)
         ->setColor( new Color( '#000' ));
     $table_shape = $currentSlide->createTableShape(2);
     $table_shape->setHeight(616.32);
     $table_shape->setWidth(871.68);
     $table_shape->setOffsetX(72);
     $table_shape->setOffsetY(79.68);
     $row = $table_shape->createRow();
     $cell = $row->getCell(0);
     $text = $cell->createTextRun($view1);
     $text->getFont()->setName('Times New Roman')
         ->setItalic(true)
         ->setSize(18)
         ->setColor( new Color( '#000' ));
     $cell = $row->getCell(1);
     $text = $cell->createTextRun($view2);
     $text->getFont()->setName('Times New Roman')
         ->setItalic(true)
         ->setSize(18)
         ->setColor( new Color( '#000' ));
     $row = $table_shape->createRow()
         ->setHeight(254.4);
     $row = $table_shape->createRow();
     $cell = $row->getCell(0);
     $text = $cell->createTextRun($view3);
     $text->getFont()->setName('Times New Roman')
         ->setItalic(true)
         ->setSize(18)
         ->setColor( new Color( '#000' ));
     $cell = $row->getCell(1);
     $text = $cell->createTextRun($view4);
     $text->getFont()->setName('Times New Roman')
         ->setItalic(true)
         ->setSize(18)
         ->setColor( new Color( '#000' ));


     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/content/'.$image1))
         ->setHeight(293.76)
         ->setWidth(427.2)
         ->setOffsetX(72)
         ->setOffsetY(121.92);
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/content/'.$image2))
         ->setHeight(242.88)
         ->setWidth(432)
         ->setOffsetX(510.72)
         ->setOffsetY(119.04);
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/content/'.$image3))
         ->setHeight(256.32)
         ->setWidth(427.2)
         ->setOffsetX(72)
         ->setOffsetY(409.92);
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/content/'.$image4))
         ->setHeight(282.24)
         ->setWidth(427.2)
         ->setOffsetX(514.56)
         ->setOffsetY(421.44);
     // Slide 3
     $currentSlide = $objPHPPowerPoint->createSlide();
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/imagePptx/body.png'))
         ->setHeight(720)
         ->setWidth(959.04)
         ->setOffsetX(0)
         ->setOffsetY(0);
     $shape = $currentSlide->createRichTextShape()
         ->setHeight(35.52)
         ->setWidth(616.32)
         ->setOffsetX(304.32)
         ->setOffsetY(16.32);
     $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_LEFT );
     $textRun = $shape->createTextRun($location);
     $textRun->getFont()->setName('Times New Roman')
         ->setSize(16)
         ->setColor( new Color( '#000' ));
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/content/'.$map))
         ->setHeight(367.68)
         ->setWidth(736.32)
         ->setOffsetX(136.32)
         ->setOffsetY(96);
     $shape = $currentSlide->createRichTextShape()
         ->setHeight(216.96)
         ->setWidth(888)
         ->setOffsetX(53.76)
         ->setOffsetY(496.32);
     $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_LEFT );
     $textRun = $shape->createTextRun('
     Kích thước:'.$size.';
     Đặc điểm:'.$dac_diem.'.
     Kết cấu: '.$system.'
    - Đèn chiếu sáng: '.$light.'
    - Đơn giá pano: '.$gia.' usd/năm (Chưa VAT)
    - Đơn giá đèn:           usd/năm (Chưa gồm VAT)
');
     $textRun->getFont()->setName('Times New Roman')
         ->setSize(16)
         ->setColor( new Color( '#000' ));

     // Create a end shape (drawing)
     $currentSlide = $objPHPPowerPoint->createSlide();
     $shape = $currentSlide->createDrawingShape();
     $shape->setName('PHPPresentation logo')
         ->setPath(public_path('storage/imagePptx/end.png'))
         ->setHeight(720)
         ->setWidth(959.04)
         ->setOffsetX(0)
         ->setOffsetY(0);

     $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
     $oWriterPPTX->save(public_path('storage/PPTX/'.$id_banner.'.pptx'));


 }

}
