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
        if ($user->role == 0) {
            return redirect()->route('landing');
        }
        $events = Event::orderBy('created_at', 'ASC')->get();
        foreach ($events as $event) {
            $event = $this->_setDate($event);
            $event = $this->_setFormatPresale1($event);
            $event = $this->_setFormatPresale2($event);
            $event = $this->_setFormatOnsale($event);
        }
        $data = [
            'events' => $events,
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
        $file_name = $this->_uploadFileImage($request);
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
            $file_name = $this->_uploadFileImage($request);
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
    private function _uploadFileImage($request)
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

    private function _setDate($data)
    {
        if ($data->end_date) {
            if ($data->start_date === $data->end_date) {
                $data->date = date("j M Y", strtotime($data->start_date));
            } else {
                $data->date = date("j", strtotime($data->start_date)) . "-" . date("j M Y", strtotime($data->end_date));
            }
        } else {
            $data->date = date("j M Y", strtotime($data->start_date));
        }
        return $data;
    }

    private function _setFormatPresale1($data)
    {
        $data->presale_1_price = number_format($data->presale_1);
        if ($data->presale_1_start === null && $data->presale_1_end === null) {
            $data->presale_1_date = "date is unset";
            return $data;
        }
        if ($data->presale_1_end) {
            if ($data->presale_1_start === $data->presale_1_end) {
                $data->presale_1_date = date("j M Y", strtotime($data->presale_1_start));
            } else {
                $data->presale_1_date = date("j", strtotime($data->presale_1_start)) . "-" . date("j M Y", strtotime($data->presale_1_end));
            }
        } else {
            $data->presale_1_date = date("j M Y", strtotime($data->presale_1_start));
        }
        return $data;
    }
    private function _setFormatPresale2($data)
    {
        $data->presale_2_price = number_format($data->presale_2);
        if ($data->presale_2_start === null && $data->presale_2_end === null) {
            $data->presale_2_date = "date is unset";
            return $data;
        }
        if ($data->presale_2_end) {
            if ($data->presale_2_start === $data->presale_2_end) {
                $data->presale_2_date = date("j M Y", strtotime($data->presale_2_start));
            } else {
                $data->presale_2_date = date("j", strtotime($data->presale_2_start)) . "-" . date("j M Y", strtotime($data->presale_2_end));
            }
        } else {
            $data->presale_2_date = date("j M Y", strtotime($data->presale_2_start));
        }
        return $data;
    }
    private function _setFormatOnsale($data)
    {
        $data->onsale_price = number_format($data->onsale);
        if ($data->onsale_start === null && $data->onsale_end === null) {
            $data->onsale_date = "date is unset";
            return $data;
        }
        if ($data->onsale_end) {
            if ($data->onsale_start === $data->onsale_end) {
                $data->onsale_date = date("j M Y", strtotime($data->onsale_start));
            } else {
                $data->onsale_date = date("j", strtotime($data->onsale_start)) . "-" . date("j M Y", strtotime($data->onsale_end));
            }
        } else {
            $data->onsale_date = date("j M Y", strtotime($data->onsale_start));
        }
        return $data;
    }
}
