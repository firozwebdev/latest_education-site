<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo', 'images', 'university_id', 'subject_id', 'offer_card_1', 'offer_card_2', 'city', 'qs_ranking',
        'course_name', 'progress_to', 'student_level', 'study_level', 'duration', 'course_type', 'next_intake', 'entry_score', 'tuition_fees',
        'instructor_id','slug','current_price','off_price','enrolled','lectures','rating','language','certificate','pass_percentage','preview_video_url','description','syllabus'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function instructor()
    {
        return $this->belongsTo(\App\Models\User::class, 'instructor_id');
    }

    
}
