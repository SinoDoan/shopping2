<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Slider;
use App\Traits\StorageImageTrait;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use DeleteModelTrait;
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderAddRequest $request)
    {

        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $dataImageSlider = $this->StorageTraitUpload($request, 'image_path', 'slider');
        if(!empty($dataImageSlider)){
            $dataInsert['image_name'] = $dataImageSlider['file_name'];
            $dataInsert['image_path'] = $dataImageSlider['file_path'];
        }
        $this->slider->create($dataInsert);
        return redirect()->route('slider.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
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
        $dataUpdate = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $dataUpdateImageSlider = $this->StorageTraitUpload($request, 'image_path', 'slider');
        if(!empty($dataImageSlider)){
            $dataUpdate['image_name'] = $dataUpdateImageSlider['file_name'];
            $dataUpdate['image_path'] = $dataUpdateImageSlider['file_path'];
        }
        $this->slider->find($id)->update($dataUpdate);
        return redirect()->route('slider.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete( $id)
    {
        return $this->DeleteModel($id, $this->slider);
    }
    public function destroy($id)
    {
        //
    }
}
