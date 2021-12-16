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
			->columns($this->getColumns())
			->minifiedAjax()
			->dom('Bfrtip')
			->orderBy(0)
			->buttons(
				Button::make('create')->addClass('btn btn-success')->text('<i class="fa fa-plus-circle"></i> <span class="d-none d-sm-inline">เพิ่มข้อมูลตัวอย่าง</span>')->action("window.location = '".route('gisaid.create')."';"),
				Button::make('export')->addClass('btn btn-info ml-1')->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">ส่งออก</span>'),
				// Button::make('print'),
				// Button::make('reset'),
				// Button::make('reload')
		)
		->parameters([
			'language' => ['url'=>url('/vendor/datatables/i18n/thai.json')],
            "lengthMenu" =>  [[15, 25, -1], [15, 25, "All"]]
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
			Column::make('created_at'),
			Column::make('updated_at'),
			Column::computed('action')
				->exportable(false)
				->printable(false)
				->width(60)
				->addClass('text-center'),
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
