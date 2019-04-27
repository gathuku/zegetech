<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AmountTransfered;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaction;
use App\Notify;

class TransactionController extends Controller
{
    public function topUp(Request $request)
    {
      $token = $request->header('Authorization');
      $tokenExplode=explode(" ",$token);
      $theToken=$tokenExplode[1];

      $amount=$request->amount;

      //return ['amount'=>$amount,'token'=>$theToken];
      $userID=User::where('api_token',$theToken)->value('id');

      if($userID){
        //Get the current amount
        $currentAmount=User::where('id',$userID)->value('wallet_amount');

        $newAmount=$currentAmount + $amount;
        //Update amount
          $topUp= User::where('id',$userID)->update(['wallet_amount'=>$newAmount]);
          //Update Notification
          $saveTransaction=Transaction::create([
            'made_by'=>$userID,
            'made_to'=>$userID,
            'type' =>'credit',
            'amount'=>$amount,
          ]);
        if ($topUp && $saveTransaction) {

          return ['message'=> 'Success Amount deposited'];

        }else {
          return ['message'=>'Amount could not be deposited'];
        }
      }else {
        return ['message'=>'User not found'];
      }

    }

    public function transfer(Request $request)
    {

        $token = $request->header('Authorization');
        $tokenExplode=explode(" ",$token);
        $theToken=$tokenExplode[1];

        $amount=$request->amount;
        $madeTo=$request->madeTo;
        $madeToEmail=User::where('id',$madeTo)->value('email');

        //return ['amount'=>$amount,'token'=>$theToken];
        $userID=User::where('api_token',$theToken)->value('id');
        $userName=User::where('api_token',$theToken)->value('name');

        if($userID){
          //Get the current amount
          $currentAmount=User::where('id',$userID)->value('wallet_amount');

          $newAmount=$currentAmount - $amount;
          //Update amount
            $topUp= User::where('id',$userID)->update(['wallet_amount'=>$newAmount]);
            //Update Notification
            $saveTransaction=Transaction::create([
              'made_by'=>$userID,
              'made_to'=>$madeTo,
              'type' =>'debit',
              'amount'=>$amount,
            ]);

          $message=$userName.' Has transferred '.$amount.' to your account, Your balance now is '.$newAmount;
            //save notification
            Notify::create([
              'user_id'=>$madeTo,
              'message'=>$message,
            ]);
          if ($topUp && $saveTransaction) {
             //Notify through email
             Notification::route('mail', $madeToEmail)
            ->notify(new AmountTransfered($message));
            return ['message'=> 'Success Amount Sent'];

          }else {
            return ['message'=>'Amount could not be Sent'];
          }
        }else {
          return ['message'=>'User not found'];
        }

    }
}
