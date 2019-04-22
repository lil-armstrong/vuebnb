<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing as Listing;

class ListingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Listing::all()->toArray();
        foreach($model as $key=>$value){
            $id = $model[$key]["id"];

            // //  // Set image path 
            $this->setImageUrl($model[$key], $id);
            $this->setListingFeature($model[$key]);
        }
        // return response()->json($model);
        return view("pages.index")->with(['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        $id = $listing->id;
        $model = $listing->toArray();

        // Set image path 
        $this->setImageUrl($model, $id);
        $this->setListingFeature($model);
        
        /*Set response array*/
        $param = ['model'=>$model];
        
        /*Return response model array*/
        return view('pages.list')->with($param);
    }

    private function setListingFeature(&$model){
        foreach ($model as $key => $value) {

            // Setting up amenity array
            if(preg_match('/^amenity_/', $key)){
                // Convert key to array
                $exploded_key = (explode('_', $key));
                // Pop first array item
                array_shift($exploded_key);
                // Set filtered key
                $filtered_key = ucfirst(implode($exploded_key, " "));

                // Set amenity title and value
                $amenities[$key] =array(
                    "title"=> $filtered_key,
                    "value"=> $value,
                );
                // Set amenity icons
                switch($key){
                    case "amenity_wifi":
                    $amenities[$key]["icon"] = "fa-wifi";
                    break;
                    case "amenity_pets_allowed":
                    $amenities[$key]["icon"] = "fa-paw";
                    break;
                    case "amenity_tv":
                    $amenities[$key]["icon"] = "fa-tv";
                    break;
                    case "amenity_breakfast":
                    $amenities[$key]["icon"] = "fa-cutlery";
                    break;
                    case "amenity_kitchen":
                    $amenities[$key]["icon"] = "fa-coffee";
                    break;
                    case "amenity_laptop":
                    $amenities[$key]["icon"] = "fa-laptop";
                    break;
                } 
            }

            // Setting up prices array
            if(preg_match('/^price_/', $key)){
                // Convert key to array
                $exploded_key = (explode('_', $key));
                // Pop out first item
                array_shift($exploded_key);
                // Set the rest of the character and add spaces where necessary
                $filtered_key = ucfirst(implode($exploded_key, " "));
                // Settign up the title and value of price
                $prices[$key] =array(
                    "title"=> $filtered_key,
                    "value"=> $value
                );
            }            
        }
        /*Set the amenities and prices array*/
        $model['amenities'] = $amenities;
        $model['prices'] = $prices;
    }

    private function setImageUrl(&$model, $id){
        $model['url'] = route('listing.show', $id);
        $model["images"] = [];
        /*Images path : images/{id}/Image_{...}*/
        $img_path = "images/".$id.'/';
        /*Set all available images*/
        for ($i=1; $i<=4; ++$i){
            $img = 'Image_'.$i ;
            array_push($model["images"], [
                "file"=>$img,
                "url"=>asset($img_path . $img . '.jpg')
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
