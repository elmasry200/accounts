<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Account;
use App\Http\Controllers\Response;

class AccountController extends Controller
{
    public function addAccount()
    {
       return view('addaccount');
    }

    public function ajaxParentLevel(Request $request){
  
    
       $parent_level    = $request->parent_level;
        $nature_account = $request->nature_account;

   
        $parentLevelAccounts = Account::where('level',$parent_level)
                  ->where('natural_account',$nature_account)->get(); 
 
        return response()->json($parentLevelAccounts)  ;                      
    }

    public function saveAccount(Request $request)
    {
      //return $request->all();
      
      if($request->level === '1')
      {
          $sibling_count = Account::where('level','=','1')->count()+1;
          $accounting_code = $sibling_count . '-0-0-000-00000';
          $request->request->add(['accounting_code'=>$accounting_code]);
          $request->request->add(['account_icon'=>'<i class="glyphicon glyphicon-edit m-r-2" ></i>']);
        //  return $request->all();
      }elseif($request->level === '2')
      {
         $accounting_parent = Account::where('id','=',$request->parent_id)
                                             ->value('accounting_code');
         $sibling_count = Account::where('parent_id','=',$request->parent_id)->count()+1;
         $accounting_code = substr($accounting_parent,0,2) . $sibling_count . '-0-000-00000';
         $request->request->add(['accounting_code'=>$accounting_code]);
         $request->request->add(['account_icon'=>'<i class="glyphicon glyphicon-edit m-r-2" ></i>']);
      }elseif($request->level === '3')
      {
         $accounting_parent = Account::where('id','=',$request->parent_id)
                                ->value('accounting_code');
         $sibling_count = Account::where('parent_id','=',$request->parent_id)->count()+1;
         $accounting_code = substr($accounting_parent,0,4) . $sibling_count . '-000-00000';
         $request->request->add(['accounting_code'=>$accounting_code]);
         $request->request->add(['account_icon'=>'<i class="glyphicon glyphicon-edit m-r-2" ></i>']);
      }elseif($request->level === '4')
      {
         $accounting_parent = Account::where('id','=',$request->parent_id)
         ->value('accounting_code');
         $sibling_count = Account::where('parent_id','=',$request->parent_id)->count()+1;
         $accounting_code = substr($accounting_parent,0,6) . str_repeat("0", 3-$sibling_count) . $sibling_count . '-00000';
         $request->request->add(['accounting_code'=>$accounting_code]);
         $request->request->add(['account_icon'=>'<i class="glyphicon glyphicon-edit m-r-2" ></i>']);
      }elseif($request->level === '5')
      {
         $accounting_parent = Account::where('id','=',$request->parent_id)
         ->value('accounting_code');
         $sibling_count = Account::where('parent_id','=',$request->parent_id)->count()+1;
         $accounting_code = substr($accounting_parent,0,10) . str_repeat("0", 5-$sibling_count) . $sibling_count;
         $request->request->add(['accounting_code'=>$accounting_code]);
         $request->request->add(['account_icon'=>'<i class="glyphicon glyphicon-edit m-r-2" ></i>']);
      }

      Account::create($request->all());
      
    }

    public function manageAccount()
    {
      $accounts = Account::where('parent_id', '=', 0)->get(); 
     
      return view('accountTreeview',compact('accounts'));
    }
 
}
