<?php

use App\Dreport;
use App\Council;
use App\Zone;
use App\State;
Use App\Centre;
Use App\Role;
Use App\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/mail_test', function () {

  $user= User::where('email','braimahjake@gmail.com')->firstOrFail();

  $token="4848484884";

//return new App\Mail\ActivationToken( $user,$token );
return new App\Mail\PasswordReset( $user,$token );
});

Route::get('/', function () {

	$daily_report = array(
  array('id' => '1','user_id' => '1','first_name' => 'Braimah','last_name' => 'Attah','gender' => 'Male','age' => '24','occupation' => 'HouseWife','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Theft','complaints' => NULL,'location' => '11','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-21 20:28:38','updated_at' => '2021-02-21 20:28:38'),
  array('id' => '2','user_id' => '1','first_name' => 'Sanni','last_name' => 'Kaita','gender' => 'Male','age' => '24','occupation' => 'HouseWife','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Stealing','complaints' => NULL,'location' => '8','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-21 22:15:53','updated_at' => '2021-02-21 22:15:53'),
  array('id' => '3','user_id' => '1','first_name' => 'Tosin','last_name' => 'Adeojo','gender' => 'Male','age' => '26','occupation' => 'HouseWife','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Stealing','complaints' => NULL,'location' => '11','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-21 22:17:34','updated_at' => '2021-02-21 22:17:34'),
  array('id' => '4','user_id' => '1','first_name' => 'Sarah','last_name' => 'Etim','gender' => 'Female','age' => '34','occupation' => 'HouseWife','granted' => 'Yes','case_type' => 'Civil','offence' => NULL,'complaints' => 'Accident','location' => '2','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-21 22:19:34','updated_at' => '2021-02-21 22:19:34'),
  array('id' => '5','user_id' => '1','first_name' => 'Jenny','last_name' => 'Abraham','gender' => 'Female','age' => '24','occupation' => 'HouseWife','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Accident','complaints' => 'Accident','location' => '1','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-21 22:20:53','updated_at' => '2021-02-21 22:20:53'),
  array('id' => '6','user_id' => '1','first_name' => 'Henry','last_name' => 'David','gender' => 'Male','age' => '23','occupation' => 'NYSC','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Stealing','complaints' => NULL,'location' => '8','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-21 22:46:42','updated_at' => '2021-02-21 22:46:42'),
  array('id' => '7','user_id' => '1','first_name' => 'Henry','last_name' => 'David','gender' => 'Male','age' => '23','occupation' => 'NYSC','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Stealing','complaints' => NULL,'location' => '8','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-21 23:02:27','updated_at' => '2021-02-21 23:02:27'),
  array('id' => '8','user_id' => '1','first_name' => 'Ugah','last_name' => 'Peter','gender' => 'Male','age' => '23','occupation' => 'NYSC','granted' => 'Yes','case_type' => 'Civil','offence' => NULL,'complaints' => 'Accident','location' => '11','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-21 23:07:14','updated_at' => '2021-02-21 23:07:14'),
  array('id' => '9','user_id' => '1','first_name' => 'Joseph','last_name' => 'Okunorobo','gender' => 'Male','age' => '24','occupation' => 'Business Man','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Manslaughter','complaints' => NULL,'location' => '2','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-22 04:21:02','updated_at' => '2021-02-22 04:21:02'),
  array('id' => '10','user_id' => '1','first_name' => 'Martin','last_name' => 'Gabriel','gender' => 'Male','age' => '36','occupation' => 'Student','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Theft','complaints' => NULL,'location' => '8','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-22 04:30:42','updated_at' => '2021-02-22 04:30:42'),
  array('id' => '11','user_id' => '1','first_name' => 'Daniel','last_name' => 'Ihile','gender' => 'Male','age' => '25','occupation' => 'Artisan','granted' => 'Yes','case_type' => 'Civil','offence' => NULL,'complaints' => 'Death Benefit','location' => '2','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-22 04:34:09','updated_at' => '2021-02-22 04:34:09'),
  array('id' => '12','user_id' => '1','first_name' => 'Simon','last_name' => 'Lalong','gender' => 'Male','age' => '35','occupation' => 'Farmer','granted' => 'Yes','case_type' => 'Criminal','offence' => 'Robbery','complaints' => NULL,'location' => '32','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-22 04:35:19','updated_at' => '2021-02-22 04:35:19'),
  array('id' => '13','user_id' => '1','first_name' => 'Deborah','last_name' => 'Kubiana','gender' => 'Female','age' => '25','occupation' => 'HouseWife','granted' => 'Yes','case_type' => 'Civil','offence' => NULL,'complaints' => 'Matrimonial Matters','location' => '33','bail_status' => 'Pending','outcome' => 'Case was dismissed on grounds of disqualification','created_at' => '2021-02-22 04:37:08','updated_at' => '2021-02-22 04:37:08')
);

foreach ($daily_report as $dreport) {
	# code...
	//Dreport::insert($dreport);
}

// $xmlfile  = simplexml_load_file('yourxmlfile.xml');
// foreach ($xmlfile->channel->item as $item) {
//     var_dump($item->xpath('title'));
//     var_dump($item->xpath('wp:post_type'));
// }
$council=array("Mrs Olubukola Abayomi Adebayo", "Mr.A.E.Akpan", "Mrs. E.O. Adams", "Mr.S.N.Ubazi", "Mr. Tunde Ikusagba", "Mr. Enoch Mozong Azariah", "Mrs. Bulila Ladukiya Ikaro", "Mr. Abdul Fattah Bakre", "Mr. Joseph Ayok Achi", "Mr.Micheal A.Awoponle", "Mr. K.O.Mozea", "Mr. Adetola Onafuwa", "Mr. B. O. Ibikunle", "Mr. Victor Labesa", "Mr. Benard Onokowhemu", "Mr. Oseni Agboghaiyemeh", "Mr. Ayodele Banjo", "Mr. F.O.Johnson", "Mrs. Latifat Salau", "Mr. Nurudeen O. Ishola", "Mr.B.L.Udoye", "Mr. Titus Umaru Lektu", "Mr. Issa Ibitayo Ibrahim", "Mrs.Mauren Ngozi Ogba", "Mrs.B.F.Ohwoavworhua", "Mr. Olusegun Komolafe", "Mr. Sani Hassan", "Mr. Helmon Buba Koston", "Mr. Oliver Chukwuma", "Mr. Muktar L. Usman", "Mr. Offor K. Eni", "Mrs.M.S.Kombo-Ezeh", "Mr. Solomon Adebowale", "Mrs Ruth.O.Oguche", "Mr. Ogah Ogenyi Oligwu", "Miss.Jessica N.Mamven", "Mrs. Bolanle O. Jibogun", "Mrs. Ifeoma A. Adedeji", "Miss. Kwa Vivian Zong", "Mrs. Julie A. Olorunfemi", "Mrs.Lydia.O.Diyan", "Mrs. Olaniyan Yinka Ganiyat", "Mr.S.M. Al-hassan", "Mr. Dalhtu Mohammed Kolo", "Mrs. A. S. Nkemadu", "Mrs. Egwuasi N. Hedwig", "Mrs. Odutayo O. Funmi", "Mr. R.O. Adeloye", "Mr. Leonard Obiji", "Mr. Paul Ejembi", "Mrs.Kubiat S.Ikpidungise", "Mrs. Lilian Uchenna Chikwe", "Mrs. Jummai Fagbure", "Mrs. Joy Ogbonnaya", "Mr. Ajibo Sunday Ndubisi", "Mr. Eddy O. Inenevbor", "Mrs.R.U.Maduabuchi", "Mr. Okwuegbu E. Kingsley", "Mrs. R.A. Odeyale", "Mr. Akilahyel Shettima", "Mr. Shina Isaac Ibiyemi", "Mr. Hanbal A. Subair", "Mrs. Jessica R. Ofia", "Mrs. Igu Martha Egwu", "Mrs.A.L.Muslimat", "Mrs.Patience Ihemekpen", "Mrs.Akingbade.T. Iyabo", "Mr. Umeh John Ogbonna", "Mrs. Egwuagu Ngozi Mirian", "Mrs.Grace Adenubi", "Mrs. Victoria Onyekwelu", "Mrs. Jennifer Imhansi-Jacob", "Mr. Yakubu Gado", "Mr. Adula A. Samson", "Mrs. Okoh Juliana Ibeli", "Miss. Ese Bolokor", "Mrs. Maisaje N. Brenda", "Mr. Ogbe Francis Adam", "Mr. Orere Felix", "Mrs. Unoma R. Dibie-Aninye", "Mrs.Nsot Grace Eni", "Mr. Ashefel Joseph Adie", "Mrs. Flora Chinyere Imo", "Mrs. Anita Nnenna Chukwuka", "Mrs.Ogechukwu.B.Ibenegbu", "Mrs.A.I.Yaji", "Mr. Saed A. Lawal", "Mr. Osita O. Ofiaeli", "Mr. Dauda Hassan", "Ms.L.M.Aondoakaa", "Mrs Susan Anuri Ekenedo", "Miss. Felicia Udoye", "Mr. Aliyu Hussaini", "Mr. Mohammed A. Jamo", "Mr.M.U.Akamabe", "Mrs. Omolara A. Afolabi", "Mrs. Asma'u T. Baderinwa", "Mrs.A.C.Onyejekwe", "Mr. Folorunsho A. Boye", "Mrs.C.M.Njoku", "Mrs. Atano Ejovmokeogene", "Mr. Umoru D. Yunusa", "Mr. Saminu D. Alkantara", "Mr. Igyor Tersoo", "Mr. Mathew A. Eigege", "Mrs.Z.A Mbortor-Elemi", "Mr.Muhammed K.Auwalu", "Mrs.B.K.Kodiya", "Mrs Rosecollette i. Ogierhiakhi", "Mrs.IK-Obi Ifeoma Chiege", "Miss. Louisa Mbamalu", "Miss. Adesola T. Adeaga", "Mrs.Lami A. Amlogu", "Mr.Hansel C.Ewulum", "Mrs.Chika Ikem-Mgbemena", "Miss.Chinwe B Mbah", "Mr. Leo Onwe Emeka", "Mr. Samuel John", "Mr. David Agun", "Mrs. Joy S.Bob Manuel", "Mr. Obinna S. Odenigbo", "Mrs Ellen O. Seun-Boyejo", "Mrs. Vianana O. Dauebi", "Mrs. Ifeanyi M Egbuna", "Mr. Ugoh Micheal Guda", "Mr. Tajudeen S. Olaosebikan", "Mrs.katty A.Yille", "Mr. Kator S. Adeiyongo", "Mrs. Doris Nkiruka Ememonu", "Mr.Rufus Micheal Bamidele", "Mr. Alasan Zibiri", "Miss. Ipede F. Oluwatoyin", "Mr. Okunorobo C. Eghomwanre", "Mr.Oyoyo Chibuike Remmy", "Miss. Victoria K. Bob-Manuel", "Mrs. Imam M. Hasiya", "Mr. Ejido China Echika", "Mrs. Folasade Akin Adewale", "Mr. Chidi Ogo. Mmo", "Mr. Muhammed Nasiru Sidi", "Miss.Ogundare F. Bosede", "Mr. Adekeye O. Olusegun", "Miss. Labesa Abigail", "Mr. Ahmad Umar Abubakar", "Mr. Lawal Abdulsamad", "Mrs. Aga Obiamaka Chiazor", "Mr. Ben Domitiye Braye", "Mrs Iquo Inemsit Uwah", "Mrs.Etoruom Omeresan", "Miss.Ohiagu Stella Uche", "Mrs. Jimoh A. Afusat", "Mrs. Ramatu Jega Usman", "Mr. Osamuyi F. Agyo", "Mrs. Laku Michelle Shall", "Miss. Asalu Josephine Dolapo", "Mr. Yusuf Y. Y.Shelleng", "Mrs. Ibrahim Mimi Fatimah", "Miss. Arokoyo A. Ajibike", "Mrs. Ibrahim A. Rabiatu", "Mr.Fanaye Kevin Taye", "Mr. Moneke I. Azubuike", "Mrs. Yusuf Yunusa Faiza", "Mr. Briggs Ibiba Mpaka", "Mrs.Jack-Ojikah Helen", "Mrs. Hauwa K. Abdulmumin", "Miss. Bello Abimbola Bridget", "Mr. Alubi C. Sunny", "Mrs. Tolulope S.Nganga", "Miss. Timi-Johnson D. Bina", "Mrs. Azubuike Tam Esther", "Mrs. Linda C. Mogekwu", "Mrs. Mfon Kufre-Abasi", "Mr. Otoghile K. Ewaen", "Mr. Joseph Tuku Bisong", "Mrs. Salamat A. Kaka", "Miss.Rizyndai Ogbonna", "Mrs. Fatima J. Familisu", "Mr. Labaga A. Helmah", "Mrs. Yakubu N. Na'ilah", "Mrs,Enejoh J.Mbavelumun", "Miss Dinah Jack", "Mrs. Sandra O. Benjamin", "Miss Adisa A. Abdul-raheem", "Mr.Stephen F. Sanda", "Mr.Aliyu Olusola Agbaogun", "Mr.Opaleke A. Rotimi", "Mrs. Ochubili A. Chioma", "Mrs.Fadeelat O.Rogers", "Miss.Amina Umar Hussain", "Mrs.Emareyo E. Caroline", "Mr.Habila Mark Laukai", "Mr.Pile Gayus Kombo", "Mr.Farouk Usman Dauran", "Mr.James Peter Bwala", "Mrs.Chimele A.Okwute", "Mr. Rasheed Abiola Salau", "Mr.Abdulkarim M. Gindau", "Miss. Banyawa U. Phoebe", "Mr.Nathaniel S. Nwokpoku", "Mrs. Roseline Obiakor", "Mr.Obongha I. Usang", "Miss Grace Ladi Edet", "Miss Rose Uyoyo Okoi", "Ms. Clementina Q. Odeh", "Mr. Aloysius Onochie", "Mr. Afamefune Agbakor", "Mrs. Nnenna Ogba Moneke", "Miss Jummai Musa", "Mrs. Ivbade Precious Eseigbe", "Mr. Aliyu A. Muhammed", "Mr. Mohammed Salisu", "Mr. Justice C. Igboke", "Miss Akundushima J. Gondo", "Mr. Amiesimaka T. Bassey", "Mr. Eseimokumo B. Okoto", "Mr. Olabisi Palmer", "Mr. Lucy A. Binna", "Mr. Luka P. Mahanan", "Mrs. Ubwas H. Daniel", "Mr. Mustapha A. Muazu", "Mr. Anthony V. Omozenumu", "Mrs. Kokei Ogbonnaya", "Miss Toyin S. Asake", "Mr Durodoluwa E. Oyeyiola", "Miss Juliana Ogundipe", "Mr. Ibrahim A. Chiroma", "Miss Diana Bagaiya", "Mr. Agaba Carl. Amedu", "Mrs. Ijeoma M.O. Mbah", "Miss Jacqueline C. Ugorji", "Mr. Yusuf Abdulrahman", "Mr. Agu Ndubuisi Dandy", "Miss Charity A. Adetayo", "Mrs. Silverline . Brown", "Mrs. Omovie E. Wachukwu", "Miss Bukola B. Omotosho", "Mr. Abdulrahman O. Salaudeen", "Mrs Tosan F. Jaja", "Mrs. Quincy Olarewaju", "Mr. Marwan Manava", "Miss Princess N. Ofuokwu", "Mrs. Yetunde Adesida", "Mr. Temitope Akingbogun", "Miss. Njideka V. Okoronkwo", "Mr. Mohammed Abubakar", "Mr. Gambo Isa", "Miss Rajuno Paul Okoi", "Mrs. Sarah I. Akomaye", "Mr Emmanuel Kuza", "Ms. Biebele F. Ajijola", "Mr. Benjamin Okoh", "Mr. Adamu Okugya Paul", "Mr. Edward Omaga", "Miss Maryam Mohammed Mana", "Mr. Uchenna E. Ikeazor", "Mr. Haruna Audu", "Mrs.Janefrances O. Bianeyin", "Mrs Aderinsola T. Oyediji", "Mrs. Ihuoma Jane Akaba", "Mrs Sandra O. Adegbulugbe", "Mrs. Janada Dauda Gadzama", "Mrs. Aisha Inuwa", "Mrs. Ogechi O. Nzenwa", "Mrs. Omoniyi O. Olayinka", "Mrs. Hiradi U. Banu", "Miss.Awah Ann Aloryo", "Mr Ituen Ukpono Ituen", "No Name", "NYSC LAWYER", "Para- Legal Staff", "Probono Lawyer", "SURE P LAWYER");


// foreach ($council as $value) {
// 	echo($value)."<br/>";
// 	Council::create(['name'=>$value]);
// }

// foreach (Dreport::all() as $report) {
//  $report->age=(int)$report->age;
//  $report->save();
// }


// $zones=[
// ["zone"=>"Headquarters And Abuja"],
// ["zone"=>"North Central Zone And State Offices"],
// ["zone"=>"North East Zone And State Offices"],
// ["zone"=>"North West Zone And State Offices"],
// ["zone"=>"South East Zone And State Offices"],
// ["zone"=>"South South Zone And State Offices"],
// ["zone"=>"South West Zone And State Offices"]
   
// ];


// foreach ($zones as $zone) {
//  Zone::insert($zone);
//  //$report->save();
// }

$states = array(
  array( 'zone_id'=>5, 'id' => '1','state' => 'Abia State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array( 'zone_id'=>1, 'id' => '2','state' => 'Abuja FCT','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array( 'zone_id'=>3, 'id' => '3','state' => 'Adamawa State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>6, 'id' => '4','state' => 'Akwa Ibom State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>5, 'id' => '5','state' => 'Anambra State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>3, 'id' => '6','state' => 'Bauchi State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>6, 'id' => '7','state' => 'Bayelsa State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>2, 'id' => '8','state' => 'Benue State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>6, 'id' => '10','state' => 'Cross River State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>6, 'id' => '11','state' => 'Delta State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>5, 'id' => '12','state' => 'Ebonyi State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>6, 'id' => '13','state' => 'Edo State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>7, 'id' => '14','state' => 'Ekiti State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>5, 'id' => '15','state' => 'Enugu State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>3, 'id' => '16','state' => 'Gombe State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>5, 'id' => '17','state' => 'Imo State','created_at' => '2020-04-10 14:55:58','updated_at' => '2020-04-10 14:55:58'),
  array('zone_id'=>4, 'id' => '18','state' => 'Jigawa State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>4, 'id' => '19','state' => 'Kaduna State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>4, 'id' => '20','state' => 'Kano State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>4, 'id' => '21','state' => 'Katsina State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>2, 'id' => '22','state' => 'Kebbi State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>1, 'id' => '23','state' => 'Kogi State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>2, 'id' => '24','state' => 'Kwara State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>7, 'id' => '25','state' => 'Lagos State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>2, 'id' => '26','state' => 'Nasarawa State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>2, 'id' => '27','state' => 'Niger State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>7, 'id' => '28','state' => 'Ogun State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>7, 'id' => '29','state' => 'Ondo State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>7, 'id' => '30','state' => 'Osun State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>7, 'id' => '31','state' => 'Oyo State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>2, 'id' => '32','state' => 'Plateau State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>6, 'id' => '33','state' => 'Rivers State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>4, 'id' => '34','state' => 'Sokoto State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>3, 'id' => '35','state' => 'Taraba State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>3, 'id' => '36','state' => 'Yobe State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59'),
  array('zone_id'=>4, 'id' => '37','state' => 'Zamfara State','created_at' => '2020-04-10 14:55:59','updated_at' => '2020-04-10 14:55:59')
);

// foreach ($states as $state) {
//  State::insert($state);
//  //$report->save();
// }

//  $centres=[
//  array('state_id'=>2,'centre' => 'HQ'),
//  array('state_id'=>2, 'centre' =>'Bwari Centre'),
//  array('state_id'=>2, 'centre' =>'Gwagwalada Centre'),
//  array('state_id'=>2, 'centre' =>'Karu Centre'),


//  array('state_id'=>0, 'centre' =>'NC HQ'),
//  array('state_id'=>32, 'centre' =>'Shendam Centre'),
//  array('state_id'=>8, 'centre' =>'Katsinal Ala Centre'),
//  array('state_id'=>27, 'centre' =>'Suleja Centre'),
//  array('state_id'=>27, 'centre' =>'Bida Centre'),

//  array('state_id'=>0, 'centre' =>'NE HQ'),
//  array('state_id'=>16, 'centre' =>'Biliri Centre'),
//  array('state_id'=>6, 'centre' =>'Ningi Centre'),


//  array('state_id'=>0, 'centre' =>'NW HQ'),
//  array('state_id'=>19, 'centre' =>'Kaduna South Centre'),
//  array('state_id'=>19, 'centre' =>'Kafanchan Centre'),
//  array('state_id'=>19, 'centre' =>'Chikun Centre'),
//  array('state_id'=>20, 'centre' =>'Unogogo Centre'),


//  array('state_id'=>0, 'centre' =>'SE HQ'),
//  array('state_id'=>5, 'centre' =>'Otuocha Centre'),
//  array('state_id'=>5, 'centre' =>'Umuchukwu Centre'),
//  array('state_id'=>5, 'centre' =>'Neni Centre'),



//  array('state_id'=>0, 'centre' =>'SS HQ'),
//  array('state_id'=>13, 'centre' =>'Auchi Centre'),
//  array('state_id'=>7, 'centre' =>'Sagbama Centre'),
//  array('state_id'=>7, 'centre' =>'Ogbia Centre'),
//  array('state_id'=>33,'centre' => 'Abonema Centre'),


//  array('state_id'=>0, 'centre' =>'SW HQ'),
//  array('state_id'=>25,'centre' => 'Badagry Centre'),
//  array('state_id'=>29,'centre' => 'Owo Centre'),
//  array('state_id'=>31, 'centre' =>'Akinyele Moniya Community Centre')
//  ];

// foreach ($centres as $centre) {
//  Centre::insert($centre);
//  //$report->save();
// }

$userExce = array(
  
  array("S/N"=>"1","names"=>"Mr.Opaleke Adeyinka Rotimi","status"=>"PLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Ekiti","gl"=>12,"sex"=>"M","phone"=>7067976271,"email"=>"opalekea@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Durodoluwa Emmanuel Oyeyiola","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Ekiti","gl"=>12,"sex"=>"M","phone"=>8050928154,"email"=>"dolu.oyeyiola@gmail.com"),
  array("S/N"=>"OSUN","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Julie Anuoluwapo Olorunfemi","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Osun","gl"=>14,"sex"=>"F","phone"=>8036963005,"email"=>"julieyetunde@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Aliyu Olusola Agbaogun","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Osun","gl"=>13,"sex"=>"M","phone"=>8136294510,"email"=>"olusolaaliyu@gmail.com"),
  array("S/N"=>"3","names"=>"Miss Ipede Folashade Oluwatoyin","status"=>"PLAO","qualification"=>"LLB, BL","location"=>"Osun","gl"=>12,"sex"=>"F","phone"=>8034659120,"email"=>"feozy2@gmail.com"),
  array("S/N"=>"OYO","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Odutayo Wumi Funmi","status"=>"DD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"Oyo","gl"=>16,"sex"=>"F","phone"=>8083498715,"email"=>"fodutayo34@gmail.com"),
  array("S/N"=>"2","names"=>"Mrs.Lydia Olawunmi Diyan","status"=>"CLAO","qualification"=>"LLB,BL.","location"=>"Oyo","gl"=>14,"sex"=>"F","phone"=>8023824598,"email"=>"lydola2001@yahoo.com "),
  array("S/N"=>"3","names"=>"Mrs. Rukkayah Augie Odeyale","status"=>"ACLAO","qualification"=>"LLB,BL.","location"=>"Oyo","gl"=>14,"sex"=>"F","phone"=>7038222295,"email"=>"rukayyahodeyale@gmail.com"),
  array("S/N"=>"4","names"=>"Mrs. Ellen Olajumoke Seun-Boyejo","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Oyo","gl"=>12,"sex"=>"F","phone"=>7063616762,"email"=>"olanipekunellen@gmail.com"),
  array("S/N"=>"5","names"=>"Mrs. Yetunde Adesida","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Oyo","gl"=>12,"sex"=>"F","phone"=>8056672925,"email"=>"yetadesida@gmail.com"),
  array("S/N"=>"ONDO","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Kubiat Ikpidungise Uwemobong Okon","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Ondo","gl"=>14,"sex"=>"F","phone"=>8062687179,"email"=>"kubsilk@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Yusuf Abdulrahman","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Ondo","gl"=>12,"sex"=>"M","phone"=>8034828609,"email"=>"lawyarabdulrahman67@gmail.com"),
  array("S/N"=>"3","names"=>"Mrs. Toyin Seun Asake","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Ondo","gl"=>12,"sex"=>"F","phone"=>8039650509,"email"=>"toyin.aladetoyinbo@yahoo.com"),
  array("S/N"=>"OGUN","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Miss. Adesola Temitope Adeaga","status"=>"ACLAO (Coordinator)","qualification"=>"LLB, BL","location"=>"Ogun","gl"=>13,"sex"=>"F","phone"=>8034714206,"email"=>"desoso110@yahoo.com"),
  array("S/N"=>"2","names"=>"Mr. Rasheed Abiola Salau","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Ogun","gl"=>12,"sex"=>"M","phone"=>8085779573,"email"=>"salaurasheedabiola@gmail.com"),
  array("S/N"=>"3","names"=>"Mr. Temitope Akigbogun","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Ogun","gl"=>12,"sex"=>"M","phone"=>7034410780,"email"=>"takigbogun84@gmail.com"),
  array("S/N"=>"4","names"=>"Miss Bukola Busola Omotosho","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Ogun","gl"=>12,"sex"=>"F","phone"=>8035285426,"email"=>"busola.omotoso14@gmail.com"),
  array("S/N"=>"LAGOS","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Latifat Salau","status"=>"DD (Legal) (Zonal Director)","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>16,"sex"=>"F","phone"=>8023154578,"email"=>"lysalau@yahoo.com"),
  array("S/N"=>"2","names"=>"Mrs. Akingbade Temitope Iyabo","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>15,"sex"=>"F","phone"=>9060822434,"email"=>"iakingbade05@gmail.com"),
  array("S/N"=>"3","names"=>"Mrs. Jessica Rotjimwa Ofia","status"=>"CLAO","qualification"=>"LLB,BL.","location"=>"Lagos","gl"=>14,"sex"=>"F","phone"=>8033928429,"email"=>"jessicaofia1@gmail.com"),
  array("S/N"=>"4","names"=>"Mrs. Ifeoma Anne Adedeji","status"=>"CLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>14,"sex"=>"F","phone"=>8055329399,"email"=>"ifyanne2001@yahoo.com"),
  array("S/N"=>"5","names"=>"Mrs. Jummai Larry Ola Fagbure","status"=>"CLAO","qualification"=>"LLB,BL.","location"=>"Lagos","gl"=>14,"sex"=>"F","phone"=>8037039090,"email"=>"oloworimi@gmail.com "),
  array("S/N"=>"6","names"=>"Mrs.Grace Adenubi ","status"=>"CLAO","qualification"=>"LLB,BL.","location"=>"Lagos","gl"=>14,"sex"=>"F","phone"=>8036785381,"email"=>"barrgraceadenubi@gmail.com"),
  array("S/N"=>"7","names"=>"Mrs.Chinyere Miriam Njoku","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>13,"sex"=>"F","phone"=>7010793646,"email"=>"njoku.marian.c@gmail.com"),
  array("S/N"=>"8","names"=>"Mrs. Adaora Chidiogo Onyejekwe","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>13,"sex"=>"F","phone"=>8117963436,"email"=>"adaonyejekwe@gmail.com"),
  array("S/N"=>"9","names"=>"Mrs. Babalola Augustina Ajibike","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>12,"sex"=>"F","phone"=>8034445534,"email"=>"babalolajibike@yahoo.com"),
  array("S/N"=>"10","names"=>"Mrs. Doris Nkiruka Ememonu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>12,"sex"=>"F","phone"=>8098087172,"email"=>"dorisememonu@gmail.com"),
  array("S/N"=>"11","names"=>"Mrs. Sandra Ofunmbuk Benjamin","status"=>"PLAO","qualification"=>"LLB,LL","location"=>"Lagos","gl"=>12,"sex"=>"F","phone"=>7032072118,"email"=>"sandrabenjamin563@gmail.com"),
  array("S/N"=>"12","names"=>"Mrs. Ochubili Adaora Chioma","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>12,"sex"=>"F","phone"=>8033575997,"email"=>"adauche124@gmail.com"),
  array("S/N"=>"13","names"=>"Mrs. Omolara Fadeelat Arewa Rogers","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>12,"sex"=>"F","phone"=>8056715548,"email"=>"omolararewa@gmail.com"),
  array("S/N"=>"14","names"=>"Mrs. Ijeoma Martha Obisike- Mbah","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>12,"sex"=>"F","phone"=>8035464273,"email"=>"aijaybabe2004@gmail.com  "),
  array("S/N"=>"15","names"=>"Mrs. Olubusola Abayomi-Adebayo","status"=>"SLAO","qualification"=>"LLB,BL","location"=>"Lagos","gl"=>10,"sex"=>"F","phone"=>8065640201,"email"=>"busolaidowu@gmail.com"),
  array("S/N"=>"","names"=>"LEGAL AID COUNCIL SOUTH SOUTH ZONE","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),


  array("S/N"=>"DELTA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Benard Eseoghene Onokowhemu","status"=>"DD (Legal) (Zonal Director)","qualification"=>"LLB,BL","location"=>"Delta","gl"=>16,"sex"=>"M","phone"=>8029426828,"email"=>"bernardonokohwemu@yahoo.com"),
  array("S/N"=>"2","names"=>"Mrs. Flora Chinyere Imo","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Delta","gl"=>13,"sex"=>"F","phone"=>8037024118,"email"=>"florachinyere@yahoo.com"),
  array("S/N"=>"3","names"=>"Mr. Otoghile Kingsley Ewaen","status"=>"ACLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Delta","gl"=>13,"sex"=>"M","phone"=>8033780993,"email"=>"kingsew@yahoo.com"),
  array("S/N"=>"4","names"=>"Mrs. Rosecollette Ijeoma Ogierhiakhi","status"=>"ACLAO","qualification"=>"LLB,BL.","location"=>"Delta","gl"=>13,"sex"=>"F","phone"=>8034316468,"email"=>"collettesfragranceventravels@gmail.com"),
  array("S/N"=>"5","names"=>"Mr. Osita Onwuatuegwu Ofiaeli","status"=>"ACLAO","qualification"=>"LLB,BL, LLM","location"=>"Delta","gl"=>13,"sex"=>"M","phone"=>8032065410,"email"=>"ogadinma2002@yahoo.com"),
  array("S/N"=>"6","names"=>"Mrs. Azubuike Tam Esther","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Delta","gl"=>12,"sex"=>"F","phone"=>8064845686,"email"=>"tamazubuike78@gmail.com"),
  array("S/N"=>"7","names"=>"Mr. Obinna Sunday Odenigbo","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Delta","gl"=>12,"sex"=>"M","phone"=>8064997430,"email"=>"obidinelegal@gmail.com"),
  array("S/N"=>"8","names"=>"Mr. Benjamin Okoh","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Delta (Warri)","gl"=>12,"sex"=>"M","phone"=>8037847535,"email"=>"benjaminokoh19@yahoo.com"),
  array("S/N"=>"EDO","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Okwuegbu Egenti Kingsley","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL.","location"=>"Edo","gl"=>15,"sex"=>"M","phone"=>8035059290,"email"=>"egentiokwuegbu@gmail.com"),
  array("S/N"=>"2","names"=>"Mrs. Maureen Ngozi Ogba","status"=>"CLAO","qualification"=>"LLB,BL","location"=>"Edo","gl"=>14,"sex"=>"F","phone"=>8034537752,"email"=>"ngoziogba@yahoo.com"),
  array("S/N"=>"3","names"=>"Mrs.Patience Ihemekpen","status"=>"CLAO","qualification"=>"LLB,BL","location"=>"Edo","gl"=>14,"sex"=>"F","phone"=>8034502926,"email"=>"patihimekpen88@gmail.com"),
  array("S/N"=>"4","names"=>"Mr. Orere Felix","status"=>"ACLAO","qualification"=>"LLB,BL,ML","location"=>"Edo","gl"=>13,"sex"=>"M","phone"=>8035757265,"email"=>"orerefelix@yahoo.com"),
  array("S/N"=>"5","names"=>"Mr. Aloysius Onochie","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Edo","gl"=>12,"sex"=>"M","phone"=>9035379506,"email"=>"onochiemike60@gmail.com"),
  array("S/N"=>"6","names"=>"Ms. Clementina Queen Odeh","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Edo","gl"=>12,"sex"=>"F","phone"=>7083284192,"email"=>"qcodeh@gmail.com"),
  array("S/N"=>"7","names"=>"Mr. Afamefune Agbakor","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Edo","gl"=>12,"sex"=>"M","phone"=>8079695998,"email"=>"agbakorafam@gmail.com"),
  array("S/N"=>"8","names"=>"Mr. Anthony Vincent Omozenumu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Edo","gl"=>12,"sex"=>"M","phone"=>8038549906,"email"=>"tonyenumu@gmail.com"),
  array("S/N"=>"RIVERS","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Janefrances Ojoma Bianeyin","status"=>"ACLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>13,"sex"=>"F","phone"=>8033395471,"email"=>"ojomajf@yahoo.com"),
  array("S/N"=>"2","names"=>"Mrs. Anita Nnenna Chukwuka","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>13,"sex"=>"F","phone"=>8033094558,"email"=>"anitafidel@yahoo.com"),
  array("S/N"=>"3","names"=>"Miss Rizyndai Ogbonna","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>12,"sex"=>"F","phone"=>9056697247,"email"=>"rizyogbonna@gmail.com"),
  array("S/N"=>"4","names"=>"Miss Dinah Alasoba Jack","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>12,"sex"=>"F","phone"=>8039375918,"email"=>"adjjack2018@gmail.com"),
  array("S/N"=>"5","names"=>"Mrs.Chimele Aleruchi Okwute","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>12,"sex"=>"F","phone"=>8033399852,"email"=>"chimeleokwu@yahoo.com"),
  array("S/N"=>"6","names"=>"Mrs. Tosan Frances Jaja","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>12,"sex"=>"F","phone"=>8037435637,"email"=>"tosel@yahoo.com"),
  array("S/N"=>"7","names"=>"Mrs. Omovie Elizabeth Wachukwu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>12,"sex"=>"F","phone"=>8037775032,"email"=>"ewachukwu@gmail.com"),
  array("S/N"=>"8","names"=>"Mrs. Princess Nkemakonam Opanwa","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>12,"sex"=>"F","phone"=>8033733657,"email"=>"ofuokwuone@gmail.com"),
  array("S/N"=>"9","names"=>"Mrs. Omoniyi Oluwunmi Olayinka","status"=>"SLAO","qualification"=>"LLB,BL","location"=>"Rivers","gl"=>10,"sex"=>"F","phone"=>8035851635,"email"=>"lawumiomoniyi@gmail.com"),
  array("S/N"=>"AKWA IBOM","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Adula Abladoyi Samson","status"=>"ACLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Akwa-Ibom","gl"=>13,"sex"=>"M","phone"=>8035383985,"email"=>"samsonadula@yahoo.com"),
  array("S/N"=>"2","names"=>"Mrs. Kokei Emmanuel Ogbonnaya","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Akwa-Ibom","gl"=>12,"sex"=>"F","phone"=>8023334192,"email"=>"kokeiogbonnaya@gmail.com"),
  array("S/N"=>"3","names"=>"Mrs. Mfon Kufre-Abasi","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Akwa-Ibom","gl"=>12,"sex"=>"F","phone"=>8030589975,"email"=>"mkufreabasi@gmail.com"),
  array("S/N"=>"4","names"=>"Miss Grace Ladi Edet","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Akwa-Ibom","gl"=>12,"sex"=>"F","phone"=>8037806630,"email"=>"barrgrace.edet@gmail.com"),
  array("S/N"=>"CROSS RIVER","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Umeh John Ogbonna","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL.","location"=>"Cross River","gl"=>15,"sex"=>"M","phone"=>7038956061,"email"=>"umehjohn47@gmail.com"),
  array("S/N"=>"2","names"=>"Miss Awah Ann Alorye","status"=>"ACLAO","qualification"=>"LLB,BL,BA","location"=>"Cross River","gl"=>13,"sex"=>"F","phone"=>8056317484,"email"=>"annalorye@yahoo.com"),
  array("S/N"=>"3","names"=>"Mr. Ituen Ukpono Ituen","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Cross River","gl"=>12,"sex"=>"M","phone"=>8064448143,"email"=>"ituenukpono1@gmail.com"),
  array("S/N"=>"4","names"=>"Mrs. Rajuno Gabriel Usibe","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Cross River","gl"=>12,"sex"=>"F","phone"=>7060724939,"email"=>"rajuokoi@yahoo.com"),
  array("S/N"=>"5","names"=>"Miss Silverline Nema Brown","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Cross River","gl"=>12,"sex"=>"F","phone"=>8069164019,"email"=>"brownsilverline@gmail.com"),
  array("S/N"=>"BAYELSA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Inenevwbor Eddy Omayayerue","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Bayelsa","gl"=>14,"sex"=>"M","phone"=>8035754605,"email"=>"inenevwoomai@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Alubi Chigere Sunny","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Bayelsa","gl"=>12,"sex"=>"M","phone"=>8060296865,"email"=>"sunnyalubi@gmail.com"),
  array("S/N"=>"3","names"=>"Miss Julianah Modupe Ogundipe","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Bayelsa","gl"=>12,"sex"=>"F","phone"=>8061200046,"email"=>"julianahmodupe9@gmail.com"),
  array("S/N"=>"4","names"=>"Mrs. Jacqueline Chigozie Ugorji","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Bayelsa","gl"=>12,"sex"=>"F","phone"=>8033148893,"email"=>"jackieugorji@gmail.com"),
  array("S/N"=>"","names"=>"LEGAL AID COUNCIL SOUTH EAST ZONE","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),



  array("S/N"=>"ABIA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Moneke Ihechi Azubike","status"=>"ACLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Abia","gl"=>13,"sex"=>"M","phone"=>7053159074,"email"=>"azubikemoneke@gmail.com"),
  array("S/N"=>"2","names"=>"Mrs. Igu Martha Egwu","status"=>"CLAO","qualification"=>"LLB,BL.","location"=>"Abia","gl"=>14,"sex"=>"F","phone"=>8032889382,"email"=>"igumartha50@gmail.com"),
  array("S/N"=>"ANAMBRA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Rose Ukamaka Maduabuchi","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Anambra","gl"=>14,"sex"=>"F","phone"=>8033459707,"email"=>"maduabuchiamaka@yahoo.com"),
  array("S/N"=>"ENUGU","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Oliver Chukwuma","status"=>"AD (Legal) (Zonal Director)","qualification"=>"LLB,BL","location"=>"Enugu","gl"=>15,"sex"=>"M","phone"=>8063079364,"email"=>"chukwumaoliver@yahoo.com"),
  array("S/N"=>"2","names"=>"Mr. Ajibo Sunday Ndubisi","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Enugu","gl"=>14,"sex"=>"M","phone"=>7038802661,"email"=>"sunjusticea2003@yahoo.com"),
  array("S/N"=>"3","names"=>"Mrs. Joy Iheoma Ogbonnaya","status"=>"CLAO","qualification"=>"LLB,BL","location"=>"Enugu","gl"=>14,"sex"=>"F","phone"=>8032764958,"email"=>"jiogbonnaya@yahoo.co.uk"),
  array("S/N"=>"4","names"=>"Mr. Justice Chinedu Igboke","status"=>"SLAO","qualification"=>"LLB,BL","location"=>"Enugu","gl"=>10,"sex"=>"M","phone"=>7033771313,"email"=>"justicechinedu18@gmail.com"),
  array("S/N"=>"IMO","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Ejike Ngozi Mirian","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Imo","gl"=>14,"sex"=>"F","phone"=>8060384449,"email"=>"mirianng160@gmail.com"),
  array("S/N"=>"2","names"=>"Mrs. Susan Anuri Ekenedo","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Imo","gl"=>13,"sex"=>"F","phone"=>8062561701,"email"=>"sa_nc_3@yahoo.com"),
  array("S/N"=>"3","names"=>"Mr. Hansel Chinazor Ewulum","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Imo","gl"=>13,"sex"=>"M","phone"=>8037756450,"email"=>"hanselaz@yahoo.com"),
  array("S/N"=>"4","names"=>"Mrs. Linda Chinwekele Mogekwu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Imo","gl"=>12,"sex"=>"F","phone"=>8064904617,"email"=>"kamalulinda@yahoo.com"),
  array("S/N"=>"EBONYI","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Lilian Uchenna Chikwe","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Anambra","gl"=>14,"sex"=>"F","phone"=>8035838022,"email"=>"lu_iro@yahoo.com"),
  array("S/N"=>"2","names"=>"Mr. Marcellinus Unimke Akamabe","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Ebonyi","gl"=>13,"sex"=>"M","phone"=>8023671787,"email"=>"marcellsbobby@gmail.com"),
  array("S/N"=>"3","names"=>"Mr.Nathaniel Sunday Nwokpoku","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Ebonyi","gl"=>12,"sex"=>"M","phone"=>8033629892,"email"=>"brainweight@gmail.com"),
  array("S/N"=>"4","names"=>"Mr. Leo Onwe Emeka","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Ebonyi","gl"=>12,"sex"=>"M","phone"=>7036425500,"email"=>"emekaleoonwe@gmail.com"),
 

  array("S/N"=>"1","names"=>"Ms. Lilian Malami Aondoakaa","status"=>"ACLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Benue (Katsina-Ala)","gl"=>13,"sex"=>"F","phone"=>8032101193,"email"=>"mjijingi@gmail.com"),
  array("S/N"=>"2","names"=>"Mrs. Anthonia Ibirinlola Yaji","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Benue","gl"=>13,"sex"=>"F","phone"=>8036041842,"email"=>"ibirinlola@yahoo.com"),
  array("S/N"=>"3","names"=>"Mr. Haruna Audu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Benue","gl"=>12,"sex"=>"M","phone"=>8035095454,"email"=>"harunaudu@gmail.com"),
  array("S/N"=>"4","names"=>"Mr. Osamuyi Frank Agho","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Benue","gl"=>12,"sex"=>"M","phone"=>7043500466,"email"=>"ryanfrank86@gmail.com"),
  array("S/N"=>"5","names"=>"Miss Akundushima Jessica Gondo","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Benue (Katsina-Ala)","gl"=>12,"sex"=>"F","phone"=>7039643966,"email"=>"saater008@gmail.com"),
  array("S/N"=>"PLATEAU","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Nurudeen O. Ishola","status"=>"DD (Legal) (Zonal Director)","qualification"=>"LLB,BL","location"=>"Jos Zone","gl"=>16,"sex"=>"M","phone"=>8023500657,"email"=>"ishola10@yahoo.com"),
  array("S/N"=>"2","names"=>"Mrs Ruth Ojochebo Oguche","status"=>"DD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"Plateau","gl"=>16,"sex"=>"F","phone"=>8035946771,"email"=>"ruthoguche@gmail.com"),
  array("S/N"=>"3","names"=>"Mr. Mathew Ajedani Eigege","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Plateau","gl"=>13,"sex"=>"M","phone"=>8036201800,"email"=>"eigegematthew@gmail.com"),
  array("S/N"=>"4","names"=>"Mr. Kator Stephen Adeiyongo","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Plateau","gl"=>12,"sex"=>"M","phone"=>7037713342,"email"=>"stephenadeiyongo@gmail.com"),
  array("S/N"=>"5","names"=>"Mr.Stephen Fidelis Sanda","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Plateau (Shendam)","gl"=>12,"sex"=>"M","phone"=>8069651855,"email"=>"fidelissanda@gmail.com"),
  array("S/N"=>"6","names"=>"Mrs. Ubwas Nash Hwere ","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Plateau","gl"=>12,"sex"=>"M","phone"=>8060868009,"email"=>"ubwasnashwere@gmail.com"),
  array("S/N"=>"NIGER","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mrs. Bolanle Oluwatoyin Jibogun","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Niger (Minna)","gl"=>14,"sex"=>"F","phone"=>7068875605,"email"=>"bolajibs1974@yahoo.com"),
  array("S/N"=>"2","names"=>"Mrs. Asma'u Tinuade Baderinwa","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Niger (Minna)","gl"=>13,"sex"=>"F","phone"=>8035958595,"email"=>"asmaubaderinwa@gmail.com"),
  array("S/N"=>"3","names"=>"Mr. Folorunsho Abdulrazak Boye","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Niger (Bida)","gl"=>13,"sex"=>"M","phone"=>8037393273,"email"=>"boye4raz@gmail.com"),
  array("S/N"=>"4","names"=>"Mr. Tajudeen Salihu Olaosebikan","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Niger (Suleja)","gl"=>13,"sex"=>"M","phone"=>8035926608,"email"=>"tajudeenchambers@gmail.com"),
  array("S/N"=>"5","names"=>"Mrs. Fatima Jumai Familusi","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Niger (Suleja)","gl"=>12,"sex"=>"F","phone"=>8037434718,"email"=>"fattiiee@yahoo.com"),
  array("S/N"=>"6","names"=>"Miss. Labesa Abigail","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Niger (Minna)","gl"=>12,"sex"=>"F","phone"=>8035905050,"email"=>"abigail.labesa@gmail.com"),
  array("S/N"=>"7","names"=>"Mrs. Aisha Inuwa","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Niger (Suleja)","gl"=>12,"sex"=>"F","phone"=>8036466257,"email"=>"aishainuwa90@gmail.com"),
  array("S/N"=>"KOGI","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Leonard Obiji","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Kogi","gl"=>14,"sex"=>"M","phone"=>8035867020,"email"=>"leonistic15@gmail.com"),
  array("S/N"=>"2","names"=>"Mrs. Maisaje Nendirmwa Brenda","status"=>"ACLAO","qualification"=>"LLB,BL.","location"=>"Kogi","gl"=>13,"sex"=>"F","phone"=>8036517678,"email"=>"maisaje2017@gmail.com"),
  array("S/N"=>"3","names"=>"Mr. Fanaiye Kevin Taye","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kogi","gl"=>12,"sex"=>"M","phone"=>8055648820,"email"=>"ktfanaiye@gmail.com"),
  array("S/N"=>"4","names"=>"Mrs. Abimbola Babatunde Adedeji","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kogi","gl"=>12,"sex"=>"F","phone"=>8036256018,"email"=>"belloabimbola@gmail.com"),
  array("S/N"=>"KWARA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Rufus Micheal Bamidele","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"Kwara","gl"=>15,"sex"=>"M","phone"=>8033854866,"email"=>"rufusmichaelbamidele@gmail.com"),
  array("S/N"=>"2","names"=>"Miss. Asalu Josephine Dolapo","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kwara","gl"=>12,"sex"=>"F","phone"=>8064928294,"email"=>"josequity09@gmail.com"),
  array("S/N"=>"3","names"=>"Mrs. Jimoh Abiodun Afusat","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kwara","gl"=>12,"sex"=>"F","phone"=>8063145761,"email"=>"asjimohandco@gmail.com"),
  array("S/N"=>"4","names"=>"Mr. Joseph Tuku Bisong","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kwara","gl"=>12,"sex"=>"M","phone"=>8067011249,"email"=>"jothadtuku@gmail.com"),
  array("S/N"=>"5","names"=>"Mrs. Salamatu Kaka Adebayo","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kwara","gl"=>12,"sex"=>"F","phone"=>8036011557,"email"=>"salamatadebayo21@gmail.com"),
  array("S/N"=>"6","names"=>"Miss Adisa Aminat Abdul-raheem","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kwara","gl"=>12,"sex"=>"F","phone"=>8070663337,"email"=>"abdulraheemaminat9@gmail.com"),
  array("S/N"=>"7","names"=>"Mr. Abdulrahman Olarungbe Salaudeen","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kwara","gl"=>12,"sex"=>"M","phone"=>8068359407,"email"=>"lawolaabdul1985@gmail.com"),
  array("S/N"=>"NASARAWA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Hanbal Ayokunle Muhammud Subair","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL.","location"=>"Nasarawa","gl"=>15,"sex"=>"M","phone"=>8037931608,"email"=>"hanbalmuhammadzubair@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Agaba Carl Amedu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Nasarawa","gl"=>12,"sex"=>"M","phone"=>7037704404,"email"=>"agabaamedu@yahoo.com"),
 

  array("S/N"=>"1","names"=>"Mr. Ahmad Umar Abubakar","status"=>"DD (Legal) (Zonal Director)","qualification"=>"LLB,BL","location"=>"Kaduna","gl"=>16,"sex"=>"M","phone"=>8081962890,"email"=>"mailawwali75@gmail.com"),
  array("S/N"=>"2","names"=>"Mrs. Biba Frank Ohwoavworhua","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"Kaduna","gl"=>15,"sex"=>"F","phone"=>8030921543,"email"=>"frankhabi@yahoo.com"),
  array("S/N"=>"3","names"=>"Mr. David Adudu Agun","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kaduna (Kafanchan)","gl"=>12,"sex"=>"M","phone"=>8034701644,"email"=>"davidagunadudu@yahoo.com"),
  array("S/N"=>"4","names"=>"Mrs. Ramatu Jega Usman","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kaduna","gl"=>12,"sex"=>"F","phone"=>8033118735,"email"=>"ramatujm@yahoo.com"),
  array("S/N"=>"5","names"=>"Mr. Muhammed Nasiru Sidi","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kaduna","gl"=>12,"sex"=>"M","phone"=>8034523532,"email"=>"muhammadunsidi@gmail.com"),
  array("S/N"=>"6","names"=>"Mrs. Laku Michelle Shall","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kaduna","gl"=>12,"sex"=>"F","phone"=>8035876747,"email"=>"nuya03@yahoo.com"),
  array("S/N"=>"7","names"=>"Mrs. Ibrahim Abdullahi Rabiatu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kaduna","gl"=>12,"sex"=>"F","phone"=>8034664326,"email"=>"ummirabi@yahoo.com"),
  array("S/N"=>"8","names"=>"Miss Diana Bagaiya","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kaduna","gl"=>12,"sex"=>"F","phone"=>7039800073,"email"=>"dianabagaiya@yahoo.com"),
  array("S/N"=>"9","names"=>"Miss Jummai Musa","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kaduna","gl"=>12,"sex"=>"F","phone"=>8054910590,"email"=>"jummai4justice1@yahoo.com"),
  array("S/N"=>"SOKOTO","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Akilahyel Shettima","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Sokoto","gl"=>14,"sex"=>"M","phone"=>8030632102,"email"=>"shettimaCLAO@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Aliyu Ajiya Muhammed","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Sokoto","gl"=>12,"sex"=>"M","phone"=>7038639607,"email"=>"ajiya84@gmail.com"),
  array("S/N"=>"3","names"=>"Mrs. Nafisa Sani Lawal","status"=>"SLAO","qualification"=>"LLB, BL","location"=>"Sokoto","gl"=>10,"sex"=>"F","phone"=>8033810382,"email"=>"naphyser.ns@gmail.com"),
  array("S/N"=>"KEBBI","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr.Salisu Mohammed Alhassan","status"=>"CLAO (Coordinator)","qualification"=>"LLB,BL.","location"=>"Kebbi","gl"=>14,"sex"=>"M","phone"=>8063215390,"email"=>"givsoo@yahoo.com"),
  array("S/N"=>"","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"KATSINA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Saminu Danladi Alkantara","status"=>"ACLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Bauchi","gl"=>13,"sex"=>"M","phone"=>8032075770,"email"=>"saminualkantaraesq@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Farouk Usman Dauran","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Katsina","gl"=>12,"sex"=>"M","phone"=>8037633906,"email"=>"udfaruk123@gmail.com"),
  array("S/N"=>"ZAMFARA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Mohammed Ahmed Jamo","status"=>"ACLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Zamfara","gl"=>13,"sex"=>"M","phone"=>8065638540,"email"=>"jamoma112@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Mohammed Salisu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Zamfara","gl"=>12,"sex"=>"M","phone"=>7034771198,"email"=>"msalisu1977@gmail.com"),
  array("S/N"=>"KANO","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Muktar Labaran Usman","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"Kano","gl"=>15,"sex"=>"M","phone"=>8036526261,"email"=>"muktarusman504@gmail.com"),
  array("S/N"=>"2","names"=>"Mr. Muhammad Kofa Auwalu","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"Katsina","gl"=>13,"sex"=>"M","phone"=>8035320951,"email"=>"ma.kofaesq@gmail.com"),
  array("S/N"=>"3","names"=>"Mrs. Imam Mohammed Hasiya ","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kano","gl"=>12,"sex"=>"F","phone"=>8035909538,"email"=>"mhasiya72@gmail.com"),
  array("S/N"=>"4","names"=>"Mr. Okunorobo Cyril Eghomwanre","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kano","gl"=>12,"sex"=>"M","phone"=>8064335274,"email"=>"cyrilokunorobo@gmail.com"),
  array("S/N"=>"5","names"=>"Mrs. Yusuf Yunusa Faiza","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kano","gl"=>12,"sex"=>"F","phone"=>8060984917,"email"=>"faizayunus1@gmail.com"),
  array("S/N"=>"6","names"=>"Mr. Mustapha Ahmad Muazu","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Kano","gl"=>12,"sex"=>"M","phone"=>8032079749,"email"=>"danmaikudu@yahoo.com"),
  array("S/N"=>"7","names"=>"Mr. Chidi Ogochukwu Mmo","status"=>"SLAO","qualification"=>"LLB,BL","location"=>"Kano","gl"=>10,"sex"=>"M","phone"=>7032136798,"email"=>"chidimmo@gmail.com"),
  array("S/N"=>"JIGAWA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Miss. Louisa Mbamalu","status"=>"ACLAO (Coordinator)","qualification"=>"LLB, BL","location"=>"Jigawa","gl"=>13,"sex"=>"F","phone"=>8139207095,"email"=>"barrdumebi@gmail.com"),
  array("S/N"=>"3","names"=>"Miss. Amina Umar Hussain","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Jigawa","gl"=>12,"sex"=>"F","phone"=>8065570430,"email"=>"auhamina@gmail.com"),


  array("S/N"=>"1","names"=>"Mr. Titus Umaru Lektu ","status"=>"DD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"Adamawa","gl"=>16,"sex"=>"M","phone"=>8058615087,"email"=>" lektutitus@yahoo.com"),
  array("S/N"=>"2","names"=>"Mr. Ogbe Francis Adam","status"=>"ACLAO","qualification"=>"LLB,BL. LLM","location"=>"Adamawa","gl"=>13,"sex"=>"M","phone"=>8036341640,"email"=>"frank30six@yahoo.com"),
  array("S/N"=>"3","names"=>"Mr. Mohammed Abubakar","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Adamawa","gl"=>12,"sex"=>"M","phone"=>8036059657,"email"=>"mohammedabubakar80@gmail.com"),
  array("S/N"=>"4","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"5","names"=>"Mr.Habila Mark Laukai","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Adamawa","gl"=>12,"sex"=>"M","phone"=>8032635300,"email"=>"markhabila@yahoo.com"),
  array("S/N"=>"BAUCHI","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Ibrahim Ahmed Chiroma","status"=>"PLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Kebbi","gl"=>12,"sex"=>"M","phone"=>8039688619,"email"=>"chiromson@gmail.com"),
  array("S/N"=>"BORNO","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr.James Peter Bwala","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Borno","gl"=>12,"sex"=>"M","phone"=>8167155022,"email"=>"subpeterbwala@yahoo.co.uk"),
  array("S/N"=>"","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"GOMBE","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Pile Gayus Kombo","status"=>"PLAO (Coordinator)","qualification"=>"LLB.BL","location"=>"Gombe","gl"=>12,"sex"=>"M","phone"=>8028785400,"email"=>"gayuskombo@gmail.com"),
  array("S/N"=>"","names"=>"Mr. Abdulkarim Mohammed Gindau","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Adamawa","gl"=>12,"sex"=>"M","phone"=>8137646211,"email"=>"mohammed450@gmail.com"),
  array("S/N"=>"","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"TARABA","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Igyor Tersoo","status"=>"ACLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Taraba","gl"=>13,"sex"=>"M","phone"=>8065236682,"email"=>"tersoo@justice.com"),
  array("S/N"=>"2","names"=>"Mr. Luka Puki Mahanan","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"Taraba","gl"=>12,"sex"=>"M","phone"=>8032465678,"email"=>"pukimahanan412@gmail.com"),
  array("S/N"=>"YOBE","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Yusuf Yakubu Shelleng","status"=>"PLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"Borno","gl"=>12,"sex"=>"M","phone"=>8038040667,"email"=>"yaks_yusuf@yahoo.co.uk"),

 

  array("S/N"=>"1","names"=>"Mr. Aliyu B Abubakar","status"=>"DG","qualification"=>"LLB, BL","location"=>"HQs","gl"=>null,"sex"=>"M","phone"=>8037863937,"email"=>"aliyubagudu2002@yahoo.co.uk"),
  array("S/N"=>"2","names"=>"Mr. Tunde Ikusagba","status"=>"Dir.(Legal) Dir Criminal Justice)","qualification"=>"LLB,BL","location"=>"HQs Cr. Lit.","gl"=>17,"sex"=>"M","phone"=>8062399236,"email"=>"ikusagbatunde@yahoo.com"),
  array("S/N"=>"3","names"=>"Mr. Enoch Mozong Azariah","status"=>"Dir.(Legal) ","qualification"=>"LLB,BL","location"=>"HQs DG's off.","gl"=>17,"sex"=>"M","phone"=>8036148133,"email"=>"emazariah@yahoo.com"),
  array("S/N"=>"4","names"=>"Mr. Oseni Agboghaiyemeh","status"=>"Dir.(Legal) (Dir Civil Justice)","qualification"=>"LLB,BL","location"=>"HQs Cv. Lit.","gl"=>17,"sex"=>"M","phone"=>8035486837,"email"=>"osenia@gmail.com"),
  array("S/N"=>"5","names"=>"Mrs. Nsot Grace Eni","status"=>"Dir.(Legal)","qualification"=>"LLM,BL,BA","location"=>"HQs Intl. ops.","gl"=>17,"sex"=>"F","phone"=>8033037519,"email"=>"gnsot@yahoo.com"),
  array("S/N"=>"6","names"=>"Mr. Bamidele Olugbenga Ibikunle","status"=>"Dir.(Legal)","qualification"=>"LLB,BL","location"=>"HQs PRS","gl"=>17,"sex"=>"M","phone"=>8033908563,"email"=>"bamideleibikunle@yahoo.com"),
  array("S/N"=>"7","names"=>"Mr. Kenneth Onweazu Mozea","status"=>"Dir.(Legal)","qualification"=>"LLB,BL","location"=>"HQs Prison D.","gl"=>17,"sex"=>"M","phone"=>8036748492,"email"=>"mozeakenneth1@gmail.com"),
  array("S/N"=>"8","names"=>"Mrs. Edith Olufadekemi Adams","status"=>"Dir.(Legal) (Dir OSCAR)","qualification"=>"LLB,BL","location"=>"HQs OSCAR","gl"=>17,"sex"=>"F","phone"=>7030632033,"email"=>"fadamson2010@yahoo.com"),
  array("S/N"=>"9","names"=>"Mr. Abdulfattah Adewale Bakre","status"=>"DD (Legal)","qualification"=>"LLB,BL","location"=>"HQs Cr. Lit.","gl"=>16,"sex"=>"M","phone"=>8034513338,"email"=>"fabakre07@yahoo.com"),
  array("S/N"=>"10","names"=>"Mr. Victor Labesa","status"=>"DD (Legal)","qualification"=>"LLB,BL","location"=>"HQs Civ. Lit","gl"=>16,"sex"=>"M","phone"=>8032867480,"email"=>"labesajrvictor@yahoo.com"),
  array("S/N"=>"11","names"=>"Mr. Francis Orisunbare Johnson","status"=>"DD (Legal)","qualification"=>"LLB,BL","location"=>"HQs Cr. Lit.","gl"=>16,"sex"=>"M","phone"=>7038626530,"email"=>"johnson4jesus2014@gmail.com"),
  array("S/N"=>"12","names"=>"Mr. Ayodele Samuel Banjo","status"=>"DD (Legal)","qualification"=>"LLB,BL","location"=>"HQs Intl. ops.","gl"=>16,"sex"=>"M","phone"=>8035063339,"email"=>"ayodele.banjo@yahoo.com"),
  array("S/N"=>"13","names"=>"Mrs. Olaniyan Yinka Ganiyat","status"=>"CLAO","qualification"=>"LLB,BL.","location"=>"HQs","gl"=>14,"sex"=>"F","phone"=>8023501514,"email"=>"olaniyanganiyat@yahoo.com"),
  array("S/N"=>"14","names"=>"Miss Jessica Nanrin Mamven","status"=>"CLAO","qualification"=>"LLB,BL,LLM","location"=>"HQs Press","gl"=>14,"sex"=>"F","phone"=>8065589683,"email"=>"jessica.mamven@gmail.com"),
  array("S/N"=>"15","names"=>"Mrs. Unoma Rosemary Dibie-Aninye","status"=>"CLAO","qualification"=>"LLB,BL","location"=>"HQs OSCAR","gl"=>14,"sex"=>"F","phone"=>8033582221,"email"=>"rosemaryaninye@gmail.com"),
  array("S/N"=>"16","names"=>"Mrs.Ogechukwu Bona Ibenegbu","status"=>"ACLAO","qualification"=>"LLB,BL.","location"=>"HQs Cr. Lit.","gl"=>13,"sex"=>"F","phone"=>8094499256,"email"=>"ogefeb15@gmail.com"),
  array("S/N"=>"17","names"=>"Miss Ese Bolokor","status"=>"ACLAO","qualification"=>"LLB,BL.","location"=>"HQs","gl"=>13,"sex"=>"F","phone"=>8037002719,"email"=>"baristerese@yahoo.com"),
  array("S/N"=>"18","names"=>"Mr. Marwan Haruna Manava","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs Cv. Lit.","gl"=>12,"sex"=>"M","phone"=>8037310418,"email"=>"marwaharuna@yahoo.com "),
  array("S/N"=>"19","names"=>"Mrs. Obiayo Vic-Cliff Nneka Mediatrix","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs Cr. Lit.","gl"=>12,"sex"=>"F","phone"=>8065423355,"email"=>"vic4justice@yahoo.com"),
  array("S/N"=>"20","names"=>"Mr. Ugoh Michael Guda","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs Cv. Lit.","gl"=>12,"sex"=>"M","phone"=>8062865115,"email"=>"ugohmichaelguda@yahoo.com"),
  array("S/N"=>"21","names"=>"Mrs. Ifeanyi Mary Egbuna","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs Prison D.","gl"=>12,"sex"=>"F","phone"=>8034530210,"email"=>"ask4mary23@yahoo.com"),
  array("S/N"=>"22","names"=>"Mrs. Etoruom Omeresan","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs PRS","gl"=>12,"sex"=>"F","phone"=>8088909605,"email"=>"eomeresan@yahoo.com"),
  array("S/N"=>"23","names"=>"Mr. Lawal Olarewaju Abdulsamad","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs Cv. Lit.","gl"=>12,"sex"=>"M","phone"=>8035979351,"email"=>"samerizone@gmail.com"),
  array("S/N"=>"24","names"=>"Mrs. Vianana Oseahumen Dauebi","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs OSCAR","gl"=>12,"sex"=>"F","phone"=>8063263138,"email"=>"viananaose@gmail.com"),
  array("S/N"=>"25","names"=>"Mr. Labaga Ayuba Helmah","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs Cv. Lit.","gl"=>12,"sex"=>"M","phone"=>7030850406,"email"=>"talk2helma@gmail.com"),
  array("S/N"=>"26","names"=>"Mr. Adekeye Obafemi Olusegun","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs Cr. Lit.","gl"=>12,"sex"=>"M","phone"=>8067094964,"email"=>"gr8ness007@gmail.com"),
  array("S/N"=>"27","names"=>"Miss Ogundare Folasade Bosede","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs Cv. Lit.","gl"=>12,"sex"=>"F","phone"=>8036247008,"email"=>"shadeogundare@yahoo.com"),
  array("S/N"=>"Area 3","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),
  array("S/N"=>"1","names"=>"Mr. Dauda Hassan","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"HQs 3","gl"=>15,"sex"=>"M","phone"=>8033153487,"email"=>"mehetabelarziki23@gmail.com"),
  array("S/N"=>"2","names"=>"Mrs. Abdulraham Lawal Muslimat","status"=>"CLAO","qualification"=>"LLB,BL.","location"=>"HQs 3","gl"=>14,"sex"=>"F","phone"=>7036724715,"email"=>"musilmatabdulrahman@gmail.com"),
  array("S/N"=>"3","names"=>"Mrs.Lami Laura Amlogu","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"HQs 3","gl"=>13,"sex"=>"F","phone"=>8035973961,"email"=>"lauraamlogu@gmail.com"),
  array("S/N"=>"4","names"=>"Mrs. Atano Ejovmokeogene","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"HQs 3","gl"=>13,"sex"=>"F","phone"=>8063359119,"email"=>"jokeatano06@gmail.com"),
  array("S/N"=>"5","names"=>"Mrs. Ibrahim Mimi Fatimah","status"=>"PLAO","qualification"=>"LLB.BL,MBCL","location"=>"HQs 3","gl"=>12,"sex"=>"F","phone"=>8091122138,"email"=>"fatimaimtiaz7@yahoo.com"),
  array("S/N"=>"6","names"=>"Mrs. Onuoha Banyawa  Phoebe","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs 3","gl"=>12,"sex"=>"F","phone"=>7036764208,"email"=>"onuohapheobeusili@gmail.com"),
  array("S/N"=>"7","names"=>"Mrs. Roseline Obiakor","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs 3","gl"=>12,"sex"=>"F","phone"=>8163269737,"email"=>"rosaobiak@yahoo.com"),
  array("S/N"=>"8","names"=>"Mrs. Nnenna Ogba Moneke","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"HQs 3","gl"=>12,"sex"=>"F","phone"=>8035991443,"email"=>"nnennamoneke@gmail.com"),

  array("S/N"=>"FCT","names"=>"","status"=>"","qualification"=>"","location"=>"","gl"=>null,"sex"=>"","phone"=>null,"email"=>""),

  array("S/N"=>"1","names"=>"Mr. Joseph Ayok Achi","status"=>"Dir.(Legal) (Dir FCT)","qualification"=>"MBA,LLB,BL,BA","location"=>"FCT","gl"=>17,"sex"=>"M","phone"=>8035983517,"email"=>"ayokachi1@gmail.com"),

  array("S/N"=>"2","names"=>"Mr. Issa Ibitayo Ibrahim","status"=>"DD (Legal)","qualification"=>"LLB,BL,LLM","location"=>"FCT","gl"=>16,"sex"=>"M","phone"=>8032199014,"email"=>"triplei0862@gmail.com"),

  array("S/N"=>"3","names"=>"Mr. Ogah Ogenyi Oligwu","status"=>"DD (Legal)","qualification"=>"LLB,BL","location"=>"Akwa-Ibom","gl"=>16,"sex"=>"M","phone"=>8052231092,"email"=>"ogah4law@yahoo.com"),

  array("S/N"=>"4","names"=>"Mr. Helmon Buba Koston","status"=>"AD (Legal)","qualification"=>"LLB,BL","location"=>"Benue","gl"=>15,"sex"=>"M","phone"=>8065437190,"email"=>"helmonbuba@gmail.com"),

  array("S/N"=>"5","names"=>"Miss Felicia Nwamaka Udoye","status"=>"AD (Legal)","qualification"=>"LLB,BL","location"=>"FCT ","gl"=>15,"sex"=>"F","phone"=>8035479674,"email"=>"nwamakaudoye@gmail.com"),

  array("names"=>"Mr. Solomon Adebowale","status"=>"AD (Legal)","qualification"=>"LLB,BL","location"=>"Taraba","gl"=>15,"sex"=>"M","phone"=>"7039659810","email"=>"ajirobairele@yahoo.com"),

  array("names"=>"Mr. Shina Isaac Ibiyemi","status"=>"AD (Legal)","qualification"=>"LLB,BL","location"=>"Ondo","gl"=>15,"sex"=>"M","phone"=>"8034838318","email"=>"shinaibb@gmail.com"),

  array("names"=>"Mrs. Egwuasi Nwakaego Cynthia Hedwig","status"=>"CLAO","qualification"=>"LLB,BL","location"=>"FCT ","gl"=>14,"sex"=>"F","phone"=>"8077150502","email"=>"hedwignwakac@gmail.com"),


  array("names"=>"Miss. Kwa Vivian Zong","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"FCT ","gl"=>13,"sex"=>"F","phone"=>"7089811411","email"=>"kwavzong@yahoo.com"),

  array("names"=>"Mrs. Zong Anino Mbortor-Elemi","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"FCT","gl"=>13,"sex"=>"F","phone"=>"8067417251","email"=>"pwolanino@yahoo.com"),

  array("names"=>"Mrs. Omolara Augustina Afolabi","status"=>"ACLAO","qualification"=>"LLB,BL","location"=>"FCT ","gl"=>13,"sex"=>"F","phone"=>"8055250705","email"=>"omolaraa15@gmail.com"),

  array("names"=>"Mrs. Chika Ogochukwu Ikem-Mgbemena","status"=>"ACLAO","qualification"=>"LLB,LB","location"=>"FCT ","gl"=>13,"sex"=>"F","phone"=>"8036679922","email"=>"chikaikemmgbemena@gmail.com"),

  array("names"=>"Mrs. Hauwa Kaka Usman","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT ","gl"=>12,"sex"=>"F","phone"=>"8135712058","email"=>"usmanhau32@yahoo.com"),

  array("names"=>"Mrs. Enejoh Jennifer Mbavelumun","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT","gl"=>12,"sex"=>"F","phone"=>"8035908420","email"=>"jenkajo@yahoo.com"),

  array("names"=>"Mrs. Folashade Akin Adewale","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT ","gl"=>12,"sex"=>"F","phone"=>"8052736023","email"=>"ayotolaakinadewale@gmail.com"),

  array("names"=>"Mrs. Ivbade Precious Eseigbe","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT ","gl"=>12,"sex"=>"F","phone"=>"8077450004","email"=>"ivapres@yahoo.com"),

  array("names"=>"Miss Maryam Mohammed Mana","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT ","gl"=>12,"sex"=>"F","phone"=>"7039135845","email"=>"innamana@gmail.com"),

  array("names"=>"Mrs.Jack-Ojikah Helen","status"=>"PLAO (Coordinator)","qualification"=>"LLB,BL","location"=>"FCT Bwari","gl"=>12,"sex"=>"F","phone"=>"8033491664","email"=>"ada_iyi@yahoo.com"),

  array("names"=>"Mrs. Njideka Violet Ndulue","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT Bwari","gl"=>12,"sex"=>"F","phone"=>"8069817831","email"=>"vonmag2002@yahoo.com"),

  array("names"=>"Mr. Olabisi Palmer","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT Bwari","gl"=>12,"sex"=>"M","phone"=>"8034523552","email"=>"bisi15alabi@yahoo.com"),

  array("names"=>"Mr. Umoru Dickson Yunusa","status"=>"ACLAO (Coordinator)","qualification"=>"LLB.BL. LLM","location"=>"FCT Karu","gl"=>13,"sex"=>"M","phone"=>"8028505824","email"=>"dicksonumoru@gmail.com"),

  array("S/N"=>"2","names"=>"Mr. Eseimokumo Bruce Okoto","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT Karu","gl"=>12,"sex"=>"M","phone"=>"8035119142","email"=>"eseimoo@yahoo.com"),

  array("names"=>"Mr. Lucy Akpuwu Binna","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT Karu","gl"=>12,"sex"=>"F","phone"=>"8036443090","email"=>"binnalucy266@gmail.com"),

  array("names"=>"Mrs. Ogechi Onyenonachi Nzenwa","status"=>"SLAO","qualification"=>"LLB,BL","location"=>"FCT Karu","gl"=>10,"sex"=>"F","phone"=>"7065346193","email"=>"ogechioluigbo@yahoo.com"),


  array("names"=>"Mr. Samuel Olusegun Komolafe","status"=>"AD (Legal) (Coordinator)","qualification"=>"LLB,BL","location"=>"FCT Gwagwalada","gl"=>15,"sex"=>"M","phone"=>"8036785949","email"=>"samolusegun65@gmail.com"),

  array("names"=>"Mr.Oyoyo Chibuike Remmy","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT Gwagwalada","gl"=>12,"sex"=>"M","phone"=>"8036997331","email"=>"chybyik@gmail.com"),

  array("names"=>"Mrs. Ihuoma Jane Akaba","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT Gwagwalada","gl"=>12,"sex"=>"F","phone"=>"8067639063","email"=>"janeofochukwu@yahoo.com"),

   array("names"=>"Braimah Attah","status"=>"PLAO","qualification"=>"LLB,BL","location"=>"FCT Gwagwalada","gl"=>12,"sex"=>"F","phone"=>"8067639063","email"=>"braimahjake@gmail.com")
);

// $userRefined=[];

// foreach ($userExce as $useRay) {

//   if($useRay['gl']!==null ){
    
//     $useRay['password']="1234567";
//      $useRay['monthly_report']="No";
//     $useRay['remember_token']=null;
//     $useRay['created_at']="2020-10-06 20:46:38";
//     $useRay['updated_at']="2020-10-06 20:46:38";
//     unset($useRay['S/N']);
//      unset($useRay['location']);
//     $userRefined[]=$useRay;

//      try {
//             $user = User::create($useRay);
//             //$roleclient = Role::whereName($request['reg_type'])->first();
//             $roleclient = $user->email=="braimahjake@gmail.com"? Role::whereName('admin')->first():Role::whereName('lawyer')->first();
//             $user->assignRole($roleclient);
//             // $credentials = request(['email', 'password']);
//             // Mail::to($user->email)->queue(new Welcome($user));
//             //return response()->json(["data",$user],200);
//         } catch (\Exception $e) {
//            dd($e);
//         }

//   }
  
// }
//  dd($userRefined);

//$myUser=User::findOrFail(224)->with('zone','state','centre')->first();
//dd($myUser::with('zone','state','centre'));
return User::with('zone')->find(224);
    return view('welcome');
});


Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');
