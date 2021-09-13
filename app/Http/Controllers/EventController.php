<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // menampilkan data event
    public function index(Auth $auth)
    {
        $user = $auth::user();
        // if ($user->role == 0) {
        //     return redirect()->route('home');
        // }
        $data = [
            'events' => Event::orderBy('created_at', 'ASC')->get(),
            'user' => $user
        ];
        return view('admin.events.index', compact('data'));
    }

    // menampilkan halaman menambahkan event
    public function add(Auth $auth)
    {
        $user = $auth::user();
        $data = [
            'user' => $user
        ];
        return view('admin.events.add', compact('data'));
    }

    // menambahkan data event baru
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $name = $request->get('name');
        $events = Event::all();
        foreach ($events as $event) {
            if ($event->name == $name) {
                return redirect()
                    ->route('events.index')
                    ->with('failed', $name . ' event already exists');
            }
        }
        $file_name = $this->uploadFileImage($request);
        $request->merge([
            'slug' => Str::slug($name, '-'),
            'file_image' => $file_name
        ]);
        if (Event::create($request->all())) {
            return redirect()
                ->route('events.index')
                ->with('success', $name . ' event added successfully');
        } else {
            return redirect()
                ->route('events.index')
                ->with('failed', $name . ' event failed to add');
        }
    }

    // menampilkan halaman edit event
    public function edit(Auth $auth, Event $event)
    {
        $user = $auth::user();
        $data = [
            'event' => $event,
            'user' => $user
        ];
        return view('admin.events.edit', compact('data'));
    }

    // mengubah data event
    public function update(Request $request, Event $event)
    {
        date_default_timezone_set('Asia/Jakarta');
        $name = $request->input('name');
        if ($request->file()) {
            Storage::disk('local')->delete('public/images/events/' . $event->file_image);
            $file_name = $this->uploadFileImage($request);
        } else {
            $file_name = $event->file_image;
        }
        $request->merge([
            'slug' => Str::slug($name, '-'),
            'file_image' => $file_name,
        ]);
        $event->update($request->all());
        return redirect()->route('events.index')
            ->with('success', $name . ' event updated successfully');
    }

    // menghapus data event
    public function destroy(Event $event)
    {
        date_default_timezone_set('Asia/Jakarta');
        $event->delete();
        Storage::disk('local')->delete('public/images/events/' . $event->file_image);
        return redirect()
            ->route('events.index')
            ->with('success', $event->name . ' event were successfully removed');
    }

    // mengupload file gambar
    public function uploadFileImage($request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $name = $request->input('name');
        $file = $request->file('file');
        $size = $file->getSize();
        $extension = $file->getClientOriginalExtension();
        $file_name = time() . '-' . Str::slug($name, '-') . '.' . $extension;
        if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
            if ($size <= 2048000) {
                $file->storeAs('images/events', $file_name, 'public');
            } else {
                return redirect()
                    ->route('events.index')
                    ->with('failed', 'Your image file size is too big, please choose a size under 2MB');
            }
        } else {
            return redirect()
                ->route('events.index')
                ->with('failed', 'Your image file extension is wrong, please select a png, jpg, or jpeg image file');
        }
        return $file_name;
    }
}
