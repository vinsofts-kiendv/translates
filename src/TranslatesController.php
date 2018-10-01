<?php

namespace Vinsofts\Translates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Translate;
use Storage;
use DB;
use App;

class TranslatesController extends Controller
{
	public function index($lang) {
		$data = DB::table('translates') -> get();
		// $data = Translate::all();
		App::setLocale($lang);
    	return view('translates::translates-index', compact(['data','lang']));
    }
    public function create($lang) {
    	return view('translates::translates-add', compact(['data','lang']));
    }public function doCreate(Request $request) {
    	$incode = $request['incode'];
    	$en = $request['en'];
    	$vn = $request['vn'];
    	$pages = $request['pages'];
    	DB::table('translates') -> insert([
    		'in_code' => $incode,
    		'en' => $en,
    		'vn' => $vn,
    		'pages' => $pages
    	]);
    	return redirect('index');
    }
    public function language($lang) {
    	setLocale('vn');
    	return view('translates::translates-add');
    }
    public function updateTrans() {
		$data = DB::table('translates') -> get();
		$trans_en_string = '<?php return [';
		$trans_vn_string = '<?php return [';
		foreach ($data as $trans) {
			$trans_en_string .= '"' . $trans->in_code . '"' . ' => ' . '"' . str_replace('"', '\"', $trans->en) .'"' .',';
			$trans_vn_string .= '"' . $trans->in_code . '"' . ' => ' . '"' . str_replace('"', '\"', $trans->vn) .'"' .',';
		}
		$trans_en_string .= '];';
		$trans_vn_string .= '];';
    	Storage::disk('lang')->put('en/message.php', $trans_en_string);
    	Storage::disk('lang')->put('vn/message.php', $trans_vn_string);
    	return redirect() -> back();
    }
}
