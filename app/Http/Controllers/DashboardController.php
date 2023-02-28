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
        $bcat = BusinessCategory::withcount('businesses')->latest()->take(12)->get();
        $famcat = BusinessCategory::withcount('businesses')->orderBy('businesses_count', 'desc')->take(6)->get();
        // dd($bcat);
        $populer_categories = BusinessCategory::withcount('businesses')->get();
        // $areas = AreaWeServe::withcount('Areabusinesses')->latest()->limit(4)->get();
        $areas = AreaWeServe::groupBy('area')
        ->selectRaw('count(*) as count, area')->get();
        $states = State::withcount('cities')
        ->get();
        // dd($states);

        // $arecount = AreaWeServe::withcount('Areabusinesses')->get();
        // dd($areas);
        return view('FrontEnd.index', compact('business','bcat', 'areas','states','famcat'));
    }
    public function cities(Request $request, $name)
    {
    //     $id = [ 6, 9];
    //    $business = Business::whereIn('id', $id)->get();
    //     dd($business);

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
        $query = Business::query();
        if($request->ajax()){

        }
        $business = $query->get();
    }
    public function contact()
    {
        return view('FrontEnd.contact');
    }
    public function listing()
    {
        $business = Business::latest()->paginate(5);
        $businessCategory = BusinessCategory::all();
        $areas = AreaWeServe::select('area')
        ->distinct()
        ->get();
        return view('FrontEnd.listing', compact('business', 'businessCategory','areas'));
    }
    public function search(Request $request){
        // Get the search value from the request
        // dd($request->location);

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
