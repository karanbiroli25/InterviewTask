<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Http\Request;
use App\Http\Requests\PrizeRequest;

class PrizeController extends Controller
{

    public function index()
    {
        $prizes = Prize::all();
        return view('prizes.index',compact('prizes'));
    }
    public function create()
    {
        return view('prizes.create');
    }

    public function store(PrizeRequest $prizeRequest)
    {
        Prize::create($prizeRequest->all());
        return redirect(url('/'));
    }

    public function edit(Prize $prize)
    {
        return view('prizes.edit',compact('prize'));
    }

    public function update(PrizeRequest $prizeRequest,Prize $prize)
    {
        $prize->update($prizeRequest->all());
        return redirect(url('/'));
    }

    public function destroy(Prize $prize)
    {
        $prize->delete();
        return redirect(url('/'));
    }

    public function simulate(Request $request)
    {
        $noOfPrizes = (int) $request->get('number_of_prizes'); 
        $prizes = Prize::all();
        $totalProbability = $prizes->sum('probability');

        foreach ($prizes as $prize) {
            $shareRatio = $prize->probability / $totalProbability;
            $prizeShare = (int) round($noOfPrizes * $shareRatio);
            $actualRewards = rand(($prize->probability - 1) , ($prize->probability + 1));
            $prize->actual_rewards = $prize->actual_rewards == $actualRewards ? $actualRewards + 0.5 : $actualRewards;
            $prize->awarded = $prizeShare;
            $prize->save();
        }

        return back();
    }

    public function reset()
    {
        Prize::whereNotNull('actual_rewards')->update(['actual_rewards' => null , 'awarded' => null]);
        return back();

    }

}
