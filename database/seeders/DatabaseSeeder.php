<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;use App\Models\{User,Category,Product};use Illuminate\Support\Facades\Hash;use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder {public function run():void{
User::updateOrCreate(['email'=>'admin@sembakomart.test'],['name'=>'Admin SembakoMart','phone'=>'081234567890','address'=>'Jepara','password'=>Hash::make('Admin12345!'),'is_admin'=>true]);
$rows=[['Beras','Beras Ramos 5 Kg',72000,25],['Minyak','Minyak Goreng 1 L',18000,40],['Gula','Gula Pasir 1 Kg',17000,30],['Telur','Telur Ayam 1 Kg',29000,20],['Mi Instan','Mi Instan Goreng',3500,100]];
foreach($rows as [$catName,$name,$price,$stock]){$cat=Category::firstOrCreate(['name'=>$catName],['slug'=>Str::slug($catName)]);Product::updateOrCreate(['name'=>$name],['category_id'=>$cat->id,'slug'=>Str::slug($name).'-'.Str::random(4),'price'=>$price,'stock'=>$stock,'description'=>'Produk kebutuhan sehari-hari.','is_active'=>true]);}
}}