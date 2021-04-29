<?php


namespace App\Http\Controllers;


use App\Exports\ExportProduct;
use App\Imports\ImportProduct;
use App\Imports\TestSheetImport;
use App\Model\MapModel;
use App\Model\PhotoModel;
use App\Model\PickupModel;
use App\Model\ProductModel;
use App\Repositories\Product\ProductRepositoryEloquent;
use App\Utilili\PptxFomat;
use App\Utilili\RamdomCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpWord\Shared\ZipArchive;
use ZipStream\Option\Archive;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryEloquent $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function store(Request $request)
    {
    }

    public function getIndex(Request $request)
    {
        $banners = DB::table('banner')
            ->join('status_banner', 'banner.name_status', '=', 'status_banner.id_status')
            ->join('type_banner','banner.id_typebanner','=','type_banner.id_typebanner')
            ->join('province','banner.tinh','=','province._code')
            ->select('banner.id', 'status_banner.name_status','province._name', 'banner.gianam','type_banner.name_type','banner._name_banner','status_banner.id_status', 'banner.id_banner');
        if (!empty($request->id_banner)) {
            $banners = $banners->where('banner.id_banner', '=',  $request->id_banner );
        }
        if (!empty($request->id_status)) {
            $banners = $banners->where('banner.name_status', '=', $request->id_status);
        }
        if (!empty($request->tinh)) {
            $banners = $banners->where('banner.tinh', '=', $request->tinh);
        }
        if (!empty($request->id_typebanner)) {
            $banners = $banners->where('banner.id_typebanner', '=', $request->id_typebanner);
        }if(!empty($request->_name_banner)){
        $banners = $banners ->where('banner._name_banner','LIKE','%'.$request->_name_banner.'%');
    }

        $banners = $banners->groupBy('banner.id')->orderBy('banner.id', 'DESC')->get();
        $status_banner = DB::table('status_banner')->select('*')->get();
        $province = DB::table('province')->select('*')->get();
        $type_banner = DB::table('type_banner')->select('*')->get();
        $contract = DB::table('contract')
            ->join('banner', 'contract.id_banner', '=', 'banner.id_banner')
            ->join('customer', 'contract.id_customer', '=', 'customer.customer_id')
            ->select('banner.id_banner', 'contract.id_contract', 'customer.name_customer')->groupBy('contract.id')->orderBy('contract.id', 'DESC')->get();
        return view('pages.product.index', [
            'banners' => $banners,
            'status_banners' => $status_banner,
            'provinces' => $province,
            'type_banners' => $type_banner
        ]);
    }

    public function apiProduct()
    {
        $banners = DB::table('banner')
            ->join('status_banner', 'banner.name_status', '=', 'status_banner.id_status')
            ->select('banner.id', 'status_banner.id_status', 'banner.id_banner', 'status_banner.name_status', 'banner.banner_adress',
                'banner.thumb_banner', 'banner.light_system', 'banner.content', 'banner.size_banner', 'banner.height_banner')
            ->groupBy('id')->orderBy('id', 'DESC')->paginate();
        $status_banner = DB::table('status_banner')->select('*')->get();
        $contract = DB::table('contract')
            ->join('banner', 'contract.id_banner', '=', 'banner.id_banner')
            ->join('customer', 'contract.id_customer', '=', 'customer.customer_id')
            ->select('banner.id_banner', 'contract.id_contract', 'customer.name_customer')->groupBy('contract.id_product')->orderBy('contract.id', 'DESC')->first();
        return json_encode($banners);

    }


    public function createProduct(Request $request)
    {
        $product = new ProductModel();
        $product->id_banner = $request->id_banner;
        $product->_name_banner = $request->_name_banner;
        $product->banner_adress = $request->banner_adress;
        $product->v_light = $request ->v_light;
        $product->content = $request->content;
        $product->name_status = $request->status_banner;
        $product->quan = $request->quan;
        $product->tinh = $request->tinh;
        $product->id_typebanner = $request->id_typebanner;
        $product->id_system = $request->id_system;
        $product->size_banner = $request->size_banner;
        $product->height_banner = $request->height_banner;
        $product->gianam = $request->gianam;
        $product->light_system = $request->light_system;
        $product->dac_diem = $request->dac_diem;
        $product->flow = $request->flow;
        $product->escom = $request->escom;
        $product->note_banner = $request->note_banner;
        $product->dien_tich = $request->dien_tich;
        $product->save();

        $maps = array($request->file('maps'));
        $files =$request->file('files');
        if(!empty($files[0]) || !is_null($files[0])){
            for($index = 0;$index < sizeof($files);$index++){
                $photo = new PhotoModel();
                $file = $files[$index];
                $photo->id_banner = $request->id_banner;
                $photo->views = $request->views[$index];
                $fileName =$request->file('files')[$index]->getClientOriginalName();
                $photo->_name_photo = $fileName;
                $storage= Storage::putFileAs('content', $request->file('files')[$index], $fileName);
                $photo->save();
            }
        }
        if(!empty($maps[0]) || !is_null($maps[0]))
        {
            for ($index = 0; $index< sizeof($maps); $index++){
                $map = new MapModel();
                $mapFile = $maps[$index];
                $map->id_banner  = $request->id_banner;
                $mapName = $request->file('maps')[$index]->getClientOriginalName();
                $map->_name_map = $mapName;
                $storage= Storage::putFileAs('content', $request->file('maps')[$index], $mapName);
                $map->save();
            }
        }
        if ($request->add_product == 'save_copy') {
            return redirect()->back()->with('product', $product);
        }
        if ($request->add_product == 'save_new') {
            return redirect()->action('ProductController@addProduct');
        }
        if ($request->add_product == 'save') {
            return redirect()->action('ProductController@getIndex');
        }

    }

    public function addProduct()
    {
        $maxid = DB::table('banner')->max('id');
        $catelory = "SP";
        $code = RamdomCode::generateCode($catelory,$maxid);
        $type_banners = DB::table('type_banner')->select('*')->get();
        $product = DB::table('banner')->select('*')->get();
        $status = DB::table('status_banner')->select('*')->get();
        $province = DB::table('province')
            ->select('*')
            ->get();
        $district = DB::table('district')
            ->select('*')
            ->get();
        return view('pages.product.add', [
            'type_banners' => $type_banners,
            'products' => $product,
            'statuss' => $status,
            'provinces' => $province,
            'code' => $code,
            'districts' => $district
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
            $dataBanner = $request->except('files');
            $up = $this->productRepository->update($id, $dataBanner);
            $db_check = DB::table('photo')->where('id_banner','=',$data['id_banner'])->get();
            $files = $request->file('files');
            if(empty($db_check[0]) == true){
                for($index = 0;$index < sizeof($data['files']);$index++){
                    $photo = new PhotoModel();
                    $file = $files[$index];
                    $photo->id_banner = $request->id_banner;
                    $photo->views = $request->views[$index];
                    $fileName =$request->file('files')[$index]->getClientOriginalName();
                    $photo->_name_photo = $fileName;
                    $storage= Storage::putFileAs('content', $request->file('files')[$index], $fileName);
                    $photo->save();
                }
            }
            if(array_key_exists("files", $data) != false || array_key_exists("maps", $data) != false){
                if(array_key_exists("files", $data) != false){
                    $check =  ProductController::containsOnlyNull($data['files']);
                    if($check == false) {
                        if (!empty($files)) {
                            for ($i = 0; $i < sizeof($files); $i++) {
                                if (file_exists($data['files'][$i]) == false){
                                    $fileName = basename($files[$i]->getClientOriginalName());
                                    $file = $request->file('files')[$i];
                                    $storage = Storage::putFileAs('content', $file, $fileName);
                                    $photoModel = PhotoModel::where(['id_banner' => $data['id_banner']])->where(['id' => $data['id_photo'][$i]])->update([
                                        '_name_photo' => $fileName,
                                        'views' => $data['views'][$i]
                                    ]);
                                } else {
                                    if (array_key_exists('id_photo', $data) != false) {
                                        $fileName = basename($data['files'][$i]->getClientOriginalName());
                                        $photoModel = PhotoModel::where(['id_banner' => $data['id_banner']])->where(['id' => $data['id_photo'][$i]])->update([
                                            '_name_photo' => $fileName,
                                            'views' => $data['views'][$i]
                                        ]);
                                    } else {
                                        if (!empty($files[$i]) || !is_null($files[$i])) {
                                            $photo = new PhotoModel();
                                            $file = $files[$i];
                                            $photo->id_banner = $request->id_banner;
                                            $photo->views = $request->views[$i];
                                            $fileName = $request->file('files')[$i]->getClientOriginalName();
                                            $photo->_name_photo = $fileName;
                                            $storage = Storage::putFileAs('content', $request->file('files')[$i], $fileName);
                                            $photo->save();
                                            $photoModel = PhotoModel::where(['id_banner' => $data['id_banner']])->where(['id' => $data['id_photo'][$i]])->update([
                                                'views' => $data['views'][$i]
                                            ]);
                                        }

                                    }
                                }

                            }


                        } else {
                            for ($i = 0; $i < sizeof($data['views']); $i++) {
                                $photoModel = PhotoModel::where(['id_banner' => $data['id_banner']])->where(['id' => $data['id_photo'][$i]])->update([
                                    'views' => $data['views'][$i]
                                ]);
                            }
                        }
                    }
                }
                if(array_key_exists("maps", $data) != false) {
                    $dbmap = DB::table('map')->where('id_banner',$data['id_banner'])->get();
                    $checkmap = ProductController::containsOnlyNull($data['maps']);
                    if ($checkmap == false) {
                        $maps = $request->file('maps');
                        if(!empty($dbmap[0])){
                            if(!empty($maps)){
                                if(file_exists($data['maps'][0])==true){
                                    $maps = $request->file('maps')[0];
                                    $mapsName = basename($maps->getClientOriginalName());
                                    $storage = Storage::putFileAs('content', $maps, $mapsName);
                                    $photoModel =  MapModel::where('id_banner',$data['id_banner'])->update([
                                        '_name_map' => $mapsName
                                    ]);
                                }

                            }
                        }else{
                            $map = new MapModel();
                            $mapFile = $maps[0];
                            $map->id_banner  = $request->id_banner;
                            $mapName = $request->file('maps')[0]->getClientOriginalName();
                            $map->_name_map = $mapName;
                            $storage= Storage::putFileAs('content', $request->file('maps')[0], $mapName);
                            $map->save();
                        }


                        }

                    }
                }



            return redirect()->refresh();
        }

        $banners = $this->productRepository->find($id);
        $statuss = DB::table('status_banner')->select('*')->get();
        $type_banner = DB::table('type_banner')->select('*')->get();
        $province = DB::table('province') ->select('*')->get();
        $district = DB::table('district') ->select('*')->get();
        return view('pages.product.update', [
            'banners' => $banners,
            'statuss' => $statuss,
            'type_banners' => $type_banner,
            'provinces' => $province,
            'districts'=>$district
        ]);
    }
    function containsOnlyNull($input)
    {
        return empty(array_filter($input, function ($a) { return $a !== null;}));
    }

    public function province(Request $request)
    {
        $request->all();
        $districts = DB::table('district')
            ->join('province', 'district._province_id', '=', 'province._code')
            ->select('*')
            ->where('district._province_id', '=', $request->id)->get();
        return json_encode(['district' => $districts], 200);

    }

    public function destroy(Request $request,$id)
    {
        try {
            $del = ProductModel::where('id_banner',$id);
            $del->delete();
            return redirect('/product');
        } catch (\Exception $e) {

            return redirect(URL::to('product'));

        }
    }

    public function export(Request $request)
    {
        $id_banner = explode(',',$request->export_product);
        return Excel::download(new ExportProduct($id_banner), 'Thông Tin Sản Phẩm.xlsx');
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('banner')
            ->where('id', $id)
            ->update(['status' => $request->status]);
    }

    public function dowloadExample()
    {
        return redirect('public/storage/contract/ImportProduct.xlsx');
    }

    public function pickupBanner1($id)
    {
        $product = ProductModel::find($id);
        if ($product) {
            $product->name_status = 1;
            $result = $product->update();
        }
        return redirect()->action('ProductController@getIndex');
    }

    public function pickupBanner2($id)
    {
        $product = ProductModel::find($id);
        if ($product) {
            $product->name_status = 2;
            $result = $product->update();
        }
        return redirect()->action('ProductController@getIndex');
    }





    function upload(Request $request)
    {
        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();

        $image->move(public_path('content'), $imageName);

        return response()->json(['success' => $imageName]);
    }
    function fetch()
    {
        $images = File::allFiles(public_path('images'));
        $output = '<div class="row">';
        foreach ($images as $image) {
            $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="' . asset('images/' . $image->getFilename()) . '" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" id="' . $image->getFilename() . '">Remove</button>
            </div>
      ';
        }
        $output .= '</div>';
        echo $output;
    }
    function delete(Request $request)
    {
        if ($request->get('name')) {
            File::delete(public_path('images/' . $request->get('name')));
        }
    }
    public function getPhoto(Request $request){
        $maps = DB::table('map')->select('*')->where('map.id_banner','=',$request->id_banner)->get();
        if(!empty($maps[0])){
            $photo = DB::table('photo')
                ->join('map','photo.id_banner','=','map.id_banner')
                ->select('photo.id as id_photo','_name_photo','map._name_map','views')
                ->where('photo.id_banner','=',$request->id_banner)
                ->get();
        }else{
            $photo = DB::table('photo')
                ->select('photo.id as id_photo','_name_photo','views')
                ->where('photo.id_banner','=',$request->id_banner)
                ->get();
        }

        return json_encode(['photo' => $photo], 200);
    }
    public function getPptx(Request $request){
        $datas = explode(",",$request->checkbox_hidden);

            $myzip = new ZipArchive;
            if ($myzip->open(public_path('storage/PPTX/'.$datas[0].'.zip'),  ZipArchive::CREATE || ZipArchive::OVERWRITE) === TRUE)
            {
                $banners = DB::table('banner')
                    ->join('photo', 'banner.id_banner', '=', 'photo.id_banner')
                    ->join('map', 'banner.id_banner', '=', 'map.id_banner')
                    ->select('banner.id_system', 'banner.gianam', 'banner._name_banner', 'banner.dac_diem',
                        'banner.light_system', 'banner.id_banner', DB::raw('group_concat(photo._name_photo) as photos '),DB::raw('group_concat(photo.views) as views'), 'banner.size_banner','banner.v_light', 'map._name_map')
                        ->whereIn('banner.id_banner', $datas)->groupBy('banner.id_banner')
                    ->get();
                $pptx = new PptxFomat();
                $pptx->CreatePpt($banners);
                $myzip->addFile(public_path('storage/PPTX/Greeting.pptx'),'Greeting.pptx');
                $myzip->close();
            }
            return Response::download(public_path('storage/PPTX/'.$datas[0].'.zip'));
        }





}
