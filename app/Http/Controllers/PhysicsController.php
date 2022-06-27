<?php

namespace App\Http\Controllers;

use App\models\CompoleteModel\Physics;
use App\models\UserorStudentModel\Student;
use Illuminate\Http\Request;

class PhysicsController extends Controller
{
    public function YJXphysics (Request $request)
    {
         $student_id = auth('api')->user()->student_id;
         //dd($student_id);
       // $student_id = $request['student_id'];

        $pd1 = $request['one'];
        $pd2 = $request['two'];
        $pd3 = $request['three'];
        $pd4 = $request['four'];
        $pd5 = $request['five'];
        $pd6 = $request['six'];
        $pd7 = $request['seven'];
        $pd8 = $request['eight'];
        $xz1 = $request['cone'];
        $xz2 = $request['ctwo'];
        $xz3 = $request['cthree'];
        $xz4 = $request['cfour'];
        $xz5 = $request['cfive'];
        $xz6 = $request['csix'];
        $xz7 = $request['cseven'];
        $xz8 = $request['ceight'];
        $xz9 = $request['cnine'];
        $xz10 = $request['cten'];
        $xz11 = $request['celeven'];
        $xz12 = $request['ctwelve'];
//dd($xz12);
        $res1 =Physics::establish(
            $student_id,
            $pd1,
            $pd2,
            $pd3,
            $pd4,
            $pd5,
            $pd6,
            $pd7,
            $pd8,
            $xz1,
            $xz2,
            $xz3,
            $xz4,
            $xz5,
            $xz6,
            $xz7,
            $xz8,
            $xz9,
            $xz10,
            $xz11,
            $xz12
        );
//dd(6657);

        $grade = 0;
        $grade_xp = 0;

        if ($pd1 == 'T') {
            $grade_xp += 5;
        }
        if ($pd2 == 'F') {
            $grade_xp += 5;
        }
        if ($pd3 == 'T') {
            $grade_xp += 5;
        }
        if ($pd4 == 'T') {
            $grade_xp += 5;
        }
        if ($pd5 == 'T') {
            $grade_xp += 5;
        }
        if ($pd6 == 'F') {
            $grade_xp += 5;
        }
        if ($pd7 == 'T') {
            $grade_xp += 5;
        }
        if ($pd8 == 'T') {
            $grade_xp += 5;
        }
        if ($xz1 == 'D') {
            $grade_xp += 5;
        }
        if ($xz2 == 'A') {
            $grade_xp += 5;
        }
        if ($xz3 == 'D') {
            $grade_xp += 5;
        }
        if ($xz4 == 'C') {
            $grade_xp += 5;
        }
        if ($xz5 == 'B') {
            $grade_xp += 5;
        }
        if ($xz6 == 'A') {
            $grade_xp += 5;
        }
        if ($xz7 == 'C') {
            $grade_xp += 5;
        }
        if ($xz8 == 'A') {
            $grade_xp += 5;
        }
        if ($xz9 == 'B') {
            $grade_xp += 5;
        }
        if ($xz10 == 'A') {
            $grade_xp += 5;
        }
        if ($xz11 == 'B') {
            $grade_xp += 5;
        }
        if ($xz12 == 'A') {
            $grade_xp += 5;
        }


        $grade = $grade + $grade_xp;
//dd($grade);
        $res2 = Student::grade($student_id, $grade, $grade_xp);
        Student::statechange($student_id);
        return $res1 ?
            json_success('操作成功!', null, 200) :
            json_fail('操作失败!', null, 100);

    }
}