<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Project::with('type', 'technologies')->orderByDesc('id')->paginate(6)
        ]);
    }
    public function show($id)
    {

        $project = Project::with('type', 'technologies')->where('id', $id)->first();

        if ($project) {
            return response()->json(
                [
                    'success' => true,
                    'results' => $project
                ]
            );
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Post Not Found'
            ]);
        }
    }
}
