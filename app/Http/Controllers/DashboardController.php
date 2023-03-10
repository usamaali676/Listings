<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\BusinessCategory;
use phpDocumentor\Reflection\Location;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\AreaWeServe;
use App\Models\State;

class DashboardController extends Controller
{
    public function index()
    {
        $business = Business::all();
        $bcat = BusinessCategory::withcount('businesses')->orderBy('businesses_count', 'desc')->take(12)->get();
        $famcat = BusinessCategory::withcount('businesses')->orderBy('businesses_count', 'desc')->take(6)->get();
        $populer_categories = BusinessCategory::withcount('businesses')->get();
        $areas = AreaWeServe::groupBy('area')
        ->selectRaw('count(*) as count, area')->get();
        $states = State::withcount('cities')
        ->get();

        return view('FrontEnd.index', compact('business','bcat', 'areas','states','famcat'));
    }
    public function cities(Request $request, $name)
    {


        $state = State::where('name', $name)->first();
        $cities = AreaWeServe::where('state_id', $state->id)
        ->select('area')
        ->distinct()
        ->get();
        $business = Business::latest()->paginate();
        if($request->ajax()){
            $areas = AreaWeServe::where('area', $request->city)->get()->pluck('business_id');
            $busines = Business::whereIn('id', $areas)->get();
           return response()->json(['business' => $busines]);
        }

        return view('FrontEnd.cities', compact('cities', 'state','business'));
    }
    public function filter(Request $request)
    {


        if($request->ajax()){
            $cat_id = BusinessCategory::where('name', $request->category)->pluck('id');
            $business = Business::whereHas('cat', function ($query) use($cat_id){
                $query->where('cat_id', $cat_id);
            })->with('cat')->get();
            return response()->json(['business' => $business]);
        }
    }
    public function contact()
    {
        return view('FrontEnd.contact');
    }
    public function listing()
    {
        $business = Business::latest()->paginate(6);
        $businessCategory = BusinessCategory::all();
        $areas = AreaWeServe::select('area')
        ->distinct()
        ->get();
        return view('FrontEnd.listing', compact('business', 'businessCategory','areas'));
    }
    public function search(Request $request){


        $search = $request->input('search');
        $catsearch = $request->input('category');
        $location = $request->input('location') ;

        // Search in the title and body columns from the posts table
        $searchbusiness = Business::query()

             ->where('name', 'LIKE', "%{$search}%")
             ->where('address', 'LIKE', "{$location}")
             ->orwhereHas('cat', fn ($query) => $query->where('name',  'LIKE', "%{$catsearch}%"))
            ->get();
        // Return the search view with the resluts compacted
        $businessCategory = BusinessCategory::all();
        return view("FrontEnd.search", compact('searchbusiness','businessCategory','search','catsearch','location'));
    }
    public function SingleCategory($slug)
    {
        $id = BusinessCategory::where('slug', $slug)->value('id');
        $category = BusinessCategory::with('businesses')->find($id);
        // dd($category);
        return view('FrontEnd.category', compact('category'));
    }
    public function test(Request $request)
    {
        if($request->ajax()){
        $busines = Business::all();
        return response()->json(['business' => $busines]);
        }
        return view('FrontEnd.map');
    }

}
