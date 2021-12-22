<?php

namespace App\DataTables;

use App\Models\GisAid;
use Yajra\DataTables\Html\{Button,Column};
use Yajra\DataTables\Html\Editor\{Editor,Fields};
use Yajra\DataTables\Services\DataTable;

class GisAidDataTable extends DataTable
{
	/**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		return datatables()->eloquent($query)->addColumn('action', 'gisaid.action');
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\GisAid $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(GisAid $model) {
		return $model->newQuery()->orderBy('id', 'ASC');
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html() {
		return $this->builder()
			->setTableId('gisaid-table')
			->setTableAttribute("class", "table table-hover table-striped w-100 display nowrap")
			->responsive(true)
			->columns($this->getColumns())
			->minifiedAjax()
			->dom('Bfrtip')
			->orderBy(0)
			->buttons(
				Button::make('create')->addClass('btn btn-success')->text('<i class="fa fa-plus-circle"></i> <span class="d-none d-sm-inline">เพิ่มข้อมูลตัวอย่าง</span>')->action("window.location = '".route('gisaid.create')."';"),
				Button::make('csv')->addClass('btn btn-info ml-1')->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">ส่งออก</span>'),
				Button::make('print')->addClass('btn btn-danger ml-1')->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline">พิมพ์</span>'),
				// Button::make('reset')->addClass('btn btn-danger ml-1')->text('<i class="fa fa-cross"></i> <span class="d-none d-sm-inline">ลบข้อมูล</span>'),
				// Button::make('reload')
		)
		->parameters([
			'language' => ['url'=>url('/vendor/datatables/i18n/thai.json')],
			"lengthMenu" =>  [[15, 25, -1], [15, 25, "All"]],
			"scrollX" => true
		]);
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	protected function getColumns() {
		return [
			Column::make('id'),
			Column::make('virus_name'),
			Column::make('lab'),
			Column::make('accession_id'),
			Column::make('collection_date'),
			Column::make('countinent'),
			Column::make('country'),
			Column::make('province'),
			Column::make('province_2'),
			Column::make('odpc'),
			Column::make('host'),
			Column::make('additional_location_infomation'),
			Column::make('sampling_strategy'),
			Column::make('gender'),
			Column::make('patient_age'),
			Column::make('patient_status'),
			Column::make('last_vaccinated'),
			Column::make('passage'),
			Column::make('specimen'),
			Column::make('additional_host_information'),
			Column::make('lineage'),
			Column::make('clade')
			// Column::computed('action')
			// 	->exportable(false)
			// 	->printable(false)
			// 	->width(60)
			// 	->addClass('text-center'),
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename() {
		return 'GisAid_' . date('YmdHis');
	}
}
