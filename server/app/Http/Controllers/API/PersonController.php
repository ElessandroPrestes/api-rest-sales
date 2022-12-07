<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Models\Person;
use App\Models\Sale;

class PersonController extends Controller
{
     public function index()
    {
        
        $person = Person::all();
        return response(['persons' => new PersonResourceCollection($person),
                         'message' => 'Retrieved successfully'],
                          200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validated = Validator::make($data, [
            'name' => 'required|max:255',
            'cpf' => 'required|unique:persons|max:16',
            'cep' => 'required|max:10',
            'public_area' => 'required|max:255',
            'number' => 'required|max:255',
            'district' => 'required|max:255',
            'complement' => 'required|max:255',
            'city' => 'required|max:255',
            'birth_date' => 'required'
        ]);

        if ($validated->fails()) {
            return response(['error' => $validated->errors(), 'Validation Error']);
        }
       
        $persons = Person::create($data);

        return response(['persons' => new PersonResource($persons), 'message' => 'Created successfully'], 201);
    }

    public function show(Person $person)
    {
        return response(['persons' => new PersonResource($person), 'message' => 'Retrieved successfully'], 200);
    }

    public function update(Request $request, Person $person)
    {
        $person->update($request->all());

        return response(['persons' => new PersonResource($person), 'message' => 'Updated successfully'], 200);
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return response(['message' => 'Deleted'], 202);
    }

}
