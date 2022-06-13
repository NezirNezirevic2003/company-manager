<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Task;
use App\Exports\TasksExport;
use Maatwebsite\Excel\Facades\Excel;

class TaskTable extends DataTableComponent
{
    protected $model = Task::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('tasks.show', $row);
            });
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Export in Excel',
        ];
    }

    public function export()
    {
        $tasks = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new TasksExport($tasks), 'tasks.xlsx');
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable()->searchable(),

            Column::make("Created at", "created_at")
                ->sortable()->collapseOnTablet(),
            Column::make("Updated at", "updated_at")
                ->sortable()->collapseOnTablet(),
        ];
    }
}