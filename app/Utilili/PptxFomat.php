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
    public function CreatePpt($banners)
    {

//        dd($banners);
        $j = 0;
        $i = 0;

        foreach ($banners as $banner) {
            $photos[] = $banner->photos;
            $views[] = $banner->views;
            $name_banner[] = $banner->_name_banner;
            $map[] = $banner->_name_map;
            $size[] = $banner->size_banner;
            $dac_diem[] = $banner->dac_diem;
            $system[] = $banner->id_system;
            $id_banner[] = $banner->id_banner;
            $light_system[] = $banner->light_system;
            $gianam[] = $banner->gianam;
            $v_light[] = $banner->v_light;

        }
        foreach ($photos as $photo) {
            $image[] = explode(",", $photo);
        }
        foreach ($views as $view) {
            $_views[] = explode(",", $view);
        }
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
        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun('THÀNH PHỐ CẦN THƠ');
        $textRun->getFont()->setName('Times New Roman')
            ->setBold(true)
            ->setSize(50)
            ->setColor(new Color('#000'));
        //side 1
        for ($i; $i < count($id_banner); $i++) {
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
            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $textRun = $shape->createTextRun($name_banner[$i]);
            $textRun->getFont()->setName('Times New Roman')
                ->setBold(true)
                ->setSize(31)
                ->setColor(new Color('#FF0'));
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
            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $textRun = $shape->createTextRun($name_banner[$i]);
            $textRun->getFont()->setName('Times New Roman')
                ->setSize(16)
                ->setColor(new Color('#000'));
            $table_shape = $currentSlide->createTableShape(2);
            $table_shape->setHeight(616.32);
            $table_shape->setWidth(871.68);
            $table_shape->setOffsetX(72);
            $table_shape->setOffsetY(79.68);

            for ($i; $i < sizeof($_views); $i++) {
//                 dd((string)$_views[$j][0]);
                $row = $table_shape->createRow();
                $cell = $row->getCell(0);
                $text = $cell->createTextRun($_views[$i][0]);
                $text->getFont()->setName('Times New Roman')
                    ->setItalic(true)
                    ->setSize(18)
                    ->setColor(new Color('#000'));
                $cell = $row->getCell(1);
                $text = $cell->createTextRun($_views[$i][1]);
                $text->getFont()->setName('Times New Roman')
                    ->setItalic(true)
                    ->setSize(18)
                    ->setColor(new Color('#000'));
                $row = $table_shape->createRow()
                    ->setHeight(254.4);
                $row = $table_shape->createRow();
                $cell = $row->getCell(0);
                $text = $cell->createTextRun($_views[$i][2]);
                $text->getFont()->setName('Times New Roman')
                    ->setItalic(true)
                    ->setSize(18)
                    ->setColor(new Color('#000'));
                $cell = $row->getCell(1);
                $text = $cell->createTextRun($_views[$i][3]);
                $text->getFont()->setName('Times New Roman')
                    ->setItalic(true)
                    ->setSize(18)
                    ->setColor(new Color('#000'));
                $shape = $currentSlide->createDrawingShape();
                $shape->setName('PHPPresentation logo')
                    ->setPath(public_path('storage/content/' . $image[$i][0]))
                    ->setHeight(293.76)
                    ->setWidth(427.2)
                    ->setOffsetX(72)
                    ->setOffsetY(121.92);

                $shape = $currentSlide->createDrawingShape();
                $shape->setName('PHPPresentation logo')
                    ->setPath(public_path('storage/content/' . $image[$i][1]))
                    ->setHeight(242.88)
                    ->setWidth(432)
                    ->setOffsetX(510.72)
                    ->setOffsetY(119.04);
                $shape = $currentSlide->createDrawingShape();
                $shape->setName('PHPPresentation logo')
                    ->setPath(public_path('storage/content/' . $image[$i][2]))
                    ->setHeight(256.32)
                    ->setWidth(427.2)
                    ->setOffsetX(72)
                    ->setOffsetY(409.92);
                $shape = $currentSlide->createDrawingShape();
                $shape->setName('PHPPresentation logo')
                    ->setPath(public_path('storage/content/' . $image[$i][3]))
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
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun($name_banner[$i]);
                $textRun->getFont()->setName('Times New Roman')
                    ->setSize(16)
                    ->setColor(new Color('#000'));
                $shape = $currentSlide->createDrawingShape();
                $shape->setName('PHPPresentation logo')
                    ->setPath(public_path('storage/content/' . $map[$i]))
                    ->setHeight(367.68)
                    ->setWidth(736.32)
                    ->setOffsetX(136.32)
                    ->setOffsetY(96);
                $shape = $currentSlide->createRichTextShape()
                    ->setHeight(216.96)
                    ->setWidth(888)
                    ->setOffsetX(53.76)
                    ->setOffsetY(496.32);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun('
                - Kích thước: '.$size[$i].';
                - Đặc điểm: '.$dac_diem[$i] . '.
                - Kết cấu: '.$system[$i] . '
                - Đèn chiếu sáng: '.$light_system[$i].'
                - Đơn giá pano: '. $gianam[$i] . ' usd/năm (Chưa VAT)
                - Đơn giá đèn: '.$v_light[$i].' usd/năm (Chưa gồm VAT)');
                $textRun->getFont()->setName('Times New Roman')
                    ->setSize(16);
                break;

            }


        }


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
        $oWriterPPTX->save(public_path('storage/PPTX/Greeting.pptx'));


    }

}
