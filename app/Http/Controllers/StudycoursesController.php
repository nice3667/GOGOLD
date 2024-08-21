<?php

namespace App\Http\Controllers;

use App\Models\Studycourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudycoursesController extends Controller
{
    public function store(Request $request)
    {
        try {
            Log::info('Received Store Request:', $request->all());

            // ตรวจสอบความถูกต้องของข้อมูล
            $validatedData = $request->validate([
                'course_name' => 'required|string|max:255',
                'descriptions' => 'required|string',
                'course_img' => 'sometimes|file|mimes:jpeg,png|max:2048',
                'course_vidio' => 'sometimes|file|mimes:mp4,mp3,mov,avi,wmv|max:10240',
            ]);

            // ตรวจสอบว่ามีการอัปโหลดไฟล์
            if ($request->hasFile('course_img')) {
                $validatedData['course_img'] = $request->file('course_img')->store('course_images', 'public');
            }

            if ($request->hasFile('course_vidio')) {
                $validatedData['course_vidio'] = $request->file('course_vidio')->store('course_videos', 'public');
            }

            // สร้างข้อมูลใหม่ในฐานข้อมูล
            $course = Studycourse::create($validatedData);

            Log::info('Created:', $course->toArray());

            return response()->json($course, 201);
        } catch (\Exception $e) {
            Log::error('Error:', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            Log::info(' Update :', $request->all());

            $validatedData = $request->validate([
                'course_id' => 'required|integer|exists:studycourses,course_id',
                'course_name' => 'required|string|max:255',
                'descriptions' => 'required|string',
                'course_img' => 'sometimes|file|mimes:jpeg,png|max:2048',
                'course_vidio' => 'sometimes|file|mimes:mp4,mp3,mov,avi,wmv|max:10240',
            ]);

            $course = Studycourse::findOrFail($validatedData['course_id']);

            if ($request->hasFile('course_img')) {
                if ($course->course_img) {
                    Storage::disk('public')->delete($course->course_img);
                }
                $validatedData['course_img'] = $request->file('course_img')->store('course_images', 'public');
            }

            if ($request->hasFile('course_vidio')) {
                if ($course->course_vidio) {
                    Storage::disk('public')->delete($course->course_vidio);
                }
                $validatedData['course_vidio'] = $request->file('course_vidio')->store('course_videos', 'public');
            }

            $course->update($validatedData);

            Log::info('Updated Course:', $course->toArray());

            return response()->json($course, 200);
        } catch (\Exception $e) {
            Log::error('Error:', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Log::info('Received Delete Request:', $request->all());

            // ตรวจสอบและ validate course_id
            $validatedData = $request->validate([
                'course_id' => 'required|integer|exists:studycourses,course_id',
            ]);

            // ค้นหาข้อมูลโดยใช้ course_id
            $course = Studycourse::where('course_id', $validatedData['course_id'])->firstOrFail();

            // ลบไฟล์ที่เกี่ยวข้องหากมี
            if ($course->course_img) {
                Storage::disk('public')->delete($course->course_img);
            }

            if ($course->course_vidio) {
                Storage::disk('public')->delete($course->course_vidio);
            }

            // ลบข้อมูลจากฐานข้อมูล
            $course->delete();

            Log::info('Deleted Course:', ['course_id' => $validatedData['course_id']]);

            return response()->json(['message' => 'Course deleted successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error:', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }
    public function show(Request $request)
    {
        try {
            // ตรวจสอบและ Validate ข้อมูลที่ส่งมา
            $validatedData = $request->validate([
                'course_id' => 'required|integer|exists:studycourses,course_id',
            ]);

            Log::info('Received Show Request for Course ID:', ['course_id' => $validatedData['course_id']]);

            // ค้นหาหลักสูตรตาม course_id
            $course = Studycourse::where('course_id', $validatedData['course_id'])->firstOrFail();

            Log::info('Retrieved Course Details:', $course->toArray());

            return response()->json($course, 200);
        } catch (\Exception $e) {
            Log::error('Error:', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Course not found'], 404);
        }
    }
}
