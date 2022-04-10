<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Validator;
use App\Models\Service;
use App\Http\Resources\Service as ServiceResource;
   
class ServicesController extends BaseController
{
    public function index()
    {
        $services = Service::all();
        return $this->sendResponse(ServiceResource::collection($services), 'Service get.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'during' => 'required',
            'cost' => 'required',
            'color' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors(),[],500);       
        }
    
        $service = Service::create($input);
        
        return $this->sendResponse(new ServiceResource($service), 'Post created.');
    }
    
    public function update(Request $request, Service $service)
    {
        var_dump($input);
        exit();
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'during' => 'required',
            'cost' => 'required',
            'color' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors(),[],500);       
        }
    
        $service->name = $input['name'];
        $service->during = $input['during'];
        $service->cost = $input['cost'];
        $service->color = $input['color'];
        $service->save();
        
        return $this->sendResponse(new ServiceResource($service), 'Post updated.');
    }
   
    public function destroy(Service $service)
    {
        $service->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}