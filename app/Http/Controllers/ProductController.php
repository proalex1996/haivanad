<?php


namespace App\Http\Controllers;


use App\Exports\ExportProduct;
use App\Imports\ImportProduct;
use App\Imports\TestSheetImport;
use App\Model\PickupModel;
use App\Model\ProductModel;
use App\Repositories\Product\ProductRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryEloquent $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getIndex()
    {
        $banners = DB::table('banner')
            ->join('status_banner', 'banner.name_status', '=', 'status_banner.id_status')
            ->select('banner.id','status_banner.id_status', 'banner.id_banner', 'thumb_banner', 'status_banner.name_status', 'banner.banner_adress',
                'banner.thumb_banner', 'banner.light_system', 'banner.content', 'banner.size_banner', 'banner.height_banner')
            ->groupBy('id')->orderBy('id', 'DESC')->get();
        $status_banner = DB::table('status_banner')->select('*')->get();
        $contract = DB::table('contract')
            ->join('banner', 'contract.id_banner', '=', 'banner.id_banner')
            ->join('customer', 'contract.id_customer', '=', 'customer.customer_id')
            ->select('banner.id_banner', 'contract.id_contract', 'customer.name_customer')->groupBy('contract.id')->orderBy('contract.id','DESC')->get();
        return view('pages.product.index', [
            'banners' => $banners,
            'contracts' => $contract,
            'status_banners' =>$status_banner
        ]);
    }
    public function apiProduct()
    {
        $banners = DB::table('banner')
            ->join('status_banner', 'banner.name_status', '=', 'status_banner.id_status')
            ->select('banner.id','status_banner.id_status', 'banner.id_banner','status_banner.name_status', 'banner.banner_adress',
                'banner.thumb_banner', 'banner.light_system', 'banner.content', 'banner.size_banner', 'banner.height_banner')
            ->groupBy('id')->orderBy('id', 'DESC')->paginate();
        $status_banner = DB::table('status_banner')->select('*')->get();
        $contract = DB::table('contract')
            ->join('banner', 'contract.id_banner', '=', 'banner.id_banner')
            ->join('customer', 'contract.id_customer', '=', 'customer.customer_id')
            ->select('banner.id_banner', 'contract.id_contract', 'customer.name_customer')->groupBy('contract.id')->orderBy('contract.id','DESC')->first();
        return json_encode($banners);

    }


    public function createProduct(Request $request)
    {
        $product = new ProductModel();
        $file = $request->file('thumb_banner');
        $product->id_banner = $request->id_banner;
        $product->banner_adress = $request->banner_adress;
        $product->size_banner = $request->size_banner;
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('storage');
        $file->move($destinationPath, $imageName);
        $product->thumb_banner = $imageName;
        $product->content = $request->banner_content;
        $product->light_system = $request->light_system;
         $product->thumb_banner = $request->thumb_banner;
        $product->save();
        return redirect()->action('ProductController@getIndex');
    }

    public function addProduct()
    {
        $product = DB::table('banner')->select('*')->get();
        $status = DB::table('status_banner')->select('*')->get();
        return view('pages.product.add', [
            'products' => $product,
            'statuss' => $status
        ]);
    }

    public function importProduct()
    {
        return view('pages.product.import');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        if (!empty($file)) {
            Excel::import(new TestSheetImport(), $file);
            return redirect()->action('ProductController@getIndex');
        } else {
            return ['File Dữ Liệu trống'];
        }

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (!empty($data)) {
            $up = $this->productRepository->update($id, $data);
            return redirect()->action('ProductController@getIndex');
        }
        $banners = $this->productRepository->find($id);
        $statuss = DB::table('status_banner')->select('*')->get();
        return view('pages.product.update', [
            'banners' => $banners,
            'statuss' => $statuss
        ]);
    }

    public function destroy($id)
    {
        try {
            $del = ProductModel::find($id);
            $del->delete();
            return redirect('/product');
        } catch (\Exception $e) {

            return redirect(URL::to('product'));

        }
    }

    public function export()
    {
        return Excel::download(new ExportProduct, 'product.xlsx');
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('banner')
            ->where('id', $id)
            ->update(['status' => $request->status]);
    }

    public function dowloadExample()
    {
        return redirect('public/storage/contract/ExmpleProduct.xlsx');
    }
    public function pickupBanner1($id){
       $product = ProductModel::find($id);
       if($product){
           $product->name_status = 1;
           $result = $product->update();
       }
        return redirect()->action('ProductController@getIndex');
    }
    public function pickupBanner2($id){
        $product = ProductModel::find($id);
        if($product){
            $product->name_status = 2;
            $result = $product->update();
        }
        return redirect()->action('ProductController@getIndex');
    }
    public function generateppt(){

        $objPHPPowerPoint = new PhpPresentation();
        $objPHPPowerPoint->getProperties()->setCreator('Sketch Presentation')
            ->setLastModifiedBy('Sketch Team')
            ->setTitle('Sketch Presentation')
            ->setSubject('Sketch Presentation')
            ->setDescription('Sketch Presentation')
            ->setKeywords('office 2007 openxml libreoffice odt php')
            ->setCategory('Sample Category');
        $objPHPPowerPoint->removeSlideByIndex(0);dd($objPHPPowerPoint);
        $this->slide1($objPHPPowerPoint);
        $this->slide2($objPHPPowerPoint);
        $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
        return $oWriterPPTX->save(__DIR__ . "/sample.pptx");
    }
    public function slide1(&$objPHPPowerPoint){
        // Create slide
        $currentSlide = $objPHPPowerPoint->createSlide();
        // Create a shape (drawing)
        $shape = $currentSlide->createDrawingShape();
//        $shape->setName('image')
//            ->setDescription('image')
//            ->setPath(public_path().'/phppowerpoint_logo.gif')
//            ->setHeight(300)
//            ->setOffsetX(10)
//            ->setOffsetY(10);
        // Create a shape (text)
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
        $textRun = $shape->createTextRun('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ');
        $textRun->getFont()->setBold(true)
            ->setSize(16)
            ->setColor( new Color( 'FFE06B20' ) );
    }
    public function slide2(&$objPHPPowerPoint){
        // Create slide
        $currentSlide = $objPHPPowerPoint->createSlide();
        // Create a shape (drawing)
        $shape = $currentSlide->createDrawingShape();
//        $shape->setName('image')
//            ->setDescription('image')
//            ->setPath(public_path().'/phppowerpoint_logo.gif')
//            ->setHeight(300)
//            ->setOffsetX(10)
//            ->setOffsetY(10);
        // Create a shape (text)
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
        $textRun = $shape->createTextRun('Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
        $textRun->getFont()->setBold(true)
            ->setSize(16)
            ->setColor( new Color( 'FFE06B20' ) );
    }



}
