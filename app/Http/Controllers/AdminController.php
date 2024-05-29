<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.dashboard');
    }

    
    public function user(){
        return view('admin.user.manage-users');
    }

    public function vehicleCreate(){
        return view('admin.vehiclecreate');
    }

    public function vehicleDelivery(){
        return view('admin.vehicleDelivery');
    }

    public function materialallocation() {
        return view('admin.materialallocation');
    }
    
    public function editmaterial() {
        return view('admin.edit');
    }

 public function expenseinput(){
    return view('admin.expenseinput');
 }

 public function expenseview(){
    return view('admin.expenseview');
 }

 public function purchaseorder(){
    return view('admin.purchaseorder');
 }

}
