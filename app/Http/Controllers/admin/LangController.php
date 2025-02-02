<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Languages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\helper;
use App\Models\Settings;
use File;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lang');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        $layout = Languages::select('name', 'layout', 'image')->where('code', $request->lang)->first();
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        session()->put('language', $layout->name);
        session()->put('flag', $layout->image);
        session()->put('direction', $layout->layout);
        return redirect()->back();
    }
    public function language(Request $request)
    {
        $getlanguages = Languages::where('is_deleted', '2')->get();
        if ($request->code == "") {
            foreach ($getlanguages as $firstlang) {
                $currantLang = Languages::where('code', $firstlang->code)->first();
                break;
            }
        } else {
            $currantLang = Languages::where('code', $request->code)->first();
        }
        if ($request->has('lang')) {
            if ($request->lang != "" && $request->lang != null) {
                $settingdata = Settings::where('vendor_id', 1)->first();
                $settingdata->default_language = $request->lang;
                $settingdata->update();
            }
        }
        $dir = base_path() . '/resources/lang/' . $currantLang->code;

        if (!is_dir($dir)) {
            $dir = base_path() . '/resources/lang/en';
        }
        $arrLabel   = json_decode(file_get_contents($dir . '/' . 'labels.json'));
        $arrMessage   = json_decode(file_get_contents($dir . '/' . 'messages.json'));
        $arrLanding   = json_decode(file_get_contents($dir . '/' . 'landing.json'));
        return view('admin.language.index', compact('getlanguages', 'currantLang', 'arrLabel', 'arrMessage', 'arrLanding'));
    }
    public function storeLanguageData(Request $request)
    {
        $langFolder = base_path() . '/resources/lang/' . $request->currantLang;
        if (!is_dir($langFolder)) {
            mkdir($langFolder);
            chmod($langFolder, 0777);
        }
        if (isset($request->file) == "label") {
            if (isset($request->label) && !empty($request->label)) {
                $content = "<?php return [";
                $contentjson = "{";
                foreach ($request->label as $key => $data) {
                    $content .= '"' . $key . '" => "'.str_replace('\\', '', addslashes($data)).'",';
                    $contentjson .= '"' . $key . '":"' . $data . '",';
                }
                $content .= "];";
                $contentjson .= "}";

                file_put_contents($langFolder . "/labels.php", $content);
                file_put_contents($langFolder . "/labels.json", str_replace(",}", "}", $contentjson));
            }
        }
        if (isset($request->file) == "message") {
            if (isset($request->message) && !empty($request->message)) {
                $content = "<?php return [";
                $contentjson = "{";
                foreach ($request->message as $key => $data) {
                    $content .= '"' . $key . '" => "'.str_replace('\\', '', addslashes($data)).'",';
                    $contentjson .= '"' . $key . '":"' . $data . '",';
                }
                $content .= "];";
                $contentjson .= "}";
                file_put_contents($langFolder . "/messages.php", $content);
                file_put_contents($langFolder . "/messages.json", str_replace(",}", "}", $contentjson));
            }
        }
        if (isset($request->file) == "landing") {

            if (isset($request->landing) && !empty($request->landing)) {
                $content = "<?php return [";
                $contentjson = "{";
                foreach ($request->landing as $key => $data) {
                    $content .= '"' . $key . '" => "'.str_replace('\\', '', addslashes($data)).'",';
                    $contentjson .= '"' . $key . '" : "' . $data . '",';
                }
                $content .= "];";
                $contentjson .= "}";
                file_put_contents($langFolder . "/landing.php", $content);
                file_put_contents($langFolder . "/landing.json", str_replace(",}", "}", $contentjson));
            }
        }

        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function delete(Request $request)
    {
        try {
            $language = Languages::find($request->id);
            $getdefault = Settings::where('default_language', $language->code)->get();
            $setactive = Languages::where('code','en')->first();
            $setactive->is_available = 1;
            $setactive->update();
            foreach ($getdefault as $default) {
                $code = explode('|', $default->languages);
                $key = array_search($language->code, $code);
                if ($key !== false) {
                    unset($code[$key]);
                    array_push($code,'en');
                    $default->languages = implode('|', $code);
                }
                $default->default_language = "en";
                $default->update();
            }
            $path = base_path('resources/lang/' . $language->code);
            if (File::exists($path)) {
                File::deleteDirectory($path);
            }
            $language->delete();
            return redirect('admin/language-settings')->with('success', trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect('admin/language-settings')->with('error', trans('messages.wrong'));
        }
    }
    public function edit($id)
    {
        $getlanguage = Languages::where('id', $id)->first();
        return view('admin.language.edit', compact('getlanguage'));
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'layout' => 'required',
            ], [
                "layout.required" => trans('messages.layout_required'),
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $default = 2;
                if ($request->default == 1) {
                    Languages::where('is_default', '1')->update(array('is_default' => 2));
                    $default = $request->default;
                }
                $language = Languages::where('id', $id)->first();
                $language->layout = $request->layout;
                $language->is_default = @$default;
                if ($request->has('image')) {
                    $flagimage = 'flag-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
                    $request->file('image')->move(storage_path('app/public/admin-assets/images/language/'), $flagimage);
                    $language->image = $flagimage;
                }
                $language->update();
                return redirect('admin/language-settings')->with('success', trans('messages.success'));
            }
        } catch (\Throwable $th) {
            return redirect('admin/language-settings')->with('error', trans('messages.wrong'));
        }
    }

    public function status(Request $request)
    {
       
        $language = Languages::find($request->id);
        if ($language->code == helper::appdata('')->default_language) {
            return redirect()->back()->with('error', trans('messages.remove_default'));
        }
        $language->is_available = $request->status;
        $language->save();
        if ($language) {
            return redirect()->back()->with('success', trans('messages.success'));
        } else {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
    public function languagestatus(Request $request)
    {
        if (Auth::user()->type == 4) {
            $vendor_id = Auth::user()->vendor_id;
        } else {
            $vendor_id = Auth::user()->id;
        }

        $settingdata = Settings::where('vendor_id', $vendor_id)->first();
        if ($request->status == 2) {
            $code = explode('|', helper::appdata($vendor_id)->languages);
            if (count($code) == 1) {
                return redirect()->back()->with('error', trans('messages.language_required_msg'));
            }
            if ($request->code == helper::appdata($vendor_id)->default_language) {
                return redirect()->back()->with('error', trans('messages.remove_default'));
            }
            $key = array_search($request->code, $code);
            if ($key !== false) {
                unset($code[$key]);
                $settingdata->languages = implode('|', $code);
            }
        }
        if ($request->status == 1) {
            if (helper::appdata($vendor_id)->languages != "") {
                $code = explode('|', helper::appdata($vendor_id)->languages);
                array_push($code, $request->code);
                $settingdata->languages = implode('|', $code);
            } else {
                $settingdata->languages = $request->code;
            }
        }
        $settingdata->update();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function setdefault(Request $request)
    {
        if (Auth::user()->type == 4) {
            $vendor_id = Auth::user()->vendor_id;
        } else {
            $vendor_id = Auth::user()->id;
        }
        $settingdata = Settings::where('vendor_id', $vendor_id)->first();
        if (in_array($request->code, explode('|', $settingdata->languages))) {
            $settingdata->default_language = $request->code;
            $settingdata->update();
            return redirect()->back()->with('success', trans('messages.success'));
        } else {
            return redirect()->back()->with('error', trans('messages.not_available'));
        }
    }
}
