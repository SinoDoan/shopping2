<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait {
    public function StorageTraitUpload(Request $request, $fieldName, $folderName){
        if ($request->hasFile($fieldName)){
            $file = $request->file($fieldName);
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str::random(20). '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' =>  Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    public function StorageTraitUploadMutiple($file, $folderName){
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str::random(20). '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' =>  Storage::url($filePath)
            ];
            return $dataUploadTrait;
    }
}
