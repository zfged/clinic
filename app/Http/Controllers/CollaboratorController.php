<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Collaborator;
use App\Http\Resources\Collaborator as CollaboratorResource;

class CollaboratorController extends BaseController
{

    public function index()
    {
        $collaborator = Collaborator::all();
        return $this->sendResponse(CollaboratorResource::collection($collaborator), 'Collaborator get.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'birth' => 'required',
            'bio' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors(),[],500);
        }

        $collaborator = Collaborator::create($input);

        return $this->sendResponse(new CollaboratorResource($collaborator), 'Post created.');
    }

    public function update(Request $request, Collaborator $service)
    {
//        var_dump($input);
        exit();
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'birth' => 'required',
            'bio' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors(),[],500);
        }

        $collaborator->name = $input['name'];
        $collaborator->birth = $input['birth'];
        $collaborator->bio = $input['bio'];
        $collaborator->save();

        return $this->sendResponse(new CollaboratorResource($collaborator), 'Post updated.');
    }

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
