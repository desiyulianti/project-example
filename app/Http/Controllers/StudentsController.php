<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{

     // read data 
     public function show(){
        return Students::all();
    }

    public function detail($name){
       //if(student::where('id_student', $id)->exists()) {
        $data = Students::where('student.name_student', 'LIKE', '%'. $name. '%')
        ->get();
        return Response()->json($data);
    //}
    
   // else {
        //return Response()->json(['message' => 'not found' ]);
    //}
    }
    // create data 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'name_student' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'id_lessons' => 'required'
        ]);

        if($validator -> fails()){
            return Response() -> json($validator -> errors());
        }

        $store = Students::create([
            'name_student' => $request->name_student,
            'gender' => $request->gender,
            'address' => $request->address,
            'id_lessons' => $request->id_lessons
        ]);

        $data = Students::where('name_student', '=', $request->name_student)->get();
        if($store){
            return Response() -> json([
                'status' => 1,
                'message' => 'Succes create new data!',
                'data' => $data
            ]);
        } else 
        {
            return Response() -> json([
                'status' => 0,
                'message' => 'Failed create new data!'
            ]);
        }
    }
  
  

    // update data 
    public function update($id, Request $request ){
        $validator = Validator::make($request->all(),
        [
            'name_student' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'id_lessons' => 'required'
        ]);

        if($validator -> fails()){
            return Response()->json($validator->errors());
        }

        $update=DB::table('student')
        ->where('id_student', '=', $id)
        ->update(
            [
                'name_student' => $request->name_student,
                'gender' => $request->gender,
                'address' => $request->address,
                'id_lessons' => $request->id_lessons
            ]
        );

        $data=Students::where('id_student', '=', $id) ->get();
        if($update){
            return Response() -> json([
                'status' => 1,
                'message' => 'Success updating data!',
                'data' => $data  
            ]);
        } else {
            return Response() -> json([
                'status' => 0,
                'message' => 'Failed updating data!'
            ]);
        }

    }


    //delete data 
    public function delete($id){
        $delete = DB::table('student')
        ->where('id_student', '=', $id)
        ->delete();

        if($delete){
            return Response() -> json([
                'status' => 1,
                'message' => 'Succes delete data!'
        ]);
        } else {
            return Response() -> json([
                'status' => 0,
                'message' => 'Failed delete data!'
        ]);
        }

    }
    

}