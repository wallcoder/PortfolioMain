<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getProjects(Request $request){
        try{

            $limit = $request->input('limit', 10); 

            $projects = Project::select('id', 'category_id', 'title', 'background_color', 'image1', 'slug', 'created_at')->with(['category:id,name'])->orderBy('id')->cursorPaginate($limit);

            return response()->json(['success'=>true, 'message'=>'Projects fetched successful', 'data'=>$projects ], 200);

        }catch(Exception $err){
            return response()->json(['success'=>false, 'message'=>$err->getMessage()], 500);
        }
    }

    public function getProjectBySlug($slug){

        try{
           $project = Project::where('slug', $slug)
                ->with([
                    'category',
                    'techStack' => function ($query) {
                        $query->with('tech');
                    }
                ])
    ->first();


            return response()->json(['success'=>true, 'message'=>'Project fetched successful', 'data'=>$project ], 200);
            
        }catch(Exception $err){
            return response()->json(['success'=>false, 'message'=>$err->getMessage()], 500);
        }


    }
}
