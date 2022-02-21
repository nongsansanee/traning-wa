<?php

namespace Database\Seeders;

use App\Models\Tree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->string('name');
        // $table->string('type');
        // $table->float('price');
        // $table->string('status');  // ready-for-sale , pre-order , wait ,reserve
        // $table->string('remark')->nullable();
        $trees = array(
            ['name'=>'กุหลาบ','type'=>'flower','price'=>'300','status'=>'ready-for-sale','remark'=>'สูง 30 ซม.'],
            ['name'=>'ทุเรียน','type'=>'fruit','price'=>'1000','status'=>'reserve'],
        );
        
        foreach($trees as $tree){
            Tree::create($tree);
        }
    }
}
