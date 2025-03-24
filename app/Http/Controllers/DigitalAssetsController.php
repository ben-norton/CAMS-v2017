<?php

namespace App\Http\Controllers;
use Imagick;
use App\AssetsMeta;
use App\CollectionKeyType;
use App\Project;
use App\SpecimenIdentifier;
use Session;
use Storage;
use League\Flysystem\Filesystem;
use Input;
use Image;
use DB;
use Response;
use App\Asset;
use Carbon\Carbon;
use App\AssetType;
use App\Collection;
use App\FieldLocation;
use App\MetadataKeys;
use App\Http\Requests\DigitalAssetsFormRequest;
use App\Specimen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DigitalAssetsController extends Controller
{
    protected $s3bucket;
    public function __construct()
    {
        $this->s3bucket = \Config::get('cams.s3bucket');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$assetTypes = AssetType::all()->sortBy('name');
    	$collections = Collection::all()->sortBy('collection_name');
    	$projects = Project::all()->sortBy('project_name');
        $assets = Asset::take(20)->get();
        return view('assets.datatable', compact('assetTypes','collections','projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collections = Collection::all()->sortby('collection_name')->pluck('collection_name','id');
        $collections->prepend(null,null);
        $assetTypes = AssetType::all()->sortby('name')->pluck('name','id');
        $projects = Project::all()->sortby('project_name')->pluck('display_name','id');
        return view('assets.create', compact('collections','assetTypes','projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DigitalAssetsFormRequest $request)
    {

        $s3bucket = \Config::get('cams.s3bucket');
        // Get File Information
        $file = $request->file('image_file');
        $ext = $file->getClientOriginalExtension();
        $originalFilenameExt = str_replace(' ', '_', $file->getClientOriginalName());
        $originalFilename = pathinfo($originalFilenameExt, PATHINFO_FILENAME);
        $imageMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml', 'image/tiff'];
        $fileMimeType = $file->getMimeType();

        // Insert Base File Information
        $upload = new Asset(array(
            'title' => $request->get('title'),
            'original_filename' => $originalFilenameExt,
            'remarks' => $request->get('remarks'),
            'source' => $request->get('source'),
            'attribution_required_yn' => $request->get('attribution_required_yn'),
            'attribution' => $request->get('attribution'),
			'usage_restrictions_yn' => $request->get('usage_restrictions_yn'),
			'license_type' => $request->get('license_type'),
			'restriction_remarks' => $request->get('restriction_remarks'),
            'uploaded_by' => Auth::user()->getId(),
            'asset_type_id' => $request->get('asset_type_id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
        $upload->save();

        // Must create and then get the ID for the filename before uploading the file
        $uid = $upload->id;
        $dt = Carbon::now();
        $dt = $dt->format('Ymd-His');

        $s3filename = $originalFilename . "_" . $uid . "." . $ext;
        $s3path = 'https://s3.amazonaws.com/' . $s3bucket . '/' . $s3filename;

        // If image, make smaller version
        if(in_array($fileMimeType, $imageMimeTypes)) {
			
            // Get Image Width
            $width = Image::make($file)->width();
            // Create resized copies- If original larger, then make and store copy, otherwise copy original
            // Create large image for the web
            if($width > 1680) {
                $img_lg = Image::make($file)->resize(1680, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img_lg = $img_lg->stream();
                $imgname_lg = $originalFilename . "_" . $uid . "_lg." . $ext;
                $imgpath_lg = 'https://s3.amazonaws.com/' . $s3bucket . '/'.$imgname_lg;

                Storage::disk('s3')->put($imgname_lg, $img_lg->__toString(), 'public');
            }
            else {
                $imgname_lg = $originalFilename . "_" . $uid . "." . $ext;
                $imgpath_lg = 'https://s3.amazonaws.com/' . $s3bucket . '/'.$s3filename;
            }
            // Create Medium-sized image for the web
            if($width > 640) {
                $img_md = Image::make($file)->resize(640, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img_md = $img_md->stream();
                $imgname_md = $originalFilename . "_" . $uid . "_md." . $ext;
                $imgpath_md = 'https://s3.amazonaws.com/' . $s3bucket . '/'.$imgname_md;
                Storage::disk('s3')->put($imgname_md, $img_md->__toString(), 'public');
            }
            else {
                $imgname_md = $originalFilename . "_" . $uid . "." . $ext;
                $imgpath_md = 'https://s3.amazonaws.com/' . $s3bucket . '/'.$s3filename;
            }
            // Create thumbnail
            if($width > 250) {
                $img_thumb = Image::make($file)->resize(250, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img_thumb = $img_thumb->stream();
                $imgname_thumb = $originalFilename . "_" . $uid . "_thumb." . $ext;
                $imgpath_thumb = 'https://s3.amazonaws.com/' . $s3bucket . '/'.$imgname_thumb;
                Storage::disk('s3')->put($imgname_thumb, $img_thumb->__toString(), 'public');
            }
            else {
                $imgname_thumb = $originalFilename . "_" . $uid . "." . $ext;
                $imgpath_thumb = 'https://s3.amazonaws.com/' . $s3bucket . '/'.$s3filename;
            }
        }
        else {
            // If not image, then set all image fields to null
            $imgname_lg = $imgname_md = $imgname_thumb = $imgpath_lg = $imgpath_md = $imgname_thumb = $imgpath_thumb = null;
        }
        DB::table('assets')
            ->where('id', $uid)
            ->update([
                's3filename' => $s3filename,
                's3path' => $s3path,
                'imgname_lg' => $imgname_lg,
                'imgpath_lg' => $imgpath_lg,
                'imgname_md' => $imgname_md,
                'imgpath_md' => $imgpath_md,
                'imgname_thumb' => $imgname_thumb,
                'imgpath_thumb' => $imgpath_thumb,
                'updated_at' => Carbon::now(),
            ]);



		// Store original file
        Storage::disk('s3')->put($s3filename, file_get_contents($file), 'public');

        // Process Tiff Files
        if(!$_SERVER['REMOTE_ADDR']=='127.0.0.1') {
            $image_tiff = new Imagick();
            $image_tiff->readImage($s3path);
            $format = $image_tiff->getImageFormat();
            if($format == 'TIFF') {
                $this->processTiff($uid,$s3bucket);
                Session::flash('flash_message', 'Tiff Processed');
            }
            else {
                Session::flash('flash_message', 'Asset added!');
            }
        }
        return redirect()->action('DigitalAssetsController@show', ['id' => $uid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = Asset::with('collectionKeys')->find($id);
        if($asset->assetType->parameterKey->variable == 'image') {
            $exif = @exif_read_data($asset->s3path);
        }
        else {
            $exif = null;
        }
        $collections = Collection::all()->sortby('collection_name');
        $meta = DB::table('assets_meta')
            ->join('metadata_keys','assets_meta.metakey_id','=','metadata_keys.id')
            ->where('assets_meta.metable_id','=',$id)
            ->get();
//        $meta = $asset->getAllMeta($id);
//        $meta = AssetsMeta::where('metable_id','=',$id)->with('metadata_keys');
        $metakeys = MetadataKeys::getKeysByModel('App\Asset');
        $collectionKeyTypes = CollectionKeyType::all();
        $projects = Project::all()->sortby('project_name');
//        $jpeg = Image::make($asset->imgpath_lg)->encode('jpg', 100);
//        $png = Image::make($asset->imgpath_lg)->response('png');
        return view('assets.show', compact('asset','collections','exif','meta','metakeys','collectionKeyTypes','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = Asset::whereId($id)->firstOrFail();
        $assetTypes = AssetType::all()->sortby('name')->pluck('name','id');
        return view('assets.edit', compact('asset','assetTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->update($request->all());
        Session::flash('flash_message', 'Asset updated!');
        return redirect()->action('DigitalAssetsController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asset::destroy($id);
        Session::flash('flash_message', 'Asset deleted!');
        return redirect()->action('DigitalAssetsController@index');
    }

    function uniqueFilename($path, $name, $ext) {
        $output = $name;
        $basename = basename($name, '.' . $ext);
        $i = 2;
        while(File::exists($path . '/' . $output)) {
            $output = $basename . $i . '.' . $ext;
            $i ++;
        }
        return $output;
    }

    /**
     * Assets Search
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        return view('assets.search');
    }


    public function processTiff($id,$s3bucket) {
        $asset = Asset::find($id);
        $filelg = $asset->imgpath_lg;
        $filemd = $asset->imgpath_md;
        $filethumb = $asset->imgpath_thumb;

        $image_lg = new Imagick();
        $image_md = new Imagick();
        $image_thumb = new Imagick();
        $image_lg->readImage($filelg);
        $image_md->readImage($filemd);
        $image_thumb->readImage($filethumb);

        $format = $image_lg->getImageFormat();
        if($format == 'TIFF') {
            $image_lg->setImageFormat("png");
            $file_lg = $image_lg->getImageBlob();
            $imgname_lg = "asset_" . $id . "_lgp.png";
            Storage::disk('s3')->put($imgname_lg, $file_lg, 'public');

            $image_md->setImageFormat("png");
            $file_md = $image_md->getImageBlob();
            $imgname_md = "asset_" . $id . "_mdp.png";
            Storage::disk('s3')->put($imgname_md, $file_md, 'public');

            $image_thumb->setImageFormat("png");
            $file_thumb = $image_thumb->getImageBlob();
            $imgname_thumb = "asset_" . $id . "_thumbp.png";
            Storage::disk('s3')->put($imgname_thumb, $file_thumb, 'public');

            DB::table('assets')
                ->where('id', $id)
                ->update([
                    'imgname_lg' => $imgname_lg,
                    'imgpath_lg' => 'https://s3.amazonaws.com/' . $s3bucket . '/'.$imgname_lg,
                    'imgname_md' => $imgname_md,
                    'imgpath_md' => 'https://s3.amazonaws.com/' . $s3bucket . '/'.$imgname_md,
                    'imgname_thumb' => $imgname_thumb,
                    'imgpath_thumb' => 'https://s3.amazonaws.com/' . $s3bucket . '/'.$imgname_thumb,
                    'updated_at' => Carbon::now(),
                ]);
            $msg = 'Success';
            return $msg;

        }
        else {
            $msg = 'Not a Tiff';
            return $msg;
        }

    }




}
