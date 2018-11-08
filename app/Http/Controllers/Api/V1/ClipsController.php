<?php

namespace App\Http\Controllers\Api\V1;

use App\Clip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClipsRequest;
use App\Http\Requests\Admin\UpdateClipsRequest;
use Yajra\DataTables\DataTables;

class ClipsController extends Controller
{
    public function index()
    {
        return Clip::all();
    }

    public function show($id)
    {
        return Clip::findOrFail($id);
    }

    public function update(UpdateClipsRequest $request, $id)
    {
        $clip = Clip::findOrFail($id);
        $clip->update($request->all());
        

        return $clip;
    }

    public function store(StoreClipsRequest $request)
    {
        $clip = Clip::create($request->all());
        

        return $clip;
    }

    public function destroy($id)
    {
        $clip = Clip::findOrFail($id);
        $clip->delete();
        return '';
    }
}
