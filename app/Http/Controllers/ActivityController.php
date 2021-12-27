<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rules\MaxWordRule;
use App\Models\Activity;
use App\Models\Achievement;
use App\Models\Badge;

use App\Events\ToDoActivity;
use App\Jobs\SendNotificationMail;
use Carbon\Carbon;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createtdl()
    {
        return view('dashboard.create');
    }

    public function savetdl(Request $request)
    {

        $auth_id = auth()->user()->id;

        $request->validate([
            'title' => 'required | profanity',
            'description' => [
                'required',
                'profanity',
                new MaxWordRule(10),
            ],
            'date' => 'required',
        ]);

        $data = Activity::create([
            'user_id' => $auth_id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'reminder' => $request->input('reminder'),
        ]);

        event(new ToDoActivity($data, 'create'));

        // if($data->reminder === "1"){
        //     $this->dispatch(new SendNotificationMail($data->user->email));
        // }
        

        $countact = Activity::withTrashed()->where('user_id', $auth_id)->count();
        if(auth()->user()->is_subcription === 0 && Achievement::where('user_id', $auth_id)->exists()){
            //SKIP
        }else{
            if($countact % 10 === 0){
                Achievement::create([
                    'user_id' => $auth_id,
                    'achievement' => 1,
                ]);
            }
        }

        $achievement = Achievement::where('user_id', $auth_id)->count();
        if(($achievement === 2 && $countact === 20) || ($achievement === 5 && $countact === 50) || ($achievement === 10 && $countact === 100)){
            Badge::create([
                'user_id' => $auth_id,
                'badge' => 1,
            ]);
        }

        return redirect()->route('dashboard')->withSuccess('To Do List Created Successfull');
    }

    public function edit($id)
    {
        $activity = Activity::find($id);

        return view('dashboard.update', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required | profanity',
            'description' => [
                'required',
                'profanity',
                new MaxWordRule(10),
            ],
            'date' => 'required',
        ]);

        $activity = Activity::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'reminder' => $request->input('reminder'),
        ]);

        $data = Activity::find($id);
        event(new ToDoActivity($data, 'edit'));

        return redirect()->route('dashboard')->withSuccess('To Do List Update Successfull');

    }

    public function delete($id)
    {
        $data = Activity::find($id);
        $data->delete();
        
        event(new ToDoActivity($data, 'delete'));

        return redirect()->route('dashboard')->withSuccess('To Do List Delete Successfull');
    }

    public function upgrade()
    {
        return view('dashboard.upgrade');
    }

    public function cmd()
    {
        $activity = Activity::where('reminder', 1)->where('date', Carbon::now()->format('Y-m-d'))->get();
       
        foreach($activity as $act){
            $this->dispatch(new SendNotificationMail($act->user->email));
        }
    }
    
}
