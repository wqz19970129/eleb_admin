<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddoderController extends Controller
{
    //
     public function index(Request $request){
          $rows=DB::select("select shop_name,count(shop_id)as a from addoders GROUP BY shop_name");
          //dd($rows);
         $start=$request->start;
         //dd($start);
         $start1=$start.' 00:00:00';
         $start2=$start.' 23:59:59';
         $orders=DB::select("select shop_name,count(shop_id)as a from addoders where created_at BETWEEN '{$start1}' and '{$start2}' GROUP BY shop_name");
         //dd($orders);
         return view('count.index',compact('rows','orders'));
     }
   public function sex(Request $request){
       $start=$request->start;
       $end=$request->end;
       $rows=DB::select("select shop_name,count(shop_id)as a from addoders GROUP BY shop_name");
       $orders=DB::select("select shop_name,count(shop_id)as a from addoders where created_at BETWEEN '{$start}' and '{$end}' GROUP BY shop_name");
       return view('count.sex',compact('rows','orders'));
   }
   public function good(Request $request){
      //$rows=DB::select("select goods_name,a_id,sum(amount)as a from ordergs GROUP BY goods_name");
       $rows=DB::select("select a.goods_name,count(amount)as c,b.shop_name,a.goods_id from ordergs as a LEFT JOIN admins as b on a.a_id=b.id GROUP BY a.goods_name,a.goods_id,b.shop_name");
    //dd($rows);
       $amount=0;
       foreach ($rows as $row){
           $amount+=$row->c;
       }
       //dd($amount);
       $start=$request->start;
       //dd($start);
       $start1=$start.' 00:00:00';
       $start2=$start.' 23:59:59';
       $orders=DB::select("select a.goods_name,sum(amount)as c,b.shop_name,a.goods_id from ordergs as a LEFT JOIN admins as b on a.a_id=b.id where a.created_at BETWEEN '{$start1}' and '{$start2}'GROUP BY a.goods_name,a.goods_id,b.shop_name");
       //dd($orders);
       $count=0;
       foreach ($orders as $order){
           $count+=$order->c;
       }
       //dd($count);
       return view('count.good',compact('rows','orders','amount','count'));
   }
   public function goods(Request $request){
       $rows=DB::select("select a.goods_name,count(amount)as c,b.shop_name,a.goods_id from ordergs as a LEFT JOIN admins as b on a.a_id=b.id GROUP BY a.goods_name,a.goods_id,b.shop_name");
       //dd($rows);
       $amount=0;
       foreach ($rows as $row){
           $amount+=$row->c;
       }
       //dd($amount);
       $start=$request->start;
       $end=$request->end;
       $orders=DB::select("select a.goods_name,sum(amount)as c,b.shop_name,a.goods_id from ordergs as a LEFT JOIN admins as b on a.a_id=b.id where a.created_at BETWEEN '{$start}' and '{$end}'GROUP BY a.goods_name,a.goods_id,b.shop_name");
       //dd($orders);
       $count=0;
       foreach ($orders as $order){
           $count+=$order->c;
       }
       //dd($count);
       return view('count.goods',compact('rows','orders','amount','count'));
   }
}
