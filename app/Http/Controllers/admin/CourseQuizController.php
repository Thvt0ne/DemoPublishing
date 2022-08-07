<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Course;

class CourseQuizController extends Controller
{
    public function create(Course $course)
    {
        return view('admin.courses.createquiz', compact('course'));
    }
}

