<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project_array = Project::with(['type', 'technologies'])->get();

        return response()->json($project_array);
    }
}
