<?php

namespace Vinsofts\Translates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinsofts\Translates\Translate;
use Storage;
use DB;
use App;

class TranslatesController extends Controller
{
	public function index($lang) {
		$data = Translate::all();
		App::setLocale($lang);
    	return view('translates::translates-index', compact(['data','lang']));
    }
    public function create($lang) {
    	return view('translates::translates-add', compact('lang'));
    }public function doCreate(Request $request, $lang) {
        $trans = new Translate;
        $trans -> in_code = $request['incode'];
        $trans -> en = $request['en'];
        $trans -> vn = $request['vn'];
        $trans -> pages = $request['pages'];
    	$trans -> save();
    	return redirect($lang.'/index');
    }
    public function updateTrans() {
		$data = Translate::all();
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
