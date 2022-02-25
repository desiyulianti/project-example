<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lessons;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{
    //create data 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_of_lessons' => 'required',

        ]);

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = Lessons::create([
            'type_of_lessons' => $request->type_of_lessons
        ]);

        $data = Lessons::where('type_of_lessons', '=', $request->type_of_lessons)->get();
        if ($store) {
            return Response()->json([
                'status' => 1,
                'message' => 'Succes create new data!',
                'data' => $data
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed create new data!'
            ]);
        }
    }


    // show data 
    public function show()
    {
        return Lessons::all();
    }

    public function detail($id)
    {
        if (DB::table('lessons')->where('id_lessons', $id)->exists()) {
            $detail_lessons = DB::table('lessons')
                ->select('lessons.*')
                ->where('id_lessons', $id)
                ->get();
            return Response()->json($detail_lessons);
        } else {
            return Response()->json(['message' => 'Couldnt find the data']);
        }
    }


    //update data 
    public function update($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'type_of_lessons' => 'required',

            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $update = DB::table('lessons')
            ->where('id_lessons', '=', $id)
            ->update([
                'type_of_lessons' => $request->type_of_lessons,
            ]);

        $data = Lessons::where('id_lessons', '=', $id)->get();
        if ($update) {
            return Response()->json([
                'status' => 1,
                'message' => 'Success updating data!',
                'data' => $data
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed updating data!'
            ]);
        }
    }


    //delete data 
    public function delete($id)
    {
        $delete = DB::table('lessons')
            ->where('id_lessons', '=', $id)
            ->delete();

        if ($delete) {
            return Response()->json([
                'status' => 1,
                'message' => 'Succes delete data!'
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed delete data!'
            ]);
        }
    }
}
