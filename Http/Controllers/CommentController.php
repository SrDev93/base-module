<?php

namespace Modules\Base\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Base\Entities\Comment;
use Modules\Shop\Entities\Product;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $items = Comment::whereNull('parent_id')->latest()->get();

        return view('base::comment.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('base::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $parent = Comment::find($request->parent_id);
            $comment = Comment::create([
                'comments_type' => $parent->comments_type,
                'comments_id' => $parent->comments_id,
                'parent_id' => $request->parent_id,
                'user_id' => Auth::id(),
                'name' => Auth::user()->name,
                'text' => $request->message,
                'status' => 1
            ]);

            return redirect()->back()->with('flash_message', 'با موفقیت ثبت شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('base::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('base::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $item = Comment::findOrFail($id);

        try {
            $item->delete();

            return redirect()->back()->with('flash_message', 'با موفقیت انجام شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    public function status($id)
    {
        $item = Comment::findOrFail($id);

        try {
            $item->status = !$item->status;
            $item->save();

            if ($item->comments_type == 'Modules\Shop\Entities\Product'){
                $product = Product::find($item->comments_id);
                if ($product){
                    $product->rating = $product->comment()->avg('rate')?$product->comment()->avg('rate'):0;
                    $product->save();
                }
            }

            return redirect()->back()->with('flash_message', 'با موفقیت انجام شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }
}
