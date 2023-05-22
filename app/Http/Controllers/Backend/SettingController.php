<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Factory;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();

        return view('admin.settings.index', compact('settings'))->withTitle('Edit of Settings');
    }
    // public function edit(Setting $setting)
    // {
    //     return view('backend.modules.setting.edit', compact('setting'))->withTitle('Edit a Setting');
    // }
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'value' => 'required'
            ];
            $messages = [
                'value.required' => 'Value of Setting is required.'
            ];
            $this->validate($request, $rules, $messages);

            for($i=0;$i<count($request->id);$i++)
            {
                $setting = Setting::where('id','=', $request->id[$i])->first();
                $setting->value = $request->value[$i];
                $setting->save();
            }

            return redirect()->route('setting.list')->with('success', 'Item has been updated successfully.');
        }
    }
}