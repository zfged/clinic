<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Address;
use App\Http\Resources\User as UserResource;
   
class UserController extends BaseController
{
    public function index()
    {
        $users = User::with('address','centers.address')->get();
        return $this->sendResponse(UserResource::collection($users), 'Users get.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors(),[],500);       
        }
        $address_id = Address::create($input['address'])->id;
        $input['address_id'] = $address_id;
        $user = User::create($input);
        
        return $this->sendResponse(new UserResource($user), 'Post created.');
    }
   
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError('Post does not exist.',[],500);
        }
        return $this->sendResponse(new UserResource($user), 'Post fetched.');
    }
    
    public function update(Request $request, User $user)
    {
        
        $input = $request->all();
        return $this->sendResponse($input,'123');
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors(),[],500);       
        }

        $address = Address::find($input['address']['id']);
        if($address){
            $address['city'] = $input['address']['id'];
            $address['number'] = $input['address']['number'];
            $address['street'] = $input['address']['street'];
            $address['zipCode']  =$input['address']['zipCode'];
            $address->save();
        }else{
           $address_id =  Address::create($input['address'])->id;
           $user->address_id = $address_id;
        }

        $user->birthday = $input['birthday'];
        $user->email = $input['email'];
        $user->name = $input['name'];
        $user->patronymic = $input['patronymic'];
        $user->phone = $input['phone'];
        $user->secondName = $input['secondName'];
        $user->save();
        
        return $this->sendResponse(new UserResource($user), 'Post updated.');
    }
   
    public function destroy(User $user)
    {
        $user->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}