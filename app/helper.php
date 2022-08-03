<?php


if(!function_exists('dateH')){
    function dateH($data){
        $d=$data->created_at->diffForHumans();
        return $d;
    }
}
if(!function_exists('helper_message')){
    function helper_message($request,$m){
        $m=$request->session()->flash('status',$m);
        return $m;
    }
}
?>
