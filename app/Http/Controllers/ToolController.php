<?php

namespace App\Http\Controllers;

use App\Models\Tool;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ToolController extends Controller
{
    // menampilkan data tool
    public function index(Auth $auth)
    {
        $user = $auth::user();
        if ($user->role == 0) {
            return redirect()->route('landing');
        }
        $tools = Tool::orderBy('name', 'ASC')->get();
        foreach ($tools as $tool) {
            $tool->description = explode(' ', $tool->description);
            $tool->cost = number_format($tool->price);
        }
        $data = [
            'tools' => $tools,
            'user' => $user
        ];
        return view('admin.tools.index', compact('data'));
    }

    // menampilkan halaman menambahkan tool
    public function add(Auth $auth)
    {
        $user = $auth::user();
        $data = [
            'type' => ["Ligthing", "Sound", "Event"],
            'user' => $user
        ];
        return view('admin.tools.add', compact('data'));
    }

    // menambahkan data tool baru
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $name = $request->get('name');
        $tools = Tool::all();
        foreach ($tools as $tool) {
            if ($tool->name == $name) {
                return redirect()
                    ->route('tools.index')
                    ->with('failed', $name . ' already exists');
            }
        }
        $file_name = $this->_uploadFileImage($request);
        $request->merge([
            'slug' => Str::slug($name, '-'),
            'file_image' => $file_name
        ]);
        if (Tool::create($request->all())) {
            return redirect()
                ->route('tools.index')
                ->with('success', $name . ' added successfully');
        } else {
            return redirect()
                ->route('tools.index')
                ->with('failed', $name . ' failed to add');
        }
    }

    // menampilkan halaman edit tool
    public function edit(Auth $auth, Tool $tool)
    {
        $user = $auth::user();
        $data = [
            'tool' => $tool,
            'type' => ["Ligthing", "Sound", "Event"],
            'user' => $user
        ];
        return view('admin.tools.edit', compact('data'));
    }

    // mengubah data tool
    public function update(Request $request, Tool $tool)
    {
        date_default_timezone_set('Asia/Jakarta');
        $name = $request->input('name');
        if ($request->file()) {
            Storage::disk('local')->delete('public/images/tools/' . $tool->file_image);
            $file_name = $this->_uploadFileImage($request);
        } else {
            $file_name = $tool->file_image;
        }
        $request->merge([
            'slug' => Str::slug($name, '-'),
            'file_image' => $file_name,
        ]);
        $tool->update($request->all());
        return redirect()->route('tools.index')
            ->with('success', $name . ' updated successfully');
    }

    // menghapus data tool
    public function destroy(Tool $tool)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tool->delete();
        Storage::disk('local')->delete('public/images/tools/' . $tool->file_image);
        return redirect()
            ->route('tools.index')
            ->with('success', $tool->name . ' were successfully removed');
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
                $file->storeAs('images/tools', $file_name, 'public');
            } else {
                return redirect()
                    ->route('tools.index')
                    ->with('failed', 'Your image file size is too big, please choose a size under 2MB');
            }
        } else {
            return redirect()
                ->route('tools.index')
                ->with('failed', 'Your image file extension is wrong, please select a png, jpg, or jpeg image file');
        }
        return $file_name;
    }
}
