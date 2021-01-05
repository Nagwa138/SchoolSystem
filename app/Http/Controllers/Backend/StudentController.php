<?php

namespace App\Http\Controllers\Backend;

use App\Files;
use App\Http\Controllers\Controller;
use App\Stage;
use App\Student;
use Illuminate\Http\Request;
use Auth;
use App\Level;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $number_of_children = Auth::user()->parent->number_of_children;
        $students = Student::where('parent_id' , Auth::user()->parent->id)->count();

        if($number_of_children > $students) {
            $stages = Stage::all();
            $levels = Level::all();
            return view('dashboard.student.create' , compact('stages' , 'levels'));
        } else {
            return redirect('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'numeric'],
            'religion' => ['required', 'string'],
            'date_of_birthday' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users' , 'unique:students'],
        ]);

        $password = substr($request['email'], 0,strpos($request['email'], '@')) . Str::random(5);

        $user = new User();
        $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name ;
        $user->email = $request->email;
        $user->job_id = 2 ;
        $user->password = Hash::make($password);
        $user->save();

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $student->notes = $request->notes;
        $student->parent_id = Auth::user()->parent->id;
        $student->level_id = $request->level;
        $student->date_of_birthday = $request->date_of_birthday;
        $student->religion = $request->religion;
        $student->user_id = $user->id;
        $student->email = $request->email;
        $student->save();

        if($request->hasFile('student_picture'))
        {

            $path_student_picture = 'uploads/students/' . $user->id .'/student_picture/' ;
            if (!file_exists($path_student_picture)) {
                mkdir($path_student_picture , 0777, true);
            }

            //Storage::disk('public_uploads')->delete('parents/' . $user->id .'/'. User::);
            $file_extention_student_picture = $request->file('student_picture')->getClientOriginalExtension();

            $student_picture = time() . "." .$file_extention_student_picture;
            $request->file('student_picture')->move($path_student_picture, $student_picture);

            $student_picture_insert = new Files();
            $student_picture_insert->user_id = $user->id;
            $student_picture_insert->filetype_id = 3;
            $student_picture_insert->file =$student_picture;
            $student_picture_insert->save();

        }

        if($request->hasFile('birth_certificate'))
        {

            $path_birth_certificate = 'uploads/students/' . $user->id .'/birth_certificate/' ;
            if (!file_exists($path_birth_certificate)) {
                mkdir($path_birth_certificate , 0777, true);
            }

            //Storage::disk('public_uploads')->delete('parents/' . $user->id .'/'. User::);
            $file_extention_student_birth_certificate = $request->file('birth_certificate')->getClientOriginalExtension();

            $student_birth_certificate = time() . "." .$file_extention_student_birth_certificate;
            $request->file('birth_certificate')->move($path_birth_certificate, $student_birth_certificate);

            $student_birth_certificate_insert = new Files();
            $student_birth_certificate_insert->user_id = $user->id;
            $student_birth_certificate_insert->filetype_id = 5;
            $student_birth_certificate_insert->file =$student_birth_certificate;
            $student_birth_certificate_insert->save();

        }


        return redirect('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   public function getLevels($id){
        return Level::where('stage_id' , $id)->paginate();
   }

}
