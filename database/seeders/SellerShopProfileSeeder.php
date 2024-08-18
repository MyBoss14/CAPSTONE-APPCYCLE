<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SellerShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =User::where('email','seller@gmail.com')->first();

        $seller = new Seller();
        $seller->banner ='uploads/banner660af5a2d9676.jpg';
        $seller->shop_name ='Seller Shop';
        $seller->phone ='123123123';
        $seller->email ='seller@gmail.com';
        $seller->address ='USB';
        $seller->description ='seller shop description sample dummy baka';
        $seller->user_id = $user->id;
        $seller->status = 1;
        $seller->save();
    }
}
