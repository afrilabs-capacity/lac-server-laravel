<?php

use Illuminate\Database\Seeder;
use App\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $states= 
     array(

      ['id'=>'1','state'=>'Abia State'],
      ['id'=>'2','state'=> 'Abuja FCT'],
      ['id'=>'3','state'=>'Adamawa State'],
      ['id'=>'4','state'=>'Akwa Ibom State'],
      ['id'=>'5','state'=>'Anambra State'],
      ['id'=>'6','state'=>'Bauchi State'],
      ['id'=>'7','state'=>'Bayelsa State'],
      ['id'=>'8','state'=>'Benue State'],
      ['id'=>'10','state'=>'Cross River State'],
      ['id'=>'11','state'=>'Delta State'],
      ['id'=>'12','state'=>'Ebonyi State'],
      ['id'=>'13','state'=>'Edo State'],
      ['id'=>'14','state'=>'Ekiti State'],
      ['id'=>'15','state'=>'Enugu State'],
      ['id'=>'16','state'=>'Gombe State'],
      ['id'=>'17','state'=>'Imo State'],
      ['id'=>'18','state'=>'Jigawa State'],
      ['id'=>'19','state'=>'Kaduna State'],
      ['id'=>'20','state'=>'Kano State'],
      ['id'=>'21','state'=>'Katsina State'],
      ['id'=>'22','state'=>'Kebbi State'],
      ['id'=>'23','state'=>'Kogi State'],
      ['id'=>'24','state'=>'Kwara State'],
      ['id'=>'25','state'=>'Lagos State'],
      ['id'=>'26','state'=>'Nasarawa State'],
      ['id'=>'27','state'=>'Niger State'],
      ['id'=>'28','state'=>'Ogun State'],
      ['id'=>'29','state'=>'Ondo State'],
      ['id'=>'30','state'=>'Osun State'],
      ['id'=>'31','state'=>'Oyo State'],
      ['id'=>'32','state'=>'Plateau State'],
      ['id'=>'33','state'=>'Rivers State'],
      ['id'=>'34','state'=>'Sokoto State'],
      ['id'=>'35','state'=>'Taraba State'],
      ['id'=>'36','state'=>'Yobe State'],
      ['id'=>'37','state'=>'Zamfara State']

       );

       foreach($states as $state){
       	State::create($state);
       }
        
    }
}
