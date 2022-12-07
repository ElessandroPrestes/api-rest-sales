<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
     public function index()
    {
        $sales = Sale::all();

        return response(['sales' => new SaleResource($sales), 'message' => 'Retrieved successfully'], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validated = Validator::make($data, [
            'name_company' => 'required|max:255',
            'cnpj' => 'required|max:255',
            'address' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            return response(['error' => $validated->errors(), 'Validation Error']);
        }

        $company = Company::create($data);

        return response(['companies' => new CompanyResource($company), 'message' => 'Created successfully'], 201);
    }
}

