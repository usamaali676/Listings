<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\AreaWeServe;
use App\Models\OpeningHours;
use App\Models\BusinessGallery;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Geocoder\Query\GeocodeQuery;


class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Business::latest()->paginate(3);
        return view('business.index', compact('business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bcat = BusinessCategory::all();
        $state = State::all();
        return view('business.add', compact('bcat', 'state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $addresult = Geocoder::geocode('Los Angeles, CA');
        dd($addresult);
        $coordinates = $addresult->getCoordinates();
        $lat = $coordinates->getLatitude();
        $long = $coordinates->getLongitude();
        dd($lat , $long);

        $request->validate([
            'slug' => 'required|unique:businesses',
            'name'=> 'required',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'map' => 'required',
            'logo' => 'required',
            'feature' => 'required',
        ]);
        // $buss = Business::insert([

        // ]);
        $business = new Business();

        $business->name = $request->name;
         $request->slug = preg_replace('/\s+/', '-', $request->slug);
        $business->slug = $request->slug;
        if($request->hasFile('logo'))
        {
            $img_file = $request->file('logo');
            $business->logo=fts_upload_img($img_file,'logo');
        }
        $business->address = $request->address;
        $addresult = app('geocoder')->geocode($business->address)->get();
        $coordinates = $addresult[0]->getCoordinates();
        $lat = $coordinates->getLatitude();
        $long = $coordinates->getLongitude();
        dd($lat , $long);
        $business->description = $request->description;
        $business->phone = $request->phone;
        $business->website = $request->website;
        $business->email = $request->email;
        $business->sms = $request->sms;
        $business->gmb = $request->gmb;
        $business->whatsapp = $request->whatsapp;
        $business->fb = $request->fb;
        $business->inst = $request->inst;
        $business->youtube = $request->youtube;
        $business->area_status = $request->area_status ? 1 : 0 ?? 0;
        $business->timing_status = $request->timing_status ? 1 : 0 ?? 0;
        $business->yelp = $request->yelp;
        if($request->hasFile('feature'))
        {
            $img_file = $request->file('feature');
            $business->featureImage=fts_upload_img($img_file,'feature');
        }
        $business->map= $request->map;
        $business->save();
        $business->cat()->attach($request->cat_id);


        if($request->has('area_status'))
        {
            if(isset($request->areaserve) and sizeof($request->areaserve)>0)
            {
                foreach ($request->areaserve as $key => $v)
                {
                    $area['business_id']=$business->id;
                    $area['area']= $v;
                    $area['state_id'] = $request->state_id[$key];
                    AreaWeServe::create($area);
                }
            }
        }


        if($request->has('timing_status'))
        {
            foreach ($request->day as $key => $v)
            {
                $day['business_id'] = $business->id;
                $day['day'] = $v;
                $day['open_hour'] = $request->opening[$key];
                $day['close_hour'] = $request->closing[$key];
                OpeningHours::create($day);
            }
        }



        if(isset($request->images) and sizeof($request->images)>0)
        {
            foreach ($request->file('images') as $key =>$v)
            {
                $gallery['images']=fts_upload_img($v, 'gallery_images');
                $gallery['business_id']=  $business->id;
                BusinessGallery::create($gallery);
            }
        }

        Alert::success('Success', 'Business Added Successfully');
        return redirect()->route('business.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    public function single($slug)
    {
        $id = Business::where('slug', $slug)->value('id');
        $business = Business::where('id', $id)->first();
        $relatedbusiness = $business->cat()->first()->businesses()->where('business_id', '!=', $business->id)->take(4)->get();
        return view('FrontEnd.business', compact('business','relatedbusiness'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::where('id', $id)->first();
        // dd($business->area);
        $category = $business->cat;
        $bcat = BusinessCategory::all();
        // $selectedstate = State::where('id', $business->areas->state_id)->first();
        $states = State::all();
        return view('business.edit', compact('business', 'bcat', 'category', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'slug' => 'required|unique:businesses,slug,'.$id,
            'name'=> 'required',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'map' => 'required',
        ]);
        $input['name']= $request->name;
        $request->slug = preg_replace('/\s+/', '-', $request->slug);
        $input['slug']= $request->slug;
        $input['address'] = $request->address;
        $input['description'] = $request->description;
        $input['phone'] = $request->phone;
        $input['website'] = $request->website;
        $input['email'] = $request->email;
        $input['sms'] = $request->sms;
        $input['gmb'] = $request->gmb;
        $input['whatsapp'] = $request->whatsapp;
        $input['fb'] = $request->fb;
        $input['inst'] = $request->inst;
        $input['area_status'] = $request->area_status ? 1 : 0 ?? 0;
        $input['timing_status'] = $request->timing_status ? 1 : 0 ?? 0;
        $input['youtube'] = $request->youtube;
        $input['status'] = 1;
        if($request->hasFile('logo'))
        {
            $img_file = $request->file('logo');
            $input['logo']=fts_upload_img($img_file,'logo');
        }
        if($request->hasFile('feature'))
        {
            $img_file = $request->file('feature');
            $input['featureImage']=fts_upload_img($img_file,'feature');
        }
        $input['yelp'] = $request->yelp;
        $input['map']= $request->map;
        Business::where('id', $id)->update($input);
        $business = Business::find($id);
        $business->cat()->sync($request->cat_id);

        $bussiness_id= $id;
        if(isset($bussiness_id))
        {



            // dd($existarea);

            if($request->has('area_status'))
            {

                if(isset($request->areaserve))
                {
                    // dd("working");
                    if(count($request->areaserve)>0)
                    {
                        foreach ($request->areaserve as $key => $value) {

                            $area['area']=$value;
                            $area['business_id']=$business->id;
                            $area['state_id']= $request->state_id[$key];
                            if($request->area_id[$key] != NULL){
                                AreaWeServe::where('id', $request->area_id[$key])->update($area);
                            }else{
                                AreaWeServe::create($area);
                            }
                        }
                    }
                }
            }








            if($request->has('timing_status')){
                if(count($request->day)>0)
                {
                    foreach ($request->day as $key => $v)
                    {
                        if(isset($v))
                        {
                            $day['business_id'] = $business->id;
                            $day['day'] = $v;
                            // $day['status'] = $request->status;
                            $day['open_hour'] = $request->opening[$key];
                            $day['close_hour'] = $request->closing[$key];
                            if($request->day_id[$key] != NULL)
                            {
                                OpeningHours::where('id',$request->day_id[$key])->update($day);
                            }
                            else
                            {
                                OpeningHours::create($day);
                            }
                        }

                    }
                }
            }
            // else{
            //     foreach ($request->day as $key => $v)
            // {
            //     $day['business_id'] = $business->id;
            //     $day['day'] = $v;
            //     $day['open_hour'] = $request->opening[$key];
            //     $day['close_hour'] = $request->closing[$key];
            //     OpeningHours::create($day);
            // }
            // }



            if(isset($request->images) and sizeof($request->images)>0)
            {
                foreach ($request->file('images') as $key =>$v)
                {
                    $gallery['images']=fts_upload_img($v,'gallery_images');
                    $gallery['business_id']=$business->id;
                    $img_id = $request->img_id;
                    $old_data=BusinessGallery::where('id',$img_id[$key])->get();
                        if(isset($old_data) and sizeof($old_data)>0)
                        {
                    BusinessGallery::where('id',$img_id[$key])->update($gallery);
                        }
                        else
                        {
                            BusinessGallery::create($gallery);
                        }


                }

            }



        }





        Alert::success('Success');
        return redirect()->route('business.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $bussiness_id =  $id;
    //    dd($bussiness_id);

       $area = AreaWeServe::where('business_id', $bussiness_id)->get();
       if(isset($area) and sizeof($area) > 0)
       {
        AreaWeServe::where('business_id', $bussiness_id)->delete();
       }

       $opening_areas = OpeningHours::where('business_id', $bussiness_id)->get();
       if (isset($opening_areas) and sizeof($opening_areas)>0){
            OpeningHours::where('business_id', $bussiness_id)->delete();
       }

       // Area We Serve


       $business_gallery = BusinessGallery::where('business_id', $bussiness_id)->get();
       if(isset($business_gallery) and sizeof($business_gallery)>0){
        BusinessGallery::where('business_id', $bussiness_id)->delete();
        foreach ($business_gallery as $key => $v)
        {
            delete_img($v->images,'gallery_images');
        }

       }

       Business::where('id', $bussiness_id)->delete();
       Alert::success('Success', "Business  deleted successfully");
       return redirect()->route('business.index');

    }

    public function destroyarea($id){
        $area = AreaWeServe::find($id);
        $area->delete();
        return redirect()->back();
    }
}
