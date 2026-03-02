<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Http\Requests\HabitRequest;
use App\Models\HabitLog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class HabitController extends Controller
{

    public function index(): View
    {
            $habits = Auth::user()->habits;
            return view('dashboard', compact('habits'));
    }

    public function create(): View
    {
        return view('habits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();
        Auth::user()->habits()->create($validated);
        return redirect()
        ->route('habits.index')
        ->with('success', 'Hábito criado com sucesso!');
    }

    public function edit(Habit $habit)
    {
        return view('habits.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
                if ($habit->user_id !== Auth::user()->id) 
        {
            abort(403, 'Esse hábito não te pertence');
        }
        $habit->update($request->all());
        return redirect()->route('habits.index')->with('success','Hábito atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        if ($habit->user_id !== Auth::user()->id) 
        {
            abort(403, 'Esse hábito não te pertence');
        }
        $habit->delete();

        return redirect()->route('habits.index')->with('success','Hábito deletado!');
    }

    public function settings(){
        $habits = Auth::user()->habits;
        return view('habits.settings', compact('habits'));
    }

    public function toggle(Habit $habit)
    {
        if ($habit->user_id !== Auth::user()->id) 
        {
            abort(403, 'Esse hábito não te pertence');
        }  
        $today = Carbon::today()->toDateString();

        $log = HabitLog::query()
            ->where('habit_id', $habit->id)
            ->where('completed_at', $today)
            ->first();
        if ($log){
            $log->delete();
            $message = 'Hábito desmarcado';
        }else {
            HabitLog::create([
                'user_id' => Auth::user()->id,
                'habit_id'=> $habit->id,
                'completed_at'=> $today,
                ]);
            $message = 'Hábito marcado';
        }
        return redirect()->route('habits.index')->with('success', $message);
    }
}