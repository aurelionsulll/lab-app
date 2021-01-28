<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Notifications\newMessage;
// use \Illuminate\Notifications\Notifiable;
class ContactController extends Controller
{
    // use Notifiable;

    public function indexu()
    {
        return view('contact');
    }

    public  function message (Request $request)
    {
        $message = new Contact();
        $message->name = $request->input('name');
        $message->mail = $request->input('mail');
        $message->phone = $request->input('phone');
        $message->subject = $request->input('subject');
        $message->autre = $request->input('autre');
        $message->save();

        //Notification
        $message->notify(new newMessage($message));

        return redirect('/contact')->with('success','Votre message a bien été envoyée');
    }

    public function indexa()
    {
        return view('admin.contactpage');
    }

    public  function showa()
    {
        return Contact::latest()->get();
    }

    public  function showcontacts()
    {
        return Contact::latest()->paginate(3);
    }

    public function  deleteSlidera($id)
    {
        $slider = Contact::find($id);
        $slider->delete();
    }

    public function uplapp(Request $request,$id)
    {
        $appointments = Contact::find($id);
        $appointments->readed = $request->readed;
        $appointments->save();
    }
}
