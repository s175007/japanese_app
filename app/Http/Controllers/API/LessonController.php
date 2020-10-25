<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function getLessonsByBookId($id){
        $lessons = Lesson::where('book_id', $id)->get();

        return response()->json($lessons);
    }
}
