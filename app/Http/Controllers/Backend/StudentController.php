<?php

namespace App\Http\Controllers\Backend;

use App\Chat;
use App\Files;
use App\Friend;
use App\Http\Controllers\Controller;
use App\Stage;
use App\Student;
use Illuminate\Http\Request;
use Auth;
use App\Level;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('role:superAdmin');

        return view('dashboard.student.index');
    }

    public function getAddEditRemoveColumnData()
    {
        $this->middleware('role:superAdmin');

        $students = DB::table('users')
            ->where('job_id' , 2)
            ->where('activated' , 1)
            ->select(['id', 'name', 'email','created_at', 'updated_at']);

        return Datatables::of($students)
            ->addColumn('action', function ($student) {
                return '<a href="'. route('students.show' , $student->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> view</a>'
                        .'<a href="'. url('students/destroy' , $student->id) .'" class="btn btn-xs btn-dark" style="margin-left: 20px"><i class="glyphicon glyphicon-edit"></i> Disable</a>'
                        .'<a href="' . route('chats.edit' , $student->id) . '" class="btn btn-xs btn-success" style="margin-left: 20px"><i class="glyphicon glyphicon-edit"></i> Send Message</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->editColumn('name', 'Name : {{$name}}')
            ->editColumn('email', 'E-mail : {{$email}}')
            ->removeColumn('updated_at')
            ->removeColumn('created_at')
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct()
    {
        $this->middleware('auth');
    }

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
        if($request) {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'middle_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'numeric'],
                'religion' => ['required', 'string'],
                'date_of_birthday' => ['required', 'date'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'unique:students'],
            ]);

            $password = substr($request['email'], 0, strpos($request['email'], '@')) . Str::random(5);

            $user = new User();
            $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->job_id = 2;
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

            if ($request->hasFile('student_picture')) {

                $avatar = $request->file('student_picture');

                $path_student_picture = 'uploads/students/' . $user->id . '/student_picture/';

                if (!Storage::exists($path_student_picture)) {
                    Storage::disk('public')->makeDirectory($path_student_picture);
                }

                $insert = new Files();
                $insert->user_id = $user->id;
                $insert->filetype_id = 3;
                $insert->file =$avatar->store($path_student_picture , 'public');
                $insert->save();

            }

            if ($request->hasFile('birth_certificate')) {

                $avatar = $request->file('birth_certificate');

                $path_birth_certificate = 'uploads/students/' . $user->id . '/birth_certificate/';

                if (!Storage::exists($path_birth_certificate)) {
                    Storage::disk('public')->makeDirectory($path_birth_certificate);
                }

                $insert = new Files();
                $insert->user_id = $user->id;
                $insert->filetype_id = 5;
                $insert->file =$avatar->store($path_birth_certificate , 'public');
                $insert->save();

            }

            return redirect('home');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->middleware('role:superAdmin');

        $user = User::findOrFail($id);
            $files = Files::where('user_id', $id)->paginate();
            return view('dashboard.student.show', compact('user', 'files'));

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
        $this->middleware('role:superAdmin');

        User::where('id', $id)->update(['activated' => -1]);
            return back()->with('status', 'Student Disabled Successfully !!');

    }

    public function enable($id)
    {
        $this->middleware('role:superAdmin');

        User::where('id', $id)->update(['activated' => 1]);
            return back()->with('status', 'Student Enabled Successfully !!');

    }

   public function getLevels($id){
        if($id){
            return Level::where('stage_id' , $id)->paginate();

        }
   }

}
