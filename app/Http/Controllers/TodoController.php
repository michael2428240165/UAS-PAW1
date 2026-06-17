<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function create()
{
    // deni 
    return view('todos.create');
}

    public function store(Request $request)
    {
        //deni
        $request->validate([
            'judul' => 'required',
            'tenggat_waktu' => 'nullable|date',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'tenggat_waktu.date' => 'Format tanggal tidak valid',
        ]);

        Todo::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'tenggat_waktu' => $request->tenggat_waktu,
            'selesai' => 0,
        ]);

        return redirect('/dashboard')->with('success', 'Todo berhasil ditambahkan');
    }

    public function edit($id)
{
    $todo = Todo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    return view('todos.edit', compact('todo'));
}

    public function update(Request $request, $id)
    {
        $todo = Todo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'judul' => 'required',
            'tenggat_waktu' => 'nullable|date',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'tenggat_waktu.date' => 'Format tanggal tidak valid',
        ]);

    $todo->judul = $request->judul;
    $todo->tenggat_waktu = $request->tenggat_waktu;
    $todo->save();

    return redirect('/dashboard')->with('success', 'Todo berhasil diperbarui');
}

    public function complete($id)
    {
        $todo = Todo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $todo->selesai = 1;
        $todo->save();

        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        $todo = Todo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $todo->delete();

        return redirect('/dashboard');
    }

    public function destroySelesai()
    {
        Todo::where('user_id', Auth::id())->where('selesai', 1)->delete();
        return redirect('/dashboard');
    }
}