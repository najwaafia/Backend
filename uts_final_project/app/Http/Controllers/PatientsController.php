<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientsModel;

class PatietnsController extends Controller
{
    //Get All Patietns
    public function index()
    {
        $data = PatientsModel::all();

        return response()->json([
            'status' => 200,
            'message' => 'Data Patietns',
            'data' => $data
        ], 200);
    }

    //Get Patietns By ID
    public function show($id)
    {
        $data = PatientsModel::find($id);

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Patietns By ID',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Patietns By ID Not Found',
                'data' => null
            ], 404);
        }
    }

    //Create Patietns
    public function store(Request $request)
    {
        $data = new PatientsModel();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->status = $request->status;
        $data->in_date_at = $request->in_date_at;
        $data->out_date_at = $request->out_date_at;
        $data->save();

        return response()->json([
            'status' => 201,
            'message' => 'Data Patietns Created',
            'data' => $data
        ], 201);
    }

    //Update Patietns
    public function update(Request $request, $id)
    {
        $data = PatientsModel
            ::where('id', $id)
            ->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => $request->status,
                'in_date_at' => $request->in_date_at,
                'out_date_at' => $request->out_date_at
            ]);

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Patietns Updated',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Patietns Updated Not Found',
                'data' => null
            ], 404);
        }
    }

    //Delete Patietns
    public function destroy($id)
    {
        $data = PatientsModel::find($id);
        $data->delete();

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Patietns Deleted',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Patietns Deleted Not Found',
                'data' => null
            ], 404);
        }
    }

    //Search Patietns
    public function search($name)
    {
        $data = PatientsModel::where('name', 'like', '%' . $name . '%')->get();

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Patietns By Name',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Patietns By Name Not Found',
                'data' => null
            ], 404);
        }
    }

    //Get Patietns By Status
    public function status($status)
    {
        $data = PatientsModel::where('status', $status)->get();

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Patietns By Status',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Patietns By Status Not Found',
                'data' => null
            ], 404);
        }
    }
}
