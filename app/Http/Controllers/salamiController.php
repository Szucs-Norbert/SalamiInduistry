<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Salami;
use App\Http\Resources\Salami as SalamiResources;

class SalamisController extends BaseController
{
    public function index() {
        $Salami = Salami::all();
        return $this -> sendResponse(SalamiResources::collection($Salami),"Posztok letöltve");
    }
    public function store(Request $request){;
        $input = $request->all();
        $validator = Validator::make($input,[
            "Name" => "required",
            "Price" => "required",
            "Production time" => "required",
            "iid" => "required",
            
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $Salami = Salami::create($input);

        return $this->sendResponse(new SalamiResources($Salami),"Szalámi kiírva");
    }
    public function show($id){
        $Salami = Salami::find($id);
        if(is_null($Salami)){
            return $this->senError("Nincs ilyen szalámi");
        }
        return $this->sendResponse(new SalamiResources($Salami),"Szalámi betöltve");
    }
    public function update(Request $request, Salami $Salami){
        $input = $request -> all();
        $validator = validator::make($input,[
            "Name" => "required",
            "Price" => "required",
            "Production time" => "required",
            "iid" => "required",
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        
        $Salami -> Name = $input["name"];
        $Salami -> Price = $input["price"];
        $Salami -> Production_time = $input["Production time"];
        $Salami -> iid = $input["iid"];
        $Salami -> save();

        return $this->sendResponse(new SalamiResources($Salami),"Szalámi módosítva");
    }
    public function destroy($id){
        Salami::destroy($id);
        return $this->sendResponse([],"Szalámi törölve");
    }

    public function salamitsearch( $salami_name) {

        return Salami::where( "salami_name", "like", "%".$salami_name."%" )->get();
    }



}
