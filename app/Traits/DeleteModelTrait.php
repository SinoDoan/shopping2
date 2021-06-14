<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait DeleteModelTrait{
    public function DeleteModel($id, $model){
        try{
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success',
            ], 200);
        }
        catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
