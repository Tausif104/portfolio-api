<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Media;

class PortfolioController extends Controller
{
    // list of portfolio
    public function index()
    {
        return response()->json(Portfolio::with('category')->get(), 200);
    }

    // list by category
    public function getByCat($category)
    {
        $portfolios = Portfolio::where('category_id', $category)->get();
        return response()->json($portfolios);
    }

    // single view portfolio
    public function show($id)
    {
        $portfolio = Portfolio::with('media')->find($id);

        if ($portfolio) {
            return $portfolio;
        } else {
            return response()->json(['message' => 'Portfolio Not found'], 404);
        }
    }

    // store portfolio
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'portfolio_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'templates' => 'required|array',
            'templates.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $filePath = null;

        if ($request->hasFile('portfolio_image')) {
            $file = $request->file('portfolio_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/portfolio', $fileName);
        }


        $data = $request->only('title', 'description', 'category_id');

        $data['image_url'] = $filePath;

        $portfolio = new Portfolio();

        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        $portfolio->category_id = $request->input('category_id');
        $portfolio->image_url = $filePath;
        $portfolio->save();

        if ($request->hasFile('templates')) {
            foreach ($request->file('templates') as $template) {
                $fileName = time() . '_' . $template->getClientOriginalName();
                $filePath = $template->storeAs('public/templates', $fileName);
                $media = new Media();
                $media->portfolio_id = $portfolio->id;
                $media->media_url = $filePath;
                $media->save();
            }
        }

        return Portfolio::with('media')->find($portfolio->id);
    }
}
