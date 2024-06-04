<?php

namespace App\Services;

use App\Mail\Studentmailer;
use App\Models\Module;
use App\Models\Score_validate;
use App\Models\student_score;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ScoresServices
{

    public  function save( $scores , $module_id){

        foreach ($scores as $student_id => $score){
            $score_table = student_score::where('student_id' ,$student_id )->where('module_id',$module_id)->get();

            if($score_table->count()==0){
                $resault=  student_score::create([
                    'student_id' => $student_id,
                    'module_id'=>$module_id,
                    'score'=> $score,

                ]);
            }
            else{
                $score_table[0]->update([
                    'score'=> $score
                ]);
            }

        }
    }

    public  function validate($scores , $module_id)
    {

        $this->save($scores , $module_id);
        foreach ($scores as $student_id => $score) {
            $student = User::find($student_id);
            $module = Module::find($module_id);

            Mail::to($student->email)->send(new Studentmailer($student->name ,$module->name , $score));
            $score_table = Score_validate::where('student_id', $student_id)->where('module_id', $module_id)->get();
            if ($score_table->count() == 0) {
                $resault = Score_validate::create([
                    'student_id' => $student_id,
                    'module_id' => $module_id,
                    'score' => $score,

                ]);
            } else {
                $score_table[0]->update([
                    'score' => $score
                ]);
            }
        }
    }

}
