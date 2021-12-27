<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Session, Storage, File};
use App\Models\{GisAid,Province};
use App\DataTables\GisAidDataTable;

class GisAidController extends Controller
{
	protected function index(Request $request, GisAidDataTable $dataTable) {
		return $dataTable->render('gisaid.index');
	}

	public function create(): object {
		return view('gisaid.import');
	}

	protected function store(Request $request, Province $province): string {
		if ($request->input('submit') != null ) {
			if ($request->hasFile('file')) {
				GisAid::truncate();
				$prov_list = $province->select('province_name_en', 'zone_id')->get()->keyBy('province_name_en')->toArray();
				// File Details
				$file = $request->file('file');
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$tempPath = $file->getRealPath();
				$fileSize = $file->getSize();
				$mimeType = $file->getMimeType();

				// Valid File Extensions
				$valid_extension = array("tsv");

				// 5MB in Bytes
				$maxFileSize = 5242880;

				if (in_array(strtolower($extension), $valid_extension)) {

					if ($fileSize <= $maxFileSize) {
						$uploaded = Storage::disk('uploads')->put($filename, File::get($request->file));
						$filepath = public_path("uploads/".$filename);
						$file = fopen($filepath,"r");

						$importData_arr = array();
						$i = 0;

						while (($filedata = fgetcsv($file, 1000, "\t")) !== false) {
							$num = count($filedata );

							if ($i == 0) {
								$i++;
								continue;
							}

							for ($c=0; $c < $num; $c++) {
								$importData_arr[$i][] = $filedata [$c];
							}
							$i++;
						}
						fclose($file);

						foreach ($importData_arr as $importData) {
							$virus_name = $importData[0] ?? "";
							$lab = (isset($importData[0])) ? $this->getLabFromVirusName($importData[0]) : "";
							$accession_id = $importData[1] ?? "";
							$collection_date = $importData[2] ?? "";
							$exp = (isset($importData[3]) && !empty($importData[3])) ? explode("/", $importData[3]) : "";
							$continent = (isset($exp[0])) ? trim($exp[0]) : "";
							$country = (isset($exp[1])) ? trim($exp[1]) : "";
							$prov = (isset($exp[2])) ? trim($exp[2]) : "";
							$prov2 = (isset($prov) && !empty($prov) && !is_null($prov)) ? str_replace(' ', '', $prov) : "";
							$odpc = $prov_list[strtolower($prov2)]['zone_id'] ?? "";
							$host = $importData[4] ?? "";
							$add_locate = $importData[5] ?? "";
							$sampling = $importData[6] ?? "";
							$gender = $importData[7] ?? "";
							$patient_age = $importData[8] ?? "";
							$patient_status = $importData[9] ?? "";
							$last_vacc = $importData[10] ?? "";
							$passage = $importData[11] ?? "";
							$specimen = $importData[12] ?? "";
							$addition_host = $importData[13] ?? "";
							$lineage = $importData[14] ?? "";
							$clade = $importData[15] ?? "";

							$insertData = [
								"virus_name" => $virus_name,
								"lab" => strtoupper($lab),
								"accession_id" => $accession_id,
								"collection_date" => $collection_date,
								"countinent" =>  $continent,
								"country" => $country,
								"province" => $prov,
								"province_2" => $prov2,
								"odpc" => $odpc,
								'host' => $host,
								'additional_location_infomation' => $add_locate,
								'sampling_strategy' => $sampling,
								'gender' => $gender,
								'patient_age' => $patient_age,
								'patient_status' => $patient_status,
								'last_vaccinated' => $last_vacc,
								'passage' => $passage,
								'specimen' => $specimen,
								'additional_host_information' => $addition_host,
								'lineage' => $lineage,
								'clade' => $clade


							];
							GisAid::insertData($insertData);
						}
						return redirect()->route('gisaid.index')->with('success','Import Successful.');
					} else {
						Session::flash('message','File too large. File must be less than 2MB.');
					}
				} else {
					Session::flash('message','Invalid File Extension.');
				}
			}
		}
		//return redirect()->action('GisAidController@index');
	}

	private function getLabFromVirusName($virus_name=""): string {
		$str = ['conni'=>'-CONI-', 'cu'=>'_CU', 'cu-a'=>'CU-A', 'cu-si'=>'CU-SI', 'dmsc'=>'DMSc-'];
		$result = "";
		foreach ($str as $key => $val) {
			if (strstr($virus_name, $val)) {
				$result = $key;
				break;
			}
		}
		return $result;
	}

	public function show(GisAid $gisAid) {}
	public function edit(GisAid $gisAid) {}
	public function update(Request $request, GisAid $gisAid) {}
	public function destroy(GisAid $gisAid) {}

	public function dashboard(GisAid $gisAid) {
		$total_row = $gisAid->count();
		$gender_male = $gisAid->whereGender('male')->count();
		$gender_female = $gisAid->whereGender('female')->count();
		$gender_unknown = $gisAid->whereGender('unknown')->count();
		return view('gisaid.dashboard', [
			'total_row' => $total_row,
			'gender_male' => $gender_male,
			'gender_female' => $gender_female,
			'gender_unknown' => $gender_unknown
		]);
	}
}
