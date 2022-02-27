<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('addWithParams')) {
    function addWithParams($table = '', $param = [])
    {
        try {
            $data = DB::table($table)->insert($param);
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
            return false;
        }
    }
}

if (!function_exists('editByWhere')) {
    function editByWhere($table = '', $param = [], $where = ''){
        try{
            $data = DB::table($table)->where('id', $where)->update($param);
            return $data;
        }catch(Exception $e){
            return false;
        }
    }
}

if (!function_exists('deleteByWhere')) {
    function deleteByWhere($table = '', $id = '')
    {
        try {
            return DB::table($table)->where('id', $id)->delete();
        } catch (Exception $e) {
            return false;
        }
    }
}

if (!function_exists('selectByWhere')) {
    function selectByWhere($table = '', $where = '')
    {
        try {
            return DB::table($table)->where($where)->get();
        } catch (Exception $e) {
            // return $e->getMessage();
            return false;
        }
    }
}

if(!function_exists('uploadImage'))
{
    function uploadImage($request, $str){
        if(!$request->hasFile($str)) {
            //Nếu chưa có file upload thì báo lỗi
            return false;
         }
         else {
            //Xử lý file upload
            $image = $request->file($str);
            //Lưu trữ file tại public/images
            $name = date('Y_m_d_H_i_s_').$image->getClientOriginalName();
            $imagePath = $image->move('Avatar', $name);
            return $name;
         }
    }
}

