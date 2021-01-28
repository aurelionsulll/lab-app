<?php

namespace App\Http\Controllers;

use DB;

use App\User;

use App\Contact;

use App\Gallery;

use App\Homepage;

use App\Appointment;

use App\Analyse;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Notifications\Notification;

class HomepageController extends Controller
{

    protected $notifications;


    public function __construct()
    {
        $this->middleware('auth')->except('indexu','makeAppointment');
        $this->notifications= DB::table('notifications')->get();
        View::share('notifications', $this->notifications);
    }



    //User
    //
    //
    //
    //
    //
    //
    //

    public function indexu()
    {
        $analyses = Analyse::all();
        $sliders = Homepage::all();
        $x = DB::select('select distinct subtext from galleries');
        $gallerys = DB::select('select distinct subtext,image from galleries');
        return view('index',[
            'gallerys'=>$gallerys,
            'x' => $x ])
            ->with('sliders', $sliders)
            ->with('analyses', $analyses);
    }

    //Admin
    //
    //
    //
    //
    //
    //
    //

    public function index()
    {
        return  view('admin.homepage');
    }

    public  function show()
    {
        return Homepage::latest()->get();
    }

    public  function upl(Request $request)
    {
        $request->validate([
            'name' => 'max:255',
            'image' => 'required',
        ]);
        $slid = new Homepage();
        if ($request->image) {
            $name = date('y-m-d') . time() . '.' . explode('/', explode(':',substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            \Image::make($request->image)->save(public_path('/images/') . $name);
            $slid->image = $name;
        }
        $slid->text = $request->text;
        $slid->subtext = $request->subtext;
        $slid->save();
    }

    public function  deleteSlider($id)
    {
        $slider = Homepage::find($id);
        $file_path = 'images/' . $slider->image;
        File::delete($file_path);
        $slider->delete();
    }

    public function upd(Request $request, $id)
    {
        $slider = Homepage::find($id);
        if($request->image != $slider->image)
        {
            $slider->text = $request->text;
            $slider->subtext = $request->subtext;
            File::delete('images/' .$slider->image);
            $name = date('y-m-d') . time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            \Image::make($request->image)->save(public_path('/images/') . $name);
            $slider->image = $name;
            $slider->save();
        }
        else
        {
            $slider->text = $request->text;
            $slider->subtext = $request->subtext;
            $slider->save();
        }
    }

    //Appointment
    //
    //
    //
    //
    //
    //
    //

    public function indexa()
    {
        return view('admin.appointmentpage');
    }

    public  function makeAppointment (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required'
        ]);
        $appointments = new Appointment();
        $appointments->name = $request->input('name');
        $appointments->email = $request->input('email');
        $appointments->phone = '0'.$request->input('phone');
        $appointments->date = $request->input('date');
        $appointments->save();
        return redirect('/')->with('success','Votre réservation a bien été envoyée');
    }

    public  function showa()
    {
        return Appointment::latest()->get();
    }

    public  function showDahboardApp()
    {
        return Appointment::latest()->paginate(4);
    }

    public function  deleteSlidera($id)
    {
        $slider = Appointment::find($id);
        $slider->delete();
    }

    public function uplapp(Request $request,$id)
    {
        $appointments = Appointment::find($id);
        $appointments->readed = $request->readed;
        $appointments->save();
    }


    public function cpadmin()
    {
        // $contact = Notification::where('read_at', null)->get();


        // $user = App\Models\User::find(1);

        // $notifications->notify(newMessage::all());
        // $user = user::all();
        // foreach ($contact->notifications as $notifcation) {
        //     echo $notifcation->type;
        // }
        // dd($user->notifications);

        return view('admin.index');
    }
}
