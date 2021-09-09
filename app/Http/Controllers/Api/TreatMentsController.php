<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatMentsController extends Controller
{
    public function show(Treatment $treatment){
        return response()->json([
        'id'=>$treatment->getRouteKey(),
        'external_id'=>$treatment->external_id,
        "plates"=>$treatment->plates,
        "created_at"=>$treatment->created_at->toDateString(),
        "updated_at"=>$treatment->updated_at->toDateString(),
        "ended_at"=>$treatment->ended_at->toDateString(),
        "dentist"=>[
            'id'=> $treatment->dentist->id,
            'full_name'=> $treatment->dentist->user->fullname,
            "email"=> $treatment->dentist->user->email,
        ],
        "patient"=> [
            "id"=> $treatment->patient->id,
            "full_name"=> $treatment->patient->user->fullname,
            "email"=> $treatment->patient->user->email,
        ]
        ]);
    }
    public function index(){
        $treatments=Treatment::all()->take(10);
        $arrayJson= array();
        for ($i=0; $i < count($treatments); $i++) { 
            $treatment=[
                'id'=>$treatments[$i]->getRouteKey(),
                'external_id'=>$treatments[$i]->external_id,
                "plates"=>$treatments[$i]->plates,
                "created_at"=>$treatments[$i]->created_at->toDateString(),
                "updated_at"=>$treatments[$i]->updated_at->toDateString(),
                "ended_at"=>$treatments[$i]->ended_at->toDateString(),
                "dentist"=>[
                    'id'=> $treatments[$i]->dentist->id,
                    'full_name'=> $treatments[$i]->dentist->user->fullname,
                    "email"=> $treatments[$i]->dentist->user->email,
                ],
                "patient"=> [
                    "id"=> $treatments[$i]->patient->id,
                    "full_name"=> $treatments[$i]->patient->user->fullname,
                    "email"=> $treatments[$i]->patient->user->email,
                ]
            ];
            array_push($arrayJson,$treatment);
        }
        return response()->json($arrayJson);
    }
}
