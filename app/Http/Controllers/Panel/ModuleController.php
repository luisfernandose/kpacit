<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->get('ajax')['new'];

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'name' => 'required|max:64',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        Module::create([
            'webinar_id' => $data['webinar_id'],
            'name' => $data['name'],
        ]);

        return response()->json([
            'code' => 200,
        ], 200);
    }

    public function update(Request $request, $id)
    {

        $data = $request->get('ajax')[$id];

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'name' => 'required|max:64',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        $module = Module::where('id', '=', $id)
                        ->first();

        if (!empty($module)) {

            $module->name = $data['name'];
            $module->save();

            return response()->json([
                'code' => 200,
            ], 200);
        }

        return response()->json([], 422);
    }

    public function destroy($id)
    {
        $module = Module::find($id);

        if (!empty($module)) {

            $module->delete();

        }

        return response()->json([

            'code' => 200

        ], 200);
    }
}
