<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StorageImageTrait;
    use DeleteModelTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index()
    {
        $products = $this->product->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $products = $this->product->getProductSearch($request);
        return view('admin.product.index', compact('products'));

    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->StorageTraitUpload($request, 'feature_image_path', 'products');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            };
            $product = $this->product->create($dataProductCreate);

            //insert data to product_images
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->StorageTraitUploadMutiple($fileItem, 'products');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
            //insert tags product
            $tagIds = [];
            if(!empty($request->tags))
            {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate([
                        'name' => $tagItem,
                    ]);
                    $tagIds[] = $tagInstance->id;
                }

            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('messages: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }

    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->CategoryRecursive($parentId);
        return $htmlOption;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->StorageTraitUpload($request, 'feature_image_path', 'products');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            };
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            //insert data to product_images
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->StorageTraitUploadMutiple($fileItem, 'products');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
            //insert tags product
            $tagIds = [];
            if(!empty($request->tags))
            {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate([
                        'name' => $tagItem,
                    ]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);

            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('messages: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }
    public function delete($id)
    {
        return $this->DeleteModel($id, $this->product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

//product vs product_image là mối quan hệ 1-n one to many
