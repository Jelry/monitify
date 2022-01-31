<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\availability;
use App\Models\conrec;
use App\Models\creation_code;
use App\Models\subject;
use App\Models\weeklog;
use App\Models\logweek;
use App\Models\student;
use App\Models\studyante;
use App\Models\module;
use App\Models\log_sheet;
use App\Models\log_sheets_data;
class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function newpagetest()
    {
        return view('new_page_design');
    }
   function index()
    {
        $user = User :: all();
        $availableData = availability::all();
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'avail'=>availability::where('instructor_id','like','%'.session('LoggedUser').'%')->paginate(10)];
        return view('instructor/expe',$data);

       
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    function save(Request $request)
    {
        //validate
            $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'phone_number'=>'unique:users',
                'usertype'=>'required',
                'username'=>'required|unique:users',
                'password'=>'required|min:8|max:60'
            ]);

            if($request->usertype=='teacher')
            {
                $code = creation_code::where('code','=',$request->creation_code)->first();
                if($code)
                {
                           //insert
                $User =new User;

                //field store
                $User->name=$request->name;
                $User->usertype=$request->usertype;
                $User->email=$request->email;
                $User->phone_number=$request->phonenumber;
                $User->school=$request->School;
                $User->creation_code=$request->creation_code;
                $User->username=$request->username;
                $User->password=Hash::make($request->password);
                $User->grade_level='N/A';

                //save instance
                $save = $User->save();

                //return previous pge with msg
                return back()->with('success','Account Created!');
                   
                }
                else
                {
                    return back()->with('fail','code does not exist');
                }
            }
            else
            {
                $User =new User;
                $User->name=$request->name;
                $User->usertype=$request->usertype;
                $User->email=$request->email;
                $User->phone_number=$request->phonenumber;
                $User->school=$request->School;
                $User->creation_code='none';
                $User->username=$request->username;
                $User->password=Hash::make($request->password);
                $User->grade_level=$request->grade_level;
                $save = $User->save();
                return back()->with('success','Account Created!');
            }
       

        // if(!$save){
        //     return back()->with('fail','Username and email must be unique');
        // }
        // else{
            
        // }
    }
    function check(Request $request)
    {
        
        // validate
        // $defaultUserType='instructor';
        // $usertype = User :: where ('usertype','=',$defaultUserType);
        // ---------------------------------------
      
            $userInfo = User::where('username','=',$request->username)->first();
            if($userInfo)
            {   
                if(Hash::check($request->password, $userInfo->password))
                {
                
                    if($userInfo->usertype==$request->usertype)
                    {
                        $request->session()->put('LoggedUser',$userInfo->id);
                
                            return redirect('student');
                     
                    
                       
                    }
                    else
                    {
                        $request->session()->put('LoggedUser',$userInfo->id);
                    
                            return redirect('Instructor');
                     
                        
                    }
                
                }
                else
                {
                    //if mali ang password
                 return back()->with('fail','password doesnt exist');
     
                }
    
            }else
            {
               
             
                    return back()->with('fail','username doesnt exist');
                
                
            } 
        
      
        //----------------------------------------
        

     

    }

    function logout()
    {
     
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('/');
        }
        // if(session()->has('LoggedUseri'))
        // {
        //     session()->flush('LoggedUseri');
        //     return redirect('/auth/login');
        // }
    }
    public function idashboard(){
        
            
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
       
        $Uname = $LogUserI->id;
        $grade_level = subject::where('teacher_id','=',$Uname)->first();
        
        if($grade_level==null)
        {
            $g_d='';
        }
        else
        {
            $g_d = $grade_level->grade_level;
        }
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('teacher_id','like','%'.$Uname.'%')->orderBy('grade_level','asc')->paginate(8),'subjj'=>subject::where('teacher_id','like','%'.$Uname.'%')->orderBy('grade_level','asc')->get(),'week_id'=>logweek::where('teacher_id','like','%'.$Uname.'%')->get(),'log_sheet'=>log_sheet::where('teacher_id','like','%'.$Uname.'%')->orderBy('date_range_start','asc')->paginate(8),'student'=>studyante::where('grade_level','=',$g_d)->orderBy('gender','desc')->get()];

            return view('dashboardi',$data);
        }
        if($userdata->usertype=='student')
        {
            return back();
        }
    }
    function sdashboard(){
        
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return redirect('Instructor');
        }
        if($userdata->usertype=='student')
        {
        $grade_level_subjects=User::where('id','=',session('LoggedUser'))->first();
        $g_l_s=subject::where('grade_level','=',$grade_level_subjects->grade_level)->paginate(10);
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'avail'=>availability::orderBy('instructor_id','asc')->paginate(10),'gls'=>$g_l_s];

            return view('dashboards',$data);
        }
    }
    function avail(Request $request,$id,$logweek,$week_id)
    {   
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = $LogUserI->name;
        $a  = $LogUserI.$id;
        $mcc=0;
        $countBB=0;
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$id.'%')->first(),'week'=>weeklog::where('logweek_id','=',$logweek)->get(),'logweek'=>logweek::where('subject_id','=',$id)->orderBy('week_log')->get(),'week_id'=>$week_id,'studi'=>studyante::where('TS_tracker','=',$id)->orderBy('student_name','asc')->get(),'wekwew'=>weeklog::where('subject_id','=',$request->subject_id)->get(),'mc'=>$mcc,'ihap'=>$countBB];

        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return redirect('student');
        }
    }
    function wweek($id,$week_id)
    {   
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = $LogUserI->name;
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$id.'%')->first(),'week'=>weeklog::where('subject_id','like','%'.$id.'%')->get(),'weekk'=>weeklog::where('week','like','%'.$week_id.'%')->get()];

        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return redirect('student');
        }
    }
    function myreq()
    {
       
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'req'=>conrec::where('student_id','like','%'.session('LoggedUser').'%')->orderBy('status','asc')->paginate(8)];

       

        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail');
        }
        if($userdata->usertype=='student')
        {
            return view('myReq',$data);
        }
    }
    function requestform($id){

$data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'avail'=> availability::find($id)];


        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi');
        }
        if($userdata->usertype=='student')
        {
            return view('consultreq',$data);
        }
    }
    function home(){
      
        
               
            if(session()->has('LoggedUser'))
            {
                return back();
            }
            else{
                return view('welcome');
            }
            
    }


    function homesweet(){
        return view('welcome');
    }
    function asawhere(Request $request){
        $student_count=studyante::where('TS_tracker','=',$request->subject_id)->count();
        $claimeddd='claimed';
        $claim_count=weeklog::where('logweek_id','=',$request->week_id,'and','claim_status','like','%'.$claimeddd.'%')->count();
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "$LogUserI->id";
        $sample=1;
        $id='1111';
        $moduleCheck= module::where('logweek_id','=',$request->week_id)->first();
        if($moduleCheck)
        {
            $mmc=1;
        }
        else
        {
            $mmc=0;
        }
        $countBB=1;
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->week_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->week_id)->first(),'week_id'=>$Uname,'studi'=>studyante::where('TS_tracker','=',$request->subject_id)->orderBy('student_name','asc')->get(),'wekwew'=>weeklog::where('logweek_id','=',$request->week_id)->get(),'module'=>module::where('subject_id','=',$request->subject_id,'and','logweek_id','=',$request->week_id)->first(),'mc'=>$mmc,'student_count'=>$student_count,'ihap'=>$countBB,'claim_count'=>$claim_count];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        }
      
           
    }
    function about(){
        return view('bout');
    }
    function sAdd(Request $request){
       
        $student = new studyante;
        $student->student_name=$request->student_name;
        $student->TS_tracker=$request->TS_tracker;
        $id='1111';
        $student->save();

        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "-";
        $sample=1;
        $r=0;
        $mmc=0;
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->week_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->week_id)->first(),'week_id'=>$Uname,'studi'=>studyante::where('TS_tracker','like','%'.$request->TS_tracker.'%')->get(),'wekwew'=>weeklog::where('logweek_id','=',$r)->get(),'mc'=>$mmc,'ihap'=>$mmc];
        
       
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        }
    }

    function addweeklog (Request $request)
    {

        $wekwek = new logweek;
        $wekwek->subject_id=$request->subject_id;
        $wekwek->teacher_id=$request->teacher_id;
        $wekwek->week_log=$request->what_week;
        $wekwek->week_desc=$request->week_desc;
        $wekwek->date_range_start=$request->date_range_start;
        $wekwek->date_range_end=$request->date_range_end;
        $wekwek->save();
 
    
        
        
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "-";
        $id='1111';
        $sample=1;
        $mmc=0;
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->week_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->week_id)->first(),'week_id'=>$Uname,'studi'=>studyante::where('TS_tracker','like','%'.$id.'%')->get(),'mc'=>$mmc,'ihap'=>$mmc];
        
       
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        } 
    }
   
    function statusU (Request $request)
    {
       
          
                weeklog::where('student_id','=',$request->student_id,'and','logweek_id','=',$request->logweek_id)->update(['claim_status'=>'unclaimed']);
              
            
            
           
           
           
        
       
      

        
        $student_count=studyante::where('TS_tracker','=',$request->subject_id)->count();
        $claim_count=weeklog::where('logweek_id','=',$request->week_id,'and','claim_status','like','%'.'claimed'.'%')->count();
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "$LogUserI->id";
        $sample=1;
        $id='1111';
        $mmc=0;
        if(module::where('subject_id','=',$request->subject_id)->first())
        {
            $yy=1;  
        }
        else{
            $yy=0;
        }
        
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->logweek_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->logweek_id)->first(),'week_id'=>$Uname,'studi'=>studyante::where('TS_tracker','=',$request->subject_id)->orderBy('student_name','asc')->get(),'wekwew'=>weeklog::where('logweek_id','=',$request->logweek_id)->get(),'module'=>module::where('subject_id','=',$request->subject_id,'and','logweek_id','=',$request->logweek_id)->first(),'mc'=>$yy,'ihap'=>$sample,'claim_count'=>$claim_count,'student_count'=>$student_count];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        }
    }
    function statusC (Request $request)
    {
        $sub_id='-';
        $C_status='claimed';
        $S_status='uncomplied';
        $online='-';
        $post = weeklog::firstOrCreate(
            [
                'student_id'             => $request->student_id,
                'logweek_id'             => $request->logweek_id,
            ],
            [
                'sudent_id'            => $request->student_id,
                'logweek_id'             => $request->logweek_id,
                'subject_id'             => $sub_id,
                'claim_status'             => $C_status,
                'submission_status'             => $S_status,
                'online_claiming_status'             => $online,
                'online_submission_status'             => $online,
            ]
        );
          

        $check = weeklog::where('student_id','=',$request->student_id,'and','logweek_id','=',$request->logweek_id)->exists();
       
        if($check==true) 
        {
            $seck=weeklog::where('student_id','=',$request->student_id,'and','logweek_id','=',$request->logweek_id)->first();
            if($seck->claim_status='unclaimed')
            {
            weeklog::where('student_id','=',$request->student_id,'and','logweek_id','=',$request->logweek_id)->update(['claim_status'=>'claimed']);
            }
            else
            {
                
            }
            if($seck)
            {

            }
            else
            {
               
            }
         
           
           
            
                
            
               
        }
        else
        {
            
        }
           
              
            
            
           
           
           
        
       
      

        
        $student_count=studyante::where('TS_tracker','=',$request->subject_id)->count();
        $claim_count=weeklog::where('logweek_id','=',$request->week_id,'and','claim_status','like','%'.'claimed'.'%')->count();
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "$LogUserI->id";
        $sample=1;
        $id='1111';
        $mmc=0;
        if(module::where('subject_id','=',$request->subject_id)->first())
        {
            $yy=1;  
        }
        else{
            $yy=0;
        }
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->logweek_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->logweek_id)->first(),'week_id'=>$Uname,'studi'=>studyante::where('TS_tracker','=',$request->subject_id)->orderBy('student_name','asc')->get(),'wekwew'=>weeklog::where('logweek_id','=',$request->logweek_id)->get(),'module'=>module::where('subject_id','=',$request->subject_id,'and','logweek_id','=',$request->logweek_id)->first(),'mc'=>$yy,'ihap'=>$sample,'claim_count'=>$claim_count,'student_count'=>$student_count];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        }
    }
    function subC (Request $request)
    {
       
          

        $check = weeklog::where('student_id','=',$request->student_id)->first();

        if($check) 
        {
            weeklog::where('student_id','=',$request->student_id,'and','logweek_id','=',$request->logweek_id)->update(['submission_status'=>'complied']);
        }
        else
        {
           
        }
           
              
            
            
           
           
           
        
       
      

        
        $student_count=studyante::where('TS_tracker','=',$request->subject_id)->count();
        $claim_count=weeklog::where('logweek_id','=',$request->week_id,'and','claim_status','like','%'.'claimed'.'%')->count();
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "$LogUserI->id";
        $sample=1;
        $id='1111';
        $mmc=0;
        if(module::where('subject_id','=',$request->subject_id)->first())
        {
            $yy=1;  
        }
        else{
            $yy=0;
        }
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->logweek_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->logweek_id)->first(),'week_id'=>$Uname,'studi'=>studyante::where('TS_tracker','=',$request->subject_id)->orderBy('student_name','asc')->get(),'wekwew'=>weeklog::where('logweek_id','=',$request->logweek_id)->get(),'module'=>module::where('subject_id','=',$request->subject_id,'and','logweek_id','=',$request->logweek_id)->first(),'mc'=>$yy,'ihap'=>$sample,'claim_count'=>$claim_count,'student_count'=>$student_count];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        }
    }
    function subU (Request $request)
    {
       
          

        $check = weeklog::where('student_id','=',$request->student_id)->first();

        if($check) 
        {
            weeklog::where('student_id','=',$request->student_id,'and','logweek_id','=',$request->logweek_id)->update(['submission_status'=>'uncomplied']);
        }
        else
        {
           
        }
           
              
            
            
           
        $student_count=studyante::where('TS_tracker','=',$request->subject_id)->count();  
        $claim_count=weeklog::where('logweek_id','=',$request->week_id,'and','claim_status','like','%'.'claimed'.'%')->count();
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "$LogUserI->id";
        $sample=1;
        $id='1111';
        if(module::where('subject_id','=',$request->subject_id)->first())
        {
            $yy=1;  
        }
        else{
            $yy=0;
        }
        $mmc=0;
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->logweek_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->logweek_id)->first(),'week_id'=>$Uname,'studi'=>studyante::where('TS_tracker','=',$request->subject_id)->orderBy('student_name','asc')->get(),'wekwew'=>weeklog::where('logweek_id','=',$request->logweek_id)->get(),'module'=>module::where('subject_id','=',$request->subject_id,'and','logweek_id','=',$request->logweek_id)->first(),'mc'=>$yy,'ihap'=>$sample,'claim_count'=>$claim_count,'student_count'=>$student_count];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        }
    }
    function deleteStudent(Request $request,$student_id,$subject_id,$logweek_id)
    {
        $Data= studyante::where('id','like','%'.$student_id.'%','and','TS_tracker','like','%'.$subject_id.'%');
        $Data->delete();
     

        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "$LogUserI->id";
        $sample=1;
        $id='1111';
        $tempo='-';
        $mmc=0;
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->logweek_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->logweek_id)->first(),'week_id'=>$tempo,'studi'=>studyante::where('TS_tracker','=',$request->subject_id)->orderBy('student_name','asc')->get(),'wekwew'=>weeklog::where('logweek_id','=',$request->logweek_id)->get(),'mc'=>$mmc,'ihap'=>$mmc];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        }

    }
    function file_upload(Request $request)
    {

        
        
    
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $Uname = "$LogUserI->id";
        $sample=1;
        $id='1111';
        $tempo='-';
        $ih=0;
        $moduleCheck= module::where('subject_id','=',$request->subject_id)->first();
        if($moduleCheck)
        {
            $mmc=1;
            $moduleCheck2= module::where('logweek_id','=',$request->logweek_id)->first();
            if($moduleCheck2)
            {
                $file=$request->moduleFile;
                $filenem=time().'.'.$file->getClientOriginalExtension();
                $td=module::where('logweek_id','=',$request->logweek_id,'and','subject_id','=',$request->subject_id)->first();
                $ttd=$td->file;
                File::delete(public_path('public/'.$ttd));
                $todel= module::where('logweek_id','=',$request->logweek_id,'and','subject_id','=',$request->subject_id)->update(['file'=>$filenem]);
                $request->moduleFile->move('public/',$filenem);
            }
            else
            {
                $data = new module;
                $file=$request->moduleFile;
                $filename=time().'.'.$file->getClientOriginalExtension();
                $request->moduleFile->move('public/',$filename);
                $data->file=$filename;
                $data->subject_id=$request->subject_id;
                $data->logweek_id=$request->logweek_id;
                $data->save();
            }
        }
        else
        {
            $moduleCheck3= module::where('logweek_id','=',$request->logweek_id)->first();
            if($moduleCheck3)
            {}
            else
            {
                $data = new module;
                $file=$request->moduleFile;
                $filename=time().'.'.$file->getClientOriginalExtension();
                $request->moduleFile->move('public/',$filename);
                $data->file=$filename;
                $data->subject_id=$request->subject_id;
                $data->logweek_id=$request->logweek_id;
                $data->save();
            }
            $mmc=0;
        }
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('id','like','%'.$request->subject_id.'%')->first(),'week'=>weeklog::where('logweek_id','like','%'.$request->logweek_id.'%','and','subject_id','=',$request->subject_id)->get(),'logweek'=>logweek::where('subject_id','=',$request->subject_id)->orderBy('week_log')->get(),'kew'=>logweek::where('id','=',$request->logweek_id)->first(),'week_id'=>$tempo,'studi'=>studyante::where('TS_tracker','=',$request->subject_id)->orderBy('student_name','asc')->get(),'wekwew'=>weeklog::where('logweek_id','=',$request->logweek_id)->get(),'module'=>module::where('subject_id','=',$request->subject_id,'and','logweek_id','=',$request->logweek_id)->first(),'mc'=>$mmc,'ihap'=>$ih];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('dashboardi_avail',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('dashboards',$data);
        }
    }
    function view_module(Request $request,$id)
    {
        $data = ['data'=>module::find($id)];
        return view('view_module',$data);
    }
    function teacher_profile()
    {

        $data= ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('instructor_profile',$data);
        }
        if($userdata->usertype=='student')
        {
            return back();
        }
       
    }
    function student_profile()
    {
        $data= ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('instructor_profile',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('student_profile',$data);
        }
    }
    function teacher_notif()
    {

        $data= ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('instructor_notif',$data);
        }
        if($userdata->usertype=='student')
        {
            return back();
        }
       
    }
    function student_notif()
    {
        $data= ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('instructor_notif',$data);
        }
        if($userdata->usertype=='student')
        {
            return view('student_notif',$data);
        }
    }
    function teacher_rep()
    {

        $data= ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('instructor_reports',$data);
        }
        if($userdata->usertype=='student')
        {
            return back();
        }
       
    }
    function save_logsheet(Request $request)
    {
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        
        $Uname = $LogUserI->id;
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'subj'=>subject::where('teacher_id','like','%'.$Uname.'%')->orderBy('grade_level','asc')->paginate(8),'subjj'=>subject::where('teacher_id','like','%'.$Uname.'%')->orderBy('grade_level','asc')->get(),'week_id'=>logweek::where('teacher_id','like','%'.$Uname.'%')->get()];

            
        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            $save_data = new log_sheet;
            $save_data->teacher_id=$request->teacher_id;
            $save_data->what_week=$request->what_week;
            $save_data->week_desc=$request->week_desc;
            $save_data->date_range_start=$request->date_range_start;
            $save_data->date_range_end=$request->date_range_end;
            $save_data->week_color=$request->color;
            $input = implode(", ", $request->get('subjects'));
            $save_data->subjects=$input;
            
            $save_data->save();

            return back();
        }
        if($userdata->usertype=='student')
        {
            return redirect('student');
        }

    }
    function logsheet_view (Request $request,$logsheet_id)
    {
        $LogUserI = User::where('id','=',session('LoggedUser'))->first();
        $naa='-';
        $naa_judt='-';
        $Uname = $LogUserI->id;
        $grade_level = subject::where('teacher_id','=',$Uname)->first();
        $g_d = $grade_level->grade_level;
        $how_many_submitted = 0;
      
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first(),'logsheet'=>log_sheet::where('id','=',$logsheet_id)->first(),'student'=>studyante::where('grade_level','=',$g_d)->orderBy('gender','desc')->get(),'log_sheet_data'=>log_sheets_data::where('log_sheet_id',$logsheet_id)->get(),'naa'=>$naa,'naa_judt'=>$naa_judt,'stud_id'=>'','log_id'=>'','disable'=>'disabled','display'=>'none','how_many_claimed'=>0,'how_many_submitted'=>0];

        $userdata= User::where('id','=',session('LoggedUser'))->first();
        if($userdata->usertype=='teacher')
        {
            return view('instructor_logsheet',$data);
        }
        if($userdata->usertype=='student')
        {
            return redirect('student');
        }
    }
    function distribute(Request $request)
    {
        $post = log_sheets_data::UpdateOrCreate(
            [
                
                'student_id'=>$request->student_id,
                'log_sheet_id'=>$request->log_sheet_id,
               
            ],
            [
               
                'student_id'=>$request->student_id,
                'log_sheet_id'=>$request->log_sheet_id,
                'date_claimed'=>$request->date_claimed,
                
                'claim_status'=>$request->claim_status,
               
            ]
        );
        // $save_this= new log_sheets_data();
        // $save_this->student_id=$request->student_id;
        // $save_this->log_sheet_id=$request->log_sheet_id;
        // $save_this->date_claimed=$request->date_claimed;

        // $save_this->date_submitted='-';
        // $save_this->claim_status=$request->claim_status;
        // $save_this->submission_status='-';
        // $save_this->save();
        return back();
    }
    function retrieval (Request $request)
    {
        $post = log_sheets_data::UpdateOrCreate(
            [
                
                'student_id'=>$request->student_id,
                'log_sheet_id'=>$request->log_sheet_id,
               
            ],
            [
               
                
                'date_submitted'=>$request->date_submitted,
                
                'submission_status'=>'submitted',
            ]
        );
        return back();
    }

    function undo_mark(Request $request,$stud_id,$log_sheet_id) 
    {   
     $dit= log_sheets_data::where('student_id','=',$stud_id,'and','log_sheet_id','=',$log_sheet_id)->first();
    
            $post = log_sheets_data::UpdateOrCreate(
                [
                    
                    'student_id'=>$request->stud_id,
                    'log_sheet_id'=>$request->log_sheet_id,
                   
                ],
                [
                   
                    
                    'date_claimed'=>'',
                   
                    'claim_status'=>'',
                   
                ]
            ); 
       
     
      
        return back();
    }
    function undo_mark_sub(Request $request,$stud_id,$log_sheet_id) 
    {   
     $dit= log_sheets_data::where('student_id','=',$stud_id,'and','log_sheet_id','=',$log_sheet_id)->first();
    
            $post = log_sheets_data::UpdateOrCreate(
                [
                    
                    'student_id'=>$request->stud_id,
                    'log_sheet_id'=>$request->log_sheet_id,
                   
                ],
                [
                   
                    
                    
                    'date_submitted'=>'',
                    
                    'submission_status'=>'',
                ]
            ); 
     
     
      
        return back();
    }
}
