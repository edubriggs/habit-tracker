<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Http\Requests\HabitRequest;
use App\Models\HabitLog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class HabitController extends Controller
{
    use AuthorizesRequests;
    public function index(): View
    {
            $habits = Auth::user()->habits()
            ->with('habitLogs')
            ->get();
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
        $this->authorize('update', $habit);
        return view('habits.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
                
        $this->authorize('update', $habit);
        $habit->update($request->all());
        return redirect()->route('habits.index')->with('success','Hábito atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $this->authorize('delete', $habit);
        $habit->delete();

        return redirect()->route('habits.index')->with('success','Hábito deletado!');
    }

    public function settings(){
        $habits = Auth::user()->habits;
        return view('habits.settings', compact('habits'));
    }

    public function toggle(Habit $habit)
    {
        $this->authorize('toggle', $habit);
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