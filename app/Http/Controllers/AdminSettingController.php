<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->paginate(5);
        return  view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.setting.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingAddRequest $request)
    {
        $this->setting->create([
           'config_key' => $request->config_key,
           'config_value'=> $request->config_value,
            'type'=>$request->type,
        ]);
        return redirect()->route('setting.index');
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
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
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
        $this->setting->find($id)->update([
           'config_key' => $request->config_key,
            'config_value'=> $request->config_value,
        ]);
        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete( $id)
    {
        return $this->DeleteModel($id, $this->setting);
    }
    public function destroy($id)
    {
        //
    }
}
