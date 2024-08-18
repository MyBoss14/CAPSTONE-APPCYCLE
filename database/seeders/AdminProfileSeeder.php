<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =User::where('email','admin@gmail.com')->first();

        $seller = new Seller();
        $seller->banner ='uploads/banner660af5a2d9676.jpg';
        $seller->shop_name ='Admin Shop';
        $seller->phone ='123123123';
        $seller->email ='admin@gmail.com';
        $seller->address ='USB';
        $seller->description ='ew ew ew ew ew ew';
        $seller->user_id = $user->id;
        $seller->status = 1;
        $seller->save();
    }
}
