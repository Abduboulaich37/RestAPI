<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class ApiController extends Controller
{
    public function create(Request $request)
    {
        $students = new Students();

        $students->email = $request->input('email');
        $students->idea = $request->input('idea');
        $students->state = 0;

        $students->save();
        return response()->json($students);
    }

    public function check_email(Request $request)
    {
        $idea = Students::where('email', $request->email)->first();
        if ($idea) {
            return response()->json('this email is exist');
        }

        $students = new Students();
        $students->email = $request->input('email');
        $students->idea = $request->input('idea');
        $students->state = 0;
        $students->save();
        return response()->json($students);
    }

    public function IdOrder() 
    {
        $studentsid = Students::select('id')->get();
        return response()->json($studentsid);
    }

    public function EditIdea($id) {
        $students = Students::where('id' , 'like', '%' .$id. '%')->first();
        return response()->json($students);
    }

    public function UpdateIdea(Request $req , $id) {

        $students = Students::where('id' , 'like', '%' .$id. '%')->first();
        $students->idea = $req->input('idea');
        $students->save();
        return response()->json('The modification has been changed');
    }

    public function AllIdeas() {

        $studentsideas = Students::select('idea')->get();
        return response()->json($studentsideas);
    }

    public function AcceptIdea(Request $req, $id ) {
        $students = Students::where('id' , 'like', '%' .$id. '%')->first();

        if($req->input('state') == '1'){
            $students->state = $req->input('state');
            $students->save();
            return response()->json('accepted idea');
            
        }
        if ($req->input('state') == '0') {
            $students->state = $req->input('state');
            $students->save();
            return response()->json('refuesed idea');
        }

        
    }

    public function AcceptedIdeas() {

        $studentsAcceptedIdeas = Students::where('state', 'like', '1')->get('idea');
        return response()->json($studentsAcceptedIdeas);
    }

    public function CountAcceptedIdeas() {

        $studentsCountAcceptedIdeas = Students::where('state', 'like', '1')->get('idea')->count();
        return response()->json($studentsCountAcceptedIdeas);
    }

    public function DeleteRefusedIdeas() {

        $studentsDeleteRefusedIdeas = Students::where('state', 'like', '0')->delete();
        return response()->json('You delete all refused ideas');
    }




}
